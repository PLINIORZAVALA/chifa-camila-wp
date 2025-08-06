<?php
if (!defined('ABSPATH'))
	exit; // Exit if accessed directly 

if ($custom_query->have_posts()):
	$abc = 0;
	if (isset($_POST['action'])) {
		$blog_load = $blog_on_load_scroll;

	} else {
		$blog_load = $blog_per_page_and_init_load;
	}

	while ($abc < $blog_load && $custom_query->have_posts()):
		$custom_query->the_post();
		//while ( $custom_query->have_posts()) : $custom_query->the_post();
		$post_id = get_the_ID();

		//Categories Fetch
		global $post;

		// Initialize variables to store the term data.
		$keys = '';
		$lightbox_keys = '';
		$filter_value_name = ''; // Used for the data-sort attribute

		// Get the terms for the current post using the dynamic taxonomy name from the shortcode.
// The $blog_filtering variable should hold 'category', 'post_tag', or your custom taxonomy name.
		$terms = get_the_terms($post->ID, $blog_filtering);

		// Check if any terms were found and it's not an error.
		if ($terms && !is_wp_error($terms)) {
			$prefix = '';
			$prefix2 = '';
			foreach ($terms as $filter_value) {
				// Build the comma-separated list of term IDs for data-category.
				$keys .= $prefix . $filter_value->term_id;
				$prefix = ', ';

				// Build the space-separated list of term IDs for the lightbox class.
				$lightbox_keys .= $prefix2 . $filter_value->term_id;
				$prefix2 = ' bfg-lightbox-';
			}
			// Set the sort value to the name of the first term.
			$filter_value_name = $terms[0]->name;
		}
		// --- END: NEW DYNAMIC CODE ---
		?>
		<div style="opacity:0;" id="bf_<?php echo get_the_ID(); ?>" data-category="<?php echo esc_attr($keys); ?>"
			data-sort="<?php echo esc_attr($filter_value_name); ?>"
			class="<?php echo esc_attr(str_replace(",", "", $keys)); ?> pfg_theme_1 filtr-item filtr_item_1 single_one <?php echo esc_attr($blog_col_large_desktops); ?> <?php echo esc_attr($blog_col_desktops); ?> <?php echo esc_attr($blog_col_tablets); ?> <?php echo esc_attr($blog_col_phones); ?>">
			<?php
			// ------------ ********** -----------------//
			// ------------ TEMPLATE 1 -----------------//
			// ------------ ********** -----------------//
			if ($blog_template == 'template1') { ?>
				<div
					class="post-box bf_thumb_box_1-<?php echo $unique_id; ?> ">
					<div class="bf_title_box_1-<?php echo $unique_id; ?> bf_title_box_1 fit-text-main" maxlength="20">

						<?php
						if ($blog_title_below_image == "no") {
							if ($blog_title == "yes") { ?>
								<h2 class="bf_title_1-<?php echo $unique_id; ?> blog_title_1 fit-text"><?php the_title(); ?></h2>
								<?php
							}
						}
						if ($blog_date_below_image == "no") {
							if ($blog_date == "yes") {
								$day = get_the_date('d');
								$month = get_the_date('m');
								$year = get_the_date('Y'); ?>
								<div class="blog_metaInfo">
									<?php
									if ($link_on_date == "yes") { ?>
										<span class="blog_date"><i class="fa fa-calendar"></i> <a class="blog_date_a"
												href="<?php echo get_day_link($year, $month, $day); ?>" ><?php the_time('j F, Y'); ?></a>
										</span>
										<?php
									} else { ?>
										<span class="blog_date"><i class="fa fa-calendar"></i> <?php the_time('j F, Y'); ?> </span>
										<?php
									} ?>
								</div>
								<?php
							}
						}
						if ($blog_author_below_image == "no") {
							if ($blog_author == "yes") { ?>
								<div class="blog_metaInfo">
									<span class="blog_author"><i class="fa fa-user-o"></i> <?php _e('By') ?> 						<?php the_author(); ?> </span>
								</div>
								<?php
							}
						} ?>
					</div>

					<?php // Image Content 
								include(BF_PLUGIN_DIR . "templates/blog-img-content.php"); ?>

					<div class="bf_title_box_2-<?php echo $unique_id; ?> bf_title_box_2 fit-text-main">
						<?php
						if ($blog_title_below_image == "yes") {
							if ($blog_title == "yes") { ?>
								<h2 class="bf_title_1-<?php echo $unique_id; ?> blog_title_1 fit-text"><?php the_title(); ?></h2>
							<?php
							}
						}
						if ($blog_date_below_image == "yes") {
							if ($blog_date == "yes") {
								$day = get_the_date('d');
								$month = get_the_date('m');
								$year = get_the_date('Y'); ?>
								<div class="blog_metaInfo">
									<?php
									if ($link_on_date == "yes") { ?>
										<span class="blog_date"><i class="fa fa-calendar"></i> <a class="blog_date_a"
												href="<?php echo get_day_link($year, $month, $day); ?>" ><?php the_time('j F, Y'); ?></a>
										</span>
										<?php
									} else { ?>
										<span class="blog_date"><i class="fa fa-calendar"></i> <?php the_time('j F, Y'); ?> </span>
										<?php
									} ?>
								</div>
								<?php
							}
						}
						if ($blog_author_below_image == "yes") {
							if ($blog_author == "yes") { ?>
								<div class="blog_metaInfo">
									<span class="blog_author"><i class="fa fa-user-o"></i> <?php _e('By') ?> <?php the_author(); ?> </span>
								</div>
								<?php
							}
						}
						if ($blog_categories == "yes") { ?>
							<div class="blog_metaInfo">
								<span class="blog_cat"><i class=""><img class="blog_cat_icon" src="<?php echo BF_PLUGIN_URL ?>img/cat.png"></i> 
								<?php
								$categories = get_the_category();
								   $separator = ", ";
								   $output = '';
								   if ($categories) {
										   foreach ($categories as $category) {
											   $output .= $category->cat_name . $separator;
										   }
									   echo trim($output, $separator);
								   } ?>
								</span>
							</div><!-- end meta -->
							<?php
						}
						if ($blog_desc == "yes") { ?>
							<div class="bf_desc_1-<?php echo $unique_id; ?> blog_desc fit-text">
								<?php
								if ($three_dots == "yes") {
									echo stripcslashes(substr(get_the_excerpt(), 0, $blog_desc_characters)) . '...';
								} else {
									echo stripcslashes(substr(get_the_excerpt(), 0, $blog_desc_characters));
								} ?>
							</div>
							<?php
						}
						if ($blog_tags == "yes") { ?>
							<div class="blog_metaInfo">
								<?php
								if (get_the_tags()) { ?>
									<span class="blog_tag"><i class=""><img class="blog_tag_icon"
												src="<?php echo BF_PLUGIN_URL ?>img/tag.png"></i> <?php $post_tags = get_the_tags();
												   $separator = ', ';
												   $output = '';
												   if (!empty($post_tags)) {
													   foreach ($post_tags as $tag) {
														   $output .= __($tag->name) . $separator;
													   }
												   }
												   echo trim($output, $separator); ?>
									</span>
									<?php
								} ?>
							</div>
							<?php
						}
						if ($blog_read_more == "yes") { ?>
							<div class="bf_read_more_div_1">
								<a id="blog_read_more" class="snip0047 snip0047-<?php echo $unique_id; ?> bf_read_more_1"
									href="<?php the_permalink(); ?>" ><span><?php echo $blog_read_more_text; ?></span><i
										class="fa fa-link"></i></a>
							</div>
							<?php
						} ?>
					</div>
				</div>
				<?php
			}
			// ------------ / TEMPLATE 1 End -----------------//
			?>
			<input type="hidden" value="<?php echo get_the_ID(); ?>" class="displayed_posts">
		</div>
		<?php
		$abc++;
	endwhile;
	// Reset Post Data
	wp_reset_postdata();
endif; ?>