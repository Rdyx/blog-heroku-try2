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

    $id = htmlspecialchars($_GET['id']);



    include ('../layout/layout.php');

    ?>


  </body>
  </html>