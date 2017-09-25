<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>posted</title>
</head>
<body>

	<?php 

	include('../layout/session.php');
	include ('../layout/navbar.php');

		$artTitle = $_POST['titre'];
		$artContent = $_POST['contenu'];
		$artGenre = $_POST['genre'];
		$artMois = $_POST['mois'];
		$artAnnee = $_POST['annee'];
		$id = htmlspecialchars($_GET['id']);


		if(empty($artTitle) || empty($artContent) || strlen($artTitle) > 50 || strlen($artContent) > 1000 || $artMois <= 0 || $artMois > 12 || empty($artMois) || $artAnnee <= -10001 || $artAnnee > date('Y') || empty($artAnnee)){
			$content = '<div class="row"><h1>Erreur !</h1> <br> <a href="post.php">Retour</a></div>';
		} else {
			pg_query($dbconn, "UPDATE articles 
								SET art_title = '".$artTitle."' 
								WHERE 
								art_oid = '".$id."'");

			header("refresh:5; url=../../index.php");
			$content = '<div class="row"><h1>Success !</h1><br>
						<p>Patientez 5 secondes ou cliquez sur le lien ci-dessous pour revenir à la page d\'accueil.</p></br>
					<a href="../../index.php"><p>Retour à l\'accueil</p></a></div>';
		};
		
		include ('../layout/layout_nolist.php');

	?>

</body>
</html>