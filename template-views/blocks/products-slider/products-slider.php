<div class="products-slider">
    <!-- <div class="container"> -->
        <div class="section-head">
            <h2 class="section-head__title">Najpopularnije</h2>
        </div>
        
        <div class="js-swiper-products swiper">
            <div class="swiper-wrapper">

            <?php
			$products = get_field('products');

			// Proverite da li postoji niz popularnih proizvoda
			if ($products) :
				// Petlja kroz svaki proizvod (product_1, product_2, itd.)
				for ($i = 1; $i <= 7; $i++) :
					// Dinamički generišemo ime polja
					$product_field_name = 'product_' . $i;
					
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
						?>

                        <div class="product-slider__item swiper-slide">
                            <a href="<?php echo $product_link; ?>" class="product-slider__item-link">
                                <div class="product-slider__img-wrapper">
                                    <img class="product-slider__img default-img" src="<?php echo $product_thumb; ?>" alt="">
                                    <!-- <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/hover.webp" alt="Vesey Leggings V2 Hover"> -->
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



                <!-- <div class="product-slider__item swiper-slide">
                    <a href="javascript:;" class="product-slider__item-link">
                        <div class="product-slider__img-wrapper">
                            <img class="product-slider__img default-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/leggings.webp" alt="Vesey Leggings V2">
                            <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/hover.webp" alt="Vesey Leggings V2 Hover">
                        </div>
                        <h2 class="product-slider__item-title">Klasične helanke</h2>
                        <span class="product-slider__item-price">3100 RSD</span>
                        <figure>
                            <span class="sale-percent">-20%</span>
                        </figure>
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
                <div class="product-slider__item swiper-slide">
                    <a href="javascript:;" class="product-slider__item-link">
                        <div class="product-slider__img-wrapper">
                            <img class="product-slider__img default-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/patern.webp" alt="Vesey Leggings V2">
                            <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/patern-hover.webp" alt="Vesey Leggings V2 Hover">
                        </div>
                        <h2 class="product-slider__item-title">Šarene helanke</h2>
                        <span class="product-slider__item-price">3100 RSD</span>
                        <figure>
                            <span class="new">Novo</span>
                        </figure>
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
                <div class="product-slider__item swiper-slide">
                    <a href="javascript:;" class="product-slider__item-link">
                        <div class="product-slider__img-wrapper">
                            <img class="product-slider__img default-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/spanish.webp" alt="Vesey Leggings V2">
                            <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/spanish-hover.webp" alt="Vesey Leggings V2 Hover">
                        </div>
                        <h2 class="product-slider__item-title">Španske helanke</h2>
                        <span class="product-slider__item-price">3100 RSD</span>
                        <figure>
                            <span class="new">Novo</span>
                        </figure>
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
                <div class="product-slider__item swiper-slide">
                    <a href="javascript:;" class="product-slider__item-link">
                        <div class="product-slider__img-wrapper">
                            <img class="product-slider__img default-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/kozne.webp" alt="Vesey Leggings V2">
                            <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/kozne-hover.webp" alt="Vesey Leggings V2 Hover">
                        </div>
                        <h2 class="product-slider__item-title">Kožne helanke</h2>
                        <span class="product-slider__item-price">3100 RSD</span>
                        <figure>
                            <span class="sale-percent">-20%</span>
                        </figure>
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
                <div class="product-slider__item swiper-slide">
                    <a href="javascript:;" class="product-slider__item-link">
                        <div class="product-slider__img-wrapper">
                            <img class="product-slider__img default-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/leggings.webp" alt="Vesey Leggings V2">
                            <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/hover.webp" alt="Vesey Leggings V2 Hover">
                        </div>
                        <h2 class="product-slider__item-title">Vesey Leggings V2</h2>
                        <span class="product-slider__item-price">3100 RSD</span>
                        <figure>
                            <span class="sale-percent">-20%</span>
                        </figure>
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
                <div class="product-slider__item swiper-slide">
                    <a href="javascript:;" class="product-slider__item-link">
                        <div class="product-slider__img-wrapper">
                            <img class="product-slider__img default-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/leggings.webp" alt="Vesey Leggings V2">
                            <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/hover.webp" alt="Vesey Leggings V2 Hover">
                        </div>
                        <h2 class="product-slider__item-title">Vesey Leggings V2</h2>
                        <span class="product-slider__item-price">3100 RSD</span>
                        <figure>
                            <span class="sale-percent">-20%</span>
                        </figure>
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
                <div class="product-slider__item swiper-slide">
                    <a href="javascript:;" class="product-slider__item-link">
                        <div class="product-slider__img-wrapper">
                            <img class="product-slider__img default-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/leggings.webp" alt="Vesey Leggings V2">
                            <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/hover.webp" alt="Vesey Leggings V2 Hover">
                        </div>
                        <h2 class="product-slider__item-title">Vesey Leggings V2</h2>
                        <span class="product-slider__item-price">3100 RSD</span>
                        <figure>
                            <span class="sale-percent">-20%</span>
                        </figure>
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
                <div class="product-slider__item swiper-slide">
                    <a href="javascript:;" class="product-slider__item-link">
                        <div class="product-slider__img-wrapper">
                            <img class="product-slider__img default-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/leggings.webp" alt="Vesey Leggings V2">
                            <img class="product-slider__img hover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/hover.webp" alt="Vesey Leggings V2 Hover">
                        </div>
                        <h2 class="product-slider__item-title">Vesey Leggings V2</h2>
                        <span class="product-slider__item-price">3100 RSD</span>
                        <figure>
                            <span class="sale-percent">-20%</span>
                        </figure>
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
                </div>      -->
            </div>
             <!-- Strelice za navigaciju -->
             <div class="swiper-button-next swiper-button-next-products"></div>
             <div class="swiper-button-prev swiper-button-prev-products"></div>
        </div>
    <!-- </div> -->
</div>
