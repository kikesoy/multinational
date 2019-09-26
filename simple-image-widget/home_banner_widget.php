<?php
/**
 * Default widget template.
 *
 * Copy this template to /simple-image-widget/widget.php in your theme or
 * child theme to make edits.
 *
 * @package   SimpleImageWidget
 * @copyright Copyright (c) 2015 Cedaro, LLC
 * @license   GPL-2.0+
 * @since     4.0.0
 */
?>
<div class="container">
  <div class="home-banner-container" style="background-image:url(<?php echo wp_get_attachment_image_url( $image_id, 'full' ); ?> );">
    <header class="home-banner-header">
      <?php
        if ( ! empty( $title ) ) :
          echo $before_title . $title . $after_title;
        endif;
      ?>
      <?php
        if ( ! empty( $text ) ) :
          echo wpautop( $text );
        endif;
      ?>
      <?php if ( ! empty( $link_text ) ) :?>
        <div>
          <?php
            echo $text_link_open;
            echo '<span class="btn-text">'.$link_text.'</span> <i class="fas fa-arrow-right"></i>';
            echo $text_link_close;
          ?>
        </div>
      <?php endif; ?>
    </header>
  </div>
</div>