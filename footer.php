<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NM_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-footer__container">
				<div class="site-footer__item">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="">
					<span>Velora doo</span>
					<a href="tel:0603214261">Telefon: 0603214261</a>
					<a href="mailto:info@lora.rs">e-mail: info@lora.rs</a>
					<span>PIB: 111111234</span>
					<span>Matični broj: 14369536</span>
				</div>
				<div class="site-footer__item">
					<h2>Informacije</h2>
					<ul class="site-footer__item-list">
						<li><a href="javascript:;">Uputstvo za kupovinu</a></li>
						<li><a href="javascript:;">Uslovi korišćenja</a></li>
						<li><a href="javascript:;">Reklamacija</a></li>
						<li><a href="javascript:;">Blog</a></li>
						<li><a href="javascript:;">Kontakt</a></li>
					</ul>
				</div>

				<div class="site-footer__item">
					<h2>Pratite nas</h2>
					<div class="site-footer__item-media">
						<a href="javascript:;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/instagram.png" alt=""></a>
						<a href="javascript:;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/_demo/facebook.png" alt=""></a>
					</div>
					
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<p class="site-footer__copyright">&copy; <?php echo date('Y'); ?> All Rights Reserved <a href="javascript:;">NV Studio.</a></p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
