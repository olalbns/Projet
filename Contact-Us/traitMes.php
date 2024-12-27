<?php
include('../Content/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $num = $_POST['num'];
    $messages = $_POST['messages'];
    $email = $_POST['email'];

    $base = $con->prepare('INSERT INTO message  (nom,prenom,num,messages,email)
    values (:nom,:prenom,:num,:messages,:email)');
$uti = $base->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'num' => $num,
    'messages' => $messages,
    'email' => $email,
));
if ($uti) {
    header("location: ./");
    exit;
} else {
    echo "Erreur lors de l'ajout de l'utilisateur.";
}
} else {
echo "Veuillez remplir tous les champs.";
}



?>