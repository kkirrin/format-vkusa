<?php
add_action('wp_enqueue_scripts', 'theme_add_scripts');
add_filter('use_block_editor_for_post_type', '__return_false', 10);

add_theme_support('custom-templates');

add_theme_support('post-thumbnails', array('post'));

add_action('after_setup_theme', 'add_menu');


function add_menu()
{
    register_nav_menu('top-nav', 'навигация вверху');
}

function theme_add_scripts()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}


if (class_exists('WooCommerce')) {
    require_once(get_template_directory() . '/woocommerse.php');
}

if (class_exists('WooCommerce')) {
    // require_once(get_template_directory() . '/woocommerse-functions/filters.php');
}



function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
