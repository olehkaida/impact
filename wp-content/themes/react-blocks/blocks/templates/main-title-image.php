<?php
/**
 * Main Title Image Block Template.
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
$class_name = 'main-title-image';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$title = get_field('title');
$description = get_field('description');
$demo_button = get_field('demo_button');
$action_button = get_field('action_button');
$image = get_field('image');
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
            <?php if ($action_button || $demo_button) { ?>
            <div class="action-buttons">
                <?php if ($demo_button) { ?>
                <a href="<?php echo $demo_button['url']; ?>" target="_blank"
                   class="btn btn__md demo_button"><?php echo $demo_button['title'] ?></a>
                <?php } ?>
                <?php if ($action_button) { ?>
                <a href="<?php echo $action_button['url']; ?>" target="_blank"
                   class="btn btn__md explore_the_market"><?php echo $action_button['title'] ?></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php
        if (isset($_COOKIE['screenWidth'])) {
        $image_size = image_size_depends_screen_width();
        ?>
            <img class="block-image" src="<?php echo $image["sizes"]["$image_size"] ?>" alt="<?php echo $image['alt'] ?>">
        <?php
        } else { ?>
                <img class="block-image" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
        <?php } ?>
    </div>
</div>
