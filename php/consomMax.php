<?php error_reporting( E_ERROR ); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Rapports de café</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../styles/main.css">
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
			<div class="panel panel-default">
				<div class="panel-heading">Rapport: "Consommateur principal"</div>
				<div class="panel-body">
					<p class="text-left">
						<?php
							//Créez un tableau et remplissez-le avec des données sur la quantité de tasses de café consommées par chaque employé.
							$allConsomateurs= array();
							foreach ($arrayStat as $jourKey => $jourValue){
								foreach ($jourValue as $nomKey => $nomValue){
									if (array_key_exists($nomKey, $allConsomateurs)){
										$allConsomateurs[$nomKey]+=$nomValue;
									}else{
										$allConsomateurs[$nomKey]=$nomValue;
									}
								}
							}
							//Nous trouvons le consommateur maximal
							$maxCons=max($allConsomateurs);
							$nomCons=array_search($maxCons,$allConsomateurs);
							echo "Le plus grand consommateur de café au bureau: ".$nomCons." - ".$maxCons." tasses";
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