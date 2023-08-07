<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package react-blocks
 */

?>
<?php
$logo = get_field('footer_logo', 'option');
$navs = get_field('footer_navigation', 'option');
$social = get_field('social_links', 'option');
$additional = get_field('additional_links', 'option');
$builtby = get_field('build_by', 'option');
$copyright = get_field('copyright_text', 'option');
$footer_style = get_field('footer_style', 'option');
$ctas = get_field('cta-footer', 'options');
$defaultctas = get_field('defalt_cta', 'options')
?>
<footer id="colophon" class="site-footer">
    <div class="footer-cta <?php if ($footer_style) echo " " . $footer_style; ?>">
        <div class="cta-block">
            <?php if (!is_front_page()) { ?>
            <p class="cta-heading default"><?php echo $defaultctas['default_cta_text']; ?></p>
                <p class="cta-subheading default"><?php echo $defaultctas['default_cta_subtitle']; ?></p>
               <?php
            } ?>
            <div class="action-buttons">
              <?php foreach ($defaultctas['default_links'] as $cta) { ?>
                <a href="<?php echo $cta['default_link']; ?>" target="_blank"
                   class="btn btn__md <?php echo trim(strtolower(preg_replace('/[A-Z]\s+([A-Z](?![a-z]))*/', '_$0', preg_replace('/\s+/', '_', $cta['default_button_text']))), '_'); ?>"><?php echo $cta['default_button_text'] ?></a>
            <?php } ?>
            </div>
            <div class="footer-cta-image">
                <img src="<?php echo $defaultctas['cta_image_desktop']['url'] ?>" alt="<?php echo $defaultctas['cta_image_desktop']['alt'] ?>" class="footer-cta-image-desktop">
                <img src="<?php echo $defaultctas['cta_image_mobile']['url'] ?>" alt="<?php echo $defaultctas['cta_image_mobile']['alt'] ?>" class="footer-cta-image-mobile">
            </div>
        </div>
    </div>
    <div class="main-footer">
        <div class="container">
            <div class="upper-footer">
                <div class="logo-nav">
                    <div class="logo-nav-links">
                        <a href="/">
                            <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" class="logo-footer">
                        </a>
                    <div class="footer-navigation grid">
                    <?php foreach ($navs as $nav) { ?>
                        <div class="nav-col">
                            <a href="<?php echo $nav['parent_link']['url'] ?>"
                               class="nav-heading"><?php echo $nav['parent_link']['title'] ?></a>
                            <div class="nav-items">

                                <?php
                                if ($nav['sub_links']) {
                                    foreach ($nav['sub_links'] as $nav_item) { ?>
                                        <a href="<?php echo $nav_item['link']['url'] ?>"
                                           class="nav-item"><?php echo $nav_item['link']['title'] ?></a>
                                        <?php
                                    }
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                    </div>
                <div class="contact-form">
                    <div class="contact-form-label">Be in the know</div>
                    <?php echo do_shortcode("[hubspot type='form' portal='40828618' id='dc267bac-8ccd-4114-9712-c78d02eb7c94']"); ?>
                </div>
                </div>
            </div>
            <div class="bottom-footer flex">
                <div class="footer-info flex">
                    <p class="copyright"><?php echo $copyright ?></p>
                </div>
                <div class="footer-additional-links flex">
                    <div class="additional-pages flex">
                        <?php foreach ($additional as $additional_item) { ?>
                            <a href="<?php echo $additional_item['link']['url'] ?>"
                               class="additional-link"><?php echo $additional_item['link']['title'] ?></a>
                        <?php }; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
