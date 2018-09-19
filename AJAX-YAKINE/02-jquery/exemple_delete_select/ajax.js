// Fonction permettant de lancer les traitements à l'évènement "click". 
$(document).ready(function(){
	// La suite sera éxécutée après le chargement de la page
	$("#submit").click(function(event){
		// on cible un evenement JS quel qu'il soit
		event.preventDefault(); // Annule le comportement initial du submit
		deleteEmploye(); // On lance la fonction que l'on souhaite éxécuter
	});
	
	function deleteEmploye(){
		var id = $("#employe").find(":selected").val(); 
		var parameters = 'id=' + id;
		// On récupérer, ici, l'ID de la personne à supprimer. On le fait grâce à la 'value' de l'option selectionnée dans le champs id=employe
		
		$.post('ajax.php', parameters, function(data){
			if(data.validation == 'OK'){
				$("#employe").html(data.resultat);
			}
		}, 'json');
		
		/*
		La fonction post() de Jquery, me permet de lancer une requête HTTP et transmettre des infos en post.
		Nous souhaitons exécuté le fichier ajax.php et lui transmettre en post l'id ($_POST['id'] = 12)
		La fonction post de Jquery récupère la réponse en troisième argument, et nous permet de la traiter dans une fonction
		Cette fonction peut récupérer la réponse afficher dans le fichier PHP, sous forme d'un tableau JSON (data) qui contient des éléments (data.validation). 
		Le tableau data que l'on récupère correspond à l'array PHP qui a été encodé dans le fichier php (echo json_encode($tab))
		*/
		
		
		
		
	}
});

