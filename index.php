<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/prodAcc.css">
    <link rel="stylesheet" href="Css/bootstrap.min.css">

    <title>Jonas TECH</title>
    <script src="Js/script1.js"></script>
</head>

<br>

<body>
    <header>
        <nav>
            <div class="menu">
                <div class="menName">
                    <a href=""><span class="nnnk">Jonas</span> TECH</a>
                </div>
                <div class="menLinks">
                    <a href="./">Acceuil</a>
                    <a href="Produits/">Produits</a>
                    <a href="Contact-Us/">Contact</a>
                </div>
                <div class="menElement">
                    <div id="esc" class="icnDiv">
                        <a href="Panier/"><i class="fas fa-cart-plus"></i></a>
                    </div>
                </div>
                <div class="searchDiv">
                    <div>
                        <button onclick="aff()" id="searchbtn" class="icn"><i class="fa fa-search"
                                style="font-size: 20px;"></i></button>
                    </div>
                    <div>
                        <form action="Produits/index.php" method="get"><input name="search" id="iptsearch" type="search"
                                placeholder="Search here...." hidden></form>
                    </div>
                </div>
                <?php include('Content/connect.php');
                if (isset($_COOKIE['connect'])) { ?>
                    <div class="juju">
                        <div class="dropdown" id="userNamE">
                            <?php $userId = intval($_COOKIE['connect']);
                            $listUsers = $con->query("SELECT * FROM utilisateur WHERE id = $userId")->fetch();
                            ?>
                            <a href="Mon compte/" class="btnnnn"><?php echo htmlspecialchars($listUsers['nom']); ?> <?php echo htmlspecialchars($listUsers['prenom']); ?></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <a class="dropdown-item" href="Mon compte/?id=kk">Mes commande</a><br><br>
                                <a class="dropdown-item" href="Mon compte/?id=llm">Mes details</a><br><br>
                                <a class="dropdown-item" href="Mon compte/">Deconnexion</a>

                            </ul>
                        </div>
                    </div>



            </div>
        <?php  } else { ?>
            <div class="juju">
                <div class="dropdown" id="userNamE">
                    <a class="btnnnn" href="Inscription/">Inscription</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="Connexion/">Connexion</a>
                    </ul>
                </div>
            </div>
        <?php } ?>
        </div>
        </nav>
    </header>
    <section id="main" class="MainSec">
        <?php include('Content/switch-img.php'); ?>
    </section>
    <section id="llm" class="DiscMore">
        <h1>Decouvrez nos produits</h1><br>
        <div class="blockDisp">
        <div id="produit-con" class="Produi-conteiner">
            <?php

            $listUsers = $con->query('SELECT *  FROM  produit ORDER BY id DESC LIMIT 9');
            $unUser = $listUsers->fetch();
            while ($unUser = $listUsers->fetch()) {
            ?>


<div class="fl">
            <div class="phone">
                <img src="Assets/img_tel/<?php echo $unUser['img']; ?>" alt="">
                <h3><?php echo $unUser['nom']; ?></h2>
                    <h4><?php echo $unUser['prix']; ?> Fcfa
                </h3>
                <p>
                    <?php echo $unUser['processeur']; ?>, <?php echo $unUser['ram']; ?>, <?php echo $unUser['stockage']; ?>
                </p>
                <p class="bv">
                   <a href="Produits/">Détails</a>
                </p>
            </div>
        </div>
        <!--<script>
            setInterval(() => {
  const container = document.querySelector('.Produi-conteiner');
  container.scrollBy({ left: 100, behavior: 'smooth' }); // Défile vers la droite
}, 2000); // Défile toutes les 2 secondes

setInterval(() => {
  const container = document.querySelector('.Produi-conteiner');
  container.scrollBy({ left: -100, behavior: 'smooth' }); // Défile vers la droite
}, 18000); // Défile toutes les 2 secondes

        </script>-->
    

        <?php } ?>
        </div>
        <div class="showMore">
        <p><a href="">Voir plus de produits</a></p>
        <i  class="fa fa-chevron-down"></i>
        </div><br>
        </div><br><br>


        <h1 class="MarqProd">Produits de marques</h1>
        <h2 class="marqueNam">Tecno</h2>
        <div id="produitCon2" class="Produi-conteiner2">
            <?php

            $listUsers = $con->query('SELECT *  FROM  produit WHERE marque="Tecno" ORDER BY id DESC LIMIT 9');
            $unUser = $listUsers->fetch();
            while ($unUser = $listUsers->fetch()) {
            ?>


<div class="fl">
            <div class="phone">
                <img src="Assets/img_tel/<?php echo $unUser['img']; ?>" alt="">
                <h3><?php echo $unUser['nom']; ?></h2>
                    <h4><?php echo $unUser['prix']; ?> Fcfa
                </h3>
                <p>
                    <?php echo $unUser['processeur']; ?>, <?php echo $unUser['ram']; ?>, <?php echo $unUser['stockage']; ?>
                </p>
                <p class="bv">
                   <a href="Produits/">Détails</a>
                </p>
            </div>
        </div>
        
        <?php } ?>
        </div><br><br>
        

        <h2 class="marqueNam">Samsung</h2>
        <div id="produitCon3" class="Produi-conteiner2">
            <?php

            $listUsers = $con->query('SELECT *  FROM  produit WHERE marque="Samsung" ORDER BY id DESC LIMIT 9');
            $unUser = $listUsers->fetch();
            while ($unUser = $listUsers->fetch()) {
            ?>


<div class="fl">
            <div class="phone">
                <img src="Assets/img_tel/<?php echo $unUser['img']; ?>" alt="">
                <h3><?php echo $unUser['nom']; ?></h2>
                    <h4><?php echo $unUser['prix']; ?> Fcfa
                </h3>
                <p>
                    <?php echo $unUser['processeur']; ?>, <?php echo $unUser['ram']; ?>, <?php echo $unUser['stockage']; ?>
                </p>
                <p class="bv">
                   <a href="Produits/">Détails</a>
                </p>
            </div>
        </div>
        <script>
    // Défilement pour #produit-con
    const produitCon = document.getElementById('produit-con');
    function scrollHorizontally1() {
        produitCon.scrollLeft += 1;
        if (produitCon.scrollLeft >= produitCon.scrollWidth - produitCon.clientWidth) {
            produitCon.scrollLeft = 0;
        }
        requestAnimationFrame(scrollHorizontally1);
    }
    scrollHorizontally1();

    // Défilement pour #produitCon2
    const produitCon2 = document.getElementById('produitCon2');
    function scrollHorizontally2() {
        produitCon2.scrollLeft += 1;
        if (produitCon2.scrollLeft >= produitCon2.scrollWidth - produitCon2.clientWidth) {
            produitCon2.scrollLeft = 0;
        }
        requestAnimationFrame(scrollHorizontally2);
    }
    scrollHorizontally2();

    // Défilement pour #produitCon3
    const produitCon3 = document.getElementById('produitCon3');
    function scrollHorizontally3() {
        produitCon3.scrollLeft += 1;
        if (produitCon3.scrollLeft >= produitCon3.scrollWidth - produitCon3.clientWidth) {
            produitCon3.scrollLeft = 0;
        }
        requestAnimationFrame(scrollHorizontally3);
    }
    scrollHorizontally3();
</script>


        <?php } ?>
        </div>
        <div class="showMore">
        <p><h4><a href="">Visiter maintenant toutes nos marques</a></h4></p>
        <i  class="fa fa-chevron-down"></i>
        </div>
    </section>
    <section class="GoodPri">
        <div class="right"> <br>
            <h1 class="h1">Chez Jonas TECH</h1><br>
            <p class="p1">Nous offrons un meilleure prix a nos produits</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel veniam <br> minus laboriosam quaerat magnam numquam vero quibusdam,<br> minima, tenetur itaque Lorem ipsum dolor, sit amet consectetur adipisicing<br> elit. Ullam asperiores voluptate maiores, repudiandae numquam atque <br> dolore reiciendis eum alias iusto cum ipsum, expedita, id inventore reprehen </p>
        </div>
    </section>
    <section class="AboutUs">
        <div class="right"><br>
            <h1 class="h2">A propos de nous</h1><br><br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>Quaerat voluptates obcaecati officia dolor ducimus, except-<br>uri facere laboriosam recusandae labore, quam commodi debi <br>facilis veniam tenetur maiores reprehenderit. Laudantium, quas modi.</p>
        </div>
    </section>
    <section class="ContactUs"><br>
        <div class="right">
            <h1 class="th2">Contacter Nous</h1>
        </div>
        <div class="formol">
            <form action="" method="post">
                <div class="flex">
                    <div class="mess">
                        <label for="">Message:</label><br>
                        <textarea name="" id="" cols="30" rows="19" required></textarea>
                    </div>
                    <div>
                        <label for="">Nom:</label><br>
                        <input type="text" name="nom" id="nom" required><br><br>
                        <label for="">Prenom:</label><br>
                        <input type="text" name="prenom" required><br><br>
                        <label for="">Numéro de téléphone:</label><br>
                        <input type="tel" name="tel" id="tel" required><br><br>
                        <label for="">Email:</label><br>
                        <input type="email" name="" id="" required><br>
                        <input class="IptS" type="submit">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section>
        <?php if (!isset($_COOKIE['connect'])) { ?>
            <div class="inscF">
                <div>
                    <p class="ofdjnf">Inscriver-vous Maintenant</p>
                </div>
                <div>
                    <form action="Inscription/" method="post">
                        <input class="emipt" type="email" placeholder="Email" name="email" required>
                        <button class="njn" type="submit">Envoyer</button>
                    </form>
                </div>

            </div>
        <?php  } ?>
    </section>
    <section class="foot">
        <div class="flexF">
            <div class="des">
                <h1>Jonas TECH</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing <br> Quo excepturi eos</p>
            </div>
            <div class="footLink">
                <h1>Liens rapide</h1>
                <a href="">Acceuil</a><br><br>
                <a href="">Produits</a><br><br>
                <a href="">A propos</a><br><br>
                <a href="">Contact</a><br><br>
            </div>
            <div class="Produits">
                <h1>Produits</h1>
                <a href="">Infinix</a><br><br>
                <a href="">Tecno</a><br><br>
                <a href="">Redmi</a><br><br>
                <a href="">Samsung</a><br><br>
            </div>
            <div class="autre">
                <h1>Autre</h1>
                <a href="">FAQ</a><br><br>
                <a href="">Nos prix</a><br><br>
                <a href="">Nouveau produits</a><br><br>
            </div>
            <div class="rejoi">
                <h1>Rejoignez-nous</h1>
                <p>Lorem ipsum dolor, sit amet consectetur <br> adipisicing elit. Perspiciatis in, </p>
                <div class="ic">
                    <a href=""><i class="fa fa-facebook" style="font-size:26px; margin-right:10px;"></i></a>
                    <a href=""><i class="fa fa-instagram" style="font-size:26px; margin-right:10px;"></i></a>
                    <a href=""><i class="fa fa-youtube" style="font-size:26px; margin-right:10px;"></i></a>
                    <a href=""><i class="fa fa-twitter" style="font-size:26px; margin-right:10px;"></i></a>
                </div>
            </div>
        </div>
    </section>
</body>
<footer>
    <div>
        <div>Copyright © 2024. All Rights Reserved. Jonas TECH</div>
    </div>
    <div>Condition Légale</div>
    <div>Confidentialité</div>
    <div>Politique d'entreprise</div>
</footer>

</html>