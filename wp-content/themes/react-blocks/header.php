<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package react-blocks
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> style="margin-top: 0px!important;">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$logo = get_field('logo_image', 'option');
$logo_mobile = get_field('logo_image_mobile', 'option');
$nav = get_field('menu', 'option');
$nav_mobile = get_field('mobile_menu', 'option');
$login_bnt = get_field('login_button', 'option');
$sign_up_bnt = get_field('partners_button', 'option');
$count_down = get_field('count_down', 'option');

?>
<div id="page">
    <?php if ($count_down) { ?>
        <div class="upper-header-banner" id="count-down">
            <div class="banner-text"><?php echo $count_down['title']; ?></div>
            <div class="clock" id="clock">
                <div class="tile">
                    <p class="days"></p>
                    <p class="label">days</p>
                </div>
                <div class="tile">
                    <p class="hours"></p>
                    <p class="label">hours</p>
                </div>
                <div class="tile">
                    <p class="minutes"></p>
                    <p class="label">minutes</p>
                </div>
                <div class="tile">
                    <p class="seconds"></p>
                    <p class="label">seconds</p>
                </div>
            </div>
            <script>
                var countDownDate = new Date("<?php echo $count_down['end_date'];?>").getTime();

                var x = setInterval(function () {
                    var now = new Date().getTime();
                    var distance = countDownDate - now;

                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.querySelector(".days").innerHTML = days;
                    document.querySelector(".hours").innerHTML = hours;
                    document.querySelector(".minutes").innerHTML = minutes;
                    document.querySelector(".seconds").innerHTML = seconds;
                }, 1000);
            </script>
        </div>

    <?php } ?>
    <header id="masthead" class="site-header">
        <div class="container flex">
            <div class="logo-col"><a href="/">
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="site-logo"></a></div>
            <div class="navigation">
                <nav class="menu">
                    <?php foreach ($nav as $link) { ?>
                        <div class="nav-item">
                            <a href="<?php echo $link['parent_link']['url'] ?>"
                               class="nav-link"><?php echo $link['parent_link']['title'] ?></a>
                            <?php if ($link['sub_links']) { ?>
                                <span class="sub-menu-btn"></span>
                                <div class="sub-links">
                                    <?php foreach ($link['sub_links'] as $sub_link) { ?>
                                        <div class="nav-item">
                                            <a href="<?php echo $sub_link['link']['url'] ?>"
                                               class="nav-link"><?php echo $sub_link['link']['title'] ?></a>
                                            <?php if ($sub_link['sub_links']) { ?>
                                                <span class="sub-2">❯</span>
                                                <div class="sub-sub-links">
                                                    <?php foreach ($sub_link['sub_links'] as $sub_sub_link) { ?>
                                                        <a href="<?php echo $sub_sub_link['link']['url'] ?>"
                                                           class="nav-link"><?php echo $sub_sub_link['link']['title'] ?></a>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php }; ?>
                </nav>
            </div>
            <div class="button-col">
                <a href="<?php echo $login_bnt; ?>" class="btn btn__md secondary">Log in</a>
                <a href="<?php echo $sign_up_bnt; ?>" class="btn btn__md primary">Sign up</a>
            </div>
            <div id="open" class="burger-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="mobile-menu">
            <div class="upper-container">
                <div class="logo-col"><a href="/"><img src="<?php echo $logo_mobile['url']; ?>"
                                                       alt="<?php echo $logo_mobile['alt']; ?>" class="site-logo"></a>
                </div>
                <div id="close" class="close-button"></div>
            </div>
            <div class="mobile-menu-container">
                <?php foreach ($nav_mobile as $link) { ?>
                    <div class="nav-item">
                        <a href="<?php echo $link['parent_link']['url'] ?>"
                           class="nav-link"><?php echo $link['parent_link']['title'] ?></a>
                        <?php if ($link['sub_links']) { ?>
                            <span class="sub-menu-btn"></span>
                            <div class="sub-links">
                                <?php foreach ($link['sub_links'] as $sub_link) { ?>
                                    <div class="mobile-nav-item">
                                        <a href="<?php echo $sub_link['link']['url'] ?>"
                                           class="mobile-nav-link"><?php echo $sub_link['link']['title'] ?></a>
                                        <?php if ($sub_link['sub_links']) { ?>
                                            <span class="mobile-sub-menu-btn"></span>
                                            <div class="mobile-sub-links">
                                                <?php foreach ($sub_link['sub_links'] as $sub_sub_link) { ?>
                                                    <a href="<?php echo $sub_sub_link['link']['url'] ?>"
                                                       class="mobile-nav-link"><?php echo $sub_sub_link['link']['title'] ?></a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php }; ?>
            </div>
        </div>
    </header><!-- #masthead -->
