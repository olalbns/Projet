<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Panier.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="../Js/script3.js" defer></script>
    <script src="../Js/script1.js"></script>
    <title>Panier - Jonas TECH</title>
    <style>
        .mn {
            margin-bottom: 40px;
        }

        .remove-icon {
            cursor: pointer;
            color: red;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <section class="mn">
        <?php include('../Content/menu.php'); ?>
    </section>

    <?php
    include('../Content/connect.php');
    if (!isset($_COOKIE['panier']) && isset($_GET['id'])) {
       
       }

    if (isset($_GET['id'])) {
        $produitId = intval($_GET['id']);
       
        // Fonction pour ajouter un produit au cookie
        function ajouterProduit($produitId)
        {
            $messkl= "<script>
            alert('limit');
        </script>";
        

            $produits = json_decode($_COOKIE['panier'], true);

           
            // Vérifier si le cookie "panier" existe
            if (isset($_COOKIE['panier'])) {
                // Récupérer les IDs de produit déjà enregistrés dans le cookie

              
                

                // Vérifier si l'ID du produit n'est pas déjà dans la liste
                if (!in_array($produitId, $produits)) {
                    // Ajouter le nouvel ID à la liste
                    if (count($produits) <  3) {
                        $produits[] = $produitId;
                    }else{ 
                       
                       
    setcookie('mss', $messkl, time()+10, "/");
                       
                     }
                    
                }
            } else {
                // Si le cookie n'existe pas encore, créer un nouveau tableau avec le premier produit
                
                    $produits = array($produitId);
               
                

            }

            // Enregistrer la nouvelle liste de produits dans le cookie (1 jour de durée de vie)
            setcookie('panier', json_encode($produits), time() + (86400), "/"); // 86400 = 1 jour
        }

        // Ajouter le produit au cookie
        ajouterProduit($produitId);

        // Rediriger vers la page du panier sans l'ID dans l'URL
        header("Location: index.php");
        exit(); // Important pour stopper l'exécution après redirection
    }
    
             if (isset($_COOKIE['mss'])) {
        echo "<script>alert('Votre panier est pleine.');</script>";
                           
    }
        
   
   

    // Gestion de la suppression d'un produit du panier
    if (isset($_GET['remove_id'])) {
        $removeId = intval($_GET['remove_id']); // Convertir l'ID à supprimer en entier

       // Vérifier si le cookie "panier" existe
        if (isset($_COOKIE['panier'])) {
            // Récupérer les produits du cookie
            $produits = json_decode($_COOKIE['panier'], true);

            // Supprimer le produit avec l'ID correspondant
            if (($key = array_search($removeId, $produits)) !== false) {
                unset($produits[$key]);

            }
             $mol="
           
           
                <script>
                    
                    let productId ='prod".$removeId."';
                    localStorage.removeItem(productId);
                </script>";

            setcookie("mllll", $mol, time()+10, "/");
                    
            // Réenregistrer le cookie avec la nouvelle liste
            setcookie('panier', json_encode(array_values($produits)), time() + (86400), "/"); // 86400 = 1 jour

            // Redirection pour éviter que l'ID reste dans l'URL après suppression
             header("Location: index.php");
            exit();
        }
    }

    if (isset($_COOKIE['mllll'])) {
        echo $_COOKIE['mllll'];
    
    }

    // Récupérer la liste des produits depuis le cookie "panier"
    $produits = isset($_COOKIE['panier']) ? json_decode($_COOKIE['panier'], true) : array();

    if (empty($produits)) {
        echo "<p style='text-align: center;'>Aucun produit dans le panier pour le moment.</p>";
    } else {
        echo "<h2>Votre panier</h2><hr>";


        foreach ($produits as $Pid) {
            // Préparation de la requête pour éviter les injections SQL
            $stmt = $con->prepare("SELECT * FROM produit WHERE id = ?");
            $stmt->execute([$Pid]);
            $tirePro = $stmt->fetch();

            if ($tirePro) {
                // Créer un identifiant unique pour chaque produit
                $productId = $tirePro['id'];
    ?>
    
                <div class="aff" id="product-<?php echo $productId; ?>">
                    <div class="left">
                        <div class="nop">
                            <h3><?php echo htmlspecialchars($tirePro["nom"]); ?></h3>
                        </div>
                        <div><img src="../Assets/img_tel/<?php echo htmlspecialchars($tirePro["img"]); ?>" alt="Produit"></div>
                    </div>

                    <div class="right">
                        <strong class="prixU"><span id="pr-<?php echo $productId; ?>"><?php echo htmlspecialchars($tirePro["prix"]); ?></span> Fcfa</strong>
                        <button onclick="decre(<?php echo $productId; ?>)" id="btn2-<?php echo $productId; ?>"><i class="fa fa-minus"></i></button>
                        <strong><span class="Incre-Number" id="addi-<?php echo $productId; ?>"></span></strong>
                        <button onclick="incre(<?php echo $productId; ?>)" id="btn-<?php echo $productId; ?>"><i class="fa fa-plus"></i></button>
                        <strong><span id="Som-<?php echo $productId; ?>"><?php echo htmlspecialchars($tirePro["prix"]); ?></span> Fcfa</strong>

                        <script>
                                var addi = document.getElementById("addi-<?php echo $productId; ?>");
                                let productId<?php echo $tirePro['id']; ?> ="prod<?php echo $tirePro['id']; ?>";
                                addi.textContent = localStorage.getItem(productId<?php echo $tirePro['id']; ?>);
                                console.log(localStorage.getItem(productId<?php echo $tirePro['id']; ?>));
                        </script>
                        <script>
                            function incre(productId) {
                                let addi = document.getElementById("addi-" + productId);
                                let currentNum = parseInt(addi.textContent);
                                currentNum++;
                                addi.textContent = currentNum;
                                let productd<?php echo $tirePro['id']; ?> ="prod<?php echo $tirePro['id']; ?>";
                                localStorage.setItem(productd<?php echo $tirePro['id']; ?>, currentNum); // Stocker dans le Local Storage
                               
                                updateProductTotal(productId, currentNum);
                            }


                            function decre(productId) {
                                let addi = document.getElementById("addi-" + productId);
                                let currentNum = parseInt(addi.textContent);
                                if (currentNum > 1) {
                                    currentNum--;
                                    addi.textContent = currentNum;
                                    let productd<?php echo $tirePro['id']; ?> ="prod<?php echo $tirePro['id']; ?>";
                                localStorage.setItem(productd<?php echo $tirePro['id']; ?>, currentNum); // Stocker dans le Local Storage
                               
                                    updateProductTotal(productId, currentNum);
                                }
                            }
                            var ui<?php echo $productId ?> = document.getElementById('pr-<?php echo $productId ?>').textContent;
                        </script>

                        <!-- Icône de suppression -->
                        <span style="color: red;" class="remove-icon" onclick="removeProduct(<?php echo $productId; ?>)"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
                <hr class="lk"><br><br>
        <?php
                $produitIds[] = $tirePro['id']; // Ajout de l'identifiant au tableau
            }
        } ?>
        <h2>Recapitulatif de la commande </h2>
        <hr><br><br>
        <div class="recapT">
            <div class="recap">
                <span> Sous total</span><br><br>
                <span>Taxe </span><br><br>
                <span>Frais de livraison</span>
            </div>
            <div class="recapP">
                <strong><span id="Sam"></span> Fcfa<br><br></strong>
                <strong><span>0</span> Fcfa<br><br></strong>
                <strong><span>Gratuit</span><br><br></strong>
            </div>
        </div>



        <p id="oa" hidden></p>

        <hr><br><br>
        <div class="PrixT">
            <div>
                <strong><span>Total</span></strong>
            </div>
            <div>
                <strong><span id="total-price">Total CFA</span></strong>
            </div>
        </div><br><br>
        <button id="btnC" class="btnComm">Passez la commande</button>
        </div>





        <script>
            // Récupération des IDs PHP dans JavaScript
            var produitIds = <?php echo json_encode($produitIds); ?>;

            // Écouteur d'événement pour envoyer les IDs dans l'URL
            document.getElementById('btnC').onclick = function() {
                // Création de la chaîne d'IDs pour l'URL
                var idsParam = produitIds.join(",");
                window.location.href = "../Commande/?ProdIds=" + idsParam+"&";
            };
        </script>

        <script>
            function updateTotal() {
                let total = 0;

                <?php foreach ($produits as $Pid) { ?>
                    let productTotal = parseFloat(document.getElementById('Som-<?php echo $Pid; ?>').textContent);
                    total += productTotal;
                <?php } ?>


                document.getElementById('total-price').textContent = total + " Fcfa";
                document.getElementById('Sam').textContent = total + " Fcfa"; // Sous total
            }
        </script>
    <?php }
    ?>

</body>
<?php include("../Content/footer.php"); ?>

</html>