<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

  <?php
  include ("web/layout/navbar.php");
  ?>



  <?php 
  
  $dbconn = pg_connect('postgres://kcbynoltplfvnn:16b65a5cb5eb8f3dffcf23386e3854890484e7ba3874ec70db6df0411e0f8b6f@ec2-54-243-255-57.compute-1.amazonaws.com:5432/d2gh5poj295eo9');

  $result = pg_query($dbconn, 'select * from admin');

  while($row = pg_fetch_row($result)){
    $content .= "Name : $row[0]  Pwd : $row[1]";
    $content .= "<br>";
  }

  $test = pg_query($dbconn, 'select adm_name from admin');
  $row2 = pg_fetch_row($test);
  echo "name : $row2[0]";

  include ('web/layout/layout.php');
  ?>


</body>
</html>