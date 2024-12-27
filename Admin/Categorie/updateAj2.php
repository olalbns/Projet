<?php
    include('../../Content/connect.php');
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
       $id=$_POST['id'];

    
        $repas = $con->prepare('UPDATE marque SET nom= :nom WHERE id_marq=' .$id);
        $repas->execute(array(
            'nom'=>$nom,
            
        ));
        header('location: ./');
    } else {
        echo 'mise non effectuée';
    }
