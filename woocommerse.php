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

// динамическая смена счетчиков товаров в корзине
function update_cart_quantity()
{
    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
    $quantity = (int) $_POST['quantity'];

    if (WC()->cart->set_quantity($cart_item_key, $quantity)) {
        // Update mini-cart content
        ob_start();
        woocommerce_mini_cart();
        $mini_cart = ob_get_clean();

        // Get updated cart count
        $cart_count = WC()->cart->get_cart_contents_count();

        wp_send_json_success([
            'mini_cart' => $mini_cart,
            'cart_count' => $cart_count
        ]);
    } else {
        wp_send_json_error('Не удалось обновить количество.');
    }
}
add_action('wp_ajax_update_cart_quantity', 'update_cart_quantity');
add_action('wp_ajax_nopriv_update_cart_quantity', 'update_cart_quantity');

function header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
?>
    <div class="basket-btn-counter">
        <?php
        $cart_count = $woocommerce->cart->get_cart_contents_count();
        if ($cart_count > 0): ?>
            <span class="basket-btn-counter-span"><?php echo $cart_count; ?></span>
        <?php endif; ?>
    </div>
<?php
    $fragments['.basket-btn-counter'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

// Очистка корзины
add_action('init', 'clear_cart_button');
function clear_cart_button()
{
    if (isset($_POST['clear_cart'])) {
        wc()->cart->empty_cart();
    }
}



// Удаляем стандартный стикер "On Sale" с карточки товара в WooCommerce
add_filter('woocommerce_sale_flash', '__return_empty_string');
