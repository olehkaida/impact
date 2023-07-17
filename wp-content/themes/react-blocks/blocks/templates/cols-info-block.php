<?php
/**
 * Columns Block Template.
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
$class_name = 'cols-info-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$cols_setup = get_field('number_of_columns');
$pretitle = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$cols = get_field('columns');
?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name);
    if ($cols_setup) echo " " . $cols_setup; ?>">
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
            </div>
            <div class="cols grid <?php if ($cols_setup) echo " " . $cols_setup; ?>">
                <?php foreach ($cols as $col) { ?>
                    <div class="col">
                        <div class="col-desktop-image">
                            <img src="<?php echo $col['icon']['url'] ?>" alt="<?php echo $col['icon']['alt'] ?>"
                                 class="col-icon">
                        </div>
                        <div class="col-desktop-right">
                            <div class="col-info">
                                <?php if ($col['title']) { ?>
                                    <p class="col-title"><?php echo $col['title'] ?></p>
                                <?php } ?>
                                <?php if ($col['description']) { ?>
                                    <p class="col-description"><?php echo $col['description'] ?></p>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
