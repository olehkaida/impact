<?php
/**
 * Simple Hero Block Template.
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
$class_name = 'title-only-hero';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$background = get_field('background');
$title = get_field('title');
$description = get_field('description');
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name);
if ($background) echo " " . $background; ?>">
    <div class="container">
        <?php if ($title) { ?>
            <div class="page-title"><?php echo $title; ?></div>
        <?php } ?>
        <?php if ($description) { ?>
            <div class="page-description"><?php echo $description; ?></div>
        <?php } ?>
    </div>
</div>
