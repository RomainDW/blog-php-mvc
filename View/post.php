<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>
<div class="container">

<!-- Article -->

<?php if (empty($this->oPost)): ?>
    <h1>cet article n'existe pas !</h1>
<?php else: ?>

    <article>
        <time datetime="<?=$this->oPost->createdDate?>" pubdate="pubdate"></time>

        <h1><?=htmlspecialchars($this->oPost->title)?></h1>
        <p><?=nl2br($this->oPost->body)?></p>
	</article>
	<hr>
	<p><em>Posté le <?=date('d/m/Y à H:i', strtotime($this->oPost->createdDate));?></em></p>
	<br>

<!-- Commentaires -->

	<h4 id="comment_ink">Commentaires :</h4>
	<?php if (empty($this->oComments)): ?>
	<p class="bold">Aucun commentaire n'a été publié... Soyez le premier!</p>
	<?php else: ?>

	<?php foreach ($this->oComments as $oComment): ?>

    <blockquote id="blockquote">
      <strong><?= $oComment->name ?> <em>(Le <?= date('d/m/Y', strtotime($oComment->date)) ?>)</em></strong>
      <p><?= nl2br($oComment->comment); ?></p>
    </blockquote>
    <?php if (!empty($_SESSION['is_admin'])): ?>
      <a href="<?=ROOT_URL?>?p=admin&amp;a=deleteComment&amp;id=<?=$oComment->id?>&amp;postid=<?=$this->oPost->id?>"><button class="btn red">Supprimer</button></a>
    <?php endif ?>

    <?php if(!empty($_SESSION['is_logged'])): ?>
      <?php $aIsSignaled = array(); ?>
      <?php foreach($this->oUserVotes as $key => $userVote): ?>
        <?php $aIsSignaled[] = $userVote->comment_id; ?>
      <?php endforeach ?>
      <?php if(!in_array($oComment->id ,$aIsSignaled)): ?>
        <?php $this->color = '' ;?>
      <?php endif ?>
      <form class="vote-form" action="?p=blog&a=signal&postid=<?=$this->oPost->id?>&commentId=<?=$oComment->id?>&vote=1" method="POST">
        <button class="btn red signal-btn <?= $this->color ?>" type="submit">Signaler</button>
      </form>
    <?php endif ?>

	<?php endforeach ?>
	<?php endif ?>
  <br>
  <hr>
  <br>

<!-- Formulaire -->
  <?php if(empty($_SESSION['is_logged']) && empty($_SESSION['is_admin'])): ?>
  <a href="<?=ROOT_URL?>?p=blog&amp;a=login"><button class="btn">Se connecter pour commenter</button></a>
  <br><br>
  <?php else: ?>
  <h4>Commenter :</h4>
	<?php require 'inc/msg.php' ?>
	<form method="post">
		<div class="row">
			<div class="input-field col s12">
				<textarea name="comment" id="comment" class="materialize-textarea"></textarea>
				<label for="comment">Commentaire</label>
			</div>
			<div class="col s12">
        <button type="submit" name="submit_comment" class="btn waves-effect">
  				Commenter
  			</button>
			</div>
		</div>
	</form>
  <?php endif ?>
<?php endif ?>
</div>
