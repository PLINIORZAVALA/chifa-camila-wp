<?php
// We only proceed if blog images are enabled.
if ($blog_image == "yes") {

    // 1. GET IMAGE DATA
    // Get all necessary image information at the start.
    $image_id = get_post_thumbnail_id();
    $thumbnail_url = get_the_post_thumbnail_url(null, $blog_image_quality);
    $full_image_url = get_the_post_thumbnail_url();

    // Proceed only if a thumbnail actually exists to prevent errors.
    if ($thumbnail_url) {
        $image_title = get_the_title($image_id);
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
        
        // Fallback for alt text: use the image title if alt is empty.
        if (empty($image_alt)) {
            $image_alt = esc_attr($image_title);
        }

        // 2. PREPARE HTML ATTRIBUTES AND CLASSES
        // Determine the background image style for the <figure> element.
        $background_image_style = ($blog_fixed_grid == 'yes')
            ? 'background-image: url(' . esc_url($thumbnail_url) . ');'
            : '';


        // Map hover effects to their corresponding CSS classes.
        $hover_effect_classes = [
            'hover1' => 'snip1550',
            'none'   => ''
        ];
        $figure_class = $hover_effect_classes[$blog_image_hover_effect] ?? '';

        // More readable class name for the main container
        $main_container_class = 'fit-in-content';
?>

<?php
//======================================================================
//
//      REFACTORED & MANAGED BLOG IMAGE DISPLAY
//
//======================================================================

// We assume the data preparation from Step 1 has already run.

// 3. RENDER THE OUTPUT
// The main conditional logic now focuses only on the differences between hover effects.
?>

<?php // A. Handle the case with no hover effect first, as it's the most different. ?>
<?php if ($blog_image_hover_effect == 'none'): ?>

    <?php if ($blog_image_link == 'yes'): ?>
        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="<?php echo esc_attr($main_container_class); ?>" style="<?php echo esc_attr($background_image_style); ?>">
            <?php if ($blog_fixed_grid != 'yes'): ?>
                <img title="<?php echo esc_attr($image_title); ?>" class="portfolio_thumbnail" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </a>
    <?php else: ?>
        <figure class="<?php echo esc_attr($main_container_class); ?>" style="<?php echo esc_attr($background_image_style); ?>">
             <?php if ($blog_fixed_grid != 'yes'): ?>
                <img title="<?php echo esc_attr($image_title); ?>" class="portfolio_thumbnail" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </figure>
    <?php endif; ?>

<?php // B. Handle all other hover effects, as they share a similar structure. ?>
<?php else: ?>
    
    <?php // Hidden title for accessibility/SEO if the main title is not displayed. ?>
    <?php if ($blog_title != "yes"): ?>
        <title style="display:none"><?php echo esc_html($image_title); ?></title>
    <?php endif; ?>

    <figure class="<?php echo esc_attr($figure_class); ?> <?php echo esc_attr($main_container_class); ?>" style="<?php echo esc_attr($background_image_style); ?>">
        
        <?php // The actual image tag is only needed if not using a fixed grid background. ?>
        <?php if ($blog_fixed_grid != 'yes'): ?>
            <img title="<?php echo esc_attr($image_title); ?>" class="portfolio_thumbnail" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>


        <?php // Use a div container for icons in all hover effects except 'none'. ?>
        <div class="<?php echo ($blog_image_hover_effect == 'hover1') ? 'icons' : ''; ?>">
            
            <?php // Lightbox Icon ?>
            <?php if ($blog_image_lightbox == "yes"): ?>
                <a href="<?php echo esc_url($full_image_url); ?>" title="" rel="bfg-lightbox" class="bfg-lightbox-<?php echo esc_attr($unique_id); ?> bfg-lightbox-<?php echo esc_attr($lightbox_keys); ?>" id="filter_main">
                    <i class="fa fa-picture-o "></i>
                </a>
            <?php endif; ?>

            <?php // Link Icon ?>
            <?php if ($blog_image_link == "yes"): ?>
                <a href="<?php echo esc_url(get_the_permalink()); ?>" >
                    <i class="fa fa-link"></i>
                </a>
            <?php endif; ?>

        </div>


    </figure>

<?php endif; // End of hover effect conditions ?>

<?php
    } // End of the 'if ($thumbnail_url)' check.
} // End of the 'if ($blog_image == "yes")' check.
?>