<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package react-blocks
 */

get_header();
?>

<?php

$subtitle = get_field("subtitle");
$subparagraph = get_field("subparagraph");
$flex_content = get_field("post_flex_content");
$contributors = get_field("contributors");
$contributors_title = get_field("c_title");
//$social = get_field('social_links', 'option');
$post = get_post();
$post_categories = get_the_category($post);
$autor_description = get_field("autor_description");
$banner_image = get_field("banner_image");

?>
    <div id="primary" class="site-main">
        <div class="post-hero">
            <div class="container">
                <div class="post-info-col">
                    <div class="post-category-box">
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
                        <p class="section-description"><?php echo $subtitle; ?></p>
                        <div class="contributors-block col">
                            <?php foreach ($contributors as $contributor) { ?>
                                <div class="contributor flex">
                                    <img src="<?php echo $contributor['image']['url']; ?>"
                                         alt="<?php echo $contributor['image']['alt']; ?>" class="contributor-image">
                                    <div class="contributor-info">
                                        <p class="name"><?php echo $contributor['name']; ?></p>
                                        <p class="position">Published <?php echo get_the_date('M j Y'); ?></p>
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
            <div class="container flex post-content">
                <div class="side-content">
                    <div class="side-container">
                        <div class="anchor-nav-block col">
                            <p class="title">Table of contents</p>
                            <div class="links-container flex">
                                <?php foreach ($flex_content as $key => $section) {
                                    if ($section['title']) { ?>
                                        <a href="#block-<?php echo $key; ?>"
                                       class="post-content-link"><?php echo $section['title'] ?></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="contributors-block col">
                            <p class="title"><?php echo $contributors_title; ?></p>
                            <?php foreach ($contributors as $contributor) { ?>
                                <div class="contributor flex">
                                    <img src="<?php echo $contributor['image']['url']; ?>"
                                     alt="<?php echo $contributor['image']['alt']; ?>" class="contributor-image">
                                    <div class="contributor-info">
                                        <p class="name"><?php echo $contributor['name']; ?></p>
                                        <p class="position"><?php echo $contributor['position']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="subscribe-block col">
                            <div class="title">Subscribe to our newsletter</div>
                        </div>
                        <div class="social-block col">
                            <div class="social-links grid">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="sub-text"><p><?php echo $subparagraph ?></p></div>
                    <?php
                    foreach ($flex_content as $key => $section) {
                        $template = 'blog-flex-sections/' . $section["acf_fc_layout"];
                        //var_dump($template);
                        $section['key'] = $key;
                        get_template_part($template, null, $section);
                    }
                    ?>
                </div>
            </div>
            <div class="container autor-left">
                <div class="post-info-col">
                    <div class="post-title-block">
                        <p class="autor-description"><?php echo $autor_description; ?></p>
                        <div class="contributors-block col">
                            <?php foreach ($contributors as $contributor) { ?>
                                <div class="contributor flex">
                                    <img src="<?php echo $contributor['image']['url']; ?>"
                                         alt="<?php echo $contributor['image']['alt']; ?>" class="contributor-image">
                                    <div class="contributor-info">
                                        <p class="name"><?php echo $contributor['name']; ?></p>
                                        <p class="position">Published <?php echo get_the_date('M j Y'); ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="image-col">
                    <img src="<?php echo $banner_image['url']; ?>" alt="<?php echo $banner_image['alt']; ?>" class="post-image">
                </div>
            </div>
        </div>
    </main><!-- #main -->
<?php

            $anchor = '';
            $class_name_posts = 'related-blog-posts-block';
            if (!empty($block['className'])) {
            $class_name_posts .= ' ' . $block['className'];
            }

            // Load values and assign defaults.
            $pre_title_posts = get_field('pre_title_posts')?: 'You may also like';
            $title_posts = get_field('title_posts') ?: 'Read More';
            $description_posts = get_field('description_posts') ?: 'The rise of RESTful APIs has been met by a rise in tools for creating, testing, and managing them.';

            ?>
        <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name_posts); ?>">
            <div class="container-post">
                <div class="section-heading-block">
                    <p class="section-title"><?php echo esc_html($title_posts); ?></p>
                    <p class="section-pre-title"><?php echo $pre_title_posts; ?></p>
                </div>
                <div class="posts grid">
                    <?php
                    $categories = get_the_category();
                    $category_ids = array();

                    foreach ($categories as $category) {
                        $category_ids[] = $category->term_id;
                    }

                    $args = array(
                        'post_type' => 'post',         // Specify the post type (usually 'post')
                        'category__in' => $category_ids, // Use the category IDs from the current post
                        'posts_per_page' => 3,         // Limit the number of posts to 3
                        'orderby'   => 'date',         // Sort by date
                        'order'     => 'DESC',         // Sort in descending order (newest first)
                    );

                    $posts = get_posts($args);
                    ?>
                    <?php foreach ($posts as $post) { ?>
                        <div class="post">
                            <a href="<?php echo get_post_permalink($post); ?>" target="_blank">
                                <?php echo(get_the_post_thumbnail($post)); ?>
                                <div class="post-info">
                                    <p class="post-title"><?php echo(get_the_title($post)); ?></p>
                                    <?php if ($description_posts) { ?>
                                        <p class="section-description">
                                            <?php echo $description_posts; ?>
                                        </p>
                                    <?php } ?>
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
        <?php
get_footer();
