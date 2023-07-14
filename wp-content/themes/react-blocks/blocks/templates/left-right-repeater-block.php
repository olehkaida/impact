<?php
/**
 * Left Right Repeater Block Template.
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
$anchor = 'features';
if (!empty($anchor)) {
    $anchor = 'id="' . esc_attr($anchor) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'left-right-repeater-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$pretitle = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$repeters = get_field('leftright_repeter');



?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="section-divider-feature">
        <div class="container-feature">
            <div class="divider-feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="1216" height="1" viewBox="0 0 1216 1" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1216 1H0V0H1216V1Z" fill="#EAECF0"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="container-heading">
        <div class="content">
            <div class="heading-suport-text">
                <div class="headind-subheading">
                    <?php if ($title) { ?>
                        <div class="section-pretitle"><?php echo($pretitle); ?></div>
                    <?php } ?>
                    <?php if ($title) { ?>
                        <div class="section-title"><?php echo($title); ?></div>
                    <?php } ?>
                </div>
                <?php if ($description) { ?>
                    <p class="section-description"><?php echo($description); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php foreach ($repeters as $repeter) { ?>
    <div class="container <?php if ($repeter['alignment']) echo " " . $repeter['alignment']; ?>">
        <img src="<?php echo $repeter['image']['url'] ?>" alt="<?php echo $repeter['image']['alt'] ?>" class="features-image">
        <div class="text-col">
            <div class="icon-text">
                <div class="icon">
                    <img src="<?php echo $repeter['icon']['url'] ?>" alt="<?php echo $repeter['icon']['alt'] ?>"
                         class="icon-img">
                </div>
                <div class="heading">
                    <p class="section-title"><?php echo $repeter['title']; ?></p>
                    <p class="section-description"><?php echo $repeter['description']; ?></p>
                </div>
            </div>
            <div class="check-items">
                <?php foreach ($repeter['check_items'] as $check_item) { ?>
                <div class="check-item">
                    <div class="check-icon">
                        <img src="<?php echo $check_item['check_icon_image']['url'] ?>" alt="<?php echo $check_item['check_icon_image']['alt'] ?>"
                             class="icon-img">
                    </div>
                    <div class="check-text">
                        <p class="check-text-title"><?php echo $check_item['check_item_text']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
