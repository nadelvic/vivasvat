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
      <a class="social-network" href="https://www.instagram.com/camour_s/">
      <img  src="<?php echo kirby()->urls()->assets() . '/images/Instagram_link.svg' ?>" alt="" />
      </a>

      <a class="social-network" href="https://www.facebook.com/camilleslmn75">
      <img  src="<?php echo kirby()->urls()->assets() . '/images/Facebook_link.svg' ?>" alt="" />
      </a>

    </div>
    <div class="header-center-container">
      <div class="logo-container">
      <img  src="<?php echo kirby()->urls()->assets() . '/images/Vivasvat_logo.svg' ?>" alt="" />
      </div>
      <div class="site-title">
        <?= $site->title() ?>
      </div>

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