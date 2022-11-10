<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

  <?= css('assets/style/main.css') ?>

  <script type="text/javascript">
  var onloadCallback = function() {
    grecaptcha.render('recaptcha', {
          'sitekey' : '6LdE7fUiAAAAAC6jRbHUQ-uzj9HDPgg1bb619WJ2'
        });
  };
  </script>
 

</head>
<body>

  <header class="header cf container_12 fluid" role="banner">
    <div class="header-left-container grid_4 m_4 s_1">
      <a class="social-network" href="https://www.instagram.com/camour_s/">
      <img  src="<?php echo kirby()->urls()->assets() . '/images/Instagram_link.svg' ?>" alt="" />
      </a>

      <a class="social-network" href="https://www.facebook.com/camilleslmn75">
      <img  src="<?php echo kirby()->urls()->assets() . '/images/Facebook_link.svg' ?>" alt="" />
      </a>

    </div>
    <div class="header-center-container grid_4 m_4 s_2">
      <div class="logo-container">
      <img  src="<?php echo kirby()->urls()->assets() . '/images/Vivasvat_logo.svg' ?>" alt="" />
      </div>
      <div class="site-title">
        <?= $site->title() ?>
      </div>

    </div>
     
    <div id="menus" class="header-right-container grid_4 m_4 s_1">
    <nav class="languages">
    <?php $languages = $kirby->languages() ?>
      <ul>
        <?php $language = $languages->find('fr') ?>
        <li<?php e($kirby->language() == $language, ' class="active"') ?>>
          <a href="<?php echo $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
          <?php echo html($language->code()) ?>
           </a>
        </li>
        <li>/</li>

       <?php $language = $languages->find('en') ?>
        <li<?php e($kirby->language() == $language, ' class="active"') ?>>
          <a href="<?php echo $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
          <?php echo html($language->code()) ?>
           </a>
       </li>



      </ul>
    </nav>
    <nav class="pages">
     <?php snippet('menu') ?>
     </nav>
    </div>

    <div id="burger-menu" class="burger-menu grid_4 m_4 s_1">
      <div class="burger-icon">
        <div class="line line1"></div>
        <div class="line line2"></div>
        <div class="line line3"></div>
      </div>
    </div>

    <div id="mobile-menu" class="mobile-menu">
      

      <nav class="pages">
        <? snippet('menu') ?>
      </nav>


      <nav class="languages">
      <?php $languages = $kirby->languages() ?>
        <ul>
          <?php $language = $languages->find('fr') ?>
          <li<?php e($kirby->language() == $language, ' class="active"') ?>>
            <a href="<?php echo $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
            <?php echo html($language->code()) ?>
            </a>
          </li>
          <li>/</li>

        <?php $language = $languages->find('en') ?>
          <li<?php e($kirby->language() == $language, ' class="active"') ?>>
            <a href="<?php echo $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
            <?php echo html($language->code()) ?>
            </a>
        </li>
        </ul>
      </nav>

    </div>


   
  </header>