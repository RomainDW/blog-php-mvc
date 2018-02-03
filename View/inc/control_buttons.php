<?php if(!empty($_SESSION['is_logged'])): ?>

  <a href="<?=ROOT_URL?>?p=admin&amp;a=editPost&amp;id=<?=$oPost->id?>"><button class="btn light-blue">Modifier</button></a>
  <a href="<?=ROOT_URL?>?p=admin&amp;a=delete&amp;id=<?=$oPost->id?>"><button class="btn light-blue">Supprimer</button></a>

<?php endif ?>
