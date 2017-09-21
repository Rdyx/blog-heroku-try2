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

		if($artTitle == "" || $artContent == "" || strlen($artTitle) > 50 || strlen($artContent) > 500){
			$content = '<div class="row"><h1>Erreur !</h1> <br> <a href="logged.php">Retour</a></div>';
		} else {
			$push = "INSERT INTO articles (art_title, art_content) VALUES ('".$artTitle."', '".$artContent."')";
			pg_query($dbconn, $push);
			$content = '<div class="row"><h1>Success !</h1> <br> <a href="../../index.php">Retour à l\'index</a></div>';
		};

		include ('../layout/layout.php');

	?>

</body>
</html>