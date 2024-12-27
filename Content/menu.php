<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/responsive.css">
    <link rel="stylesheet" href="../Css/menu.css">
    <script src="../Js/script1.js" defer></script>
    <script src="../Js/script4.js" defer></script>
    <title></title>
</head>

<body>
    <?php include('connect.php'); ?>
    <header>
        <nav>
            <div class="menu">
                <div class="menName">
                    <a href="../"><span class="nnnk">Jonas</span> TECH</a>
                </div>
                <div class="menLinks">
                    <a href="../">Acceuil</a>
                    <a href="../Produits/">Produits</a>
                    <a href="../Contact-Us/">Contact</a>
                </div>
                <div class="menElement">
                    <div id="esc" class="icnDiv">
                        <a href="../Panier/"><i class="fas fa-cart-plus"></i></a>
                    </div>
                </div>
                <div class="searchDiv">
                    <div>
                        <button onclick="aff()" id="searchbtn" class="icn"><i class="fa fa-search"
                                ></i></button>
                    </div>
                    <div>
                        <form action="../Produits/index.php" method="get"><input name="search" id="iptsearch" type="search"
                                placeholder="Search here...." hidden></form>
                    </div>
                </div>

                <?php include('connect.php');


                if (isset($_COOKIE['connect'])) {
                    if (!isset($_COOKIE['modIn'])) {
                        # code...
                ?>
                        <div class="juju">
                            <div class="dropdown" id="userNamE">
                                <?php $userId = intval($_COOKIE['connect']);
                                $listUsers = $con->query("SELECT * FROM utilisateur WHERE id = $userId")->fetch();
                                ?>
                                <a href="../Mon compte/" class="btnnnn"><?php echo htmlspecialchars($listUsers['nom']); ?> <?php echo htmlspecialchars($listUsers['prenom']); ?></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                    <a class="dropdown-item" href="../Mon compte/?id=kk">Mes commande</a><br><br>
                                    <a class="dropdown-item" href="../Mon compte/?id=llm">Mes details</a><br><br>
                                    <a class="dropdown-item" href="../Mon compte/">Deconnexion</a>

                                </ul>
                            </div>
                        </div>



            </div>
        <?php } else { ?>

            <div class="juju">
                <div class="dropdown" id="userNamE">
                    <a class="btnnnn" href="../Inscription/">Inscription</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="../Connexion/">Connexion</a>
                    </ul>
                </div>
            </div>
        <?php  }
                } else { ?>
        <div class="juju">
            <div class="dropdown" id="userNamE">
                <a class="btnnnn" href="../Inscription/">Inscription</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../Connexion/">Connexion</a>
                </ul>
            </div>
        </div>
    <?php } ?>
    </div>
        </nav>
    </header>
</body>

</html>