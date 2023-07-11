<?php
/**
 * Drop down FAQ Template.
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
$class_name = 'drop-down-faq-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$cols_style = get_field('columns_style');
$title = get_field('title');
$description = get_field('description');
$rows = get_field('rows');
$cols = get_field('columns');
$background = get_field('background_color');

?>
<?php if ($rows) : ?>

    <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name);
    if ($background) echo " " . $background; ?>">
        <div class="container">
            <div class="section-heading-block">
                <?php if ($title) { ?>
                    <div class="section-title"><?php echo esc_html($title); ?></div>
                <?php } ?>
                <?php if ($description) { ?>
                    <div class="section-description"><?php echo esc_html($description); ?></div>
                <?php } ?>
            </div>
            <?php foreach ($rows as $row) { ?>
                <div class="drop-down-rows grid">
                    <div class="drop-down-row">
                        <div class="cols grid <?php if ($row['number_of_columns']) echo " " . $row['number_of_columns'];
                        if ($cols_style) echo " " . $cols_style; ?>">
                            <?php foreach ($row['columns'] as $col) { ?>
                                <div class="col">
                                    <div class="drop-down-info">
                                        <?php if ($col['icon']) { ?>
                                            <img src="<?php echo $col['icon']['url'] ?>"
                                                 alt="<?php echo $col['icon']['alt'] ?>" class="col-icon">
                                        <?php } ?>
                                        <?php if ($col['title']) { ?>
                                            <p class="col-title"><?php echo $col['title'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <?php if ($col['title']) { ?>
                                        <p class="col-title-mobile"><?php echo $col['title'] ?></p>
                                    <?php } ?>
                                    <div class="drop-down-content">
                                        <?php if ($col['description']) { ?>
                                            <p class="col-description"><?php echo $col['description'] ?></p>
                                        <?php } ?>
                                        <?php if ($col['link']) { ?>
                                            <div class="new-cta">
                                                <a href="<?php echo $col['link']['url'] ?>" class="col-link"
                                                   target="<?php if ($col['link']['target']) {
                                                       echo $col['link']['target'];
                                                   } else {
                                                       echo '_self';
                                                   } ?>"><?php echo $col['link']['title'] ?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php elseif (is_admin()) : ?>
    <p><?php _e('No content added'); ?></p>
<?php endif; ?>
