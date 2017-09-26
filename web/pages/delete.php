<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>Post Article</title>
</head>
<body>
	<?php

	include('../layout/session.php');
	include ('../layout/navbar.php');

	$id = htmlspecialchars($_GET['id']);
	$connect = pg_query($dbconn, "SELECT adm_name FROM admin");
	$rowLog = pg_fetch_row($connect);
	$result = pg_query($dbconn, "SELECT * FROM articles WHERE art_oid = '".$id."'");
	$row = pg_fetch_row($result);

	if($_SESSION['nickname'] == $rowLog[0] || $_SESSION['nickname'] == $row[8]){
		pg_query($dbconn, "DELETE FROM articles WHERE art_oid = '".$id."'");
		pg_query($dbconn, "DELETE FROM comments WHERE com_art_oid = '".$id."'");

		header("refresh:5; url=../../index.php");
		$content .= '<div class="row"><h1>Article supprimé !</h1></br>
					<p>Votre article "<strong>'.$row[1].'</strong>" a bien été supprimé.</p></br>
					<p>Patientez 5 secondes ou cliquez sur le lien ci-dessous pour revenir à la page d\'accueil.</p></br>
					<a href="../../index.php"><p>Retour à l\'accueil</p></a></div>';
	} else {
		$content .= '<div class="row"><h1>Erreur !</h1><br>
					<p>Une erreur est survenue !</p><br>
					<a href="../../index.php"><p>Retour à l\'accueil</p></a></div>';
	};

	include ('../layout/layout_nolist.php');

	?>

</body>
</html>
