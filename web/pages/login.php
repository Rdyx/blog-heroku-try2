<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php include ('../layout/navbar.php');

	$content = '<form action="logged.php" method="post">
		<label for="pseudo">Pseudo</label>
		<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" value="ok" required>
		<label for="pwd">Mot de passe</label>
		<input type="text" id="pwd" name="pwd" placeholder="Mot de passe" value="lolilol" required>
		<input type="submit" value="Connexion">
	</form>';

	include ('../layout/layout.php');
	
	?>

</body>
</html>