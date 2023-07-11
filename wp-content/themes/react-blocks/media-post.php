<?php /* Template Name: Media Posts Page */ ?>
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
                        <a class="btn tab-btn" href="<?php echo get_site_url() . '/resources/'; ?>" data-target="Media">Resources</a>
                        <button class="btn tab-btn active" data-target="Media">Media</button>
                    </div>
                    <div class="content" id="Media">
                        <p>
                        <div class="post-grid grid">
                            <?php $args = array(
                                'post_type' => 'media_post',
                                'posts_per_page' => 9,
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                            );
                            $the_query = new WP_Query($args); ?>
                            <?php if ($the_query->have_posts()) : ?>
                                <div class="cols grid three box">
                                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                        <?php
                                        $title = get_field('title');
                                        $description = get_field('description');
                                        $author = get_field('author');
                                        $link = get_field('read_more_link');
                                        ?>
                                        <div class="col colored divider-off">
                                            <?php if ($link){ ?>
                                            <a href="<?php echo $link['url'] ?>" target="_blank">
                                                <?php } ?>
                                                <div class="col-info">
                                                    <?php if ($title) { ?>
                                                        <p class="col-title"><?php echo $title; ?></p>
                                                    <?php } ?>
                                                    <?php if ($author) { ?>
                                                        <p class="col-author"><?php echo $author; ?></p>
                                                    <?php } ?>
                                                    <?php if ($description) { ?>
                                                        <p class="col-description"><?php echo $description; ?></p>
                                                    <?php } ?>
                                                </div>
                                                <?php if ($link) { ?>
                                                    <div class="new-cta">
                                                        <a href="<?php echo $link['url'] ?>" class="col-link"
                                                           target="_blank">Read More</a>
                                                    </div>
                                                <?php } ?>
                                                <div class="bottom-swooshes"></div>
                                                <?php if ($link){ ?>
                                            </a>
                                        <?php } ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <div class="pagination">
                                    <nav class="navigation pagination" aria-label="Posts">
                                        <h2 class="screen-reader-text">Posts navigation</h2>
                                        <div class="nav-links">
                                            <?php
                                            $big = 999999999; // need an unlikely integer
                                            echo paginate_links(array(
                                                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                                                'format' => '?paged=%#%',
                                                'current' => max(1, get_query_var('paged')),
                                                'total' => $the_query->max_num_pages
                                            ));
                                            ?>
                                        </div>
                                    </nav>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- #main -->
<?php
get_footer();
