<?php
/**
 * Leadership Block Template.
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
$class_name = 'leadership-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$align = get_field('alignment');
$pretitle = get_field('pretitle');
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description');
$link = get_field('link');
$cols_setup = get_field('number_of_columns');
$cols = get_field('team_member');

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container <?php if ($align) echo " " . $align; ?>">
        <div class="features-image">
            <div class="cols grid">
                <div class="col-wrap <?php if ($cols_setup) echo " " . $cols_setup;?>">
                    <?php foreach ($cols as $col) { ?>
                            <div class="col" style="background: var(--avatar-user-portrait-alisa-hester, url(<?php echo $col['avatar']['url'] ?>), lightgray 50% / cover no-repeat);">
                                <div class="bottom-panel">
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
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
        <div class="text-col">
            <div class="heading">
                <div class="heading-subheading">
                    <?php if ($title) { ?>
                        <div class="section-pretitle"><?php echo($pretitle); ?></div>
                        <p class="section-title"><?php echo $title; ?></p>
                    <?php } ?>
                    <p class="section-description"><?php echo $description; ?></p>
                </div>
            </div>
            <?php if ($link) { ?>
                <div class="new-cta">
                    <a href="<?php echo $link['url'] ?>" class="col-link"
                       target="<?php if ($link['target']) {
                           echo $link['target'];
                       } else {
                           echo '_self';
                       } ?>"><?php echo $link['title'] ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
