<?php
	function getArrayOfConsomation(){
		if (!$fic=fopen("../files/programmeurs.txt","r")){
			return false;
		} 
		$arrayStat=array(
			"Lundi" => array(),
			"Mardi" => array(),
			"Mercredi" => array(),
			"Jeudi" => array(),
			"Vendredi" => array()
		);
		$ligne=fgets($fic);
		while (!feof($fic)){
			$tabDonnees=explode(";",$ligne);
			$arrayStat[(string)$tabDonnees[1]][(string)$tabDonnees[0]]=(integer)$tabDonnees[2];
			$ligne=fgets($fic);
		}
		fclose($fic);
		return $arrayStat;
	}
	function printAlert($messageOfAlert){
		echo "<div class=\"alert alertMois\">\n";
		echo "  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span> \n";
		echo "  $messageOfAlert\n";
		echo "</div>";
		echo '<a href="../" class="btn btn-info" role="button">Page d\'accueil</a>';
		echo '</div>';
		echo "<div class=\"navbar navbar-default navbar-fixed-bottom\">\n";
		echo "			<div class=\"container\">\n";
		echo "				<p class=\"navbar-text pull-left\">© 2018 - Kotau Maksim </p>\n";
		echo "			</div>\n";
		echo "		</div>";
		echo '</body>';
		echo '</html>';
	}
?>