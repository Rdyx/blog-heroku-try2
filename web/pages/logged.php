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
	$pwd = strtoupper(hash('sha256', $_POST['pwd']));
	echo "name : $row[0] <br>";
	echo "test $pwd test ". $_POST['pwd'];
	$row2 = pg_fetch_row($test);
  echo "name : $row2[0]";

	if($_POST['pseudo'] == $row[0] && $pwd == $row[1]){
		$content = "GG";
	} else {
		$content = "nope";
	};

	include ('../layout/layout.php');
	?>

</body>
</html>