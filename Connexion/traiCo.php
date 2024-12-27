<?php
session_start(); // Démarrer la session

// Inclure le fichier de connexion à la base de données
include('../Content/connect.php');

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Vérifier si les champs du formulaire sont définis
    if (isset($_POST['email'], $_POST['password'])) {
        // Connexion via le formulaire
        $username = htmlspecialchars(trim($_POST['email']));
        $password = trim($_POST['password']); 

        // Requête SQL pour vérifier les informations d'identification
        $sql = "SELECT * FROM utilisateur WHERE email = :username LIMIT 1";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

       

        // Vérifier si l'utilisateur existe et si le mot de passe correspond
        if ($user && $user['password'] === $password) {
            // Authentification réussie, on crée les variables de session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Créer ou mettre à jour le cookie de session avec l'ID utilisateur
            setcookie("connect", $user['id'], time() + 21600, "/"); // 6 heures

            // Rediriger vers la page d'accueil ou tableau de bord
            header("Location: ../index.php");
            exit;
        } else {
            setcookie("modIn", $_SESSION['user_id'], time()+10, "/");

            header("Location: ./index.php");
        }
    }
}

// Vérifier si l'utilisateur est déjà connecté via le cookie de session
if (isset($_COOKIE["connect"])) {
    // Si le cookie est déjà présent, on le met à jour pour prolonger la session
    setcookie("connect", $_COOKIE["connect"], time() + 21600, "/"); // Prolonger de 6 heures supplémentaires
} else if (isset($_SESSION['user_id'])) {
    // Si une session est active, on crée ou met à jour le cookie avec l'ID utilisateur
    setcookie("connect", $_SESSION['user_id'], time() + 21600, "/");
}
?>
