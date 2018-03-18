function functionSubmit(){
	var radioGroup=document.getElementsByName("rapports");
	var selectedRadio;
	//Recherchez le rapport que l'utilisateur a sélectionné.
	for (var i = 0, length = radioGroup.length; i < length; i++){
		if (radioGroup[i].checked){
			selectedRadio=radioGroup[i].value;
			break;
		}
	}
	//Ouvrez le fichier .php avec le rapport que l'utilisateur a sélectionné.
	document.getElementById("formRapport").action = "php/"+selectedRadio+".php";
	document.getElementById("formRapport").submit();
}