<?php
/**
 * Template Name: Homepage
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

get_header();
?>

	<div id="primary" class="content-area ">
  <section class="home-slider">
    
    <div id="carouselHomepage" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php if ( is_active_sidebar( 'home_slider' )){
						dynamic_sidebar( 'home_slider' );
					}?>
      </div>
      <ol class="carousel-indicators">
      <?php
        $widget_list= get_option('sidebars_widgets');
        if($widget_list)
        foreach($widget_list["home_slider"] as $key=>$widget){
          
          echo '<li class="carousel-indicator-item" data-target="#carouselHomepage" data-slide-to="'.$key.'">'.$key.'</li>';
        }
      ?>
      </ol>
      <a class="carousel-control-prev" href="#carouselHomepage" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselHomepage" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section><!-- .home-slider -->

  <main id="main" class="site-main site-main-home">
    <?php
      while ( have_posts() ) :
        the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content home-entry-content container">
              <?php the_content(); ?>
            </div><!-- .entry-content -->
          </article><!-- #post-<?php the_ID(); ?> -->
      <?php endwhile; // End of the loop. ?>
      <section class="home-posts container">
        <div class="row">
          <?php
            $postsMain = array(
                'post_type' => 'post',
                'posts_per_page' => '4'
            );

            $post_query = new WP_Query($postsMain);
            if($post_query->have_posts() ) :
              while($post_query->have_posts() ) :
                $post_query->the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <div class="post-wrapper">
                    <header class="post-header">
                      <a href="<?php echo get_permalink(); ?>">
                        <?php
                          if ( has_post_thumbnail() ) {
                            the_post_thumbnail('medium',['class'=>'post-header-img']);
                        }
                        ?>
                        <h5 class="post-header-title"><?php the_title(); ?></h5>
                      </a>
                    </header>
                    <section class="post-content">
                      <?php the_excerpt(); ?>
                    </section>
                    <footer class="post-footer">
                      <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Ver mas</a>
                    </footer>
                    
                  </div>
                </article>
                <?php
              endwhile; wp_reset_query();
            endif;
          ?>
        </div>
      </section><!-- .posts -->
        </main><!-- .site-main -->

  <section class="home-products container">
    <div class="home-products-wrapper">
      <h2 class="home-products-subtitle">
        Conozca nuestros productos
      </h2>
      <?php
      $postsProducts = new WP_Query( array(
          'post_type' => 'Products',
          'posts_per_page' => -1
        )
      );
      ?>
    
      <div class="carousel-products">
        <?php while ( $postsProducts->have_posts() ) : $postsProducts->the_post(); ?>
        <div class="carousel-products-item">
          <a href="<?php echo get_permalink(); ?>">
            <?php 
              if ( get_post_meta( $post->ID, 'logo-prod', true )) :
                echo '<img src="'.get_post_meta( $post->ID, 'logo-prod', true ).'" class="product-logo"/>';
              else: 
                echo '<img src="'.get_bloginfo('stylesheet_directory').'/assets/images/logo-producto-generico.png" class="product-logo"/>';
            endif; 
            ?>
            <?php the_title(); ?>
          </a>
        </div>
        
        <?php endwhile; wp_reset_query(); ?>
        
      </div>
    </div>
  </section><!-- .home-products -->
  <?php if ( is_active_sidebar( 'home_banner' )){
    dynamic_sidebar( 'home_banner' );
  }?>
	</div><!-- #primary -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel-products').slick({
        dots: true,
        infinite: false,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 1000,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3
            }
          },
          {
            breakpoint: 760,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    });
    document.querySelector('.carousel-item').classList.add("active");
    document.querySelector('.carousel-indicator-item').classList.add("active")
  </script>
  

<?php

get_footer();
