<? snippet('header') ?>


<main class="main" role="main">
    <div class="text">
      <h1><?= $page->title()->html() ?></h1>
      <?= $page->text()->kirbytext() ?>
    </div>

    <hr>

  </main>

<? snippet('footer') ?>