<?php
/**
 * Testimonial Slider Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimmonial_slider_block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$slider = get_field('slider');
$quote = get_field('quote');
$avatar = get_field('avatar');
$title = get_field('title');
$name = get_field('name');

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="content">
            <link
                    rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
            />

            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
            <div class="swiper-testimonials">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($slider as $slide) { ?>
                        <div class="swiper-slide attribution">
                            <div class="quote"><?php echo $slide['quote']; ?></div>
                            <div class="avatar-text">
                                <img class="testimonial-image" src="<?php echo $slide['avatar']['url']; ?>"
                                     alt="<?php echo $slide['avatar']['alt']; ?>">
                                <div class="testimonial-info">
                                    <p class="testimonial-name"><?php echo $slide['name']; ?></p>
                                    <p class="testimonial-title"><?php echo $slide['title']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
            <script>
                const swiperTestimonials = new Swiper('.swiper-testimonials', {
                    // Optional parameters
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 250,
                    centeredSlides: true,

                    // If we need pagination
                    pagination: {
                        el: '.swiper-pagination',
                    },

                    // Navigation arrows
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            </script>
        </div>
    </div>
</div>
