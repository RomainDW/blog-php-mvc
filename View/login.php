<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>
<div class="container">
  <div class="row">
  	<div class="col l4 m6 s12 offset-l4 offset-m3">
  		<div class="card-panel">
  			<div class="row">
  				<div class="col s6 offset-s3">
  					<img src="static/img/admin.png" alt="connexion" width="100%">
  				</div>
  			</div>

  			<h4 class="center-align">Se connecter</h4>

        <center>
          <?php require 'inc/msg.php' ?>
        </center>

  			<form method="post">
  				<div class="row">
  					<div class="input-field col s12">
  						<input type="email" id="email" name="email" required="required">
  						<label for="email">Adresse email</label>
  					</div>

  					<div class="input-field col s12">
  						<input type="password" id="password" name="password" required="required">
  						<label for="password">Mot de passe</label>
  					</div>
  				</div>

  				<center>
  					<button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
  						<i class="material-icons left">perm_identity</i>
  						Se connecter
  					</button>
  				</center>
  			</form>

  		</div>
      <center>
        <a href="<?=ROOT_URL?>blog_registration.html">Pas encore inscrit ?</a>
      </center>
  	</div>
  </div>
</div>
