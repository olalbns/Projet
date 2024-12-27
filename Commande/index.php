<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/coman.css">
    <title>Commandes | Jonas TECH</title>
</head>

<body>
    <?php include('../Content/menu.php') ?>
    <div class="order-page">
        <!-- Section récapitulatif de la commande -->
        <div class="order-summary">
            <h2>Récapitulatif de la commande</h2>
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0; // Initialisation du total

                    // Vérification de l'existence du paramètre ProdIds
                    if (isset($_GET['ProdIds'])) {
                        // Récupération de la chaîne d'IDs depuis l'URL
                        $ids = $_GET['ProdIds'];

                        // Conversion de la chaîne en tableau
                        $produitIds = explode(",", $ids);

                        // Parcours du tableau pour afficher chaque produit
                        foreach ($produitIds as $id) {
                            // Sécurisation de l'ID avant utilisation
                            $id = htmlspecialchars($id);

                            // Préparation de la requête pour récupérer le produit
                            $stmt = $con->prepare("SELECT * FROM produit WHERE id = ?");
                            $stmt->execute([$id]);
                            $produit = $stmt->fetch();

                            if ($produit) {
                                // Récupération du prix du produit
                                $prix = (float) $produit["prix"];
                                $total += $prix; // Addition au total
                    ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($produit["nom"]); ?></td>
                                    <td id="addi-<?php echo $produit["id"]; ?>">1</td>
                                    <td><?php echo number_format($prix, 0, '.', ' ') . ' FCFA'; ?></td>
                                    <td><?php echo number_format($prix, 0, '.', ' ') . ' FCFA'; ?></td>
                                </tr>


                                <script>
                                    var addi = document.getElementById("addi-<?php echo $produit["id"]; ?>");
                                    var vivi = document.getElementById("vivi");
                                    let productId<?php echo $produit["id"]; ?> = "prod<?php echo $produit["id"]; ?>";
                                    addi.textContent = localStorage.getItem(productId<?php echo $produit["id"]; ?>);
                                    vivi.value = localStorage.getItem(productId<?php echo $produit["id"]; ?>);
                                    console.log(localStorage.getItem(productId<?php echo $produit["id"]; ?>));
                                </script>
                    <?php
                            }
                        }
                    } else {
                        echo "<tr><td colspan='4'>Aucun identifiant de produit n'a été passé dans l'URL.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Section pour afficher le total de la commande -->
            <div class="order-total">
                <p><strong>Total:</strong> <?php echo number_format($total, 0, '.', ' ') . ' FCFA'; ?></p>
            </div>
        </div>
        <?php $userId = intval($_COOKIE['connect']);
        $listUsers = $con->query("SELECT * FROM utilisateur WHERE id = $userId")->fetch();
        ?>
        <form id="form" action="traitComm" method="post">
            <input value="<?php echo htmlspecialchars($listUsers['nom']); ?> <?php echo htmlspecialchars($listUsers['prenom']); ?>" name="nom" type="text" hidden>
        </form>


        <!-- Section choix du mode de paiement -->
        <div class="payment-method">
            <h2>Mode de paiement</h2>
            <form>
                <label>
                    <input type="radio" name="payment" value="carte" checked>
                    Carte bancaire
                </label><br>
                <label>
                    <input type="radio" name="payment" value="mobile">
                    Paiement mobile (Mobile Money)
                </label><br>
                <label>
                    <input type="radio" name="payment" value="cheque">
                    Chèque
                </label>
            </form>
        </div>

        <!-- Section choix du mode de livraison -->
        <div class="delivery-method">
            <h2>Mode de livraison</h2>
            <form>
                <label>
                    <input type="radio" name="delivery" value="standard" checked>
                    Livraison standard (3 à 5 jours)
                </label><br>
                <label>
                    <input type="radio" name="delivery" value="express">
                    Livraison express (1 à 2 jours)
                </label><br>
                <label>
                    <input type="radio" name="delivery" value="retrait">
                    Retrait en magasin
                </label>
            </form>
        </div>

        <!-- Bouton de validation de la commande -->
        <div class="order-actions">


            <!-- <button id="payButton" class="validate-order-btn">Valider la commande</button> -->
            <kkiapay-widget amount="<?php echo $total; ?>" 
                key="a35ea500b59811efa30ef713cf0b66ae"
                position="center"
                sandbox="true"
                data=""
                phone="61000000"
                callback="./">
</kkiapay-widget>
        </div>
    </div>

  
       
  

    <script>
        var form = document.getElementById("form");
        var valid = document.getElementById("valid");
        valid.addEventListener("click", function() {
            form.submit();
        });
    </script>

    <section><?php include('../Content/footer.php') ?></section>
    <script src="https://cdn.kkiapay.me/k.js"></script>
</body>

</html>