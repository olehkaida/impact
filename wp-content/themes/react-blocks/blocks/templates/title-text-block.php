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
$class_name = 'title-text-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.

$pretitle = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="content">
            <div class="heading-suport-text">
                <div class="headind-subheading">
                    <?php if ($title) { ?>
                        <div class="section-pretitle"><?php echo($pretitle); ?></div>
                    <?php } ?>
                    <?php if ($title) { ?>
                        <div class="section-title"><?php echo($title); ?></div>
                    <?php } ?>
                </div>
                <?php if ($description) { ?>
                    <p class="section-description"><?php echo($description); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
