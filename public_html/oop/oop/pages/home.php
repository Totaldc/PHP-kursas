<?php
  $cruises_assoc_arr = FileDataBase::readJSON('cruises.json');
  $cruises = [];
  foreach ($cruises_assoc_arr as $cruise_assoc_arr) {
    $cruises[] = Cruise::createFromAssocArr($cruise_assoc_arr);
  }
  $cruisesGridVM = new CruiseCardGridViewModel(
    'Visi kruizai',
    $cruises
  );

?>

<div class="container">
  <h2>Home</h2>
  <?php $cruisesGridVM->render(); ?>
</div>