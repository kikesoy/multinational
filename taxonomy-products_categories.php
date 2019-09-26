<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

get_header();
?>
	<div id="primary" class="content-area">
			<?php 
			if ( have_posts() ) : ?>
				<?php 
					$term_id = get_queried_object()->term_id;

					if (function_exists('get_wp_term_image'))
					{
						$meta_image = get_wp_term_image($term_id); //It will give category/term image url 
					}
				?>
			<header class="entry-header" style="background-image:url(<?php echo $meta_image; ?> );">
				<div class="container">
					<div class="row">
						<div class="col-md-5 offset-md-1">
          		<h1 class="entry-title"><?php single_term_title();?></h1>
          		<h5 class="entry-subtitle"><?php the_archive_description(); ?></h5>
						</div>
					</div>
				</div>
				<?php 
					// if (is_tax('products_categories','multivida')) :
					// 	echo 'Vida';
					// elseif (is_tax('products_categories','propiedad')) :
					// 	echo 'Propiedad';
					// elseif (is_tax('products_categories','auto')) :
					// 	echo 'Auto';
					// endif;
				?>
			</header><!-- .entry-header -->
			
			<main id="main" class="site-main">
				<div class="entry-content container">
					<div class="row">
						<?php 
							$term_parent = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
							$term_id = get_queried_object()->term_id;
							$taxonomy_name = 'products_categories';
							$term_children = get_term_children( $term_id, $taxonomy_name );

							if ($term_children) :

								echo '<div class="products-filter">';
								
								echo '<ul class="products-filter-options">';
								echo '<li class="products-filter-item"><a href="#" data-slug="'. $term_parent->slug .'" class="products-filter-link selected">'.__('Todos', 'multinational').'</a></li>';
								foreach ( $term_children as $child ) {
									$term = get_term_by( 'id', $child, $taxonomy_name );
									echo '<li class="products-filter-item"><a href="' . get_term_link( $child, $taxonomy_name ) . '" data-slug="'. $term->slug .'" class="products-filter-link">' . $term->name . '</a></li>';
								}
								echo '</ul>';
								echo '</div><!-- .products-filter -->';
							endif;
							?> 
						
					</div>
					<div class="row products-container">
					<?php
					
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content-archive', get_post_type() );

					endwhile;

					// the_posts_navigation();

					else :

					get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					</div>
				</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<script type="text/javascript">
		$('.products-filter a').bind('click', function() { 
			var el = $(this).data('slug');
				
				$('.products-filter a').removeClass('selected');
				$(this).addClass('selected');
				$('article').not("."+el).hide();
				$("."+el).show();
			
			return false;
			});

   	
	</script>
<?php
get_footer();
