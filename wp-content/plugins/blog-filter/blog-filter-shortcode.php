<?php
/**
 * Plugin Shortcode: [AWL-BlogFilter]
 *
 * This file contains the main shortcode function that renders the blog filter gallery.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_shortcode('AWL-BlogFilter', 'awl_blog_filter_shortcode');

/**
 * Renders the blog filter gallery based on shortcode attributes.
 *
 * @param array $atts User-defined shortcode attributes.
 * @return string HTML output for the gallery.
 */
function awl_blog_filter_shortcode($user_atts) 
{

    // 1. --- Enqueue Scripts and Styles ---
    // This ensures all necessary assets are loaded for the gallery to function.
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('awl-bf-filterizr-js');
    wp_enqueue_script('awl-bf-underscore-js');
    wp_enqueue_style('awl-bf-font-awesome-4-min-css');
    wp_enqueue_style('awl-bf-filter-output-css');
    wp_enqueue_style('awl-bf-hover-css');
    wp_enqueue_style('awl-bf-swipebox-css');
    wp_enqueue_script('awl-bf-swipebox-js');
    wp_enqueue_script('awl-bf-bootstrap-js');

    // css
    wp_enqueue_style('awl-bf-bootstrap-css');

	// 2. --- Process Shortcode Attributes ---
    $defaults = bfg_get_shortcode_defaults(); // Use the central defaults function
    $atts = shortcode_atts($defaults, $user_atts, 'AWL-BlogFilter');
    // --- START: BACKWARD COMPATIBILITY LAYER ---
    // This ensures old shortcodes using `selected_categories` or `selected_tags` still work.
    // If the new 'selected_terms' is empty, check if an old attribute has a value.
    if (empty($atts['selected_terms'])) {
        if (!empty($user_atts['selected_categories'])) {
            // If the old 'selected_categories' exists, use its value for the new 'selected_terms'.
            $atts['selected_terms'] = $user_atts['selected_categories'];
        } elseif (!empty($user_atts['selected_tags'])) {
            // If the old 'selected_tags' exists, use its value for the new 'selected_terms'.
            $atts['selected_terms'] = $user_atts['selected_tags'];
        }
    } 
	
	if (empty($atts['exclude_terms']) || $atts['exclude_terms'] == 'all') {
         if (!empty($user_atts['exclude_categories'])) {
            $atts['exclude_terms'] = $user_atts['exclude_categories'];
        } elseif (!empty($user_atts['exclude_tags'])) {
            $atts['exclude_terms'] = $user_atts['exclude_tags'];
        }
    }
	
	
	if (empty($atts['blog_filtering']) || $atts['blog_filtering'] == 'blog_category') {
         if (!empty($user_atts['blog_filtering'])) {
            $atts['blog_filtering'] = 'category';
        } 
    }
	if (empty($atts['blog_filtering']) || $atts['blog_filtering'] == 'blog_tag') {
         if (!empty($user_atts['blog_filtering'])) {
            $atts['blog_filtering'] = 'post_tag';
        } 
    }
	
	
	 // Do the same for the default filter term.
    if (empty($atts['default_filter_term']) || $atts['default_filter_term'] == 'all') {
         if (!empty($user_atts['default_cat_filter'])) {
            $atts['default_filter_term'] = $user_atts['default_cat_filter'];
        } elseif (!empty($user_atts['default_tag_filter'])) {
            $atts['default_filter_term'] = $user_atts['default_tag_filter'];
        }
    }
	
	if (isset($user_atts['default_filter_term'])) {
		$default_filter = $atts['default_filter_term'];
	} else {
		$default_filter = "all";

	}
	
    // --- END: BACKWARD COMPATIBILITY LAYER ---
    // Now, extract all attributes into local variables.
    extract($atts);

    $unique_id = rand(1, 1000);

    //color dark code
    list($r, $g, $b) = sscanf($blog_desc_box_color, "#%02x%02x%02x");
    $r = $r - 24;
    $g = $g - 22;
    $b = $b - 19;

    // Start output buffering to capture all HTML.
    ob_start();

    // Include the dynamic CSS file.
    require('blog-filter-output-css.php');
    ?>
    <div id="BlogFilterMain-<?php echo $unique_id; ?>" class="blog_filter_main" version="<?php echo BF_PLUGIN_VER; ?>"
        data-post-type="<?php echo $post_type; ?>" data-initload="<?php echo $blog_on_load_scroll; ?>" data-scrollflage="1">
        <?php
        // 3. --- Prepare and Run The Main Query ---
        $paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
        $posts_per_page = ($blog_pagination == 'no' && $blog_load_more == 'no' && $blog_load_onscroll == 'no') ? -1 : (int) $blog_per_page_and_init_load;
		
		// If pagination is OFF and someone is on page >1, force a 404:
		if ( $blog_pagination === 'no' && get_query_var('paged') > 1 ) {
			global $wp_query;
			// Tell WP this is a 404
			$wp_query->set_404();
			status_header( 404 );
			nocache_headers();
			// Load your theme’s 404 template and bail out
			include( get_query_template( '404' ) );
			exit;
		}
		
		$custom_query_args = array(
			'post_type'      => $post_type,
			'post_status'    => 'publish',
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged,
			// Only compute pagination counts when needed
			'no_found_rows'  => ( $blog_pagination === 'no' ),
		);

		// --- START: NEW, ROBUST TAXONOMY LOGIC ---
		// Explode, trim and cast to int in one go
		$selected_terms_array = ! empty( $selected_terms )
			? array_map( 'intval', array_map( 'trim', explode( ',', $selected_terms ) ) )
			: array();

		$exclude_terms_array = ! empty( $exclude_terms )
			? array_map( 'intval', array_map( 'trim', explode( ',', $exclude_terms ) ) )
			: array();

		// Remove excluded IDs from your includes
		if ( ! empty( $selected_terms_array ) && ! empty( $exclude_terms_array ) ) {
			$selected_terms_array = array_diff( $selected_terms_array, $exclude_terms_array );
		}
		
		$tax_query = [];

		// Build the final tax_query
		$tax_query = array( 'relation' => 'AND' );


		// Only add an IN clause if there’s anything left to include
		// 2) only push our taxonomy if the user actually selected terms
		if ( ! empty( $selected_terms_array ) ) {
			$tax_query[] = [
				'taxonomy'         => $blog_filtering,
				'field'            => 'term_id',
				'terms'            => $selected_terms_array,
				'operator'         => 'IN',
				'include_children' => false,
			];
		}

		// … you could push other tax_queries here if needed …

		// 3) only attach the tax_query var if it has at least one clause
		if ( ! empty( $tax_query ) ) {
			// if you have more than one clause you may also want a 'relation' key:
			// $tax_query['relation'] = 'AND';
			$args['tax_query'] = $tax_query;
		}


		// Only add a NOT IN clause if there are terms to exclude
		if ( ! empty( $exclude_terms_array ) ) {
			$tax_query[] = array(
				'taxonomy' => $blog_filtering,
				'field'    => 'term_id',
				'terms'    => $exclude_terms_array,
				'operator' => 'NOT IN',
			);
		}

		// Attach tax_query only when you have at least one condition
		if ( count( $tax_query ) > 1 ) {
			$custom_query_args['tax_query'] = $tax_query;
		}

		$custom_query = new WP_Query( $custom_query_args );

        // 4. --- Generate HTML Output ---
        $taxonomies = get_object_taxonomies($post_type);
        if (!empty($taxonomies) && $post_type != 'page') {
            include(BF_PLUGIN_DIR . "filtering/filters.php");
        }
        ?>
        <div class="filtr-container filters-div bf_gallery_1-<?php echo esc_attr($unique_id); ?>" style="width:100%">
            <?php
            if ($custom_query->have_posts()) {
                include('templates/blog-filter-content.php');
            } else {
                echo '<p class="bfg-no-posts-found">' . __('No posts found.', 'blog-filter') . '</p>';
            }
            ?>
			<div class="blog_loader blog_loader-<?php echo $unique_id; ?>"></div>
        </div>

        <?php // Load More, Scroll, and Pagination Controls
            if ($blog_load_more == "yes") { ?>
            <div class="row text-center" style="padding:35px;"><button id="load-more-<?php echo $unique_id; ?>"
                    class="btn snip0047 snip0047-<?php echo $unique_id; ?>"><span
                        style="pointer-events: none;"><?php _e($load_more_text, 'blog-filter'); ?></span><i
                        class="fa fa-circle-o-notch fa-spin" style="pointer-events: none;"></i></button></div>
        <?php }
            if ($blog_pagination == "yes") { ?>
            <div class="blog_pagination-<?php echo $unique_id; ?>">
                <?php
                echo paginate_links(array(
                    'total' => $custom_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '<i class="fa fa-caret-left"></i>',
                    'next_text' => '<i class="fa fa-caret-right"></i>',
                ));
                ?>
            </div>
        <?php }

		// --- FIX: Include the correct file for JavaScript output ---
		// An AJAX handler file should never be included directly.
		include(BF_PLUGIN_DIR . "filtering/filters-ajax.php");
        ?>
    </div>
    <?php
    // 5. --- Cleanup ---
    // Restore original Post Data and clean up the output buffer.
    wp_reset_postdata();
    return ob_get_clean();
}