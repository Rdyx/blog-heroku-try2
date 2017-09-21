<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>posted</title>
</head>
<body>
	<?php
	include ("web/layout/navbar.php");
	
	$dbconn = pg_connect('postgres://kcbynoltplfvnn:16b65a5cb5eb8f3dffcf23386e3854890484e7ba3874ec70db6df0411e0f8b6f@ec2-54-243-255-57.compute-1.amazonaws.com:5432/d2gh5poj295eo9');

	$result = pg_query($dbconn, 'select * from articles');

	$artTitle = htmlspecialchars($_POST['titre']);
	$artContent = htmlspecialchars($_POST['contenu']);

	echo $artTitle . ' ' . $artContent;

	if(!isset(htmlspecialchars($_POST['titre'])) || !isset(htmlspecialchars($_POST['contenu'])){
		echo "erreur";
	} else {
		// $push = "INSERT INTO articles (art_title, art_content) VALUES ('".$artTitle."', '".$artContent."')";
		// pg_query($dbconn, $push);
		echo "success";
	};
	include ('web/layout/layout.php');

	?>


</body>
</html>