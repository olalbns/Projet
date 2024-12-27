


<?php
// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Suppression du cookie (mettre sa date d'expiration dans le passé)
    if (isset($_COOKIE['connect'])) {
        setcookie('connect', '', time() - 3600, '/'); // Le cookie est expiré
    }

    // Redirection vers une autre page
    header("Location: ../");
    exit(); // Toujours utiliser 'exit' après une redirection
}
?>
