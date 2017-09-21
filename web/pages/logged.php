<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>Post Article</title>
</head>
<body>
	<?php include ('../layout/navbar.php');

	$test = pg_query($dbconn, 'select * from admin');
  $row = pg_fetch_row($test);
  echo "name : $row2[0]";

  if($_POST['pseudo'] == $row[0] && strtoupper(hash('sha256', $_POST['pwd'])) == $row[1]){
  	$content = "GG";
  } else {
  	$content = "nope";
  };

  include ('../layout/layout.php');
  ?>

</body>
</html>