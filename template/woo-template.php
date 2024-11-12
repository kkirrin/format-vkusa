<?php
/*
Template Name: страница шаблон - WooCommerce
*/
get_header();
?>
<main>
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>