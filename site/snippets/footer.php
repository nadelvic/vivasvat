<div class="footer-frame">
    
</div>

<footer class="footer container_12 fluid">

    <div class="offset_1 grid_9 m-offset_1 m_9 s_3 footer__content">
      <div class="footer__item">
      <?php 
          $cgv = $pages->find('cgv');

          if($cgv->isNotEmpty()){
          ?>
          <a <?php e($cgv->isOpen(), ' class="active"') ?> href="<?= $cgv->url() ?>"><?= $cgv->title()->html() ?></a>
        <?php
        }
        ?>
          <div class="text">
          <?= $site->Copyright() ?>
          </div>
      </div>   
    </div>

    <div class="footer__social-network grid_2 m_2 s_1">
    <a class="social-network" href="https://www.instagram.com/camour_s/">
      <img  src="<?php echo kirby()->urls()->assets() . '/images/Instagram_link_white.svg' ?>" alt="" />
      </a>

      <a class="social-network" href="https://www.facebook.com/camilleslmn75">
      <img  src="<?php echo kirby()->urls()->assets() . '/images/Facebook_link_white.svg' ?>" alt="" />
      </a>
    </div>
</footer>




<?= js([
  'assets/js/gsap/umd/gsap.js',
  'assets/js/vivasvat.js',
 
]) ?>


</body>

</html>