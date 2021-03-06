<?php error_reporting( E_ERROR ); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Rapports de café</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../styles/main.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header class="container backImage">
			<h1>Café rapports</h1>
		</header>
		<div class="container">            
			<?php
				include_once "lectureDeFichier.inc";
				//Nous vérifions si le fichier a été ouvert. Sinon, nous imprimons l'erreur.
				if (!$arrayStat=getArrayOfConsomation()){
					printAlert("Aucun fichier de données trouvé.");
					exit;
				}
			?>
			<table class="table table-bordered table-striped">
				<caption class="text-center">Table de consommation en <?php print $_POST['jour'] ?></caption>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Tasses de café</th>
					</tr>
				</thead>
				<tbody>
				<?php
					//Afficher consomation par jour choisi
					foreach ($arrayStat[$_POST['jour']] as $nomKey => $nomValue){
						echo "<tr><td>$nomKey</td><td>$nomValue</td></tr>";
					}
				?>
				</tbody>
			</table>
			<a href="../" class="btn btn-info" role="button">Page d'accueil</a>
		</div>
		<div class="navbar navbar-default navbar-fixed-bottom">
			<div class="container">
				<p class="navbar-text pull-left">© 2018 - Kotau Maksim </p>
			</div>
		</div>
	</body>
</html>
		