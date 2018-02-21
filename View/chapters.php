<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>
<main>
  <div class="container">
    <h1 class="page-title">Liste des chapitres</h1>
    <?php foreach ($this->oPosts as $oPost): ?>
      <div class="row">
        <hr>
  			<div class="col s12 m12 l12">
  				<h4><?= $oPost->title ?></h4>
  				<div class="row">
  					<div class="col s12 m6 l8">
              <!-- On affiche les 1200 premiers caractères et on affiche pas les images -->
  						<?= preg_replace("/<img[^>]+\>/i", "", nl2br(mb_strimwidth($oPost->body, 0, 800, '...'))); ?>
              <br><br>
              <?php require 'inc/control_buttons.php' ?>
  					</div>
  					<div class="col s12 m6 l4">
  						<img src="<?=ROOT_URL?>static/img/posts/<?= $oPost->image ?>" class="materialboxed responsive-img" alt="<?= $oPost->title ?>"/>
  						<br/><br/>
  				  	<a class="btn light-blue waves-effect waves-light" href="<?=ROOT_URL?>blog_post_<?=$oPost->id?>.html">Lire le chapitre</a>
  					</div>
  				</div>
  			</div>
  		</div>
    <?php endforeach ?>
  </div>
</main>
<?php require 'inc/footer.php' ?>
