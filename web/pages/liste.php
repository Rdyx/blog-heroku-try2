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

  $colSelect = htmlspecialchars($_POST['colSelect']);
  $orderSelect = htmlspecialchars($_POST['orderSelect']);
  $order = "ORDER BY art_oid DESC";

  if($orderSelect == "Ordre croissant"){
  	if($colSelect == "Titre"){
  		$order = "ORDER BY art_title ASC";
  	} if($colSelect == "Résumé"){
  		$order = "ORDER BY art_content ASC";
  	} if($colSelect == "Thème"){
  		$order == "ORDER BY art_genre ASC"; 
  	} if($colSelect == "Date de parution"){
  		$order == "ORDER BY art_month ASC, art_year ASC";
  	};
  } if($orderSelect == "Ordre décroissant"){
  	  if($colSelect == "Titre"){
  		$order == "ORDER BY art_title DESC";
  	  } if($colSelect == "Résumé"){
  	  	$order == "ORDER BY art_content DESC";
  	  } if($colSelect == "Thème"){
  	  	$order == "ORDER BY art_genre DESC";
  	  } if($colSelect == "Date de parution"){
  	  	$order == "ORDER BY art_month DESC, art_year DESC";
  	  }
  }

  $result = pg_query($dbconn, "SELECT * FROM articles ".$order);
  $content = boucle($result);

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
	  					<button type="submit">Trier</button>
	  				</form>
	  			</div>';


  include ('../layout/layout.php');

?>


</body>
</html>
