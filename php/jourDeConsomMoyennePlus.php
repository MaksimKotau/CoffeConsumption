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
			<div class="panel panel-default">
				<div class="panel-heading">Rapport: "Consommation moyenne maximal"</div>
				<div class="panel-body">
					<p class="text-left">
						<?php
							//Trouvons le jour de la semaine qui a la moyenne de consommation la plus élevée
							$consomMax=0;
							$jourMax="";
							$consomMoyenne=0;
							foreach ($arrayStat as $jourKey => $jourValue){
								$nombre=0;
								$sum=0;
								foreach ($jourValue as $nomKey => $nomValue){
									$nombre++;
									$sum+=$nomValue;
								}
								$consomMoyenne=$sum/$nombre;
								if ($consomMoyenne>$consomMax){
									$consomMax=$consomMoyenne;
									$jourMax=$jourKey;
								}
							}
							echo "Le jour de la semaine qui a la moyenne de consommation la plus élevée est ".$jourMax." - ".number_format($consomMax,2,',',' ')." tasses.</p>";
						?>
					</p>
					<a href="../" class="btn btn-info mybtn" role="button">Page d'accueil</a>
				</div>
			</div>
		</div>
		<div class="navbar navbar-default navbar-fixed-bottom">
			<div class="container">
				<p class="navbar-text pull-left">© 2018 - Kotau Maksim </p>
			</div>
		</div>
	</body>
</html>