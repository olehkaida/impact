<?php
/**
 * Custom Template part for displaying posts
 *
 *
 *
 * @package react-blocks
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php echo get_post_permalink(); ?>" target="_blank">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="post-thumbnail">
        <div class="post-container">
            <div class="post-header">
                <p class="post-title"><?php echo get_the_title(); ?></p>
            </div>
            <div class="content">
                <?php echo mb_strimwidth(get_the_excerpt(), 0, 150, '...') ?>
            </div>
            <div class="post-navigation">
                <a href="<?php echo get_post_permalink(); ?>" target="_blank" class="post-link">Read More</a>
            </div>
        </div>
    </a>
</div><!-- #post-<?php the_ID(); ?> -->

