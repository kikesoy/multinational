<?php
  $contactMap = block_field( 'contact-map', false );
  $contactCity = block_field( 'contact-city', false );
  $contactAddress = block_field( 'contact-address', false );  
  $contactManager = block_field( 'contact-manager', false );
  $contactTime = block_field( 'contact-time', false );
  $contactEmail = block_field( 'contact-email', false );
  $contactPhone1 = block_field( 'contact-phone-1', false );
  $contactPhone2 = block_field( 'contact-phone-2', false );
  $contactPhone3 = block_field( 'contact-phone-3', false );
  $contactPhone4 = block_field( 'contact-phone-4', false );
  $contactPhone5 = block_field( 'contact-phone-5', false );
  $contactFax1 = block_field( 'contact-fax-1', false );
  $contactFax2 = block_field( 'contact-fax-2', false );
  $contactFax3 = block_field( 'contact-fax-3', false );
  $contactFax4 = block_field( 'contact-fax-4', false );
  $contactFax5 = block_field( 'contact-fax-5', false );
  $phoneArray = array();  
  $faxArray = array();
  $arrayLoop = function($arrayName){
    for ( $i = 0 ; $i < count($arrayName) ; $i++ ){
      if ( ! empty( $arrayName[$i] ) ) {
        echo '<a href="tel:'. filter_var ($arrayName[$i], FILTER_SANITIZE_NUMBER_INT) .'" class="d-block">' . $arrayName[$i] .'</a>';
      }
    }
  };
?>

<article class="contact-card">
  <iframe src="<?php echo $contactMap ?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen class="contact-card-map"></iframe>
  <section class="contact-card-info">
    <h5 class="contact-card-city">
      <?php echo $contactCity ?>
    </h5>
    <div class="contact-card-address">
    <i class="fas fa-map-marker-alt"></i> <span><?php echo $contactAddress ?></span>
    </div>
    <?php 
      if ( ! empty( $contactManager ) ) {
        echo '<div class="contact-card-manager"><i class="fas fa-user-circle"></i> 
        <span>'. $contactManager .'</span></div>';
      }
      if ( ! empty( $contactTime ) ) {
        echo '<div class="contact-card-time"><i class="fas fa-clock"></i> 
        <span>'. $contactTime .'</span></div>';
      }
      if ( ! empty( $contactEmail ) ) {
          echo '<div class="contact-card-email"><i class="fas fa-envelope-square"></i> 
          <a href="mailto:' . $contactEmail . '" target="_blank">' . $contactEmail . '</a></div>';
      }
      for ( $x = 1 ; $x < 6 ; $x++ ){
        $contactPhone = 'contactPhone'.$x;
        if (! (${$contactPhone} == "")){
          array_push($phoneArray,${$contactPhone});
        }
      }
      if (! empty($phoneArray)){
        echo '<div class="contact-card-phone"><i class="fas fa-phone-square-alt"></i><div>';
        print_r($arrayLoop($phoneArray));
        echo '</div></div>';
      }
      for ( $j = 1 ; $j < 6 ; $j++ ){
        $contactFax = 'contactFax'.$j;
        if (! (${$contactFax} == "")){
          array_push($faxArray,${$contactFax});
        }
      }
      if (! empty($faxArray)){
        echo '<div class="contact-card-fax"><i class="fas fa-fax"></i><div>';
        print_r($arrayLoop($faxArray));
        echo '</div></div>';
      }
    ?>
  </section>
</article>