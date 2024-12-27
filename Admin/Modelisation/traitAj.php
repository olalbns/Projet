<?php
include('../connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $info = $_POST['info'];
    $page = "Acceuil";
    $section = "1";
    

    $target_dir = "../../Assets/img_tel/";
    $target_file = $target_dir . basename($_FILES['img']['name']);
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        //header("location: ./");
        echo "deplacemen reussi";
    }else{
        echo "jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj";
    }
    // Préparer la requête avec des placeholders pour chaque champ
    $base = $con->prepare('INSERT INTO model  (nom,img,info,page,section)
                           values (:nom,:img,:info,:page,:section)');

    // Exécuter la requête avec les données sécurisées
    $uti = $base->execute(array(
        'nom' => $nom,
        'img' => $target_file,
        'info'=>$info,
        'page'=> $page,
        'section'=> $section,
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
