<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $wp_query;

// --- START: NEW DYNAMIC LOGIC ---

// 1. Set the taxonomy name directly from the shortcode attribute ($blog_filtering).
$taxonomy_name = $blog_filtering; 

// 2. Prepare arguments to get only the terms selected in the shortcode.
// This now uses the generic 'selected_terms' attribute.

$selected_terms_array = !empty($selected_terms) ? explode(',', $selected_terms,4) : array();

$term_args = array(
    'taxonomy'   => $taxonomy_name,
    'hide_empty' => true,
	'number'     => 4,
);
// If specific terms are selected in the shortcode, only include those.
if (!empty($selected_terms_array)) {
    $term_args['include'] = $selected_terms_array;
}

$terms = get_terms($term_args);

if ($terms && !is_wp_error($terms)) :

    // 3. Dynamically count total posts for the "All" filter using a tax_query.
    $all_post_count = '';
    if ($filter_post_count == "yes") {
        $count_query_args = array(
            'post_type' => $post_type,
            'posts_per_page' => -1, // Count all matching posts
        );
        // If specific terms are selected, count posts within them.
        if (!empty($selected_terms_array)) {
            $count_query_args['tax_query'] = array(
                array(
                    'taxonomy' => $taxonomy_name,
                    'field'    => 'term_id',
                    'terms'    => $selected_terms_array,
                ),
            );
        }
        $query_for_count = new WP_Query($count_query_args);
        $total_post_incat = $query_for_count->found_posts;
        $all_post_count = ' (' . $total_post_incat . ')';
        wp_reset_postdata(); // Reset post data after custom query.
    }
    // --- END: NEW DYNAMIC LOGIC ---
	
	// --- Default Filter for the JavaScript ---
	if (isset($_GET['filter']) && !empty($_GET['filter'])) {
		//$default_filter = sanitize_text_field($_GET['filter']);
		foreach($terms as $term) { 
			if($term->name == stripslashes($_GET['filter'])) {
				$default_filter = $term->term_id;
			}
		}

	} else {
		$selected_terms_array = !empty($selected_terms) ? explode(',', $selected_terms) : array();
		if (!empty($default_filter) && $default_filter != 'all' && (empty($selected_terms_array) || in_array($default_filter, $selected_terms_array))) {
			$default_filter = $default_filter;
		} else {
			$default_filter = "all";
		}
	}
	// --- Default Filter for the JavaScript ---
	
    // The rest of this file is your original HTML structure, which now works with the dynamic $terms variable.
    if ($blog_filters == "yes") { ?>
       
            <div class="text-center">
                <ul class="simplefilter filtr-control-<?php echo $unique_id; ?>">
                    <?php 
                    if ( $blog_filter_all == "yes" ) { ?>
                            <li id="all" class="snip0047 snip0047-<?php echo $unique_id; ?> active filtr-controls-<?php echo $unique_id; ?>" data-filter="all"><span style="pointer-events: none;"><?php _e($blog_all_text, 'blog-filter'); echo $all_post_count; ?></span><i class="fa fa-check" style="pointer-events: none;"></i></li>
                        <?php 
                    }
                    foreach ( $terms as $term) { 
                        $single_filter_post_count = ($filter_post_count == "yes") ? ' ('. $term->count .')' : '';  ?>
                            <li id="<?php echo $term->term_id; ?>" class="filtr-controls-<?php echo $unique_id; ?> snip0047 snip0047-<?php echo $unique_id; ?>" value="<?php echo $term->term_id; ?>" data-filter="<?php echo $term->term_id; ?>"><span style="pointer-events: none;"><?php _e($term->name, 'blog-filter'); echo $single_filter_post_count; ?></span><i class="fa fa-check" style="pointer-events: none;"></i></li>
                        <?php 
                    } ?>
                </ul>
            </div>
            <?php if($blog_search == "yes") { ?>
                <div class="blog_search_div text-center">
                    <input type="text" class="filtr-controls-<?php echo $unique_id; ?> searchTerm" name="blog_search" placeholder="<?php _e($blog_search_text, 'blog-filter'); ?>" data-search>
                </div>
            <?php }
        
    }
endif;
?>