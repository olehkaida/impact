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

$time_to_read = get_field("time_to_read");
$subtitle = get_field("subtitle");
$subparagraph = get_field("subparagraph");
$flex_content = get_field("post_flex_content");
$contributors = get_field("contributors");
$contributors_title = get_field("c_title");
$social = get_field('social_links', 'option');
$post = get_post();
$post_categories = get_the_category($post);

?>
    <main id="primary" class="site-main">
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
                        <p class="time-to-read"><?php echo ($time_to_read) ? "" . $time_to_read : "8 min read"; ?></p>
                    </div>
                    <div class="post-title-block">
                        <h1 class="section-title"><?php echo get_the_title($post); ?></h1>
                        <p class="section-description"><?php echo $subtitle; ?></p>
                    </div>
                </div>
                <div class="image-col">
                    <img src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="" class="post-image">
                </div>
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
                        <form action="" class="subscribe-form">
                            <input type="email" placeholder="Enter Your Email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                    <div class="social-block col">
                        <div class="social-links grid">
                            <?php foreach ($social as $social_item) { ?>
                                <a href="<?php echo $social_item['link']['url'] ?>" class="social-link"><img
                                            src="<?php echo $social_item['icon']['url'] ?>"
                                            alt="<?php echo $social_item['icon']['alt'] ?>" class="social-icon"></a>
                            <?php }; ?>
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
    </main><!-- #main -->
<?php
// get_sidebar();
get_footer();
