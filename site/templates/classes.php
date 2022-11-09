<?php snippet('header') ?>

<main id="class" class="main container_12 fluid" role="main"> <!-- Content Section -->

<div class="main-column grid_5 offset_2 m_7 s_4">
  <div class="main-column__title"><?= $page->leftColumnTitle() ?> 
  <a href="https://widget.fitogram.pro/vivasvat-yoga" target="°blank" class="vi-btn class"><?= $pages->find('home')->bouton() ?></a>
</div>

<?php foreach($page->children() as $day): ?>
<? if($day->hasChildren()): ?>

  <div class="main-column__day-separator">
    <div class="main-column__day-title">
      <?= $day->title() ?> 
    </div> 
  </div>
  <?php foreach($day->children() as $class): ?>
  <?php snippet('class', ['class' => $class]); ?>
  <?php endforeach ?>
  <?php endif; ?>
  <?php endforeach ?>
  </div>


  
<div class="right-column grid_3 m_5 s_4">
    <div class="right-column__title"><?= $page->rightColumnTitle() ?></div>

    <div class="right-column__container">
      <?= $page->rightColumnText()->kirbytext() ?>
    </div>
</div>
  
</main>



<?php snippet('footer') ?>