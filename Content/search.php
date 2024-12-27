<?php
include('connect.php');
// Connexion à la base de données (remplacez $bdd par $conn si nécessaire)
$stmt = $bdd->prepare("SELECT * FROM produits WHERE nom LIKE ? OR categorie LIKE ?");
$search = "%{$search}%";
$stmt->bind_param("ss", $search, $search);

// Exécute la requête préparée
$stmt->execute();

// Obtenir les résultats
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Boucle à travers les résultats et affiche chaque produit
    while ($unUser = $result->fetch_assoc()) {
        ?>
        <div class="phone">
            <img src="<?php echo $unUser['img']; ?>" alt="">
            <h1><?php echo $unUser['nom']; ?></h1>
            <h2><?php echo $unUser['prix']; ?> €</h2>
            <p>
                <?php echo $unUser['ecran']; ?>, 
                <?php echo $unUser['camera']; ?>,<br>
                <?php echo $unUser['processeur']; ?>,
                <?php echo $unUser['ram']; ?>,<br>
                <?php echo $unUser['stockage']; ?>,
                <?php echo $unUser['autonomie']; ?>,
                <?php echo $unUser['chargeur']; ?>
            </p>
            <a class="jjh" href="">Ajouter au panier</a><br>
            <p class="bv">
                <a href="">Details</a>
                <a href="">Comparer</a>
            </p>
        </div>
        <?php
    }
} else {
    echo "Aucun produit trouvé.";
}

// Fermer la requête préparée
$stmt->close();
?>
