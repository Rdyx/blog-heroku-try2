<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php 
	include ('../layout/navbar.php');
	include('../layout/session.php');

	$content = '<div class="row"><h1>Login Admin</h1></div>
			<form action="logged.php" method="post">
				<div class="row">
				<label for="pseudo">Pseudo</label>
				</div>
				<div class="row">
				<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo ou Email" required>
				</div>
				<div class="row">
				<br>
				<label for="pwd">Mot de passe</label>
				</div>
				<div class="row">
				<input type="password" id="pwd" name="pwd" placeholder="Mot de passe" required>
				</div>
				<div class="row">
				<br>
				<input type="submit" value="Connexion">
				</div>
			</form>';

	include ('../layout/layout.php');

	?>

</body>
</html>