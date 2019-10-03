<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */
?>

<header <?php echo (has_post_thumbnail() ? 'class="entry-header"':'class="entry-header-simple"'); ?> style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> );">
	<div class="container">
		<div class="row">
			<div class="col-md-5 offset-md-1">
				<?php 
				the_title( '<h1 class="entry-title">', '</h1>' ); 
				if (has_excerpt()):
					echo '<h5 class="entry-subtitle">'.get_the_excerpt().'</h5>';
				endif;
				?>
			</div>
		</div>
	</div>
</header><!-- .entry-header -->
<main id="main" class="site-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<!-- CODIGO PARA MOSTRAR FEATURED IMAGE -->
		<?php //basic_bootstrap_theme_with_webpack_and_hmr_post_thumbnail(); ?>
		<div class="entry-content container">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</main>