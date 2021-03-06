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
  include ('../layout/navbar_list.php');

  $colSelect = htmlspecialchars($_POST['colSelect'], ENT_QUOTES);
  $orderSelect = htmlspecialchars($_POST['orderSelect'], ENT_QUOTES);
  $connect = pg_query($dbconn, "SELECT adm_name FROM admin");
  $rowLog = pg_fetch_row($connect);
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
  $content = boucle($result, $rowLog[0]);
  $searchInput = htmlspecialchars($_POST['search'], ENT_QUOTES);

  if(!empty($searchInput)){
    $result = pg_query($dbconn, "SELECT * FROM articles WHERE LOWER(art_title) LIKE '%".strtolower($searchInput)."%' ".$order);
  	$content = boucle($result, $rowLog[0]);
    if(empty($content)){
      $content = '<div class="row"><h1>Désolé !</h1><div>';
      $content .= '<div class="row"><p>Il n\'existe aucun article contenant "<strong>'.$searchInput.'</strong>" !</p></div>';
    };
  };
  

    function boucle($arg1, $arg2){
    	$content = 	'<div class="row">
                    <ul class="list-inline">
                      <li>
            				    <form action="" method="post">
                          <ul class="list-inline">
                            <li>
              					      <select name="colSelect" id="colSelect">
                						    <option>Titre</option>
                						    <option>Résumé</option>
                						    <option>Thème</option>
                						    <option>Date de parution</option>
              					    </select>
                            </li>
                            <li>
                    					<select name="orderSelect" id="orderSelect">
                    						<option>Ordre croissant</option>
                    						<option>Ordre décroissant</option>
                    					</select>
                            </li>
                            <li></li>
                            <li>
                  					<input type="submit" value="Trier">
                            </li>
                          </ul>
              				  </form>
                      </li>
                      <li>
                        <a href="liste.php"><button>Par défaut</button></a>
                      </li>
                    </ul>
  			          </div>';
  			
    	$content .= '<div class="row" id="tableArticles">
      <ul class="pagination"></ul>
    				<table class="row table-striped table-bordered table-responsive">
    					<tr>
    						<th class="text-center">Titre</th>
    						<th class="text-center">Résumé</th>
    						<th class="text-center">Thème</th>
    						<th class="text-center">Date de parution</th>
    						<th class="text-center">Date de l\'article</th>
    					</tr>
    					<tbody class="list">';

    while($row = pg_fetch_row($arg1)){
      $content .= '<tr class="articlex"><td class="col-xs-2">'.$row[1].'</td>';

      if(strlen($row[3]) > 70){
        $content .= '<td class="col-xs-4">'.substr($row[3], 0, 70).'...</td>';
      } else {
        $content .= '<td class="col-xs-4">'.$row[3].'</td>';
      };

      $content .= '<td class="col-xs-1">'.$row[4].'</td>';
      $content .= '<td class="col-xs-1">'.$row[5].'/'.$row[6].'</td>';
      $content .= '<td class="col-xs-2">'.$row[7].'</td>';
      $content .= '<td class="col-xs-2"><a href="article.php?id='.$row[0].'">En savoir plus</a>';
      
      if($_SESSION['nickname'] == $arg2 || $_SESSION['nickname'] == $row[8]){
        $content .= '<ul class="list-inline">
                      <li><a href="modify.php?id='.$row[0].'"><img alt="edit" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgg_qIWXYRQEceGlHvFqC2xe1K3IZkHlYLJbq5zfD8k0N9wpDBcA"></a></li>
                      <li><a href="delete.php?id='.$row[0].'"><img alt="delete" src="http://www.lejournaldesarts.fr/images/entete/outils/popup_connexion_croix.gif"></a></li>
                    </ul>
                    </td></tr>';
      } else {
        $content .= '</td></tr>';
      };
    };

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
<script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.js"></script>
<script src="../js/table-list.js"></script>
</body>
</html>
