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
		

	$test = pg_query($dbconn, 'select * from admin');
	$row = pg_fetch_row($test);

		if($_SESSION['nickname'] == $row[0]){
			$content = '<div class="row">
			<h1>Post an article</h1>
				</div>
				<div class="row">
					<form action="posted.php" method="post">
						<div class="row ">
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
							<li>
								<select name="genre">
									<option>Essence</option>
									<option>Diesel</option>
									<option>Nucléaire</option>
									<option>Soleil</option>
									<option>Electrique</option>
								</select>
							</li>
							<li>Date de parution</li>
							<li>
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
							</li>
							<li>
								<select name="annee" id="annee">
								'.$content .= boucle(date('Y'), -10001).'
								</select>
							</li>
						</ul>
						</div>
						<div class="row">
						<br><input type="submit" value="Poster">
						</div>
					</form>
				</div>';
		} else {
			$content = '<div class="row"><h1>Erreur !</h1><br>
			Vous n\'avez pas les autorisations nécessaires !<br>
			<ul class="list-unstyled">
				<li><a href="login.php">Se connecter</a></li>
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

		include ('../layout/layout.php');
		?>

</body>
</html>