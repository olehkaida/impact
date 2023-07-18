<?php
/**
 * Gallery Image Block Template.
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
$class_name = 'gallery-image-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$align = get_field('alignment');
$pretitle = get_field('pretitle');
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description');
$cols = get_field('gallery');
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$image_3 = get_field('image_3');
$image_4 = get_field('image_4');
$image_5 = get_field('image_5');

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container <?php if ($align) echo " " . $align; ?>">
        <div class="gallery-block">
            <div class="row-odd">
                <div class="gallery-col">
                    <div class="gallery-image"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_1['url'] ?>),
                                 lightgray 50% / cover no-repeat);
                                 height: <?php echo $image_1['height'] ?>px;
                                 width: <?php echo $image_1['width'] ?>px;">
                    </div>
                </div>
                <div class="gallery-col">
                    <div class="gallery-image"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_2['url'] ?>),
                                 lightgray 50% / cover no-repeat);
                                 height: <?php echo $image_2['height'] ?>px;
                                 width: <?php echo $image_2['width'] ?>px;">
                    </div>
                </div>
            </div>
            <div class="row-even">
                <div class="gallery-col">
                    <div class="gallery-image"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_3['url'] ?>),
                                 lightgray 50% / cover no-repeat);
                                 height: <?php echo $image_3['height'] ?>px;
                                 width: <?php echo $image_3['width'] ?>px;">
                    </div>
                </div>
                <div class="gallery-col">
                    <div class="gallery-image"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_4['url'] ?>),
                                 lightgray 50% / cover no-repeat);
                                 height: <?php echo $image_4['height'] ?>px;
                                 width: <?php echo $image_4['width'] ?>px;">
                    </div>
                </div>
                <div class="gallery-col">
                    <div class="gallery-image"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_5['url'] ?>),
                                 lightgray 50% / cover no-repeat);
                                 height: <?php echo $image_5['height'] ?>px;
                                 width: <?php echo $image_5['width'] ?>px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="text-col">
            <div class="icon-text">
                <?php if ($title) { ?>
                    <div class="section-pretitle"><?php echo($pretitle); ?></div>
                <?php } ?>
                <div class="heading">
                    <p class="section-title"><?php echo $title; ?></p>
                    <p class="section-description"><?php echo $description; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
