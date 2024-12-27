<?php
    include('../../Content/connect.php');
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        $processeur = $_POST['processeur'];
        $prix = $_POST['prix'];
        $camera = $_POST['camera'];
        $ecran = $_POST['ecran'];
        $ram = $_POST['ram'];
        $stockage= $_POST['stockage'];
        $categorie= $_POST['categorie'];
        $marque= $_POST['marque'];
        $autonomie = $_POST['autonomie'];
        $chargeur= $_POST['chargeur'];
      $id= $_POST['id'];
        $img= $_FILES['img']['name'];

      $target_dir = "../../Assets/img_tel/";
      $target_file = $target_dir . basename($img);
      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
          header("location: ./");
      }else{
          echo "jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj";
      }

        $repas = $con->prepare('UPDATE produit SET nom= :nom, img= :img, processeur= :processeur,
         prix= :prix, camera= :camera,
         ecran= :ecran, ram= :ram, stockage= :stockage,
          categorie= :categorie, marque= :marque,
           autonomie= :autonomie, chargeur= :chargeur
            WHERE id=' .$id);
        $repas->execute(array(
            'nom'=>$nom,
            'img'=>$target_file,
            'processeur'=>$processeur,
            'prix'=>$prix,
            'camera'=>$camera,
            'ecran'=>$ecran,
            'ram'=>$ram,
            'stockage'=>$stockage,
            'categorie'=>$categorie,
            'marque'=>$marque,
            'autonomie'=>$autonomie,
            'chargeur'=>$chargeur,
        ));
        header('location: ./');
    } else {
        echo 'mise non effectuée';
    }
