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
  <br>
  <div class="row white z-depth-3">
    <div class="col s12">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a class="" href="#notSignaled"><strong>Non signalés</strong></a></li>
        <li class="tab"><a class="<?php echo ($this->aNbrSignals[0] > 0)?"active" : ""; ?>" href="#signaled"><strong>Signalés</strong></a></li>
      </ul>
    </div>
    <div id="notSignaled" class="col s12">
      <table class="centered bordered ">
      	<thead>
      		<tr>
      			<th>Article</th>
      			<th>Aperçu des commentaires</th>
      			<th>Actions</th>
      		</tr>
      	</thead>
      	<tbody>
      		<?php if(!empty($this->oComments)): ?>
      			<?php foreach($this->oComments as $comment): ?>
      				<tr id="commentaire_<?= $comment->id ?>">
      					<td><a href="blog_post_<?=$comment->post_id?>.html"><strong><?= $comment->title ?></strong></a></td>
      					<td><?= substr($comment->comment,0,100); ?></td>
      					<td>
      						<a id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light green see_comment"><i class="material-icons">done</i></a>
      						<a id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a>
      						<a href="#comment_<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more_vert</i></a>
      						<div class="modal" id="comment_<?= $comment->id ?>">
      							<div class="modal-content">
      								<h4><?= $comment->title ?></h4>
      								<p>Commentaire posté par <strong><?= $comment->pseudo.'</strong><br/>Le '.date('d/m/y à H:i', strtotime($comment->date)) ?></p>
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
              <td>Aucun commentaire à valider</td>
              <td></td>
            </tr>
          <?php endif ?>
      	</tbody>
      </table>
    </div>
    <div id="signaled" class="col s12">
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
      		<?php if(!empty($this->oSignaledComments)): ?>
      			<?php foreach($this->oSignaledComments as $signaledComment): ?>
      				<tr id="commentaire_<?= $signaledComment->id ?>">
      					<td><a href="blog_post_<?=$signaledComment->post_id?>.html"><strong><?= $signaledComment->title ?></strong></a></td>
      					<td><?= substr($signaledComment->comment,0,100); ?></td>
                <td><?= $signaledComment->signals ?></td>
      					<td>
      						<a id="<?= $signaledComment->id ?>" class="btn-floating btn-small waves-effect waves-light green see_comment"><i class="material-icons">done</i></a>
      						<a id="<?= $signaledComment->id ?>" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a>
      						<a href="#comment_<?= $signaledComment->id ?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">more_vert</i></a>
      						<div class="modal" id="comment_<?= $signaledComment->id ?>">
      							<div class="modal-content">
      								<h4><?= $signaledComment->title ?></h4>
      								<p>Commentaire posté par <strong><?= $signaledComment->pseudo.'</strong><br/>Le '.date('d/m/y à H:i', strtotime($signaledComment->date)) ?></p>
      								<hr>
      								<p><?= nl2br($signaledComment->comment) ?></p>
      							</div>
      							<div class="modal-footer">
      								<a id="<?= $signaledComment->id ?>" class="modal-action modal-close waves-effect waves-green btn-flat see_comment"><i class="material-icons">done</i></a>
      								<a id="<?= $signaledComment->id ?>" class="modal-action modal-close waves-effect waves-red btn-flat delete_comment"><i class="material-icons">delete</i></a>
      							</div>
      						</div>
      					</td>
      				</tr>
            <?php endforeach ?>
      		<?php else :?>
      				<tr>
                <td></td>
      					<td>Aucun commentaire à valider</td>
                <td></td>
                <td></td>
      				</tr>
          <?php endif ?>
      	</tbody>
      </table>
    </div>
  </div>




</div>
