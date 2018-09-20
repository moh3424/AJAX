// fonction permettant de lancer les traitements à l'evenement "click"./

$(document).ready(function(){

    // La suite sera éxécutée après l chargement dela page

    $("#submit").click(function(event){
        //On cible un evenement JS quel qu'il soit
        event.preventDefault(); // Annule le comportement initial du submit

        insertEmploye();// On lance la fonction que l'on souhaite éxécuter

    });

    function insertEmploye(){
       var prenom = $("#prenom").val();
       var nom = $("#nom").val();
       var sexe = $("#sexe").val();
       var service = $("#service").val();
       var salaire = $("#salaire").val();
       var parameters = { 
            'prenom': prenom,
            'nom' : nom,
            'sexe' : sexe,
            'service' : service,
            'salaire' : salaire,
       };
      
        // On récupère, ici, l'ID de la personne à suprrimer. On le fait grâce à la 'value de l'option selectionnée dans le champs id=employe
       $.post('ajax.php', parameters, function(data){
          
               $("#employe").html(data.resultat);    
               
               $("#prenom").val("");
               $("#nom").val("");
               $("#sexe").val("");
               $("#service").val("");
               $("#salaire").val("");
         
       }, 'json');
       /**
        * La fonction post() de jQuery, me permet de lancer une requête HTTP et transmettre des infos en post.
        * Nous souhaitons exécuté le fichier ajax.php et lui transmettre en post l'id ($_POSt['id] = 12)
        * La fonction post de jQuery récupère la réponse en troisième argument, et nous permet de la traiter dans une fonction
        * Cette fonction peut récupèrer la réponse afficher dans le fichier PHP, sous form d'un tableau JSON (data) qui contien des éléments (data.validation).
        * Le tableau data que l'on récupère correspond à l'array PHP qui a été encodé dans le fichier php (echo json_encode($tab))
        */
    }



}); /* fin $(document).ready(function() */