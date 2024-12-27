<?php 
    try {
        $con = new PDO("mysql:host=localhost;port=3308;
        dbname=jonas;charset=utf8", "root", "");
    } catch (PDOException $e) {
        die('Erreur:' .$e->getMessage());
    } 
?>