<?php
// инициализация woocommerce
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('post-thumbnails', array('post', 'page', 'product'));
}


// удаляет сайдбар со страниц
add_action('wp', 'bbloomer_remove_sidebar_product_pages');

function bbloomer_remove_sidebar_product_pages()
{
    if (is_product()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }

    if (is_tax()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }

    if (is_shop()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
}

// удаляет категорию со страницы shop
add_filter('woocommerce_product_subcategories_args', 'remove_category_from_shop_page');
function remove_category_from_shop_page($args)
{
    $excluded_category_slug = 'new'; // Укажите slug категории, которую хотите скрыть
    $args['exclude'] = array(get_term_by('slug', $excluded_category_slug, 'product_cat')->term_id);
    return $args;
}
