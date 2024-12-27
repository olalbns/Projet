<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style1.css">
    <link rel="stylesheet" href="../Css/prodAcc.css">
    <link rel="stylesheet" href="../Css/detail.css">
    <link rel="stylesheet" href="../Css/font aws all-min.css">
    <title>Jonas TECH - Produits</title>
    <link rel="stylesheet" href="../Css/responsive.css">

    <script src="../Js/script1.js"></script>
    <script>
        window.onload = function() {

            var lilW = document.getElementById('lilW');
            lilW.removeAttribute("hidden"); // Affiche la div une fois la page chargée
        };
    </script>
</head>

<body>
    <?php include("../Content/menu.php"); ?>

    <section class="mainSEc">
        <h1>Découvrez nos produits disponibles pour toute catégorie</h1>

        <form method="GET" action="">
            <div class="flex">
                <div class="vnvnv">
                    <div class="nkt">
                        <select name="categorie" id="catc">
                            <option value="">Catégorie</option>
                            <?php
                            include('../connect.php');
                            $listUsers = $con->query('SELECT * FROM  categorie');
                            while ($unUser = $listUsers->fetch()) {
                                $lolo = $unUser['nom'];
                            ?>
                                <option value="<?php echo $unUser['nom']; ?>" <?= (isset($_GET['categorie']) && $_GET['categorie'] == "$lolo") ? 'selected' : ''; ?>><?php echo $unUser['nom']; ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="mrq">
                        <select name="marque" id="marque">
                            <option class="option" value="">Marque</option>
                            <?php
                            include('../connect.php');
                            $listUsers = $con->query('SELECT * FROM  marque');
                            while ($unUser = $listUsers->fetch()) {
                                $lolo = $unUser['nom'];
                            ?>
                                <option class="option" value="<?php echo $unUser['nom']; ?>" <?= (isset($_GET['marque']) && $_GET['marque'] == '$lolo') ? 'selected' : ''; ?>><?php echo $unUser['nom']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <div class="oo">
                    <span> Affichage des prix</span>
                    <select class="bc" name="prix" id="">
                        <option value="croissant" <?= (isset($_GET['prix']) && $_GET['prix'] == 'croissant') ? 'selected' : ''; ?>>Croissant</option>
                        <option value="decroissant" <?= (isset($_GET['prix']) && $_GET['prix'] == 'decroissant') ? 'selected' : ''; ?>>Decroissant</option>
                    </select>
                </div>


            </div>
            <div class="btnF">
                <button type="submit">Filtrer</button>
                <a href="../Produits/">Annuler les filtres</a>
            </div>
        </form>

    </section>

    <section class="fsproduit">
        <?php if (isset($_GET['search'])) { ?>
            <h2>Résultats de recherche pour : <mark><?php echo $_GET['search']  ?></mark></h2>
        <?php } ?>


        <div class="flexx">
            <?php
            include('../Content/connect.php'); ?>



            <?php
            if (isset($_GET['search'])) {
                if (isset($_GET['search'])) {
                    $search = trim($_GET['search']);
                } elseif (isset($_POST['search'])) {
                    $search = trim($_POST['search']);
                } else {
                    $search = '';
                }

                if (!empty($search)) {
                    $stmt = $con->prepare("SELECT * FROM produit WHERE nom LIKE :search OR categorie LIKE :search");
                    $search = "%{$search}%";
                    $stmt->bindValue(':search', $search, PDO::PARAM_STR);

                    // Exécuter la requête préparée
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($result)) {
                        // Boucle à travers les résultats et affiche chaque produit
                        foreach ($result as $unUser) {
            ?>
                            <div class="fl">
                                <div class="phone">
                                    <img src="../Assets/img_tel/<?php echo $unUser['img']; ?>" alt="">
                                    <h2><?php echo $unUser['nom']; ?></h2>
                                    <h3><?php echo $unUser['prix']; ?> Fcfa</h3>
                                    <p>
                                        <?php echo $unUser['processeur']; ?>, <?php echo $unUser['ram']; ?>, <?php echo $unUser['stockage']; ?>;
                                    </p>
                                    <a id="add-link<?php echo $unUser['id']; ?>" class="jjh" href="../Panier/index.php?id=<?php echo $unUser['id']; ?>">Ajouter au panier</a><br>
                                    <p class="bv">
                                        <a id="n<?php echo $unUser['id']; ?>" href="./?detail=<?php echo $unUser['nom']; ?>&id=<?php echo $unUser['id']; ?>">Details</a>
                                    </p>
                                </div>
                            </div>





                    <?php

                        }
                    } else {
                        echo "Aucun produit trouvé.";
                    } ?>
        </div>
        <?php
                }
            } else {
                // Initialiser la requête SQL de base
                $sql = "SELECT * FROM produit WHERE 1";

                // Ajouter les filtres si sélectionnés
                if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
                    $sql .= " AND categorie = :categorie";
                }

                if (isset($_GET['marque']) && !empty($_GET['marque'])) {
                    $sql .= " AND marque = :marque";
                }

                // Filtrer par prix si sélectionné
                if (isset($_GET['prix']) && $_GET['prix'] == 'croissant') {
                    $sql .= " ORDER BY prix ASC";
                } elseif (isset($_GET['prix']) && $_GET['prix'] == 'decroissant') {
                    $sql .= " ORDER BY prix DESC";
                }

                $stmt = $con->prepare($sql);

                // Lier les paramètres si les filtres sont actifs
                if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
                    $stmt->bindValue(':categorie', $_GET['categorie'], PDO::PARAM_STR);
                }

                if (isset($_GET['marque']) && !empty($_GET['marque'])) {
                    $stmt->bindValue(':marque', $_GET['marque'], PDO::PARAM_STR);
                }

                // Exécuter la requête
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($result)) {?>

                   
        <?php if (isset($_GET['marque']) && !empty($_GET['marque']) && isset($_GET['categorie']) && !empty($_GET['categorie']) && isset($_GET['prix'])  && isset($_GET['marque']) && !empty($_GET['marque']) && isset($_GET['categorie']) && !empty($_GET['categorie'])) { ?>

            </div>
        <?php  } else {
        ?>


            <?php if (!isset($_GET['marque']) && !isset($_GET['categorie']) &&  !isset($_GET['marque']) && !isset($_GET['categorie'])) { ?>

                <div class="prod-catehjji">
                    <div>
                        <h1 class="nameProCate">Tecno</h1>
                    </div>
                    <div id="ijiuiuuhj" class="fl">
                        <?php $listUsers = $con->query('SELECT *  FROM  produit WHERE marque="Tecno"');
                            $unUser = $listUsers->fetch();
                            while ($unUsers = $listUsers->fetch()) {

                        ?>

                            <div id="phone<?php echo $unUsers['id']; ?>" class="phone">
                                <img src="../Assets/img_tel/<?php echo $unUsers['img']; ?>" alt="">
                                <h3><?php echo $unUsers['nom']; ?></h2>
                                    <h4><?php echo $unUsers['prix']; ?> Fcfa
                                </h3>
                                <p>
                                    <?php echo $unUsers['processeur']; ?>, <?php echo $unUsers['ram']; ?>, <?php echo $unUsers['stockage']; ?>
                                </p>
                                <a id="add-link<?php echo $unUsers['id']; ?>" class="jjh" href="../Panier/index.php?id=<?php echo $unUsers['id']; ?>">Ajouter au panier</a><br>
                                <p class="bv">
                                    <a id="n<?php echo $unUsers['id']; ?>" href="./?detail=<?php echo $unUsers['nom']; ?>&id=<?php echo $unUsers['id']; ?>">Details</a>
                                </p>
                            </div>

                            <script>
                                var linkin<?php echo $unUsers['id']; ?> = document.getElementById("add-link<?php echo $unUsers['id']; ?>");
                                // Ajouter un événement pour le bouton "Ajouter"
                                linkin<?php echo $unUsers['id']; ?>.onclick = function() {
                                    <?php if (!isset($_COOKIE['panier'])) {
                                        echo 'document.cookie="panier=[]; path=/; expires=Fri";';
                                    } ?>
                                    let productId = "prod<?php echo $unUsers['id']; ?>";
                                    let quantity<?php echo $unUsers['id']; ?> = parseInt(localStorage.getItem(productId)) || 0;
                                    quantity<?php echo $unUsers['id']; ?>++;
                                    localStorage.setItem(productId, quantity<?php echo $unUsers['id']; ?>); // Stocker dans le Local Storage

                                };
                            </script>




                        <?php
                            }
                        ?>

                    </div>
                </div>
                </div><br><br>



                <div class="prod-catehjji">
                    <div>
                        <h1 class="nameProCate">Infinix</h1>
                    </div>
                    <div id="ijiuiuuhj" class="fl">
                        <?php $listUsers = $con->query('SELECT *  FROM  produit WHERE marque="Infinix"  LIMIT 9');
                            $unUser = $listUsers->fetch();
                            while ($unUsers = $listUsers->fetch()) {

                        ?>

                            <div id="phone<?php echo $unUsers['id']; ?>" class="phone">
                                <img src="../Assets/img_tel/<?php echo $unUsers['img']; ?>" alt="">
                                <h3><?php echo $unUsers['nom']; ?></h2>
                                    <h4><?php echo $unUsers['prix']; ?> Fcfa
                                </h3>
                                <p>
                                    <?php echo $unUsers['processeur']; ?>, <?php echo $unUsers['ram']; ?>, <?php echo $unUsers['stockage']; ?>
                                </p>
                                <a id="add-link<?php echo $unUsers['id']; ?>" class="jjh" href="../Panier/index.php?id=<?php echo $unUsers['id']; ?>">Ajouter au panier</a><br>
                                <p class="bv">
                                    <a id="n<?php echo $unUsers['id']; ?>" href="./?detail=<?php echo $unUsers['nom']; ?>&id=<?php echo $unUsers['id']; ?>">Details</a>
                                </p>
                            </div>


                            <script>
                                var linkin<?php echo $unUsers['id']; ?> = document.getElementById("add-link<?php echo $unUsers['id']; ?>");
                                // Ajouter un événement pour le bouton "Ajouter"
                                linkin<?php echo $unUsers['id']; ?>.onclick = function() {
                                    <?php if (!isset($_COOKIE['panier'])) {
                                        echo 'document.cookie="panier=[]; path=/; expires=Fri";';
                                    } ?>
                                    let productId = "prod<?php echo $unUsers['id']; ?>";
                                    let quantity<?php echo $unUsers['id']; ?> = parseInt(localStorage.getItem(productId)) || 0;
                                    quantity<?php echo $unUsers['id']; ?>++;
                                    localStorage.setItem(productId, quantity<?php echo $unUsers['id']; ?>); // Stocker dans le Local Storage

                                };
                            </script>





                        <?php

                            } ?>
                    </div>
                </div>
                </div><br><br>


                <div class="prod-catehjji">
                    <div>
                        <h1 class="nameProCate">Samsung</h1>
                    </div>
                    <div id="ijiuiuuhj" class="fl">
                        <?php $listUsers = $con->query('SELECT *  FROM  produit WHERE marque="Samsung"  LIMIT 9');
                            $unUser = $listUsers->fetch();
                            while ($unUsers = $listUsers->fetch()) {

                        ?>

                            <div id="phone<?php echo $unUsers['id']; ?>" class="phone">
                                <img src="../Assets/img_tel/<?php echo $unUsers['img']; ?>" alt="">
                                <h3><?php echo $unUsers['nom']; ?></h2>
                                    <h4><?php echo $unUsers['prix']; ?> Fcfa
                                </h3>
                                <p>
                                    <?php echo $unUsers['processeur']; ?>, <?php echo $unUsers['ram']; ?>, <?php echo $unUsers['stockage']; ?>
                                </p>
                                <a id="add-link<?php echo $unUsers['id']; ?>" class="jjh" href="../Panier/index.php?id=<?php echo $unUsers['id']; ?>">Ajouter au panier</a><br>
                                <p class="bv">
                                    <a id="n<?php echo $unUsers['id']; ?>" href="./?detail=<?php echo $unUsers['nom']; ?>&id=<?php echo $unUsers['id']; ?>">Details</a>
                                </p>
                            </div>


                            <script>
                                var linkin<?php echo $unUsers['id']; ?> = document.getElementById("add-link<?php echo $unUsers['id']; ?>");
                                // Ajouter un événement pour le bouton "Ajouter"
                                linkin<?php echo $unUsers['id']; ?>.onclick = function() {
                                    <?php if (!isset($_COOKIE['panier'])) {
                                        echo 'document.cookie="panier=[]; path=/; expires=Fri";';
                                    } ?>
                                    let productId = "prod<?php echo $unUsers['id']; ?>";
                                    let quantity<?php echo $unUsers['id']; ?> = parseInt(localStorage.getItem(productId)) || 0;
                                    quantity<?php echo $unUsers['id']; ?>++;
                                    localStorage.setItem(productId, quantity<?php echo $unUsers['id']; ?>); // Stocker dans le Local Storage

                                };
                            </script>






                        <?php
                            } ?>
                    </div>
                </div>
                </div><br><br>

                <div>
                        <h1 class="nameProCate">Autres produits</h1>
                    </div>
<div class="flexx">
    


            <?php
                        }
            ?>

<?php foreach ($result as $unUser) {  ?>


<div class="fl">
    <div class="phone">
        <img src="../Assets/img_tel/<?php echo $unUser['img']; ?>" alt="">
        <h2><?php echo $unUser['nom']; ?></h2>
        <h3><?php echo $unUser['prix']; ?> Fcfa</h3>
        <p>
            <?php echo $unUser['processeur']; ?>, <?php echo $unUser['ram']; ?>, <?php echo $unUser['stockage']; ?>;
        </p>
        <a id="add-link<?php echo $unUser['id']; ?>" class="jjh" href="../Panier/index.php?id=<?php echo $unUser['id']; ?>">Ajouter au panier</a><br>
        <p class="bv">
            <a id="n<?php echo $unUser['id']; ?>" href="./?detail=<?php echo $unUser['nom']; ?>&id=<?php echo $unUser['id']; ?>">Details</a>
        </p>
    </div>
</div>

<script>
    var linkin<?php echo $unUser['id']; ?> = document.getElementById("add-link<?php echo $unUser['id']; ?>");
    // Ajouter un événement pour le bouton "Ajouter"
    linkin<?php echo $unUser['id']; ?>.onclick = function() {
        <?php if (!isset($_COOKIE['panier'])) {
                echo 'document.cookie="panier=[]; path=/; expires=Fri";';
            } ?>
        let productId = "prod<?php echo $unUser['id']; ?>";
        let quantity<?php echo $unUser['id']; ?> = parseInt(localStorage.getItem(productId)) || 0;
        quantity<?php echo $unUser['id']; ?>++;
        localStorage.setItem(productId, quantity<?php echo $unUser['id']; ?>); // Stocker dans le Local Storage

    };
</script>


<?php
        }
?>
</div>
    </div>
    <?php

                    }
                } else {
                    echo "Aucun produit trouvé.";
                }  ?>


    </div>
    </section>


    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .slideshow-container {
            width: 40vh;
            position: relative;
            margin: auto;

        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
            width: 100%;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }



        .img1 {
            height: 210px;
        }

        .n052 {
            color: black;
        }
    </style>
    <?php
                if (isset($_GET['detail']) && isset($_GET['id'])) {

                    $idInUrl = $_GET['id'];
                    $listUsers = $con->query("SELECT *  FROM  produit WHERE id=$idInUrl");
                    $unUser = $listUsers->fetch();
    ?>

        <div class="mdl">
            <div id="modale<?php echo $unUser['id']; ?>" class="modale" style="display: none;">
                <div class="niop">
                    <span id="close<?php echo $unUser['id']; ?>" class="close">&times;</span>
                    <div class="main">
                        <div class="slideshow-container">
                            <div class="mySlides fade">
                                <img class="img1" src="../Assets/img_tel/<?php echo $unUser['img']; ?>" alt="">
                            </div>

                            <div class="mySlides fade">
                                <img class="img1" src="../Assets/img_tel/<?php echo $unUser['img2']; ?>" alt="">
                            </div>

                            <div class="mySlides fade">
                                <img class="img1" src="../Assets/img_tel/<?php echo $unUser['img3']; ?>" alt="">
                            </div>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        </div>
                        <div class="fstdet">
                            <h1 id="popo"><?php echo $unUser['nom']; ?></h1>
                            <h2>Prix: <?php echo $unUser['prix']; ?> Fcfa</h2>
                        </div>
                    </div>
                    <div class="detailpr">
                        <div>
                            <h1>Caratéristique du produit</h1>
                            <ul>
                                <li><?php echo $unUser['processeur']; ?></li>
                                <li><?php echo $unUser['ram']; ?></li>
                                <li><?php echo $unUser['stockage']; ?></li>
                                <li><?php echo $unUser['camera']; ?></li>
                                <li><?php echo $unUser['chargeur']; ?></li>
                                <li><?php echo $unUser['autonomie']; ?></li>
                                <li>Dual sim </li>
                            </ul>
                            <div class="Add-in-cart-btn">
                                <a class="jjh" href="../Panier/index.php?id=<?php echo $unUser['id']; ?>">Ajouter au panier</a><br>
                            </div>
                        </div>
                        <div class="Categorie-conteiner-modal">
                            <div>
                                <h1>Catégorie</h1>
                                <p>
                                <h3><?php echo $unUser['categorie']; ?></h3>
                                </p>
                            </div>
                            <div>
                                <h1>Marque</h1>
                                <p>
                                <h3><?php echo $unUser['marque']; ?></h3>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                slides[slideIndex - 1].style.display = "block";
                setTimeout(showSlides, 3000); // Change d'image toutes les 2 secondes
            }

            function plusSlides(n) {
                let slides = document.getElementsByClassName("mySlides");
                slideIndex += n;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                if (slideIndex < 1) {
                    slideIndex = slides.length
                }
                for (let i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slides[slideIndex - 1].style.display = "block";
            }
        </script>

        <script>
            var modale<?php echo $idInUrl; ?> = document.getElementById('modale<?php echo $idInUrl; ?>')
            <?php echo '  modale' . $idInUrl . '.style.display = "flex"; // Affiche le modal';
                } ?>
            <?php
            }
            // Fermeture de la connexion
            $con = null;
            ?>
        </script>

        <div id="lilW" hidden>
            <?php include('../Js/script6.php'); ?>
        </div>
        <script src="../Js/script2.js" defer></script>
<script src="../Js/js/bootstrap.bundle.js"></script>
<script src="../Js/js/bootstrap.bundle.js.map"></script>
s
</body>

<?php include("../Content/footer.php"); ?>

</html>