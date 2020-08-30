<? snippet('header') ?>

  <main id="home" class="main" role="main"> <!-- Content section -->
      <div class="home-top-section container_12 fluid">
        <div class="home-top-section__left grid_7 m_7 s_4">

          <div class="quote-container">
            <div class="quote-text-container">
              <div class="quote-text">
                <?= $page->Quote() ?>
              </div>
              <div class="quote-author">
              <?= $page->quoteAuthor() ?>
              </div>
            </div>
          </div>

        </div>

        <div class="home-top-section__right grid_4 offset_1 m_4 m-offset_1 s_4">
          <div class="cover-container">
            <img src="<?= $page->image()->url()?>" alt="" />
          </div>

        </div>
        

       
      </div>

      <div class="home-bottom-section container_12 fluid">
        <div class="landing-text grid_5 offset_2 m_5 m-offset_2 s_4">
          <?= $page->text()->kirbytext() ?>
        </div>
        
       
      </div>
  </main>

<? snippet('footer') ?>