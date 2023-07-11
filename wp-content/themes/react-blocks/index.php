<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package react-blocks
 */
get_header();
$categories = get_categories('');
?>
    <main id="primary" class="site-main">
        <div class="title-only-hero long-left">
            <div class="container">
                <div class="page-title"><?php echo single_post_title(); ?></div>
            </div>
        </div>
        <div class="category-grid">
            <div class="container">
                <div class="tab-wrapper">
                    <div class="tab-btns">
                        <button class="btn tab-btn active" data-target="Resources">Resources</button>
                        <a class="btn tab-btn" href="<?php echo get_site_url() . '/resources/media/'; ?>"
                           data-target="Media">Media</a>
                    </div>

                    <div class="content active" id="Resources">
                        <p>
                        <div class="posts-grid grid">
                            <?php if (have_posts()) :
                                if (is_home() && !is_front_page()) : ?>
                                <?php endif;
                                while (have_posts()) :
                                    the_post();
                                    get_template_part('template-parts/post-content', get_post_type());
                                endwhile; ?>
                            <?php else : get_template_part('template-parts/content', 'none');

                            endif; ?>
                        </div>


                        </p>
                    </div>
                    <div>
                        <?php the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('Prev', 'textdomain'),
                            'next_text' => __('Next', 'textdomain'),
                        )); ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->
<?php
get_footer();
