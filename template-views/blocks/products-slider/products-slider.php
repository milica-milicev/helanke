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
                            <div class="product-slider__item-wrap">
                                <a href="<?php echo $product_link; ?>" class="product-slider__img-wrapper">
                                    <!-- Glavna slika proizvoda -->
                                    <img class="product-slider__img product-slider__img--default" src="<?php echo $product_thumb; ?>" alt="">
                                    
                                    <!-- Hover slika proizvoda -->
                                    <?php if ($product_hover && isset($product_hover['url'])): ?>
                                        <img class="product-slider__img product-slider__img--hover" src="<?php echo $product_hover['url']; ?>" alt="<?php echo $product_hover['alt']; ?>">
                                    <?php endif; ?>
                                </a>
                                <div class="product-slider__item-actions">
                                    <!-- <a href="javascript:;">
                                        <img class="favorite-icon" src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/heart.svg" alt="Favorite">
                                        <span class="icon-text">Add to Favorite</span>
                                    </a> -->
                                    <a href="javascript:;" class="product-slider__item-action">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/cart.svg" alt="Add to Cart">
                                        <span>Add to Cart</span>
                                    </a>
                                </div>  
                                <?php if ($product->is_on_sale()) : ?>
                                    <span class="product-slider__item-tag">-20%</span>
                                <?php endif; ?>
                            </div>
                            <h2 class="product-slider__item-title"><a href="<?php echo $product_link; ?>"><?php echo $product_title; ?></a></h2>
                            <span class="product-slider__item-price"><?php echo $product_price; ?></span>
                        </div>
                        <?php
                    endif;
                endfor;
            endif;
            ?>
        </div>
        
    </div>
    <div class="product-slider__nav-container">
        <!-- Strelice za navigaciju -->
        <div class="product-slider__nav product-slider__nav-prev font-chevron-left swiper-button-prev-products"></div>
        <div class="product-slider__nav product-slider__nav-next font-chevron-right swiper-button-next-products"></div>
    </div>
</div>
