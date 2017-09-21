<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>Post Article</title>
</head>
<body>
		<?php include ('../layout/navbar.php');
		include ('../bdd/linkbdd.php');
		$test = pg_query($dbconn, 'select * from admin');
		$row = pg_fetch_row($test);
		$pwd = strtoupper(hash('sha256', htmlspecialchars($_POST['pwd'])));
		$nick = htmlspecialchars($_POST['pseudo']);

		if($nick == $row[0] && $pwd == $row[1]){
			$content = '<div class="row">
			<h1>Post an article</h1>
				</div>
					<form action="posted.php" method="post">
						<label for="titre">Titre</label>
						<input type="text" name="titre" id="titre" placeholder="Titre" maxlength="50" required>
						<label for="contenu">Votre texte</label>
						<textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Votre texte..." maxlength="500" required></textarea>
						<input type="submit" value="Poster" id="postArt">
					</form>';
		} else {
			$content = 'Mauvais identifiant(s) ! <br> <a href="login.php">Retour</a>';
		};

		include ('../layout/layout.php');
		?>
</body>
</html>