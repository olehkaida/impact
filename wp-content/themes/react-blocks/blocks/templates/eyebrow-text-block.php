<?php
/**
 * Eyebrow Block Template.
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
$class_name = 'eyebrow-text';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$eyebrow = get_field('text') ?: 'Your text here...';
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <p class="eyebrow"><?php echo $eyebrow ?></p>
    </div>
</div>
