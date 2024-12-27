<?php 
include('../Content/connect.php');

if(isset($_POST['nom'], $_POST['prenom'], $_POST['ville'], $_POST['pays'], $_POST['password'], $_POST['tel'], $_POST['email'])){
    // Nettoyer les données d'entrée
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $ville = htmlspecialchars(trim($_POST['ville']));
    $pays = htmlspecialchars(trim($_POST['pays']));
    $password = trim($_POST['password']); 
    $email = htmlspecialchars(trim($_POST['email']));
    $tel = htmlspecialchars(trim($_POST['tel']));

    

    // Préparer la requête avec des placeholders pour chaque champ
    $base = $con->prepare("INSERT INTO utilisateur (nom, prenom, ville, pays, password, tel, email) 
                           VALUES (:nom, :prenom, :ville, :pays, :password, :tel, :email)");

    // Exécuter la requête avec les données sécurisées
    $uti = $base->execute(array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':ville' => $ville,
        ':pays' => $pays,
        ':password' => $password,
        ':tel' => $tel,
        ':email' => $email
    ));

    session_start();
    // Vérification si l'insertion a été réussie
    if($uti){
        $userId = $con->lastInsertId();
 
        // Créer un cookie d'inscription pour la connexion automatique
        setcookie("Inscription", $userId, time() + (1000000 * 40), "/"); // Cookie actif pendant 1 minute (peut être ajusté)
        
        header ("location: ../Connexion/"); // Redirection vers la page de connexion
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur.";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
?>
