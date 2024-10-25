<?php
/**
 * Template View for displaying Blocks
 *
 * @package NM_Theme
 */
?>

<div class="recente-blogs">
    <div class="container">
        <div class="section-head">
            <h2 class="section-head__title">Blog postovi</h2>
        </div>
        <div class="recente-blogs__wrapper">
            <div class="recente-blogs__right">
                <div class="js-swiper-blog swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 5
                            );

                            $recent_posts = new WP_Query($args);

                            if ($recent_posts->have_posts()) :
                                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                            ?>
                                    <div class="recente-blogs__slider swiper-slide">
                                        <div class="recente-blog">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'recente-posts'); ?>" alt="<?php the_title(); ?>">
                                                <h4><?php the_title(); ?></h4>
                                            </a>
                                            <div class="recente-blog__excerpt">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                        ?>
                        
                    </div>
                    <div class="swiper-pagination"></div>
                    <!-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> -->
                </div>
            </div>
        </div>
    </div>
    
</div>