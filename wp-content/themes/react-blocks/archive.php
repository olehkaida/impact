<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package react-blocks
 */

get_header();
$category = get_category(get_query_var('cat'));
?>
    <main id="primary" class="site-main">
        <?php if (have_posts()) : ?>
        <div class="title-only-hero long-left">
            <div class="container">
                <div class="page-title"><?php echo $category->name; ?></div>
            </div>
        </div><!-- .page-header -->
        <div class="category-grid">
            <div class="container grid">
                <div class="posts-grid grid">
                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();
                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/post-content', get_post_type());
                    endwhile;
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>            </div>
                <?php the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Prev', 'textdomain'),
                    'next_text' => __('Next', 'textdomain'),
                )); ?>
            </div>
        </div>
    </main><!-- #main -->
<?php
get_footer();
