

	<nav class="light-blue">
		<div class="container">
			<div class="nav-wrapper">

				<a href="<?=ROOT_URL?>?p=blog&amp;a=index" class="brand-logo">Billet simple pour l'Alaska</a>

				<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

				<ul class="right hide-on-med-and-down">
					<li class="<?php echo ($_GET['a']=="index")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=blog&amp;a=index">Accueil</a></li>
					<li class="<?php echo ($_GET['a']=="chapters")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=blog&amp;a=chapters">Chapitres</a></li>

					<?php if (empty($_SESSION['is_admin']) && empty($_SESSION['is_logged'])): ?>
					<li class="<?php echo ($_GET['a']=="login")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=blog&amp;a=login"><i class="material-icons">lock_open</i></a></li>
					<?php endif ?>

					<?php if (!empty($_SESSION['is_admin'])): ?>
					<li class="<?php echo ($_GET['a']=="edit")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=admin&amp;a=edit"><i class="material-icons">edit</i></a></li>
					<?php endif ?>

					<?php if (!empty($_SESSION['is_admin']) || !empty($_SESSION['is_logged'])): ?>
					<li><a href="<?=ROOT_URL?>?p=blog&amp;a=logout">Déconnexion</a></li>
					<?php endif ?>
				</ul>

				<ul class="side-nav" id="mobile-menu">
					<li class="<?php echo ($_GET['a']=="index")?"active" : ""; ?>"><a href="<?=ROOT_URL?>">Accueil</a></li>
					<li class="<?php echo ($_GET['a']=="chapters")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=blog&amp;a=chapters">Chapitres</a></li>

					<?php if (empty($_SESSION['is_admin']) || empty($_SESSION['is_logged'])): ?>
					<li class="<?php echo ($_GET['a']=="login")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=blog&amp;a=login">Connexion</a></li>
					<?php endif ?>

					<?php if (!empty($_SESSION['is_admin'])): ?>
					<li class="<?php echo ($_GET['a']=="edit")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=admin&amp;a=edit">edition</a></li>
					<?php endif ?>

					<?php if (!empty($_SESSION['is_admin']) || !empty($_SESSION['is_logged'])): ?>
					<li><a href="<?=ROOT_URL?>?p=blog&amp;a=logout">Déconnexion</a></li>
					<?php endif ?>
				</ul>

			</div>
		</div>
	</nav>
