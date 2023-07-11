<section class="post-testimonial">
    <p class="testimonial"><?php echo $args["testimonial_text"] ?></p>
    <div class="author-block">
        <?php if ($title) { ?>
            <img src="<?php echo $args['author_image']['url']; ?>" alt="">
        <?php } ?>
        <p class="author-name"><?php echo $args["author_name"] ?></p>
        <p class="author-info"><?php echo $args["author_info"] ?></p>
    </div>
</section>
