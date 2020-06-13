<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">
  <meta name="keywords" content="<?= $site->keywords()->html() ?>">

  <script src="https://use.typekit.net/ljr3wtp.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>

  <?= css('assets/style/main.css') ?>

</head>
<body>

  <header class="header cf" role="banner">
    <? snippet('menu') ?>
  </header>