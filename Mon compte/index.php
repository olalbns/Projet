<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Profiles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="../Js/script4.js" defer></script>
    <script src="../Js/script5.js" defer></script>
    <title>Mon compte - Jonas TECH</title>
</head>

<body>
    <?php
    if (isset($_COOKIE['connect'])) {


    ?>
        <section>
            <?php include('../Content/menu.php') ?>
        </section>
        <?php include('../Content/connect.php');
        $listUsers = $con->query('SELECT * FROM utilisateur WHERE id=' . $_COOKIE['connect']);
        ?>
        <section class="profile">
            <div class="Ppba">
                <div id="nnp" class="Detail">
                    <span>Mes details</span>
                    <div id="roo" class="underli"></div>
                </div>
                <div id="Conm" class="com">
                    <span>Mes commandes</span>
                    <div id="cha" class="underli1" hidden></div>
                </div>
                <div class="disconnet">
                    <form id="frm" action="disconnect.php" method="post">
                        <button type="button" id="ni">Deconnexion</button>
                    </form>

                </div>
            </div>

            <div id="modale">
                <div>
                    <p>Voulez vous vraiment vous deconnecter ?</p>
                    <button id="Decbtn">Deconnecter</button>
                    <button id="Canbtn">Annuler</button>
                </div>
    </div>
    <?php if (isset($_COOKIE['mod'])) {?>
            <div class="info">
            
                <p>Modification effectuée</p>
           
            </div>
            <?php } ?>
        </section>
        <section id="ha" class="Paffp">
            <h1>Mes details</h1> <br>
            <div>

                <form class="fm" action="trait.php" method="post">
                    <?php while ($unUser = $listUsers->fetch()) { ?>
                        <div class="tr">
                            <div class="in">
                                <label for="name">Nom :</label><br>
                                <input class="fk" name="nom" type="text" value="<?php echo $unUser['nom']; ?>" required><br>
                                <label class="lbl3" for="prenom">Prenom :</label><br>
                                <input class="fk" name="prenom" type="text" value="<?php echo $unUser['prenom']; ?>" required><br>
                                <label class="lbl1" for="email">Email :</label><br>
                                <input class="fk" name="email" type="email" value="<?php echo $unUser['email'];  ?>" required><br>
                                <label for="pays">Pays</label><br>
                                <input class="fk" name="pays" type="text" value="<?php echo $unUser['pays'];  ?>" required><br><br>
                            </div>
                            <div>
                                <label for="tel">Numero de telephone :</label><br>
                                <input class="fk" name="tel" type="number" value="<?php echo $unUser['tel'];  ?>" required><br>
                                <label for="ville">Ville</label><br>
                                <input class="fk" name="ville" type="text" value="<?php echo $unUser['ville'];  ?>" required><br>
                                <label class="lbl2" for="password">Mot de passe* :</label><br>
                                <input class="fk" name="password" type="password" value="<?php echo $unUser['password'];  ?>" required><br>
                                <label class="lbl4" for="password2">Valider votre mot de passe* :</label><br>
                                <input class="fk" type="password" value="<?php echo $unUser['password'];  ?>" required><br><br>
                            </div>
                        </div>
            </div>
            <h1>Details de mode de payement</h1>
                <div class="cent">
                    <div>
                    <label for="carte">Carte de credit :</label><br>
                    <input name="carte" value="<?php echo $unUser['carte'];  ?>" class="fk" type="tel" required><br><br>
                    <input class="sbm" type="submit" value="Modifier">

                    </div>
                    <div>
                    <label for="momo">Numero de payement mobile(MTN,Moov)</label><br>
                    <input name="momo" value="<?php echo $unUser['momo'];  ?>" class="fk" type="tel"><br><br>
                    <input class="sbm" type="reset">
                    </div>
                </div>
                <?php } ?>
            </form>
            </div>
        </section>
        <section id="kk" class="nnu" hidden>
            <h1>Mes commandes</h1>
            <div class="os">
                <div><span>Details</span></div>
                <div><span>Quantité</span></div>
                <div><span>ID de commande</span></div>
                <div><span>Total</span></div>
                <div><span>Statut</span></div>
                <div><span>Payé</span></div>
            </div><br>
            <hr>
        </section>

        <?php
        if (isset($_GET['id'])) {
            $nop = $_GET['id'];
            if ($nop == "kk") { ?>
                <script>
                    ha.setAttribute("hidden", true);
                    cha.removeAttribute("hidden");
                    roo.setAttribute("hidden", true);
                    kk.removeAttribute("hidden");
                </script>

            <?php  } elseif ($nop == "llm") { ?>
                <script>
                    kk.setAttribute("hidden", true);
                    ha.removeAttribute("hidden");
                    roo.removeAttribute("hidden");
                    cha.setAttribute("hidden", true);
                </script>
            <?php }
        } else { ?>
            <script>
                kk.setAttribute("hidden", true);
                ha.removeAttribute("hidden");
                roo.removeAttribute("hidden");
                cha.setAttribute("hidden", true);
            </script>
        <?php }
    } else {
        include('../Content/menu.php'); ?>
        <center>Veuiller d'abord vous connecter</center>
    <?php  } ?>
</body><br><br>
<section>
    <?php include('../Content/footer.php') ?>
</section>

</html>