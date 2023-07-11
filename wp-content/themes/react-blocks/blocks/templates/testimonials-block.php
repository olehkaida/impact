<?php
/**
 * Testimonials Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonials-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$alignment = get_field('alignment');
$title = get_field('title');
$description = get_field('description');
$testimonial_image = get_field('testimonial_image');
$mobile_image = get_field('mobile_image');
$testimonial_text = get_field('testimonial_text');
$author = get_field('author_name');
$author_title = get_field('author_info');
?>
<?php if ($testimonial_text): ?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <?php if ($title) { ?>
                <p class="section-title"><?php echo $title; ?></p>
            <?php } ?>
            <?php if ($description) { ?>
                <p class="section-description"><?php echo $description; ?></p>
            <?php } ?>
            <div class="testimonial flex <?php if ($alignment) echo " " . $alignment; ?>">
                <div class="testimonial-col">
                    <p class="testimonial-info"><?php echo $testimonial_text; ?></p>
                    <p class="author-name"><?php echo $author; ?></p>
                    <p class="author-info"><?php echo $author_title; ?></p>
                </div>
                <?php
                if (isset($_COOKIE['screenWidth'])) {
                $image_size = image_size_depends_screen_width();
                ?>
                <img class="testimonial-image" src="<?php echo $testimonial_image["sizes"]["$image_size"] ?>"
                     alt="<?php echo $testimonial_image['alt'] ?>">
                <img class="mobile-image" src="<?php echo $mobile_image["sizes"]["$image_size"] ?>"
                     alt="<?php echo $mobile_image['alt'] ?>">
                <?php } else { ?>
                    <img class="testimonial-image" src="<?php echo $testimonial_image['url']?>" alt="<?php echo $testimonial_image['alt']?>">
                    <img class="mobile-image" src="<?php echo $mobile_image['url']?>" alt="<?php echo $mobile_image['alt']?>">
                <?php } ?>
            </div>
        </div>
    </div>
<?php elseif (is_admin()) : ?>
    <p><?php _e('No content added'); ?></p>
<?php endif; ?>
