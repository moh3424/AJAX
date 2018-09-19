<?php
require 'connexion.php';

extract($_POST);// fait $employe ='yakine'

// $_POST = array(
//     'employe' => 'yakine'
// );


$resultat = $pdo -> prepare("INSERT INTO employes (prenom) VALUE (:prenom)");

$resultat ->bindParam(':prenom', $employe, PDO::PARAM_STR);

if($resultat -> execute()){
    echo 'OK';
}else{
    echo 'ERREUR';
}