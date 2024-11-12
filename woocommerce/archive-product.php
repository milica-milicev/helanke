<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10
 * @hooked woocommerce_breadcrumb - 20
 */
do_action( 'woocommerce_before_main_content' );
?>

<header class="woocommerce-products-header">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     *
     * @hooked woocommerce_taxonomy_archive_description - 10
     * @hooked woocommerce_product_archive_description - 10
     */
    do_action( 'woocommerce_archive_description' );

    // Display subcategories if on a category archive
    if ( is_product_category() ) {
        $term = get_queried_object();
        $args = array(
            'parent'       => $term->term_id,
            'taxonomy'     => 'product_cat',
            'hide_empty'   => false, // Change to true to hide empty categories
        );

        $subcategories = get_terms( $args );

        if ( ! empty( $subcategories ) && ! is_wp_error( $subcategories ) ) {
            echo '<div class="subcategory-list">';
            echo '<h2>Subcategories</h2>';
            echo '<ul class="subcategories">';

            foreach ( $subcategories as $subcategory ) {
                echo '<li>';
                echo '<a href="' . esc_url( get_term_link( $subcategory ) ) . '">';
                echo esc_html( $subcategory->name );
                echo '</a>';
                echo '</li>';
            }

            echo '</ul>';
            echo '</div>';
        }
    }
    ?>
</header>

<?php
// Continue with the existing product loop and other content
if ( woocommerce_product_loop() ) {
    do_action( 'woocommerce_before_shop_loop' );
    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();
            do_action( 'woocommerce_shop_loop' );
            wc_get_template_part( 'content', 'product' );
        }
    }

    woocommerce_product_loop_end();
    do_action( 'woocommerce_after_shop_loop' );
} else {
    do_action( 'woocommerce_no_products_found' );
}

do_action( 'woocommerce_after_main_content' );
//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
