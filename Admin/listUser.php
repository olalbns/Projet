<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LISTE DES UTILISATEURS</h1>
    <?php
        include ('connect.php');
        $listUsers = $bdd->query('SELECT * FROM utilisateur');
       
        while($unUser = $listUsers->fetch()){
            echo'Utilisateur '.$unUser['id'].'<br>';
            echo 'Nom: '.$unUser['nom'].'<br>Prenom: '. $unUser['prenom'].'<br>Email: '.$unUser['email'].'<br><br>';
        }
    ?>


</body>
</html>