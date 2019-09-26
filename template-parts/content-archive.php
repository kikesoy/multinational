<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

?>
  <?php 
    $term_list = wp_get_post_terms($post->ID, 'products_categories', array("fields" => "slugs"));
  ?>   
<article class="products-list <?php echo (implode(' ',$term_list)); ?>">
  <div class="products-list-wrapper">
    <header class="products-list-header">
    <a href="<?php echo get_permalink(); ?>">
      <?php
      if ( has_post_thumbnail() ) {
        the_post_thumbnail('medium',['class'=>'products-list-img']);
      }
      ?>
      <?php
        if ( get_post_meta( $post->ID, 'logo-prod', true ) ) {
          echo '<img src="'.get_post_meta( $post->ID, 'logo-prod', true ).'" class="products-list-logo"/>';
        } else{ ?>
          <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo-producto-generico.png" class="products-list-logo"/> 
          <?php
        }
      ?>
    </a>
    </header>
    <section class="products-list-text">
      <?php 
      the_title( '<h5 class="products-list-name">', '</h5>' ); 
      if ( get_post_meta( $post->ID, 'subtitle', true ) ) {
        echo '<p class="products-list-description">'.get_post_meta( $post->ID, 'subtitle', true ).'</p>';
      } 
      ?>
    </section>
    <footer class="products-list-footer">
      <a href="<?php echo get_permalink(); ?>" class="btn btn-primary btn-url">Ver esta póliza</a>
    </footer>
  </div>
</article>
