<?php
/**
 * Signup Block Template.
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
$class_name = 'login-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$pretitle = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$button = get_field('button');
?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="section-heading-block">
                <?php if ($pretitle) { ?>
                    <div class="section-pretitle"><?php echo($pretitle); ?></div>
                <?php } ?>
                <?php if ($title) { ?>
                    <div class="section-title"><?php echo esc_html($title); ?></div>
                <?php } ?>
                <?php if ($description) { ?>
                    <div class="section-description"><?php echo esc_html($description); ?></div>
                <?php } ?>
                <?php if ($button) { ?>
                    <div class="new-cta-btn">
                        <a href="<?php echo $button['url'] ?>" class="col-link-btn"
                           target="<?php if ($button['target']) {
                               echo $button['target'];
                           } else {
                               echo '_self';
                           } ?>"><?php echo $button['title'] ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
