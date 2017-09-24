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

  $colSelect = htmlspecialchars($_POST['colSelect']);
  $orderSelect = htmlspecialchars($_POST['orderSelect']);
  $order = "ORDER BY art_oid DESC";

  if($orderSelect == "Ordre croissant"){
  	if($colSelect == "Titre"){
  		$order = "ORDER BY art_title ASC";
  	} if($colSelect == "Résumé"){
  		$order = "ORDER BY art_content ASC";
  	} if($colSelect == "Thème"){
  		$order = "ORDER BY art_genre ASC"; 
  	} if($colSelect == "Date de parution"){
  		$order = "ORDER BY art_month ASC, art_year ASC";
  	}
  } if($orderSelect == "Ordre décroissant"){
  	  if($colSelect == "Titre"){
  		$order = "ORDER BY art_title DESC";
  	  } if($colSelect == "Résumé"){
  	  	$order = "ORDER BY art_content DESC";
  	  } if($colSelect == "Thème"){
  	  	$order = "ORDER BY art_genre DESC";
  	  } if($colSelect == "Date de parution"){
  	  	$order = "ORDER BY art_month DESC, art_year DESC";
  	  }
  }

  $result = pg_query($dbconn, "SELECT * FROM articles ".$order);
  $content = boucle($result);
  $searchInput = htmlspecialchars($_POST['search']);

  if(!empty($searchInput)){
    $result = pg_query($dbconn, "SELECT * FROM articles WHERE LOWER(art_title) LIKE '%".strtolower($searchInput)."%' ".$order);
  	$content = boucle($result);
    if(empty($content)){
      $content = '<div class="row"><h1>Désolé !</h1><div>';
      $content .= '<div class="row"><p>Il n\'existe aucun article contenant "<strong>'.$searchInput.'</strong>" !</p></div>';
    };
  };
  

    function boucle($arg1){
    	$content = 	'<div class="row">
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
            <a href="liste.php">Par défaut</a>
  				</form>
  			</div>';
  			
    	$content .= '<div class="row" id="tableArticles">
      <ul class="pagination"></ul>
    				<table class="row table-striped table-bordered table-responsive">
    					<tr>
    						<th class="text-center col-xs-3">Titre</th>
    						<th class="text-center col-xs-5">Résumé</th>
    						<th class="text-center col-xs-1">Thème</th>
    						<th class="text-center col-xs-1">Date de parution</th>
    						<th class="text-center col-xs-2">Date de l\'article</th>
    					</tr>
    					<tbody class="list">';

    while($row = pg_fetch_row($arg1)){
      $content .= '<tr class="articlex"><td>'.$row[1].'</td>';

      if(strlen($row[3]) > 70){
        $content .= '<td>'.substr($row[3], 0, 70).'...</td>';
      } else {
        $content .= '<td>'.$row[3].'</td>';
      };

      $content .= '<td>'.$row[4].'</td>';
      $content .= '<td>'.$row[5].'/'.$row[6].'</td>';
      $content .= '<td>'.$row[7].'</td>';
      $content .= '<td><a href="../../index.php?id='.$row[0].'">En savoir plus</a></td></tr>';
    }

    $content .= '</tbody>
    			</table>
    			</div>
          <div class="row">
            <a href="#" alt="Back-To-The-Top !"><img alt="^" src="http://www.dema-france.com/global/img/puces/fleche-haut.png"></a>
          </div>';

    return $content;
  }

  include ('../layout/layout_nolist.php');

?>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script src="../js/table-list.js"></script>
</body>
</html>
