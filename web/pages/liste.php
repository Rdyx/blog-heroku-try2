<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

  <?php

  include ("../layout/navbar.php");
  include ('../bdd/linkbdd.php');

  $order = 'ORDER BY art_oid DESC';
  $result = pg_query($dbconn, "SELECT * FROM articles ".$order);
  $content = boucle($result);

    function boucle($arg1){
    while($row = pg_fetch_row($arg1)){
      $content .= '<div class="row"><h1> '.$row[1].' </h1></div>';
      $content .= '<div class="row"><p> '.$row[3].' <p></div>';
      $content .= '<div class="row text-right">
                  <ul class="list-inline">
                    <li><a href="?genre='.$row[4].'">Thème : '.$row[4].'</a></li>
                    <li> - </li>
                    <li><a href="?id='.$row[0].'">Voir les commentaires</a></li>
                  </ul>
                </div>';
    }
    return $content;
  }


  include ('../layout/layout.php');

?>


</body>
</html>
