<?php
include('../connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    
    // Préparer la requête avec des placeholders pour chaque champ
    $base = $con->prepare('INSERT INTO marque  (nom)
                           values (:nom)');

    // Exécuter la requête avec les données sécurisées
    $uti = $base->execute(array(
        'nom' => $nom,
    ));


    // Vérification si l'insertion a été réussie
    if ($uti) {
        header("location: ./");
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur.";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
