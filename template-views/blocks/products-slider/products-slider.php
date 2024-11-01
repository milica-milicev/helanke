<div class="products-slider">
    <div class="products-slider__head">
        <h2 class="section-title products-slider__title">Najpopularnije</h2>
    </div>
    
    <div class="js-swiper-products swiper">
        <div class="swiper-wrapper">

        <?php
        // Povlačimo niz proizvoda iz ACF-a
        $products = get_field('products');

        // Proveravamo da li postoji niz popularnih proizvoda
        if ($products) :
            // Petlja kroz svaki proizvod (product_1, product_2, itd.)
            for ($i = 1; $i <= 5; $i++) :
                // Dinamički generišemo ime polja za proizvod i hover sliku
                $product_field_name = 'product_' . $i;
                $hover_image_field_name = 'hover_image_product_' . $i;
                
                // Dobijamo post object za svaki proizvod
                $product_post = $products[$product_field_name];
                
                // Proveravamo da li post object postoji
                if ($product_post) :
                    global $product;
                    $product_id = $product_post->ID;
                    $product = wc_get_product($product_id);
                    $product_thumb = get_the_post_thumbnail_url($product_id, 'shop_catalog lazy');
                    $product_title = get_the_title($product_id);
                    $product_link = get_the_permalink($product_id);
                    $product_price = $product->get_price_html();
                    $product_hover = get_field('hover_image',$product_id)
                    
                    // Povlačimo odgovarajuću hover sliku za trenutni proizvod
                    // $hover_image = $products[$hover_image_field_name];

                    ?>
                    <div class="product-slider__item swiper-slide">
                        <a href="<?php echo $product_link; ?>" class="product-slider__item-link">
                            <div class="product-slider__img-wrapper">
                                <!-- Glavna slika proizvoda -->
                                <img class="product-slider__img default-img" src="<?php echo $product_thumb; ?>" alt="">
                                
                                <!-- Hover slika proizvoda -->
                                <!-- <?php //if ($hover_image && isset($hover_image['url'])): ?>
                                    <img class="product-slider__img hover-img" src="<?php //echo $hover_image['url']; ?>" alt="<?php echo $hover_image['alt']; ?>">
                                <?php //endif; ?> -->
                                <img class="product-slider__img hover-img" src="<?php echo $product_hover['url']; ?>" alt="">
                            </div>
                            <h2 class="product-slider__item-title"><?php echo $product_title; ?></h2>
                            <span class="product-slider__item-price"><?php echo $product_price; ?></span>
                            <?php if ($product->is_on_sale()) : ?>
                                <figure>
                                    <span class="sale-percent">-20%</span>
                                </figure>
                            <?php endif; ?>
                        </a>
                        <div class="product-icons">
                            <div class="product-icons__wrap">
                                <a href="javascript:;">
                                    <img class="favorite-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/favorite.png" alt="Favorite">
                                    <span class="icon-text">Add to Favorite</span>
                                </a>
                                <a href="javascript:;">
                                    <img class="add-to-cart-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/add-to-cart.png" alt="Add to Cart">
                                    <span class="icon-text">Add to Cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endif;
            endfor;
        endif;
        ?>

        </div>
        <!-- Strelice za navigaciju -->
        <div class="swiper-button-next swiper-button-next-products"></div>
        <div class="swiper-button-prev swiper-button-prev-products"></div>
    </div>
</div>
