<?php
/**
 * Team Block Template.
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
$class_name = 'team-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$cols_setup = get_field('number_of_columns');

$cols = get_field('team_member');

?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name);
    if ($cols_setup) echo " " . $cols_setup; ?>">
        <div class="container">
            <div class="cols grid <?php if ($cols_setup) echo " " . $cols_setup; ?>">
                <?php foreach ($cols as $col) { ?>
                    <div class="col">
                        <div class="col-image">
                            <img src="<?php echo $col['avatar']['url'] ?>" alt="<?php echo $col['avatar']['alt'] ?>"
                                 class="col-avatar">
                        </div>
                        <div class="col-text">
                            <div class="col-info">
                                <?php if ($col['name']) { ?>
                                    <p class="col-title"><?php echo $col['name'] ?></p>
                                <?php } ?>
                                <?php if ($col['title']) { ?>
                                    <p class="col-description"><?php echo $col['title'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
