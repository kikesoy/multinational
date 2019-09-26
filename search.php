<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

get_header();
?>
	<section id="primary" class="content-area container">
		<main id="main" class="site-main search-results">

			<div class="row">
				<div class="col-md-8">
					<section class="alert alert-info search-area">
						<?php get_search_form(); ?>
					</section>
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Resultados de la búsqueda: %s', 'basic-bootstrap-theme-with-webpack-and-hmr' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->
						
						<?php
						/* Start the Loop */
						$i = 0; while (have_posts() && $i < 5) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						$i++; 
						endwhile;

						bootstrap_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				<div class="col-md-3 offset-md-1">
					<?php get_sidebar(); ?>
				</div>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
