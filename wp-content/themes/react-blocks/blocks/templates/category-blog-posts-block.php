<?php
/**
 * Category Blog Posts Block Template.
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
$class_name = 'category-blog-posts-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.

$subtitle = get_field('subtitle') ?: 'Your title here...';
$description = get_field('description');
//$posts = get_field('related_posts');
$category_post = get_field('category_post');
$category_icon = get_field('category_icon');
?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container-post">
        <?php //var_dump($category_post);
        foreach ($category_post as $category) {
            //var_dump($category);
            $category_id = $category->term_id;
            $category_name = $category->name;
            $category_slug = $category->slug;
        }
        //var_dump($category_name);
        ?>
        <div class="post-category-box">
            <img src="<?php echo $category_icon['url']; ?>"
                 alt="<?php echo $category_icon['alt']; ?>" class="category-image">
            <p class="category-name">
                <?php echo $category_name; ?>
            </p>
        </div>
        <div class="category-subtitle">
            <?php echo $subtitle; ?>
            <div class="swiper-navigation">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
        />

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <!-- Slider main container -->
        <div class="swiper <?php echo $category_slug; ?>">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper <?php echo $category_slug; ?>">
                <!-- Slides -->
                <?php
                $args = array(
                    'post_type' => 'post',         // Specify the post type (usually 'post')
                    'category__in' => $category_id, // Use the category IDs from the current post
                    'posts_per_page' => -1,         // Limit the number of posts to 3
                    'orderby'   => 'date',         // Sort by date
                    'order'     => 'DESC',
                );
                $description_posts = get_field('description_posts') ?: 'The rise of RESTful APIs has been met by a rise in tools for creating, testing, and managing them.';
                $contributors = get_field("contributors") ?: 'Autor name';

                $posts_cat = get_posts($args);
                ?>
                <?php foreach ($posts_cat as $post) { ?>
                <div class="swiper-slide">
                    <div class="post">
                        <a href="<?php echo get_post_permalink($post); ?>" target="_blank">
                            <?php echo(get_the_post_thumbnail($post)); ?>
                            <div class="bottom-panel-post">
                                <div class="col-text-post">
                                    <div class="col-info-post">
                                        <div class="col-info-text-post">
                                            <p class="autor-name"><?php echo get_the_author_meta('display_name', $post->post_author); ?></p>
                                            <p class="published"><?php echo get_the_date('M j Y'); ?></p>
                                        </div>
                                        <div class="col-text-post-category">
                                            <p class="category-name">
                                                <?php echo $category_name; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                </div>
                <?php } ?>


            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->

        </div>
        <script>
            const <?php echo $category_slug; ?> = new Swiper('.<?php echo $category_slug; ?>', {
                // Optional parameters
                loop: false,
                autoheight: true,
                watchOverflow: true,
                updateOnWindowResize: true,

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    991: {
                        slidesPerView: 3,
                        spaceBetween: 68,
                    },
                },
            });
        </script>
    </div>
</div>
