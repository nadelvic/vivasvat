<?
if (!isset($class)) {
  $class = $object;
}
?>

<?php

$str = $class->available();
$classStatus = '';

if (preg_match('/yes|Yes|YES|Oui|OUI|oui|on|On|ON/i', $str)){
  $classStatus .='on';
} else {
  $classStatus .='off';
}
?>

<div class="class__container <?= $classStatus ?>">


  <div class="class__left-section">
    <div class="class__timestamp">
      <div class="class__start">
        <?= $class->start() ?>
      </div>
      <div class="class__end">
        <?= $class->end() ?>
      </div>
    </div>
    <div class="class__level-number">
      <?= $class->nbr() ?>
    </div>
  </div>

  <div class="class__main-section">
    <div class="class__title"> 
      <?= $class->title()->markdown() ?>
    </div>
    <hr>
    <div class="class__location">
      <div class="class__location-name">
        <?= $class->locationName() ?>
      </div>
      <div class="class__location-address">
        <?= $class->locationAddress() ?>
      </div>
    </div>
    <hr>
    <div class="class__description">
      <?= $class->text()->kirbytext() ?>
    </div>
  </div>

</div>



