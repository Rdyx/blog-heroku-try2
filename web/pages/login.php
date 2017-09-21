<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php include ('../layout/navbar.php');

	$content = '<form action="logged.php" method="post">
		<label for="pseudo">Pseudo</label>
		<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
		<label for="pwd">Mot de passe</label>
		<input type="password" id="pwd" name="pwd" placeholder="Mot de passe" required>
		<input type="submit" value="Connexion">
	</form>';

	include ('../layout/layout.php');

	?>

</body>
</html>