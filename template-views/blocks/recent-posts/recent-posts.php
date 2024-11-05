<?php
/**
 * Template View for displaying Blocks
 *
 * @package NM_Theme
 */
?>

<div class="recent-posts">
    <div class="container">
        <div class="recent-posts__head">
            <h2 class="recent-posts__head-title section-title">Blog postovi</h2>
        </div>
        <div class="recent-posts__wrapper">
            <div class="js-swiper-blog swiper">
                <div class="recent-posts__slider swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 5
                    );

                    $recent_posts = new WP_Query($args);

                    if ($recent_posts->have_posts()) :
                        while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                            <div class="recent-posts__item swiper-slide">
                                <a class="recent-posts__item-img-wrap" href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'recente-posts'); ?>" alt="<?php the_title(); ?>">
                                </a>
                                <h4 class="recent-posts__item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="recent-posts__item-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="recent-posts__slider-nav swiper-pagination"></div>
            </div>
        </div>
    </div>
    
</div>