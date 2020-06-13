<nav role="navigation" class="Navigation">

  <ul class="menu cf">
    <? foreach($pages->listed() as $p): ?>
    <li>
      <a <? e($p->isOpen(), ' class="active"') ?> href="<?= $p->url() ?>"><?= $p->title()->html() ?></a>

      <? if(FALSE && $p->hasVisibleChildren()): ?>
      <ul class="submenu">
        <? foreach($p->children()->visible() as $p): ?>
        <li>
          <a href="<?= $p->url() ?>"><?= $p->title()->html() ?></a>
        </li>
        <? endforeach ?>
      </ul>
      <? endif ?>

    </li>
    <? endforeach ?>
  </ul>

</nav>