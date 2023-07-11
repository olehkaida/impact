<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package react-blocks
 */
get_header();
?>
    <main id="primary" class="site-main">
        <div class="title-only-hero long-left">
            <div class="container">
                <div class="page-title not-found">
                    404. Page Not Found.
                </div>
                <div class="page-description not-found">
                    We can't seem to find the page you're looking for.
                </div>
                <div class="not-found-button-wrap not-found">
                    <a href="<?php echo get_site_url(); ?>" class="btn btn__md secondary not-found-button">Return
                        Home</a>
                </div>
            </div>
        </div>
        <div class="not-found-empty"></div>
    </main><!-- #main -->
<?php
get_footer();
