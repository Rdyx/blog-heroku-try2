<nav class="navbar navbar-inverse text-center">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="../../index.php">Accueil</a></li>
			<li><a href="/web/pages/liste.php">Liste des articles</a></li>

			<?php
				if ($_SESSION['nickname'] == 'Invité') { ?>
				<li><a href="/web/pages/login.php">Login</a></li>
			
			<?php
				} else { 
			?>
				<li><a href="/web/pages/post.php">Ecrire un article</a></li>
				<li><a href="/web/pages/disconnect.php">Se déconnecter</a></li>
			
			<?php
				};
			?>
		</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a>Bienvenue <?= $_SESSION['nickname']; ?> !</a></li>
		<form action="liste.php" method="post" class="navbar-form">
			<div class="form-group">
				<input type="text" class="form-control" name="search" id="search" placeholder="Rechercher un titre dans la liste..." size="35">
			</div>
			<button type="submit" class="btn btn-default">Rechercher</button>
		</form>
	</div>
</nav>