<nav class="navbar navbar-inverse text-center">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="../../index.php">Accueil</a></li>
			<li><a href="/web/pages/liste.php">Liste des articles</a></li>
			<li><a href="/web/pages/login.php">Login</a></li>
		</ul>
		<ul class="navbar-right">
		<li><a>Bienvenue <?= $_SESSION['nickname']; ?> !</a></li>
		<li>
		<form action="../../index.php" method="post" class="navbar-form">
			<div class="form-group">
				<input type="text" class="form-control" name="search" id="search" placeholder="Rechercher dans les articles..." size="35">
			</div>
			<button type="submit" class="btn btn-default">Rechercher</button>
		</form>
		</li>
	</div>
</nav>