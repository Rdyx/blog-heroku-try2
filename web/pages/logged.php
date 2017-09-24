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

	$test = pg_query($dbconn, 'select * from admin');
	$row = pg_fetch_row($test);
	$pwd = strtoupper(hash('sha256', htmlspecialchars($_POST['pwd'])));
	$nick = htmlspecialchars($_POST['pseudo']);


	if(($nick == $row[0] || $nick == $row[3]) && $pwd == $row[1]){
		header("refresh:5; url=../../index.php");

		$content = '<div class="row"><h1>Vous vous êtes connecté avec succès !</h1></br>
					<p>Patientez 5 secondes ou cliquez sur le lien ci-dessous pour revenir à la page d\'accueil.</p></br>
					<a href="../../index.php">Retour à l\'accueil</a></div>';

		$_SESSION['nickname'] = $nick;
	} else {
		$content = '<div class="row"><h1>Mauvais identifiant(s) !</h1><br> <a href="login.php">Retour</a></div>';
	};

	include ('../layout/layout.php');
	?>

</body>
</html>