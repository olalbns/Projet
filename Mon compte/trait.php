<?php
    include('connect.php');
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $ville = $_POST['ville'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $password = $_POST['password'];
        $pays= $_POST['pays'];
        $momo= $_POST['momo'];
        $carte= $_POST['carte'];
        

        $repas = $con->prepare('UPDATE utilisateur SET nom= :nom, prenom= :prenom, ville= :ville, email= :email, password= :password, tel= :tel, pays= :pays, momo= :momo, carte= :carte WHERE id=' . $_COOKIE['connect']);
        $repas->execute(array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'ville'=>$ville,
            'email'=>$email,
            'tel'=>$tel,
            'pays'=>$pays,
            'password'=>$password,
            'carte'=>$carte,
            'momo'=>$momo,
        ));
        header ("location: ../Mon compte/");
        setcookie("mod", 2, time() + (30 * 1), "/"); // Cookie actif pendant 1 minute (peut être ajusté)
    } else {
        echo 'mise non effectuée';
    }


?>
