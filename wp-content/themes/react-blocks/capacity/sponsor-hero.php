<?php /* Template Name: Sponsor Hero */ ?>
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
?>
<!DOCTYPE html>
<html>
<style>
    html, body {
        margin: 0;
        overflow-y: hidden;
        padding: 0;
        width: 100%;
    }
    @font-face {
        font-family: 'Greycliff CF';
        src:  url('<?php echo get_stylesheet_directory_uri().'/capacity/GreycliffCF-Heavy.ttf'; ?>')  format('truetype'); /* Safari, Android, iOS */

        font-weight: 900;
        font-style: normal;
    }

    .hero-title{
        width:100%;
        margin-top: -1px;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 48px;
        background: var(--gradient-1, linear-gradient(322deg, #30364A 0%, #1F2334 100%));
    }
    .container-bg{
        width: 100%;
        display: flex;
        padding: 100px 0px;
        flex-direction: column;
        align-items: flex-start;
        gap: 32px;
        background-image: url("<?php echo get_stylesheet_directory_uri().'/capacity/titlebg.svg'; ?>");
        background-repeat: no-repeat;
        background-position-x: right;
    }
    .content{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 48px;
        align-self: stretch;
    }
    .heading-suport-text{
        display: flex;
        max-width: 960px;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }
    .headind-subheading{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
        align-self: stretch;
    }
    .section-title{
        display: flex;
        flex-direction: column;
        align-self: stretch;
        color: var(--base-white, #FFF);
        text-align: center;

        /* Display sm/Heavy */
        font-family: Greycliff CF;
        font-size: 48px;
        font-style: normal;
        font-weight: 900;
        line-height: 60px; /* 126.667% */
    }
</style>
<body>
<div class="hero-title">
    <div class="container-bg">
        <div class="content">
            <div class="heading-suport-text">
                <div class="headind-subheading">
                    <div class="section-title">
                        The journey to your project's <br> funding and closing starts here.
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
