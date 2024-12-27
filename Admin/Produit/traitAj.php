<?php
include('../connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $processeur = $_POST['processeur'];
    $prix = $_POST['prix'];
    $camera = $_POST['camera'];
    $ecran = $_POST['ecran'];
    $ram = $_POST['ram'];
    $stockage = $_POST['stockage'];
    $categorie = $_POST['categorie'];
    $marque = $_POST['marque'];
    $autonomie = $_POST['autonomie'];
    $chargeur = $_POST['chargeur'];
    
    $file_base= basename($_FILES['img']['name']);
    $target_dir = "../../Assets/img_tel/";
    $target_file = $target_dir . basename($_FILES['img']['name']);
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        header("location: ./");
    }else{
        echo "jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj";
    }
    // Préparer la requête avec des placeholders pour chaque champ
    $base = $con->prepare('INSERT INTO produit  (nom,img,processeur,prix,camera,ecran,ram,stockage,categorie,marque,autonomie,chargeur)
                           values (:nom,:img,:processeur,:prix,:camera,:ecran,:ram,:stockage,:categorie,:marque,:autonomie,:chargeur)');

    // Exécuter la requête avec les données sécurisées
    $uti = $base->execute(array(
        'nom' => $nom,
        'img' => $file_base,
        'processeur' => $processeur,
        'prix' => $prix,
        'camera' => $camera,
        'ecran' => $ecran,
        'ram' => $ram,
        'stockage' => $stockage,
        'categorie' => $categorie,
        'marque' => $marque,
        'autonomie' => $autonomie,
        'chargeur' => $chargeur,
    ));

    // Vérification si l'insertion a été réussie
    if ($uti) {
        echo "jjpjjl";
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur.";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
