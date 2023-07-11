<?php
/**
 * react-blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package react-blocks
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function react_blocks_setup()
{

    /*this is fix for content block editor look and add style support for editor.css files*/
    add_theme_support("editor-styles");
    add_editor_style("style-editor.css");

    add_theme_support("responsive-embeds");
    add_theme_support("align-wide");

    add_theme_support('editor-color-palette', array(
        array(
            'name' => esc_attr('strong magenta', 'themeLangDomain'),
            'slug' => 'strong-magenta',
            'color' => '#a156b4',
        ),
        array(
            'name' => esc_attr__('very light gray', 'themeLangDomain'),
            'slug' => 'very-light-gray',
            'color' => '#eee',
        ),

    ));

    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on react-blocks, use a find and replace
        * to change 'react-blocks' to the name of your theme in all the template files.
        */
    load_theme_textdomain('react-blocks', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'react-blocks'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'react_blocks_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'react_blocks_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function react_blocks_content_width()
{
    $GLOBALS['content_width'] = apply_filters('react_blocks_content_width', 640);
}

add_action('after_setup_theme', 'react_blocks_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function react_blocks_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'react-blocks'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'react-blocks'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'react_blocks_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function react_blocks_scripts()
{
    wp_enqueue_style('react-blocks-style', get_stylesheet_uri(), array(), _S_VERSION);
    // wp_style_add_data( 'react-blocks-style', 'rtl', 'replace' );
    wp_enqueue_style('react-blocks-style-custom', asset_uri('css/style.css'), array(), _S_VERSION);
    // wp_enqueue_script( 'react-blocks-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script('app', asset_uri('js/app.js'), array('jquery'), _S_VERSION, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'react_blocks_scripts');

function asset_uri($file)
{
    return get_template_directory_uri() . '/assets/' . $file;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/acf-blocks-handler.php';

$post_type = 'leaders';
$leaders = get_posts([
    'post_type' => 'leaders',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids'
]);

// Register the columns.
add_filter("manage_{$post_type}_posts_columns", function ($defaults) {

    $defaults['category'] = 'Category';
    $defaults['order_position'] = 'Order position';

    return $defaults;
});

// Handle the value for each of the new columns.
add_action("manage_{$post_type}_posts_custom_column", function ($column_name, $post_id) {

    if ($column_name == 'category') {
        echo get_field('category', $post_id);
    }

    if ($column_name == 'order_position') {
        // Display an ACF field
        echo get_field('order_position', $post_id);
    }

}, 10, 2);

add_filter("manage_edit-{$post_type}_sortable_columns", "my_sortable_{$post_type}_column");
function my_sortable_leaders_column($columns)
{
    $columns['order_position'] = 'order_position';
    return $columns;
}

add_action('pre_get_posts', 'leaders_posts_orderby');
function leaders_posts_orderby($query)
{
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    if ('order_position' === $query->get('orderby')) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', 'order_position');
        $query->set('meta_type', 'numeric');
    }
}

function screen_with(){
    if (isset($_COOKIE['screenWidth'])) {
        $screenWidth = $_COOKIE['screenWidth'];
        return $screenWidth;
    }
}

function image_size_depends_screen_width(){

    if (isset($_COOKIE['screenWidth'])) {
        $screen_width = screen_with();
        if ($screen_width <= 480){
            $image_size = "medium";
        } elseif ($screen_width <= 768){
            $image_size = "medium_large";
        } elseif ($screen_width <= 1200){
            $image_size = "large";
        } elseif ($screen_width <= 1600){
            $image_size = "1536x1536";
        } elseif ($screen_width >= 1900){
            $image_size = "2048x2048";
        }

        return $image_size;
    }
}
