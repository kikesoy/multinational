<?php
  $jobName = block_field( 'empleo-cargo', false );
  $jobDescription = block_field( 'empleo-descripcion', false );
  $jobProfile = block_field( 'empleo-perfil', false );
  $jobEmail = block_field( 'empleo-email', false );
?>

<article class="job-opportunity">
  <h2 class="job-opportunity-title">
    <?php echo $jobName ?>
  </h2>
  <section class="job-opportunity-description">
    <h3 class="job-opportunity-section-title">
      Descripción:
    </h3>
    <?php echo $jobDescription ?>
  </section>
  <section class="job-opportunity-profile">
    <h3 class="job-opportunity-section-title">
      Perfil:
    </h3>
    <?php echo $jobProfile ?>
  </section>
  <a href="<?php echo $jobEmail ?>" class="btn btn-primary">
    <?php echo $jobEmail ?>
  </a>
</article>