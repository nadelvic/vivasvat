<?php

// main menu items

$items = $site->find('home','about','classes','contact');

// only show the menu if items are available
if($items->isNotEmpty()):

?>

  <ul>
    <?php foreach($items as $item): ?>
    <li><a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>

<?php endif ?>

