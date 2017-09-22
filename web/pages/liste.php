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
  $colSelect = htmlspecialchars($_POST['colSelect']);
  $orderSelect = htmlspecialchars($_POST['orderSelect']);

    function boucle($arg1){
    	$content .= '<div class="row"><table class="table-striped table-bordered table-responsive">
    					<tr>
    						<th class="text-center">Titre</th>
    						<th class="text-center">Résumé</th>
    						<th class="text-center">Thème</th>
    						<th class="text-center">Date de parution</th>
    						<th></th>
    					</tr>';

    while($row = pg_fetch_row($arg1)){
      $content .= '<tr><td>'.$row[1].'</td>';
      $content .= '<td>'.substr($row[3], 0, 70).'...</td>';
      $content .= '<td>'.$row[4].'</td>';
      $content .= '<td>'.$row[5].'/'.$row[6].'</td>';
      $content .= '<td><a href="../../index.php?id='.$row[0].'">En savoir plus</a></td></tr>';
    }

    $content .= '</table></div>';
    return $content;
  }

  if($colSelect == 'Titre'){
  	echo "test title test";
  }
  $content .= 	'<div class="row">
	  				<form action="" method="post">
	  					<select name="colSelect" id="colSelect">
	  						<option>Titre</option>
	  						<option>Résumé</option>
	  						<option>Thème</option>
	  						<option>Date de parution</option>
	  					</select>
	  					<select name="orderSelect" id="orderSelect">
	  						<option>Ordre croissant</option>
	  						<option>Ordre décroissant</option>
	  					</select>
	  					<button type="submit">
	  				</form>
	  			</div>';


  include ('../layout/layout.php');

?>


</body>
</html>
