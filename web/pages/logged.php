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
		$content = "GG";
	} else {
		$content = 'Mauvais identifiant(s) ! <br> <a href="login.php">Retour</a>';
	};

	include ('../layout/layout.php');
	?>

</body>
</html>