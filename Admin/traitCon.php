<?php
session_start(); // Démarrer la session

// Inclure le fichier de connexion à la base de données
include('connect.php');

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nettoyer les données d'entrée de l'utilisateur
    $username = htmlspecialchars($_POST['nom']);
    $userF = htmlspecialchars($_POST['prenom']);
    $password = htmlspecialchars($_POST['password']);

    // Requête SQL pour vérifier les informations d'identification
    $sql = "SELECT * FROM admini WHERE nom = :username AND prenom = :prenom LIMIT 1";
    $stmt = $con->prepare($sql);
    
    // Lier les paramètres à la requête SQL
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':prenom', $userF);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer l'utilisateur correspondant
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && $password == $user['password']) {  
        // Authentification réussie, on crée les variables de session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];

        setcookie("Admin", $user['id'], time() + 21600, "/", httponly:true, secure:true); // Prolonger de 6 heures supplémentaires
        // Rediriger vers le tableau de bord
        header("Location: Dashboard/");
        exit;
    } else {
        // Afficher un message d'erreur si les identifiants sont incorrects
        echo "Nom d'utilisateur, prénom ou mot de passe incorrect.";
    }
}
?>
