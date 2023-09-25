<?php
/**
 * Custom Template part for displaying posts
 *
 *
 *
 * @package react-blocks
 */
?>
<?php
// Load values and assign defaults.
$pre_title_posts = get_field('pre_title_posts')?: 'You may also like';
$title_posts = get_field('title_posts') ?: 'Read More';
$description_posts = get_field('description_posts') ?: 'The rise of RESTful APIs has been met by a rise in tools for creating, testing, and managing them.';
$contributors = get_field("contributors") ?: 'Autor name';
$contributors_title = get_field("c_title");
//$social = get_field('social_links', 'option');
$post = get_post();
$post_categories = get_the_category($post);
$author_id = "";
?>
<div class="swiper-slide">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php echo get_post_permalink(); ?>" target="_blank">
        <?php echo(get_the_post_thumbnail()); ?>
        <div class="bottom-panel-post">
            <div class="col-text-post">
                <div class="col-info-post">
                    <div class="col-info-text-post">
                        <p class="autor-name"><?php echo get_the_author_meta('display_name', $author_id); ?></p>
                        <p class="published"><?php echo get_the_date('M j Y'); ?></p>
                    </div>
                    <div class="col-text-post-category">
                        <p class="category-name">
                            <?php
                            $categoty_list = array();
                            foreach ($post_categories as $category) array_push($categoty_list, $category->name);
                            echo(implode(", ", $categoty_list));
                            ?>
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
            <a href="<?php echo get_post_permalink(); ?>" target="_blank" class="post-link">Read
                More</a>
        </div>
    </a>
</div><!-- #post-<?php the_ID(); ?> -->
</div>

