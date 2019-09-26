<?php
  $formUrl = block_field( 'product-form-url', false );
  $formTxt = block_field( 'product-form-text', false );
  $brochureUrl = block_field( 'product-brochure-url', false );
  $brochureTxt = block_field( 'product-brochure-text', false );
?>

<footer class="product-download">
  <?php 
    if ( get_post_meta( $post->ID, 'logo-prod', true )) :
      echo '<img src="'.get_post_meta( $post->ID, 'logo-prod', true ).'" class="product-logo"/>';
    else: 
      echo '<img src="'.get_bloginfo('stylesheet_directory').'/assets/images/logo-producto-generico.png" class="product-logo"/>';
   endif; 

    if ( ! empty( $formUrl )) :
        echo '<a href="' . $formUrl . '" class="btn-download product-form" target="_blank"><span class="btn-download-txt">' . $formTxt . '</span> <i class="fas fa-file-download"></i></a>';
    endif;

    if ( ! empty( $brochureUrl )) :
      echo '<a href="' . $brochureUrl . '" class="btn-download product-brochure" target="_blank"><span class="btn-download-txt">' . $brochureTxt . '</span> <i class="fas fa-file-download"></i></a>';
    endif;
  ?>
</footer>