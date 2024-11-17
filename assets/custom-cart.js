// jQuery(document).ready(function ($) {
//     $(document).on('click', '.quantity-control button', function (e) {
//         e.preventDefault();

//         var button = $(this),
//             cart_item_key = button.data('cart-item'),
//             quantityInput = button.siblings('input'),
//             quantity = parseInt(quantityInput.val(), 10);

//         if (button.hasClass('quantity-increase')) {
//             quantity++;
//         } else if (button.hasClass('quantity-decrease') && quantity > 1) {
//             quantity--;
//         }
//         $.ajax({
//             url: cart_params.ajax_url,
//             type: 'POST',
//             data: {
//                 action: 'update_cart_quantity',
//                 cart_item_key: cart_item_key,
//                 quantity: quantity
//             },
//             success: function (response) {
//                 if (response.success) {
//                     // Update mini-cart content
//                     $('.widget_shopping_cart_content').html(response.data.mini_cart);

//                     // Update cart counter
//                     $('.basket-btn-counter-span').text(response.data.cart_count);

//                 } else {
//                     console.error('Ошибка обновления количества.');
//                 }
//             },
//             error: function () {
//                 console.error('Ошибка AJAX.');
//             }
//         });
//     });
// });



document.addEventListener('DOMContentLoaded', () => {
    const quantityControlButtons = document.querySelectorAll('.quantity-control button');

    console.log(quantityControlButtons); 
})