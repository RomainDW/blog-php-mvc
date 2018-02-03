<?php require 'inc/header.php' ?>
<?php require 'inc/topbar.php' ?>

<div class="container">
  <?php if (empty($this->oPosts)): ?>
    <h1>Il n'y a aucun article.</h1>
    <p><button type="button" onclick="window.location='<?=ROOT_URL?>?p=admin&amp;a=add'" class="btn">Ajoutez votre premier article!</button></p>
  <?php else: ?>
  <h1>Edition</h1>

  <table class="striped responsive-table">
    <thead>
      <tr>
          <th>Titre</th>
          <th>Date</th>
          <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($this->oPosts as $oPost): ?>
        <tr>
          <td><?= $oPost->title ?></td>
          <td>Le <?= date('d/m/Y à H:i', strtotime($oPost->createdDate)); ?></td>
          <td>
            <a href="<?=ROOT_URL?>?p=admin&amp;a=editPost&amp;id=<?=$oPost->id?>"><button class="btn light-blue">Modifier</button></a>
            <a href="<?=ROOT_URL?>?p=admin&amp;a=delete&amp;id=<?=$oPost->id?>"><button class="btn light-blue">Supprimer</button></a>
            </form>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<?php endif ?>
