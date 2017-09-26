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
	$postId = htmlspecialchars($_GET['postId']);
	$connect = pg_query($dbconn, "SELECT adm_name FROM admin");
	$rowLog = pg_fetch_row($connect);
	$result = pg_query($dbconn, "SELECT * FROM comments WHERE com_oid = '".$postId."'");
	$row = pg_fetch_row($result);

	if($_SESSION['nickname'] == $rowLog[0] || $_SESSION['nickname'] == $row[3]){
		pg_query($dbconn, "DELETE FROM comments WHERE com_oid = '".$row[0]."'");

		header("refresh:5; url=article.php?id=".$id);
			$content = '<h1>Succès !</h1><br>
						<p>Votre commentaire "<strong>'.$row[1].'</strong>" a bien été supprimé.</p></br>
						<p>Patientez 5 secondes ou cliquez sur le lien ci-dessous pour revenir à l\'article.</p></br>
					<a href="article.php?id='.$id.'"><p>Retour à l\'article</p></a></div>';
	} else {
		$content .= '<div class="row"><h1>Erreur !</h1><br>
					<p>Une erreur est survenue !</p><br>
					<a href="../../index.php"><p>Retour à l\'accueil</p></a></div>';
	};

	include ('../layout/layout_nolist.php');

	?>

</body>
</html>
