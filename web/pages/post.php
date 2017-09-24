<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>Post Article</title>
</head>
<body>
	<?php 

	include('../layout/session.php');
	include ('../layout/navbar.php');
		
	$connect = pg_query($dbconn, "SELECT adm_name FROM admin");
    $rowLog = pg_fetch_row($connect);

		if($_SESSION['nickname'] == $rowLog[0]){
			$content = '<div class="row">
			<h1>Post an article</h1>
				</div>
				<div class="row">
					<form action="posted.php" method="post">
						<div class="row">
						<label for="titre">Titre</label>
						</div>
						<div class="row">
						<input type="text" name="titre" id="titre" placeholder="Titre" maxlength="50" size="50" required>
						</div>
						<div class="row">
						<label for="contenu">Votre texte</label>
						</div>
						<div class="row">
						<textarea name="contenu" id="contenu" cols="75" rows="10" placeholder="Votre texte..." maxlength="1000" required></textarea>
						</div>
						<div class="row">
						<ul class="list-inline">
							<li class="well">
								<p>Thème</p>
								<select name="genre">
									<option>Essence</option>
									<option>Diesel</option>
									<option>Nucléaire</option>
									<option>Soleil</option>
									<option>Electrique</option>
								</select>
							</li>
							<li class="well">
								<p>Date de parution :</p> 
								<select name="mois" id="mois">
									<option>01</option>
									<option>02</option>
									<option>03</option>
									<option>04</option>
									<option>05</option>
									<option>06</option>
									<option>07</option>
									<option>08</option>
									<option>09</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
								</select>
								<span>/</span>
								<select name="annee" id="annee">
								'.$content .= boucle(date('Y'), -1).'
								</select>
							</li>
						</ul>
						<br><input type="submit" value="Poster">
						</div>
					</form>
				</div>';
		} else {
			$content = '<div class="row"><h1>Erreur !</h1><br>
			<p>Vous n\'avez pas les autorisations nécessaires !</p><br>
			<ul class="list-inline">
				<li><a href="login.php">Se connecter</a></li>
				<li>-</li>
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