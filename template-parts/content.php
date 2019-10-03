<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

?>
<header class="entry-header" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> );">
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-1">
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' ); 
						if (has_excerpt()):
							echo '<h5 class="entry-subtitle">'.get_the_excerpt().'</h5>';
						endif;
					else :
						the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );	
					endif; ?>
					
			</div><!-- .col-md-5-->
		</div><!-- .row -->
	</div><!-- .container -->
	<?php if ( 'products' === get_post_type() ) :?>
		<?php 
			if ( get_post_meta( $post->ID, 'logo-prod', true )) :
				echo '<div class="entry-logo"><div class="entry-logo-container"><span class="entry-logo-box"><img src="'.get_post_meta( $post->ID, 'logo-prod', true ).'"/></span></div></div>';
			else: 
				echo '<div class="entry-logo"><div class="entry-logo-container"><span class="entry-logo-box"><img src="'.get_bloginfo('stylesheet_directory').'/assets/images/logo-producto-generico.png"/></span></div></div>';
			endif;
		?>
	<?php endif;?>
</header><!-- .entry-header -->
<main id="main" class="site-main">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content container">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basic-bootstrap-theme-with-webpack-and-hmr' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
</main>