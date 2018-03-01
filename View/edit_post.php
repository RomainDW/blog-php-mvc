<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>

<div class="container">
  <?php require 'inc/msg.php' ?>

  <?php if (empty($this->oPost)): ?>
      <p class="error">Cet article n'existe pas !</p>
  <?php else: ?>
    <h1>Modifier l'article :</h1>
    <form method="post" enctype="multipart/form-data">
    	<div class="row">

    		<div class="input-field col s12">
    			<input type="text" name="title" id="title" value="<?=htmlspecialchars($this->oPost->title)?>" required="required">
    			<label for="title">Titre de l'article</label>
    		</div>

    		<div class="input-field col s12">
          <label for="editable">Contenu de l'article</label>
          <br>
    			<textarea name="body" id="editable" class="materialize-textarea"><?=$this->oPost->body?></textarea>
    		</div>

        <div class="col s6 left-align">
    			<br><br>
          <div class="input-field file-field">
    				<div class="btn light-blue">
    					<span>Modifier l'image</span>
    					<input type="file" name="image">
    				</div>
    				<div class="file-path-wrapper">
    					<input type="text" class="file-path validate" readonly>
    				</div>
    			</div>
    		</div>

    		<div class="col s6 right-align">
    			<br><br>
    			<button type="submit" class="btn light-green waves-effect waves-light" name="edit_submit">Confirmer</button>
    		</div>
    	</div>
    </form>
  <?php endif ?>
</div>
