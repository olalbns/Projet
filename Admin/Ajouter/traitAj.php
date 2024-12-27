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
    
    $img = $_FILES['img'];
    $img2 = $_FILES['img2'];
    $img3 = $_FILES['img3'];

    $target_dir = "../../Assets/img_tel/";

    // Fonction pour gérer l'upload des fichiers
    function uploadImage($file, $target_dir) {
        $file_base = basename($file['name']);
        $target_file = $target_dir . $file_base;

        // Vérifier et effectuer l'upload
        if (!empty($file['name']) && move_uploaded_file($file["tmp_name"], $target_file)) {
            return $file_base;
        } else {
            return false; // Retourne false si l'upload échoue
        }
    }

    // Upload des trois images
    $img_base = uploadImage($img, $target_dir);
    $img2_base = uploadImage($img2, $target_dir);
    $img3_base = uploadImage($img3, $target_dir);

    // Vérifier si les uploads ont réussi
    if ($img_base && $img2_base && $img3_base) {
        // Préparer la requête avec des placeholders pour chaque champ
        $base = $con->prepare('INSERT INTO produit 
            (nom, img, img2, img3, processeur, prix, camera, ecran, ram, stockage, categorie, marque, autonomie, chargeur)
            VALUES 
            (:nom, :img, :img2, :img3, :processeur, :prix, :camera, :ecran, :ram, :stockage, :categorie, :marque, :autonomie, :chargeur)');

        // Exécuter la requête avec les données sécurisées
        $uti = $base->execute(array(
            'nom' => $nom,
            'img' => $img_base,
            'img2' => $img2_base,
            'img3' => $img3_base,
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
            header("location: ./");
            exit;
        } else {
            echo "Erreur lors de l'ajout du produit.";
        }
    } else {
        echo "Une ou plusieurs images n'ont pas pu être téléchargées.";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
?>
