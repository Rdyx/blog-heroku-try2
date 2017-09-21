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
				<form action="" method="post">
					<label for="titre">Titre</label>
					<input type="text" name="titre" id="titre" placeholder="Titre" maxlength="50" required>
					<label for="contenu">Votre texte</label>
					<textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Votre texte..." maxlength="500" required></textarea>
					<input type="submit" value="Poster" id="postArt">
				</form>';

		$artTitle = htmlspecialchars($_POST['titre']);
		$artContent = htmlspecialchars($_POST['contenu']);

		pg_query($dbconn, 'INSERT INTO articles (art_oid, art_title, art_content) VALUES (not null, $artTitle, $artContent)');
} else {
	$content = 'Mauvais identifiant(s) ! <br> <a href="login.php">Retour</a>';
};

include ('../layout/layout.php');
?>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="../js/app.js"></script>
</body>
</html>