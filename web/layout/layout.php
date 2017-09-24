<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

// On s'amuse à créer quelques variables de session dans $_SESSION
$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;
?>

<div class="container text-center well well-sm" id="list-articles">
	<div class="col-xs-12">
		<ul class="pagination"></ul>
	</div>
	<div class="col-xs-offset-1 col-xs-10 list">
		<?php echo $content ?>
	</div>
</div>