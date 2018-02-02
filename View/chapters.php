<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>

<div class="container">
  <h2>Liste des chapitres</h2>
  <?php foreach ($this->oChapters as $oChapter): ?>
    <div class="row">
			<div class="col s12 m12 l12">
				<h4><?= $oChapter->title ?></h4>
				<div class="row">
					<div class="col s12 m6 l8">
						<?= nl2br(htmlspecialchars(mb_strimwidth($oChapter->body, 0, 1200, '...'))) ?>...
					</div>
					<div class="col s12 m6 l4">
						<img src="<?=ROOT_URL?>static/img/posts/<?= $oChapter->image ?>" class="materialboxed responsive-img" alt="<?= $oChapter->title ?>"/>
						<br/><br/>
				  	<a class="btn light-blue waves-effect waves-light" href="<?=ROOT_URL?>?p=blog&amp;a=post&amp;id=<?=$oChapter->id?>">Lire le chapitre au complet</a>
					</div>
				</div>
			</div>
		</div>
  <?php endforeach ?>
</div>
