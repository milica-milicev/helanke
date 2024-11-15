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

<div class="banner" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/_demo/blog-banner.webp');">
    <div class="container">
        <div class="banner__content">
            <h1 class="banner__title"><?php woocommerce_page_title(); ?></h1>
        </div>
    </div>
</div>

<?php
/**
 * Hook: woocommerce_archive_description.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
do_action( 'woocommerce_archive_description' );

// Display subcategories if on a category archive
if ( is_product_category() ) :
    $term = get_queried_object();
    $args = array(
        'parent'       => $term->term_id,
        'taxonomy'     => 'product_cat',
        'hide_empty'   => false, // Change to true to hide empty categories
    );

    $subcategories = get_terms( $args );

    if ( ! empty( $subcategories ) && ! is_wp_error( $subcategories ) ) : ?>

        <div class="categories categories--listing">
            <div class="container">
                <div class="categories__row">
                    <?php foreach ( $subcategories as $subcategory ) : ?>
                        <div class="categories__item">
                            <a href="<?php echo esc_url( get_term_link( $subcategory ) ); ?>">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/trudnice.jpg" alt="">
                                <span><?php echo esc_html( $subcategory->name ); ?></span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif;
endif; ?>

<?php
// Continue with the existing product loop and other content
if ( woocommerce_product_loop() ) : ?>
    <div class="products-list">
        <div class="container">
            <?php
                do_action( 'woocommerce_before_shop_loop' );

                if ( wc_get_loop_prop( 'total' ) ) : ?>
                    <div class="products-list__row">
                        <?php while ( have_posts() ) : ?>
                            <div class="products-list__item">
                                <?php
                                    the_post();
                                    do_action( 'woocommerce_shop_loop' );
                                    wc_get_template_part( 'content', 'product' ); 
                                ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
               <?php endif; ?>
        </div>
    </div>
    <?php
    do_action( 'woocommerce_after_shop_loop' );
else :
    do_action( 'woocommerce_no_products_found' );
endif;

do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
