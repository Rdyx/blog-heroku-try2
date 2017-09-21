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
  include ('web/bdd/linkbdd.php');

  $result = pg_query($dbconn, 'select * from articles');

  while($row = pg_fetch_row($result)){
    $content .= '<div class="row"><h1> '.$row[1].' </h1></div>';
    $content .= '<div class="row"><p> '.$row[2].' <p></div>';
  }

  include ('web/layout/layout.php');

  ?>


</body>
</html>