<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>

<div class="container">
  <h2>Liste des chapitres</h2>
  <?php foreach ($this->oPosts as $oPost): ?>
    <div class="row">
			<div class="col s12 m12 l12">
				<h4><?= $oPost->title ?></h4>
				<div class="row">
					<div class="col s12 m6 l8">
						<?= nl2br(htmlspecialchars(mb_strimwidth($oPost->body, 0, 1200, '...'))) ?>...
            <br><br>
            <?php require 'inc/control_buttons.php' ?>
					</div>
					<div class="col s12 m6 l4">
						<img src="<?=ROOT_URL?>static/img/posts/<?= $oPost->image ?>" class="materialboxed responsive-img" alt="<?= $oPost->title ?>"/>
						<br/><br/>
				  	<a class="btn light-blue waves-effect waves-light" href="<?=ROOT_URL?>?p=blog&amp;a=post&amp;id=<?=$oPost->id?>">Lire le chapitre au complet</a>
					</div>
				</div>
			</div>
		</div>
  <?php endforeach ?>
</div>
