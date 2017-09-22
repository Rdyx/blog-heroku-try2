<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
	<meta charset="UTF-8">
	<title>Post Article</title>
</head>
<body>
		<?php 

		include ('../layout/navbar.php');
		include ('../bdd/linkbdd.php');

		$test = pg_query($dbconn, 'select * from admin');
		$row = pg_fetch_row($test);
		$pwd = strtoupper(hash('sha256', htmlspecialchars($_POST['pwd'])));
		$nick = htmlspecialchars($_POST['pseudo']);

		if(($nick == $row[0] || $nick == $row[3]) && $pwd == $row[1]){
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
								<input type="number" id="mois" name="mois" placeholder="Mois">
							</li>
							<li>
								<input type="number" id="annee" name="annee" placeholder="Année">
							</li>
						</ul>
						</div>
						<div class="row">
						<br><input type="submit" value="Poster">
						</div>
					</form>
				</div>';
		} else {
			$content = '<div class="row"><h1>Mauvais identifiant(s) !</h1><br> <a href="login.php">Retour</a></div>';
		};


		include ('../layout/layout.php');
		?>
</body>
</html>