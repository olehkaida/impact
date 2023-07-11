<?php
/**
 * Staggered Cols Info Block Template.
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
$class_name = 'staggered-cols-info-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.

$cols_style = get_field('columns_style');
$title = get_field('title');
$description = get_field('description');
$cols = get_field('columns');
$length = count($cols);
$eyebrow = get_field('eyebrow');
$background = get_field('background_color');
$cols_bottom = get_field('box_bottom_style');
$divider = get_field('divider');
?>
<?php if ($cols): ?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name);
    if ($cols_setup) echo " " . $cols_setup;
    if ($background) echo " " . $background; ?>">
        <div class="container">
            <?php if ($title) { ?>
                <div class="section-title"><?php echo esc_html($title); ?></div>
            <?php } ?>
            <?php if ($description) { ?>
                <div class="section-description"><?php echo esc_html($description); ?></div>
            <?php } ?>
            <?php if ($eyebrow) { ?>
                <div class="eyebrow"><?php echo $eyebrow; ?></div>
            <?php } ?>
            <div class="cols grid desktop <?php if ($cols_style) echo " " . $cols_style; ?> <?php if (($length % 2) == 0) echo " even"; ?>">
                <div class="left-col flex">
                    <?php foreach ($cols as $key => $col) { ?>
                        <?php if (($key % 2) == 0) { ?>
                            <div class="col <?php if ($cols_bottom) echo " " . $cols_bottom;
                            if ($divider) echo " " . $divider;
                            if ($col['desktop_view'] == "desktop_view") echo " with-desktop-view"; ?>">
                                <?php if ($col['desktop_view'] == "desktop_view"){ ?>
                                <div class="col-desktop-image">
                                    <img src="<?php echo $col['icon']['url'] ?>" alt="<?php echo $col['icon']['alt'] ?>"
                                         class="col-desktop_image">
                                </div>
                                <div class="col-desktop-right">
                                    <?php } ?>
                                    <div class="col-info">
                                        <?php if ($col['icon'] && $col['desktop_view'] !== "desktop_view") { ?>
                                            <img src="<?php echo $col['icon']['url'] ?>"
                                                 alt="<?php echo $col['icon']['alt'] ?>" class="col-icon">
                                        <?php } ?>
                                        <?php if ($col['title']) { ?>
                                            <p class="col-title"><?php echo $col['title'] ?></p>
                                        <?php } ?>
                                        <?php if ($col['description']) { ?>
                                            <p class="col-description"><?php echo $col['description'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <?php if ($col['link']) { ?>
                                        <div class="new-cta">
                                            <div class="divider"></div>
                                            <a href="<?php echo $col['link']['url'] ?>" class="col-link"
                                               target="<?php if ($col['link']['target']) {
                                                   echo $col['link']['target'];
                                               } else {
                                                   echo '_self';
                                               } ?>"><?php echo $col['link']['title'] ?></a>
                                        </div>
                                    <?php } ?>
                                    <?php if ($col['desktop_view'] == "desktop_view"){ ?>
                                </div>
                            <?php } ?>
                                <div class="bottom-swooshes"></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="right-col flex">
                    <?php foreach ($cols as $key => $col) { ?>
                        <?php if (($key % 2) != 0) { ?>
                            <div class="col <?php if ($cols_bottom) echo " " . $cols_bottom;
                            if ($divider) echo " " . $divider;
                            if ($col['desktop_view'] == "desktop_view") echo " with-desktop-view"; ?>">
                                <?php if ($col['desktop_view'] == "desktop_view"){ ?>
                                <div class="col-desktop-image">
                                    <img src="<?php echo $col['icon']['url'] ?>" alt="<?php echo $col['icon']['alt'] ?>"
                                         class="col-desktop_image">
                                </div>
                                <div class="col-desktop-right">
                                    <?php } ?>
                                    <div class="col-info">
                                        <?php if ($col['icon'] && $col['desktop_view'] !== "desktop_view") { ?>
                                            <img src="<?php echo $col['icon']['url'] ?>"
                                                 alt="<?php echo $col['icon']['alt'] ?>" class="col-icon">
                                        <?php } ?>
                                        <?php if ($col['title']) { ?>
                                            <p class="col-title"><?php echo $col['title'] ?></p>
                                        <?php } ?>
                                        <?php if ($col['description']) { ?>
                                            <p class="col-description"><?php echo $col['description'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <?php if ($col['link']) { ?>
                                        <div class="new-cta">
                                            <div class="divider"></div>
                                            <a href="<?php echo $col['link']['url'] ?>" class="col-link"
                                               target="<?php if ($col['link']['target']) {
                                                   echo $col['link']['target'];
                                               } else {
                                                   echo '_self';
                                               } ?>"><?php echo $col['link']['title'] ?></a>
                                        </div>
                                    <?php } ?>
                                    <?php if ($col['desktop_view'] == "desktop_view"){ ?>
                                </div>
                            <?php } ?>
                                <div class="bottom-swooshes"></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="cols grid mobile <?php if ($cols_style) echo " " . $cols_style; ?>">
                <?php foreach ($cols as $col) { ?>
                    <div class="col <?php if ($cols_bottom) echo " " . $cols_bottom;
                    if ($divider) echo " " . $divider; ?>">
                        <div class="col-info">
                            <?php if ($col['icon']) { ?>
                                <img src="<?php echo $col['icon']['url'] ?>" alt="<?php echo $col['icon']['alt'] ?>"
                                     class="col-icon">
                            <?php } ?>
                            <?php if ($col['title']) { ?>
                                <p class="col-title"><?php echo $col['title'] ?></p>
                            <?php } ?>
                            <?php if ($col['description']) { ?>
                                <p class="col-description"><?php echo $col['description'] ?></p>
                            <?php } ?>
                        </div>
                        <?php if ($col['link']) { ?>
                            <div class="new-cta">
                                <div class="divider"></div>
                                <a href="<?php echo $col['link']['url'] ?>" class="col-link"
                                   target="<?php if ($col['link']['target']) {
                                       echo $col['link']['target'];
                                   } else {
                                       echo '_self';
                                   } ?>"><?php echo $col['link']['title'] ?></a>
                            </div>
                        <?php } ?>
                        <div class="bottom-swooshes"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php elseif (is_admin()) : ?>
    <p><?php _e('No content added'); ?></p>
<?php endif; ?>
