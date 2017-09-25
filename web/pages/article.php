  <!DOCTYPE html>
  <html lang="en">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <head>
    <meta charset="UTF-8">
    <title>Document</title>
  </head>
  <body>

    <?php

    include('../layout/session.php');
    include ('../layout/navbar.php');

    $connect = pg_query($dbconn, "SELECT adm_name FROM admin");
    $rowLog = pg_fetch_row($connect);
    $id = htmlspecialchars($_GET['id']);
    $selectId = pg_query($dbconn, "SELECT * FROM articles WHERE art_oid = '".$id."' ".$order);
    $content = boucle($selectId, $rowLog[0]);
    include ('../layout/comments.php'); 

      function boucle($arg1, $arg2){
    while($row = pg_fetch_row($arg1)){
      $content .= '<div class="row well well-lg article"><div class="row"><h1><strong>'.$row[1].'</strong></h1></div>';
      $content .= '<div class="row text-justify well"><p> '.$row[3].' <p></div>';
      $content .= '<div class="row text-center">';

      if($_SESSION['nickname'] == $arg2 || $_SESSION['nickname'] == $row[8]){
        $content .= '<div class="col-xs-12 text-right">
                    <ul class="list-inline">
                      <li><a href="modify.php?id='.$row[0].'">Modifier</a></li>
                      <li><a href="delete.php?id='.$row[0].'">Supprimer</a></li>
                    </ul>
                    </div>';
      };

      $content.= '<div class="col-xs-12 text-right"><p>Article écrit par '.$row[8].' le '.$row[7].'</p></div>
                  <ul class="list-inline">
                    <li>Date de parution de l\'ouvrage : <strong>'.$row[5].'/'.$row[6].'</strong></li>
                    <li> - </li>
                    <li>Thème : <a href="?genre='.$row[4].'"><strong>'.$row[4].'</strong></a></li>
                    <li> - </li>
                    <li><a href="article.php?id='.$row[0].'">Voir les commentaires</a></li>
                    <li> - </li>
                    <li><a href="#" alt="Back-To-The-Top !"><img alt="^" src="http://www.dema-france.com/global/img/puces/fleche-haut.png"></a></li>
                  </ul>
                </div>
                </div>';
    }
    return $content;
  }
    include ('../layout/layout_nolist.php');

    ?>


  </body>
  </html>