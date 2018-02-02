<?php require 'inc/header.php' ?>

<?php if (empty($this->oPosts)): ?>
    <p class="bold">Il n'y a aucun article.</p>
    <p><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blog&amp;a=add'" class="bold">Ajoutez votre premier article!</button></p>
<?php else: ?>

    <?php foreach ($this->oPosts as $oPost): ?>
        <h1><a href="<?=ROOT_URL?>?p=blog&amp;a=post&amp;id=<?=$oPost->id?>"><?=htmlspecialchars($oPost->title)?></a></h1>

        <p><?=nl2br(htmlspecialchars(mb_strimwidth($oPost->body, 0, 100, '...')))?></p>
        <p><a href="<?=ROOT_URL?>?p=blog&amp;a=post&amp;id=<?=$oPost->id?>">Voir plus</a></p>
        <p class="left small italic">Posté le <?=date('d/m/Y à H:i', strtotime($oPost->createdDate));?></p>



        <hr class="clear" /><br />
    <?php endforeach ?>

<?php endif ?>
