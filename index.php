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

  $result = pg_query($dbconn, 'select * from articles');

  while($row = pg_fetch_row($result)){
    $content .= "Name : $row[0]  Pwd : $row[1]";
    $content .= "<br>";
  }

$content = '<div class="row">
    <h1>Post an article</h1>
      </div>
        <form action="" method="post">
          <label for="titre">Titre</label>
          <input type="text" name="titre" id="titre" placeholder="Titre" maxlength="50" required>
          <label for="contenu">Votre texte</label>
          <textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Votre texte..." maxlength="500" required></textarea>
          <input type="submit" value="Poster" id="postArt">
        </form>';

    $artTitle = htmlspecialchars($_POST['titre']);
    $artContent = htmlspecialchars($_POST['contenu']);

    pg_query($dbconn, 'INSERT INTO articles (art_oid, art_title, art_content) VALUES (not null, $artTitle, $artContent)');

  include ('web/layout/layout.php');
  ?>


</body>
</html>