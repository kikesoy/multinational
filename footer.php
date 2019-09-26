<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

?>

	</div><!-- #content -->
	
	<section class="footer-contact" id="footer-contact">
		<div class="row">
				<div class="contact-image" style="background-image:url('<?php bloginfo('stylesheet_directory'); ?>/assets/images/asesor.png');">
				</div>
				<div class="contact-form">
					<?php echo do_shortcode('[contact-form-7 id="76" title="Mas información"]'); ?>
				</div>
			</div>
	</section>
	<!-- SERVICIO DE CLIMA -->
	<!-- WIDGET AREA AUXILIAR -->
	<?php if ( is_active_sidebar( 'footer_auxiliar' )){
		dynamic_sidebar( 'footer_auxiliar' );
	}?>
	<footer id="colophon" class="site-footer">
		<div class="site-info container">
			<div class="footer-first-row">
				<div id="footer-nav" class="footer-nav">
					<?php
					if ( has_nav_menu( 'menu-footer' ) ) {
						wp_nav_menu( array( 'theme_location' => 'menu-footer' ) );
					} ?> 
				</div>
				<div id="footer-social" class="footer-social">
					<?php if ( is_active_sidebar( 'footer_social' )){
						dynamic_sidebar( 'footer_social' );
					}?>
				</div>
				<div class="col-12">
					<hr />	
				</div>
			</div>
			<div class="footer-second-row">
				<div class="footer-legal" id="footer-legal">
					<p>Copyright © Multinational <?php echo date("Y"); ?></p>
					<?php
					if ( has_nav_menu( 'menu-legal' ) ) {
						wp_nav_menu( array( 'theme_location' => 'menu-legal' ) );
					} ?> 
				</div>
				<div class="footer-ratings" id="footer-ratings">
					<?php if ( is_active_sidebar( 'footer_ratings' )){
						dynamic_sidebar( 'footer_ratings' );
					}?>
				</div>
			</div>
				
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<section id="site-search" class="search-overlay">
		<div class="search-container">
			<button type="button" id="search-close" class="search-close" aria-label="Close">
				<i class="fas fa-times" aria-hidden="true"></i>
			</button>
			<?php get_search_form(); ?>
		</div>
	</section>
</div><!-- #page -->


<?php wp_footer(); ?>
<script>

	function searchSite(event){
		if (event.data.action === "open"){
			$('body').css("overflow","hidden");
			$('#site-search').css("display", "flex").fadeTo( "fast" , 1);
			return false;
		}
		if (event.data.action === "close"){
			$('#site-search').fadeTo( "fast" , 0, function() {
				$('body').css("overflow","initial");
				$(this).css("display", "none");
			});
			return false;
		}
	}

$('#search-close').on('click', {action: 'close'}, searchSite);
$('#search-open').on('click', {action: 'open'}, searchSite);
</script>
</body>
</html>
