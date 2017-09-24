<?php
session_start();
if (!isset($_SESSION['nickname'])) {
  $_SESSION['nickname'] = 'Invité';
};
?>
<nav class="navbar navbar-inverse navbar-fixed-top text-center">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="../../index.php">Accueil</a></li>
			<li><a href="/web/pages/liste.php">Liste des articles</a></li>
			<li><a href="/web/pages/login.php">Login</a></li>
			<li>Bienvenue <?= $_SESSION['nickname']; ?> !</li>
		</ul>
		<form action="../../index.php" method="post" class="navbar-form navbar-right">
			<div class="form-group">
				<input type="text" class="form-control" name="search" id="search" placeholder="Rechercher dans les articles..." size="35">
			</div>
			<button type="submit" class="btn btn-default">Rechercher</button>
		</form>
	</div>
</nav>