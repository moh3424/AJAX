<?php

require 'connexion.php';

extract($_POST);

$resultat = $pdo -> prepare("INSERT INTO employes  (prenom) VALUE (:prenom)");

$resultat -> bindParam(':prenom', $prenom, PDO::PARAM_INT);

$resultat -> execute();

$resultat = $pdo -> query("SELECT * FROM employes");
$tab['resultat']='';
while($employes = $resultat -> fetch (PDO::FETCH_ASSOC)){
    $tab['resultat'] .='<tr>';
    $tab['resultat'] .= '<td>'. $employes['id_employes'] .'</td>';
    $tab['resultat'] .= '<td>'. $employes['prenom'] .'</td>';
    $tab['resultat'] .='</tr>';
}

// $tab['validation'] = 'OK';

echo json_encode($tab);