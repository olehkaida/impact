<?php
/**
 * Main Title Video Block Template.
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
$class_name = 'main-title-video';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$title = get_field('title');
$description = get_field('description');
$video = get_field('video');
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="content-title-description-button">
            <div class="content-title-description">
                <?php if ($title) { ?>
                    <div class="page-title"><?php echo esc_html($title); ?></div>
                <?php } ?>
                <?php if ($description) { ?>
                    <div class="page-description"><?php echo esc_html($description); ?></div>
                <?php } ?>
            </div>
        </div>
        <div class="block-video-laptop">
            <iframe src="<?php echo esc_html($video); ?>&autoplay=1&loop=1&autopause=0&background=1" width="840" height="480" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <div class="block-video-mobile">
            <iframe src="<?php echo esc_html($video); ?>&autoplay=1&loop=1&autopause=0&background=1" width="340" height="192" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
    </div>
</div>
