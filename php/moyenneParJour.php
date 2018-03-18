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
		<div class="container mycont"> 
			<?php
				include_once "lectureDeFichier.inc";
				//Nous vérifions si le fichier a été ouvert. Sinon, nous imprimons l'erreur.
				if (!$arrayStat=getArrayOfConsomation()){
					printAlert("Aucun fichier de données trouvé.");
					exit;
				}
			?>
			<table class="table table-bordered table-striped">
				<caption class="text-center">La consommation moyenne de tasses de café par jour</caption>
				<thead>
					<tr>
						<th>Jour</th>
						<th>Tasses de café</th>
					</tr>
				</thead>
				<tbody>
					<?php
						//Nous trouvons et affichons la consommation moyenne par jour.
						foreach ($arrayStat as $jourKey => $jourValue){
							$nombre=0;
							$sum=0;
							foreach ($jourValue as $nomKey => $nomValue){
								$nombre++;
								$sum+=$nomValue;
							}
							echo "<tr><td>".$jourKey."</td><td>".number_format($sum/$nombre,2,',',' ')."</td></tr>";
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
		