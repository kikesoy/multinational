<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

get_header();
?>

	<div id="primary" class="content-area">
		<?php
			while ( have_posts() ) :
				the_post();
				
				get_template_part( 'template-parts/content', get_post_type() );

				// the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>
	</div><!-- #primary -->

<?php

get_footer();
