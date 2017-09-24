<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

  <?php

  include ('web/bdd/linkbdd.php');
  include('web/layout/session.php');
  include ('web/layout/navbar.php');

  $order = 'ORDER BY art_oid DESC';
  $result = pg_query($dbconn, "SELECT * FROM articles ".$order);
  $content = boucle($result);
  $connect = pg_query($dbconn, 'select * from admin');
  $rowLog = pg_fetch_row($connect);


  $searchInput = htmlspecialchars($_POST['search']);
  

  if(!empty($searchInput)){
    $search = pg_query($dbconn, "SELECT * FROM articles WHERE LOWER(art_title) LIKE '%".strtolower($searchInput)."%' ".$order);
    $content = boucle($search);
    if(empty($content)){
      $content = '<div class="row"><h1>Désolé !</h1><div>';
      $content .= '<div class="row"><p>Il n\'existe aucun article contenant "<strong>'.$searchInput.'</strong>" !</p></div>';
    };
  };


  $id = htmlspecialchars($_GET['id']);

  if(!empty($id)){
    $selectId = pg_query($dbconn, "SELECT * FROM articles WHERE art_oid = '".$id."' ".$order);
    $content = boucle($selectId);
    // include ('web/layout/comments.php'); 
  };


  $genre = htmlspecialchars($_GET['genre']);

  if(!empty($genre)){
    $selectTheme = pg_query($dbconn, "SELECT * FROM articles WHERE art_genre LIKE '".$genre."' ".$order);
    $content = boucle($selectTheme);  
  };

  function boucle($arg1){
    while($row = pg_fetch_row($arg1)){
      $content .= '<div class="row well well-lg article"><div class="row"><h1><strong> '.$row[1].' </strong></h1></div>';
      $content .= '<div class="row text-justify well"><p> '.$row[3].' <p></div>';
      $content .= '<div class="row text-center">';

      if($_SESSION['nickname'] == $rowLog[0]){
        var_dump('lol');
        $content .= '<div class="col-xs-12 text-right">
                    <ul class="list-inline">
                      <li><a href="web/pages/modify.php?id='.$row[0].'">Modifier</a></li>
                      <li><a href="web/pages/delete.php?id='.$row[0].'">Supprimer</a></li>
                    </ul>
                    </div>';
      };

      $content.= '<div class="col-xs-12 text-right"><p>Article écrit par '.$row[8].' le '.$row[7].'</p></div>
                  <ul class="list-inline">
                    <li>Date de parution de l\'ouvrage : <strong>'.$row[5].'/'.$row[6].'</strong></li>
                    <li> - </li>
                    <li>Thème : <a href="?genre='.$row[4].'"><strong>'.$row[4].'</strong></a></li>
                    <li> - </li>
                    <li><a href="?id='.$row[0].'">Voir les commentaires</a></li>
                    <li> - </li>
                    <li><a href="#" alt="Back-To-The-Top !"><img alt="^" src="http://www.dema-france.com/global/img/puces/fleche-haut.png"></a></li>
                  </ul>
                </div>
                </div>';
    }
    return $content;
  }

include ('web/layout/layout.php');

?>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script src="web/js/app.js"></script>
</body>
</html>