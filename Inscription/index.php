<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/insc.css">
    <title>Inscription</title>
</head>

<body>
    <section>
        <?php include('../Content/menu.php'); ?>
    </section>
    <section>
        <h1>Inscription</h1>
        <div class="tt">
            <form class="fm" action="traitIns.php" method="post">
                <div class="tr">
                    <div class="in">
                        <label for="name">Nom :</label><br>
                        <input class="fk" name="nom" type="text" required><br>
                        <label class="lbl3" for="prenom">Prenom :</label><br>
                        <input class="fk" name="prenom" type="text" required><br>
                        <label class="lbl1" for="email">Email :</label><br>
                        <input class="fk" name="email" type="email" value="
                        <?php if (isset($_POST['email'])) {
                            echo $_POST['email'];
                        } ?>
                        " required><br>
                        <label for="pays">Pays</label><br>
                        <input class="fk" name="pays" type="text" required><br>
                        <input class="sbm" type="submit">
                    </div>
                    <div>
                        <label for="tel">Numero de telephone :</label><br>
                        <input class="fk" name="tel" type="number" required><br>
                        <label for="ville">Ville</label><br>
                        <input class="fk" name="ville" type="text" required><br>
                        <label class="lbl2" for="password">Mot de passe* :</label><br>
                        <input class="fk" name="password" type="password" required><br>
                        <label class="lbl4" for="password2">Valider votre mot de passe* :</label><br>
                        <input class="fk" type="password" required><br>
                        <input type="reset">
                    </div>
                </div>
                <div class="Dc">
                <p>Déja un compte ?</p>
        <a href="../Connexion/">Connecté-vous</a>
        </div>
        </div>
        </form>
        </div>
    </section>
    <section>
        <?php include('../Content/footer.php'); ?>
        </section>
</body>

</html>