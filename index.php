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


  $result = pg_query($dbconn, 'SELECT * FROM articles');
  $content = boucle($result);
  
  $searchInput = htmlspecialchars($_POST['search']);
  

  if(!empty($searchInput)){
    $search = pg_query($dbconn, "SELECT * FROM articles WHERE art_title LIKE '%".$searchInput."%' OR art_content LIKE '%".$searchInput."%'");
    $content = boucle($search);
  };


  $id = htmlspecialchars($_GET['id']);

  if(!empty($id)){
    $selectId = pg_query($dbconn, "SELECT * FROM articles WHERE art_oid = '".$id."'");
    $content = boucle($selectId);  
  };


  $genre = htmlspecialchars($_GET['genre']);

  if(!empty($genre)){
    $selectTheme = pg_query($dbconn, "SELECT * FROM articles WHERE art_genre LIKE '".$genre."'");
    $content = boucle($selectTheme);  
  };

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


include ('web/layout/layout.php');

?>


</body>
</html>