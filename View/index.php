<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>

<?php if (empty($this->oPosts)): ?>
    <h1>Il n'y a aucun article.</h1>
    <p><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blog&amp;a=add'" class="btn">Ajoutez votre premier article!</button></p>
<?php else: ?>
  <div class="container">
    <h1>Derniers Chapitres :</h1>
    <div class="row">

      <!-- ARTICLES -->
      <?php foreach ($this->oPosts as $oPost): ?>
        <div class="col l6 m6 s12">
          <div class="card">
            <div class="card-content">
              <h5><a class="grey-text text-darken-2" href="<?=ROOT_URL?>?p=blog&amp;a=post&amp;id=<?=$oPost->id?>"><?=htmlspecialchars($oPost->title)?></a></h5>
              <h6 class="grey-text">Le <?=date('d/m/Y à H:i', strtotime($oPost->createdDate));?></h6>
            </div>
            <div class="card-image waves-effect waves-block waves-light">
    					<img src="<?=ROOT_URL?>static/img/posts/<?= $oPost->image ?>" class="activator" alt="<?= $oPost->title ?>">
    				</div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
              <p><a href="<?=ROOT_URL?>?p=blog&amp;a=post&amp;id=<?=$oPost->id?>">Voir le chapitre au complet</a></p>
            </div>
            <div class="card-reveal">
    					<span class="card-title grey-text text-darken-4"><?= $oPost->title ?><i class="material-icons right">close</i></span>
    					<p><?= nl2br(htmlspecialchars(mb_strimwidth($oPost->body, 0, 1200, '...'))) ?>...</p>
    				</div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>

<?php endif ?>
