// Fonction permettant de lancer les traitements à l'évènement "click". 
document.addEventListener("DOMContentLoaded", function(event){
	document.getElementById("submit").addEventListener('click', function(event){
		event.preventDefault(); // Annule le comportement initial du submit
		insertEmploye();
	});
	
	function insertEmploye(){
		http = new XMLHttpRequest();
		// On récupère un objet XMLHttpRequest qui nous permet de faire des requêtes HTTP.
		// if(!window.XMLHttpRequest){http = new ActiveXObject("Microsoft.XMLHTTP")}
		
		var info = document.getElementById('prenom');
		var prenom = info.value;
		// On récupère ce qui a été saisie dans le champs prenom
		console.log(prenom);
		
		var parameters = "employe=" + prenom;
		
		http.open("POST", "ajax.php", false);
		http.setRequestHeader('Content-type', "application/x-www-form-urlencoded");
		http.send(parameters);
		
		console.log(parameters);	
		//console.log(http.responseText);
		//console.log(http.readyState);
		
		if(http.readyState == 4 && http.status == 200){
			//https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
			console.log(http.responseText);
			if(http.responseText == 'OK'){
				document.getElementById("resultat").innerHTML = '<p style="background:green; color: white; padding: 5px">L\'employé a été enregistré</p>';
				document.getElementById("prenom").value='';
			}
		}
	}
});