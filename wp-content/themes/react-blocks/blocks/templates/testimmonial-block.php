<?php
/**
 * Testimonial Block Template.
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
$class_name = 'testimmonial_block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.

$quote = get_field('quote');
$avatar = get_field('avatar');
$title = get_field('title');
$name = get_field('name');

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="content">
            <div class="attribution">
                <div class="quote"><?php echo($quote); ?></div>
                <div class="avatar-text">
                    <img class="testimonial-image" src="<?php echo $avatar['url'] ?>"
                         alt="<?php echo $avatar['alt'] ?>">
                    <div class="testimonial-info">
                        <p class="testimonial-name"><?php echo($name); ?></p>
                        <p class="testimonial-title"><?php echo($title); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
