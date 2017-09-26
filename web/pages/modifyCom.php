<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>Edit Article</title>
</head>
<body>
	<?php 

	include('../layout/session.php');
	include ('../layout/navbar.php');
	
	$id = htmlspecialchars($_GET['id'], ENT_QUOTES);
	$postId = htmlspecialchars($_GET['postId'], ENT_QUOTES);
	$connect = pg_query($dbconn, "SELECT adm_name FROM admin");
    $rowLog = pg_fetch_row($connect);
    $result = pg_query($dbconn, "SELECT * FROM comments WHERE com_oid = '".$postId."'");
	$row = pg_fetch_row($result);

		if($_SESSION['nickname'] == $rowLog[0] || $_SESSION['nickname'] == $row[3]){
			$content.= '</div>
      			<div class="col-xs-offset-1 col-xs-10 text-right"><p><strong>Ecrire un commentaire</strong></p>
			      <form action="modifiedCom.php?id='.$id.'&postId='.$postId.'" method="post">
			      	<ul class="list-unstyled">
			      		<li><textarea name="commentContent" id="contenu" cols="65" rows="3" placeholder="Votre texte..." maxlength="250">'.$row[1].'</textarea></li>
			      		<li><input type="submit" value="Poster"></li>
			      	</ul>
			      </form>
			  </div>
			</div>';
		} else {
			$content = '<div class="row"><h1>Erreur !</h1><br>
			<p>Vous n\'avez pas les autorisations nécessaires !</p><br>
			<ul class="list-inline">
				<li><a href="../../index.php">Retour à l\'acceuil</a></li>
			</ul>
			</div>';
		};

		function boucle($arg1, $arg2){
		    for($i = $arg1; $i > $arg2; $i--){
		      $content .= '<option>'.$i.'</option>';
		    }
		    return $content;
		  }

		include ('../layout/layout_nolist.php');
		?>

</body>
</html>