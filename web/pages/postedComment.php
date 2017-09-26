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

		$comContent = htmlspecialchars($_POST['commentContent'], ENT_QUOTES);
		$id = htmlspecialchars($_GET['id'], ENT_QUOTES);

		if(empty($comContent) || strlen($comContent) > 250){
			$content = '<div class="row"><h1>Erreur !</h1><br> <a href="article.php?id='.$id.'">Retour</a></div>';
		} else {
			pg_query($dbconn, "INSERT INTO comments (com_content, com_art_oid, com_autor, com_date) VALUES ('".$comContent."', '".$id."', '".$_SESSION['nickname']."', '".date('d-m-Y à H:i')."')");
			header("refresh:5; url=article.php?id=".$id);
			$content = '<div class="row"><h1>Success !</h1><br>
						<p>Patientez 5 secondes ou cliquez sur le lien ci-dessous pour revenir à l\'article.</p></br>
					<a href="article.php?id='.$id.'"><p>Retour à l\'article</p></a></div>';
		};

		include ('../layout/layout_nolist.php');

	?>

</body>
</html>
