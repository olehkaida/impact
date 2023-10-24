<?php
/**
 * Signup Block Template.
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
$class_name = 'signup-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$pretitle = get_field('pre_title');
$title = get_field('title');
$description = get_field('description');
$form = get_field('form');
$cols = get_field('columns');
?>
    <div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="section-heading-block">
                <?php if ($pretitle) { ?>
                    <div class="section-pretitle"><?php echo($pretitle); ?></div>
                <?php } ?>
                <?php if ($title) { ?>
                    <div class="section-title"><?php echo esc_html($title); ?></div>
                <?php } ?>
                <?php if ($description) { ?>
                    <div class="section-description"><?php echo esc_html($description); ?></div>
                <?php } ?>
            </div>
            <?php if ($cols) { ?>
            <div class="cols grid one">
                <?php foreach ($cols as $col) { ?>
                    <div class="col">
                        <div class="col-desktop-right">
                            <div class="col-info">
                                <?php if ($col['title']) { ?>
                                    <p class="col-title"><?php echo $col['title'] ?></p>
                                <?php } ?>
                                <?php if ($col['description']) { ?>
                                    <p class="col-description"><?php echo $col['description'] ?></p>
                                <?php } ?>
                            </div>
                            <?php if ($col['button']) { ?>
                                <div class="new-cta-btn">
                                    <a href="<?php echo $col['button']['url'] ?>" class="col-link-btn"
                                       target="<?php if ($col['button']['target']) {
                                           echo $col['button']['target'];
                                       } else {
                                           echo '_self';
                                       } ?>"><?php echo $col['button']['title'] ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if ($form) { ?>
                <?php  if ($form == "investor"){ ?>
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                            region: "na1",
                            portalId: "43656121",
                            formId: "2903fa7b-5a0c-4132-860c-5b5d40b3e4e3"
                        });
                    </script>
                <?php } elseif ($form == "consultant") { ?>
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                            region: "na1",
                            portalId: "43656121",
                            formId: "0aea8974-52b6-4b8c-81ea-aac4ea8bb81e"
                        });
                    </script>
                <?php } elseif ($form == "cde") { ?>
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                            region: "na1",
                            portalId: "43656121",
                            formId: "2667cce1-7371-4cb0-b4ed-1e7f5e31d9d5"
                        });
                    </script>
                <?php } elseif ($form == "sponsor") { ?>
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                            region: "na1",
                            portalId: "43656121",
                            formId: "a8d84b3f-4240-4fc7-b1ec-e004bcc44596"
                        });
                    </script>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
