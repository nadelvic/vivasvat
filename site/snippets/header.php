<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

  <?= css('assets/style/main.css') ?>

</head>
<body>

  <header class="header cf" role="banner">
    <div class="header-left-container">

    </div>
    <div class="header-center-container">

    </div>
     
    <div class="header-right-container">
    <nav class="languages">
    <?php $languages = $kirby->languages() ?>
      <ul>
        <?php $language = $languages->find('fr') ?>
        <li<?php e($kirby->language() == $language, ' class="active"') ?>>
          <a href="<?php echo $language->url() ?>" hreflang="<?php echo $language->code() ?>">
          <?php echo html($language->code()) ?>
           </a>
        </li>
        <li>/</li>

       <?php $language = $languages->find('en') ?>
        <li<?php e($kirby->language() == $language, ' class="active"') ?>>
          <a href="<?php echo $language->url() ?>" hreflang="<?php echo $language->code() ?>">
          <?php echo html($language->code()) ?>
           </a>
       </li>



      </ul>
    </nav>
    <nav class="pages">
     <? snippet('menu') ?>
     </nav>
    </div>
   
  
  </header>