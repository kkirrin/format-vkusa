<?php
add_action('wp_enqueue_scripts', 'theme_add_scripts');
add_filter('use_block_editor_for_post_type', '__return_false', 10);

add_theme_support('custom-templates');

add_action('after_setup_theme', 'add_menu');
add_theme_support('post-thumbnails', array('post'));



function theme_add_scripts()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}



function add_menu()
{
    register_nav_menu('aside', 'Категории в sidebar');
    register_nav_menu('lk', 'Навигация ЛК');
}

add_action('init', 'create_new_type_posts');

function create_new_type_posts()
{
    register_post_type(
        'apartments',
        array(
            'public' => true,
            'has_archive' => true,
            'exclude_from_search' => true,
            'rewrite' => array(
                'slug' => 'trands',
                'with_front' => false,
            ),
            'labels' => array(
                'name' => 'Квартиры',
                'singular_name' => 'Квартиры',
                'menu_name' => 'Квартиры',
                'all_items' => 'Все квартиры',
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
            'taxonomies' => array('category')
        )
    );
};
