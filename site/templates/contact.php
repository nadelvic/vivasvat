<?php snippet('header') ?>

<main id="contact" class="main container_12 fluid" role="main">

        <div class="contact-form__container grid_4 offset_4 m_8 m-offset_2 s_4">


        <h1><?= $page->contentTitle()->html() ?></h1>

        <?php if($success): ?>
        <div class="alert success">
            <p><?= $success ?></p>
        </div>
        <?php else: ?>
        <?php if (isset($alert['error'])): ?>
            <div><?= $alert['error'] ?></div>
        <?php endif ?>

          <form id="vivasvat-form" method="post" action="<?= $page->url() ?>">

              <div class="field">
                  <label for="firstname">
                      Prénom
                  </label>
                  <input type="text" id="firstname" name="firstname" value="<?= $data['firstname'] ?? '' ?>" required>
                  <?= isset($alert['firstname']) ? '<span class="alert error">' . html($alert['firstname']) . '</span>' : '' ?>
              </div>
              
              <div class="field">
                  <label for="lastname">
                      Nom
                  </label>
                  <input type="text" id="lastname" name="lastname" value="<?= $data['lastname'] ?? '' ?>" required>
                  <?= isset($alert['lastname']) ? '<span class="alert error">' . html($alert['lastname']) . '</span>' : '' ?>
              </div>

              <div class="field">
                  <label for="email">
                      Email
                  </label>
                  <input type="email" id="email" name="email" value="<?= $data['email'] ?? '' ?>" required>
                  <?= isset($alert['email']) ? '<span class="alert error">' . html($alert['email']) . '</span>' : '' ?>
              </div>

              <div class="field">
                  <label for="text">
                      Message
                  </label>
                  <textarea id="text" name="text" rows="4" required>
                      <?= $data['text']?? '' ?>
                  </textarea>
                  <?= isset($alert['text']) ? '<span class="alert error">' . html($alert['text']) . '</span>' : '' ?>
              </div>

              <div class="field">
                <div id="recaptcha"></div>
     
              </div>

             <input type="submit" name="submit" value="<?= $page->buttonLabel() ?>">
          </form>
          <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
      async defer>
        </script>
          <?php endif ?>


        </div>
        
    </main>

</main>


  
<?php snippet('footer') ?>

