<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>

<div class="container">
  <div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
      <div class="card-panel">
        <div class="row">
          <div class="col s6 offset-s3">
            <img src="static/img/admin.png" alt="registration" width="100%">
          </div>
        </div>
        <h4 class="center-align">Inscription</h4>
        <center>
          <?php require 'inc/msg.php' ?>
        </center>
        <form method="post">
          <div class="row">
            <div class="input-field col s12">
              <input type="email" name="email" id="email">
              <label for="email">Adresse email</label>
            </div>
            <div class="input-field col s12">
              <input type="text" name="pseudo" id="pseudo">
              <label for="pseudo">Pseudo</label>
            </div>
            <div class="input-field col s12">
              <input type="password" id="password" name="password">
              <label for="password">Mot de passe</label>
            </div>
            <div class="input-field col s12">
              <input type="password" name="password_again" id="password_again">
              <label for="password_again">Répéter le mot de passe</label>
            </div>
            <center>
                <button type="submit" name="submit" class="btn waves-effect waves-light light-blue">
                <i class="material-icons left">perm_identity</i>
                Inscription
                </button>
            </center>
          </div>
        </form>
      </div>
      <center>
        <a href="<?=ROOT_URL?>blog_login.html">Déjà inscrit ?</a>
      </center>
    </div>
  </div>
</div>
