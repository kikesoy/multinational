<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('result-found'); ?>>
	<a href="<?php echo esc_url( get_permalink() ) ?>" class="result-found-link">
		<header class="result-found-entry-header">
			<?php the_title( '<h4 class="result-found-entry-title">','</h4>' ); ?>
		</header><!-- .entry-header -->
		<div class="result-found-entry-summary">
			<?php echo get_the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
