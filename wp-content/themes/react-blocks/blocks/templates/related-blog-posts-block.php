<?php
/**
 * Related Blog Posts Block Template.
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
$class_name = 'related-blog-posts-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$background = get_field('background');
$pre_title = get_field('pre_title');
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description');
$posts = get_field('related_posts');
?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="section-heading-block">
            <p class="section-pre-title"><?php echo $pre_title; ?></p>
            <p class="section-title"><?php echo esc_html($title); ?></p>
            <?php if ($description) { ?>
                <p class="section-description">
                    <?= $description; ?>
                </p>
            <?php } ?>
        </div>
        <div class="posts grid">
            <?php foreach ($posts as $post) { ?>
                <div class="post">
                    <a href="<?php echo get_post_permalink($post); ?>" target="_blank">
                        <?php echo(get_the_post_thumbnail($post)); ?>
                        <div class="post-info">
                            <p class="post-title"><?php echo(get_the_title($post)); ?></p>
                            <p class="post-content-block"><?php echo get_the_excerpt($post) ?></p>
                        </div>
                        <div class="post-navigation">
                            <a href="<?php echo get_post_permalink($post); ?>" target="_blank" class="post-link">Read
                                More</a>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
