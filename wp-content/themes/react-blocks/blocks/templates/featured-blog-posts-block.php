<?php
/**
 * Featured Blog Posts Block Template.
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
$class_name = 'featured-blog-posts-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$post = get_field('featured_post');
$category_icon = get_field('category_icon');
$description_posts = get_field('description_post') ?: 'The rise of RESTful APIs has been met by a rise in tools for creating, testing, and managing them.';
$contributors = get_field("contributor") ?: 'Autor name';
//$social = get_field('social_links', 'option');
//$post = get_post();
$post_categories = get_the_category($post);
$author_id = "";
?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="featured-post-hero">
        <div class="container">
            <div class="post-info-col">
                <div class="post-category-box">
                    <img src="<?php echo $category_icon['url']; ?>"
                         alt="<?php echo $category_icon['alt']; ?>" class="category-image">
                    <p class="category-name">
                        <?php
                        $categoty_list = array();
                        foreach ($post_categories as $category) array_push($categoty_list, $category->name);
                        echo(implode(", ", $categoty_list));
                        ?>
                    </p>
                </div>
                <div class="post-title-block">
                    <h1 class="section-title"><?php echo get_the_title($post); ?></h1>
                    <p class="section-description"><?php echo $description_posts; ?></p>
                    <div class="contributors-block col">
                        <?php foreach ($contributors as $contributor) { ?>
                            <div class="contributor flex">
                                <img src="<?php echo $contributor['image']['url']; ?>"
                                     alt="<?php echo $contributor['image']['alt']; ?>" class="contributor-image">
                                <div class="contributor-info">
                                    <p class="name"><?php echo $contributor['name']; ?></p>
                                    <p class="position">Published <?php echo get_the_date('M j Y'); ?></p>
                                </div>
                                <div class="post-navigation">
                                    <a href="<?php echo get_post_permalink($post); ?>" target="_blank" class="post-link">Read
                                        More</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="image-col">
                <img src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="" class="post-image">
            </div>
        </div>
    </div>
</div>
