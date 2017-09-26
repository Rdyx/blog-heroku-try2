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
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    $selectId = pg_query($dbconn, "SELECT * FROM articles WHERE art_oid = $id");

    if(!isset($id)){
      header("refresh:5; url=../../index.php");
      $content = '<div class="row"><h1>Erreur !</h1><br>
            <p>Patientez 5 secondes ou cliquez sur le lien ci-dessous pour revenir à la page d\'accueil.</p></br>
          <a href="../../index.php"><p>Retour à l\'accueil</p></a></div>';
    } else {
    $content = boucle($selectId, $rowLog[0]);
    };

      function boucle($arg1, $arg2){
    while($row = pg_fetch_row($arg1)){
      $content .= '<div class="row well well-lg article"><div class="row"><h1><strong id="titre">'.$row[1].'</strong></h1></div>';
      $content .= '<div class="row text-justify well"><p id="content">'.$row[3].'<p></div>';
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
                    <li><a href="#" alt="Back-To-The-Top !"><img alt="^" src="http://www.dema-france.com/global/img/puces/fleche-haut.png"></a></li>
                    <li> - </li>
                    <li><a href="" class="download"><button>Sauvegarder l\'article</button></a></li>
                  </ul>
                </div>
                </div>';
    }
    return $content;
  }

    include ('../layout/comments.php'); 
    include ('../layout/layout_nolist.php');

    ?>

  <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.js"></script>
<script src="../js/download.js"></script>
<script src="../js/list_com.js"></script>
  </body>
  </html>