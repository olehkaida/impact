<?php
/**
 * Image Slider Block Template.
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
$anchor = 'overview';
if (!empty($anchor)) {
    $anchor = 'id="' . esc_attr($anchor) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'image-slider-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$align = get_field('alignment');
$pretitle = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$image = get_field('image');
$image_mobile = get_field('image_mobile');
$features = get_field('features');
?>

<div <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="content-pretitle-title-description">
            <div class="content-heading-suporting-text">
                <div class="heading">
                    <p class="section-pretitle"><?php echo esc_html($pretitle); ?></p>
                    <p class="section-title"><?php echo esc_html($title); ?></p>
                </div>
                <?php if ($description) { ?>
                    <p class="section-description"><?php echo esc_html($description); ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="features-content <?php if ($align) echo " " . $align; ?> flex">
            <img src="<?php echo $image["url"] ?>" alt="<?php echo $image["alt"] ?>" class="features-image">
            <img src="<?php echo $image_mobile["url"] ?>" alt="<?php echo $image_mobile["alt"] ?>" class="features-image-mobile">
            <div class="wrapper">
                <div id="container">
                    <div class="parent">
                        <?php foreach ($features as $feature) { ?>
                            <div class="feature flex">
                                <div class="feature-col">
                                    <div class="content-title-description">
                                        <p class="feature-title"><?php echo $feature['title']; ?></p>
                                        <p class="feature-description"><?php echo $feature['description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
