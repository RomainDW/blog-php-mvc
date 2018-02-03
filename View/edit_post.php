<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>

<div class="container">
  <?php require 'inc/msg.php' ?>
  <h1>Modifier l'article :</h1>
  <?php if (empty($this->oPost)): ?>
      <p class="error">Cet article n'existe pas !</p>
  <?php else: ?>
    <form method="post">
    	<div class="row">

    		<div class="input-field col s12">
    			<input type="text" name="title" id="title" value="<?=htmlspecialchars($this->oPost->title)?>" required="required">
    			<label for="title">Titre de l'article</label>
    		</div>

    		<div class="input-field col s12">
    			<textarea name="body" id="body" class="materialize-textarea" required="required"><?=htmlspecialchars($this->oPost->body)?></textarea>
    			<label for="content">Contenu de l'article</label>
    		</div>

    		<div class="col s6 right-align">
    			<br><br>
    			<button type="submit" class="btn" name="edit_submit">Modifier l'article</button>
    		</div>
    	</div>
    </form>
  <?php endif ?>
</div>
