<?php
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

  include('../layout/session.php');
  include ('../layout/navbar.php');

  $id = htmlspecialchars($_GET['id']);

  $content = '<div class="row"><h1>Vous vous êtes déconnecté avec succès !</h1>
              <a href="../../index.php">Retour à l\'accueil</a></div>'

  include ('../layout/layout.php');

  ?>

</body>
</html>