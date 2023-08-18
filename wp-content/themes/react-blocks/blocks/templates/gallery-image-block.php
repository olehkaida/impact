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
                    <div id="gallery-image-1"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_1['url'] ?>),
                                 lightgray 50% / cover no-repeat);
                                 width: 138px;
                                 height: 138px;
                                 border-radius: 10px;
                                 box-shadow: 0px 24px 48px -12px rgba(16, 24, 40, 0.18);
                                 @media (min-width: 993px){
                                 width: 160px;
                                 height: 160px;
                                 }">
                    </div>
                </div>
                <div class="gallery-col">
                    <div class="gallery-image-2"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_2['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                </div>
            </div>
            <div class="row-even">
                <div class="gallery-col">
                    <div class="gallery-image-3"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_3['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                </div>
                <div class="gallery-col">
                    <div class="gallery-image-4"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_4['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                </div>
                <div class="gallery-col">
                    <div class="gallery-image-5"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_5['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                </div>
            </div>
            <div class="row-even-mobile">
                <div class="gallery-col">
                    <div class="gallery-image-4"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_4['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                </div>
                <div class="gallery-col">
                    <div class="gallery-image-3"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_3['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                    <div class="gallery-image-5"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_5['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
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
