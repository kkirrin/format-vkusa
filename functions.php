<?php
add_action('wp_enqueue_scripts', 'theme_add_scripts');
add_filter('use_block_editor_for_post_type', '__return_false', 10);

add_theme_support('custom-templates');

add_theme_support('post-thumbnails', array('post'));

add_action('after_setup_theme', 'add_menu');


function add_menu()
{
    register_nav_menu('top-nav', 'навигация вверху');
    // register_nav_menu('top-right', 'правое меню шапки');
    // register_nav_menu('menu-catalog', 'меню-каталога');
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






//  Функция обработки ajax-запроса из живого поиска
add_action('wp_ajax_live_search', 'ajax_live_search');
add_action('wp_ajax_nopriv_live_search', 'ajax_live_search'); // Для незарегистрированных пользователей

function ajax_live_search()
{
    // Проверка наличия переменной ajax в отправленных данных
    if (isset($_POST['ajax'])) {
        // Проверка типа живого поиска
        if ($_POST['ajax'] === 'products') {
            global $wpdb;

            $search_value = sanitize_text_field($_POST['value']);

            $args = array(
                'post_type' => ['product', 'articles'],
                'posts_per_page' => 50,
                's' => $search_value, // Поиск по названию товара
                'post_status' => 'publish',
                'taxonomy' => $search_value,

            );

            $products = new WP_Query($args);

            // Переменная для формирования списка пунктов для выпадающего списка
            $data_list = '';

            if ($products->have_posts()) {
                while ($products->have_posts()) {
                    $products->the_post();

                    // Получаем данные товара
                    $product_id = get_the_ID();
                    $product_link = get_permalink();

                    $product = wc_get_product($product_id);

                    // Получаем изображение товара
                    $image_id = get_post_thumbnail_id($product_id); // Получаем ID изображения
                    $image_url = wp_get_attachment_image_url($image_id, 'thumbnail'); // Получаем URL изображения

                    // Формируем пункт выпадающего списка

                    $data_list .= '<a href="' . $product_link . '">';
                    $data_list .= ' <div class="list_option" data-value="' . $product_id . '" data-text="' . get_the_title() . '" data-product="product">';
                    $data_list .= ' <img src="' . esc_url($image_url) . '" alt="' . get_the_title() . '" style="width:30px; height:30px;"/> ';
                    $data_list .=   get_the_title() . '</div>';
                    $data_list .= '</a>';
                }
                wp_reset_postdata(); // Сбрасываем данные после запроса
            } else {
                $data_list .= '<div class="list_option" data-value="0" data-text="' . esc_html($search_value) . '" data-product="">Ничего не найдено</div>';
            }

            // Формируем данные для возврата ответа на сторону клиента
            echo json_encode(array('data' => [], 'list' => $data_list), JSON_UNESCAPED_UNICODE);
        }
    }

    wp_die(); // Завершение выполнения
}
