<?php

require 'connexion.php';

extract($_POST);

$resultat = $pdo -> prepare("INSERT INTO employes  (prenom, nom, sexe, service, salaire) VALUE (:prenom, :nom, :sexe, :service, :salaire)");

$resultat -> bindParam(':prenom', $prenom, PDO::PARAM_STR);
$resultat -> bindParam(':nom', $nom, PDO::PARAM_STR);
$resultat -> bindParam(':sexe', $sexe, PDO::PARAM_STR);
$resultat -> bindParam(':service', $service, PDO::PARAM_STR);
$resultat -> bindParam(':salaire', $salaire, PDO::PARAM_STR);

$resultat -> execute();

$resultat = $pdo -> query("SELECT * FROM employes");
$tab['resultat']='';
while($employes = $resultat -> fetch (PDO::FETCH_ASSOC)){
    $tab['resultat'] .='<tr>';
    $tab['resultat'] .= '<td>'. $employes['prenom'] .'</td>';
    $tab['resultat'] .= '<td>'. $employes['nom'] .'</td>';
    $tab['resultat'] .= '<td>'. $employes['sexe'] .'</td>';
    $tab['resultat'] .= '<td>'. $employes['service'] .'</td>';
    $tab['resultat'] .= '<td>'. $employes['salaire'] .'</td>';
    $tab['resultat'] .='</tr>';
}

// $tab['validation'] = 'OK';

echo json_encode($tab);