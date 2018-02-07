<?php if(!empty($_SESSION['is_admin'])): ?>

  <a href="<?=ROOT_URL?>?p=admin&amp;a=editPost&amp;id=<?=$oPost->id?>"><button class="btn light-blue waves-effect waves-light">Modifier</button></a>
  <a href="<?=ROOT_URL?>?p=admin&amp;a=delete&amp;id=<?=$oPost->id?>"><button class="btn red waves-effect waves-light">Supprimer</button></a>

<?php endif ?>
