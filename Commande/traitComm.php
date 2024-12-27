<?php


 include('../Content/connect.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $nom = $_POST['nom'];


$base = $con->prepare("INSERT INTO commandes (nomCom) 
values (:nom)");

// Exécuter la requête avec les données sécurisées
$base->execute(array(
'nom' => $nom,

));

 }
?>