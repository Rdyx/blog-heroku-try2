<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

  <?php
  
  include ('../layout/navbar.php');

  header("refresh:5; url=../../index.php");
  $content = '<div class="row"><h1>Vous vous êtes déconnecté avec succès !</h1></br>
              <p>Patientez 5 secondes ou cliquez sur le lien ci-dessous pour revenir à la page d\'accueil.</p></br>
              <a href="../../index.php"><p>Retour à l\'accueil</p></a></div>';

  include ('../layout/layout_nolist.php');

  ?>

</body>
</html>