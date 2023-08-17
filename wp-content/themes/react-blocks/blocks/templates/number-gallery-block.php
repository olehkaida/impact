<?php
/**
 * Number Gallery Block Template.
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
$class_name = 'number-gallery-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$align = get_field('alignment');
$pretitle = get_field('pretitle');
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description');
$cols_setup = get_field('number_of_columns');
$cols = get_field('columns');
$video = get_field('video');
$image_video = get_field('image_video');
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$image_3 = get_field('image_3');
$image_4 = get_field('image_4');
$image_5 = get_field('image_5');

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container <?php if ($align) echo " " . $align; ?>">
        <div class="gallery-block">
            <div class="col-odd">
                <div class="gallery-row">
                    <div id="gallery-image-1"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_1['url'] ?>),
                                 lightgray 50% / cover no-repeat);
                                 width: 244px;
                                 height: 182px;
                                 border-radius: 10px;
                                 @media (min-width: 993px){
                                 width: 244px;
                                 height: 182px;
                                 }">
                    </div>
                </div>
                <div class="gallery-row">
                    <div class="gallery-video" style="background-image: url(<?php echo $image_video['url'] ?>)">
                        <iframe src="<?php echo esc_html($video); ?>&autoplay=1&loop=1&autopause=0&background=1" width="310" height="175" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-even">
                <div class="gallery-row">
                    <div class="gallery-image-2"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_2['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                    <div class="gallery-image-3"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_3['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                </div>
                <div class="gallery-row">
                    <div class="gallery-image-4"
                         style="background: var(--avatar-user-portrait-alisa-hester,
                                 url(<?php echo $image_4['url'] ?>),
                                 lightgray 50% / cover no-repeat);">
                    </div>
                </div>
                <div class="gallery-row">
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
            <div class="cols grid <?php if ($cols_setup) echo " " . $cols_setup;?>">
                <div class="col-wrap <?php if ($cols_setup) echo " " . $cols_setup;?>">
                    <?php foreach ($cols as $col) { ?>
                        <div class="col">
                            <div class="col-info">
                                <?php if ($col['number']) { ?>
                                    <p class="col-title"><?php echo $col['prepend'];?><span class="counter" data-count="<?php echo $col['number']; ?>"><?php echo $col['count_start'] ?></span><?php echo $col['append']; ?></p>
                                <?php } else { ?>
                                    <p class="col-title"><?php echo $col['prepend'];?><?php echo $col['append']; ?></p>
                                <?php }?>

                                <?php if ($col['description']) { ?>
                                    <p class="col-description"><?php echo $col['description'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
