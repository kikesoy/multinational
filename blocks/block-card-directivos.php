<?php
  $dirInitials = block_field( 'director-initials', false );
  $dirName = block_field( 'director-name', false );
  $dirPosition = block_field( 'director-position', false );
  $dirResume = block_field( 'director-resume', false );
?>

<article class="director-card">
  <div class="wrapper">
  <header class="director-card-header" style="background-image:url('<?php bloginfo('stylesheet_directory'); ?>/assets/images/bg-corporative-header.jpg');">
    <div class="director-card-header-title">
      <?php echo $dirInitials ?>
    </div>
  </header>
  <section class="director-card-id">
    <h5 class="director-card-id-name">
      <?php echo $dirName ?>
    </h5>
    <h6 class="director-card-id-position">
      <?php echo $dirPosition ?>
    </h6>
  </section>
  <section class="director-card-resume">
    <?php echo $dirResume ?>
  </section>
  </div>
</article>