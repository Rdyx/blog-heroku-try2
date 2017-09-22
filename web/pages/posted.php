<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>posted</title>
</head>
<body>

	<?php 

		include ('../layout/navbar.php');
		include ('../bdd/linkbdd.php');

		$artTitle = htmlspecialchars($_POST['titre']);
		$artContent = htmlspecialchars($_POST['contenu']);
		$artGenre = htmlspecialchars($_POST['genre']);
		$artMois = htmlspecialchars($_POST['mois']);
		$artAnnee = htmlspecialchars($_POST['annee']);
		
		if(empty($artTitle) || empty($artContent) || strlen($artTitle) > 50 || strlen($artContent) > 1000 || $artMois <= 0 || $artMois > 12 || empty($artMois) || $artAnnee <= -10001 || $artAnnee > date('Y') || empty($artAnnee)){
			$content = '<div class="row"><h1>Erreur !</h1> <br> <a href="login.php">Retour</a></div>';
		} else {
			$pushIn = "INSERT INTO articles (art_title, art_content, art_genre, art_month, art_year) VALUES ('Le titre', 'Le content', 'Le genre', '01', '2017'";
			pg_query($dbconn, $pushIn);
			// pg_query($dbconn, "INSERT INTO articles (art_title, art_content, art_genre, art_month, art_year) VALUES ('".$artTitle."', '".$artContent."', '".$artGenre."', '".$artMois."', '".$artAnnee."'");
			$content = '<div class="row"><h1>Success !</h1> <br> <a href="../../index.php">Retour à l\'index</a></div>';
		};

		echo $artTitle.$artContent.$artGenre.$artMois.$artAnnee;
		include ('../layout/layout.php');

	?>

</body>
</html>