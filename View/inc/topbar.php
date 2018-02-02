<nav class="light-blue">
	<div class="container">
		<div class="nav-wrapper">
			<a href="<?=ROOT_URL?>?p=blog&amp;a=index" class="brand-logo">Billet simple pour l'Alaska</a>

			<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

			<ul class="right hide-on-med-and-down">
				<li class="<?php echo ($_GET['a']=="index")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=blog&amp;a=index">Accueil</a></li>
				<li class="<?php echo ($_GET['a']=="list")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=blog&amp;a=list">Blog</a></li>
			</ul>

			<ul class="side-nav" id="mobile-menu">
				<li class="<?php echo ($_GET['a']=="index")?"active" : ""; ?>"><a href="<?=ROOT_URL?>">Accueil</a></li>
				<li class="<?php echo ($_GET['a']=="list")?"active" : ""; ?>"><a href="<?=ROOT_URL?>?p=blog&amp;a=list">Blog</a></li>
			</ul>

		</div>
	</div>
</nav>
