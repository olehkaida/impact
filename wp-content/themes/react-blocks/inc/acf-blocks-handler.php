<?php

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => true
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'General',
        'menu_title' => 'General',
        'parent_slug' => 'theme-settings'
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Header Menu',
        'menu_title' => 'Header Menu',
        'parent_slug' => 'theme-settings'
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Footer Menu',
        'menu_title' => 'Footer Menu',
        'parent_slug' => 'theme-settings'
    ));
}


function custom_block_category_register($categories)
{
    return array_merge(
        array(
            array(
                'slug' => 'happen-blocks',
                'title' => 'Happen Blocks'
            ),
        ),
        $categories
    );
}

add_filter('block_categories', 'custom_block_category_register', 10, 2);

function happen_acf_blocks_register()
{

    if (!function_exists('acf_register_block')) {
        return;
    }

    require(get_template_directory() . '/blocks/blocks.php');

    foreach ($blocks as $block) {
        acf_register_block($block);
    }

}

add_action('acf/init', 'happen_acf_blocks_register');

function render_acf_block_callback($block)
{

    $slug = substr($block['name'], 4);
    if (file_exists(get_template_directory() . '/blocks/templates/' . $slug . '.php')) include(get_template_directory() . '/blocks/templates/' . $slug . '.php');

}
