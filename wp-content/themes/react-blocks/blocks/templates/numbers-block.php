<?php
/**
 * Numbers Block Template.
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
$class_name = 'numbers-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$cols_setup = get_field('number_of_columns');
$icon = get_field('icon');
$title = get_field('title');
$description = get_field('description');
$cols = get_field('columns');
?>
<?php if ($cols): ?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name);
    if ($cols_setup) echo " " . $cols_setup; ?>">
        <div class="container">
            <div class="section-heading-block">
                <div class="heading">
                    <div class="heading-icon">
                        <div class="icon">
                            <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>"
                                 class="icon-img">
                        </div>
                        <?php if ($title) { ?>
                            <div class="section-title"><?php echo $title; ?></div>
                        <?php } ?>
                    </div>
                    <?php if ($description) { ?>
                        <div class="description"><?php echo $description; ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="cols grid <?php if ($cols_setup) echo " " . $cols_setup;?>">
                <div class="col-wrap">
                <?php foreach ($cols as $col) { ?>
                    <div class="col">
                        <div class="col-info">
                                <p class="col-title"><?php echo $col['prepend'];?><span class="counter" data-target="<?php echo $col['number']; ?>"></span><?php echo $col['append']; ?></p>
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
<?php elseif (is_admin()) : ?>
    <p><?php _e('No content added'); ?></p>
<?php endif; ?>
