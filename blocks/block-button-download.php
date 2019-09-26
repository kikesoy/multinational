<?php
  $btnTxt = block_field( 'btn-txt', false );
  $btnUrl = block_field( 'btn-url', false );
?>

<a href="<?php echo $btnUrl ?>" class="btn-download" target="_blank"><span class="btn-download-txt"><?php echo $btnTxt ?></span> <i class="fas fa-file-download"></i></a>