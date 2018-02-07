<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>

<div class="container">
  <h2>Tableau de bord</h2>
  <div class="row">
    <?php for($i=0;$i<$this->length;$i++): ?>
			<div class="col l3 m3 s12">
				<div class="card">
					<div class="card-content <?= $this->aColors[$i] ?> white-text">
						<span class="card-title"><?= $this->aTableName[$i] ?></span>
						<h4><?= $this->aInTable[$i][0] ?></h4>
					</div>
				</div>
			</div>
    <?php endfor ?>
  </div>

  <!-- ============================== -->

  <h4>Commentaires non lus</h4>

  <table class="centered bordered ">
  	<thead>
  		<tr>
  			<th>Article</th>
  			<th>Aperçu des commentaires</th>
        <th>Signalements</th>
  			<th>Actions</th>
  		</tr>
  	</thead>
  	<tbody>
  		<?php if(!empty($this->oComments)): ?>
  			<?php foreach($this->oComments as $comment): ?>
          <?php if($comment->signals > 0): ?>
          <?php $this->sYellow = 'yellow' ?>
          <?php else : ?>
          <?php $this->sYellow = '' ?>
          <?php endif ?>
  				<tr id="commentaire_<?= $comment->id ?>" class="<?= $this->sYellow ?>">
  					<td><?= $comment->title ?></td>
  					<td><?= substr($comment->comment,0,100); ?></td>
            <td><?= $comment->signals; ?></td>
  					<td>
  						<a id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light green see_comment"><i class="material-icons">done</i></a>
  						<a id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a>
  						<a href="#comment_<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more_vert</i></a>
  						<div class="modal" id="comment_<?= $comment->id ?>">
  							<div class="modal-content">
  								<h4><?= $comment->title ?></h4>
  								<p>Commentaire posté par <strong><?= $comment->name.'</strong><br/>Le '.date('d/m/y à H:i', strtotime($comment->date)) ?></p>
  								<hr>
  								<p><?= nl2br($comment->comment) ?></p>
  							</div>
  							<div class="modal-footer">
  								<a id="<?= $comment->id ?>" class="modal-action modal-close waves-effect waves-green btn-flat see_comment"><i class="material-icons">done</i></a>
  								<a id="<?= $comment->id ?>" class="modal-action modal-close waves-effect waves-red btn-flat delete_comment"><i class="material-icons">delete</i></a>
  							</div>
  						</div>
  					</td>
  				</tr>
        <?php endforeach ?>
  		<?php else :?>
  				<tr>
  					<td></td>
  					<td><center>Aucun commentaire à valider</center></td>
  				</tr>
      <?php endif ?>
  	</tbody>
  </table>

</div>
