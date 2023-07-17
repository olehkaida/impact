<?php
/**
 * Number Image Block Template.
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
$class_name = 'number-image-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$align = get_field('alignment');
$pretitle = get_field('pretitle');
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description');
$image = get_field('image');
$cols_setup = get_field('number_of_columns');
$cols = get_field('columns');

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container <?php if ($align) echo " " . $align; ?>">
        <img src="<?php echo $image["url"] ?>" alt="<?php echo $image["alt"] ?>" class="features-image">
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
                                <p class="col-title"><?php echo $col['prepend'];?><span class="counter" data-count="<?php echo $col['number']; ?>"><?php echo $col['count_start'] ?></span><?php echo $col['append']; ?></p>
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
