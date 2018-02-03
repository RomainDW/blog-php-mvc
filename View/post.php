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
        <p><?=nl2br(htmlspecialchars($this->oPost->body))?></p>
	</article>
	<hr>
	<p><em>Posté le <?=date('d/m/Y à H:i', strtotime($this->oPost->createdDate));?></em></p>
	<br>

<!-- Commentaires -->

	<h4>Commentaires :</h4>
	<?php if (empty($this->oComments)): ?>
	<p class="bold">Aucun commentaire n'a été publié... Soyez le premier!</p>
	<?php else: ?>
	<?php foreach ($this->oComments as $oComment): ?>
    <blockquote id="blockquote">
      <strong><?= $oComment->name ?> <em>(Le <?= date('d/m/Y', strtotime($oComment->date)) ?>)</em></strong>
      <p><?= nl2br($oComment->comment); ?></p>
    </blockquote>
	<?php endforeach ?>
	<?php endif ?>
  <br>
  <hr>
  <br>

<!-- Formulaire -->

  <h4>Commenter :</h4>
	<?php require 'inc/msg.php' ?>
	<form method="post">
		<div class="row">
			<div class="input-field col s12 m6">
				<input type="text" name="name" id="name">
				<label for="name">Nom</label>
			</div>
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
</div>
