<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Usc.css">
    <title>Connexion</title>
</head>
<body>
    <section>
    <?php include('../Content/menu.php'); ?>
    </section>
    <div class="pl">
        <?php if (isset($_COOKIE['modIn'])) {
            echo ' <div class="modIn">
            <p>Email ou mot de passe incorret</p>
        </div>';
        setcookie("connect",$_COOKIE['modIn'], time() - 210600, "/"); // 6 heures
        
        } ?>
       
    <div>
        <form class="bdx" method="post" action="traiCo.php">
            <h1>Connexion</h1>
            <label for="nom">Email</label><br>
            <input name="email" type="email" required><br>
            <label for="password">Mot de passe</label><br>
            <input name="password" type="text" required><br>
            <input type="submit" value="Se connecté">
            <p>Vous n'avez pas de compte ?</p>
            <center><a href="../Inscription/">Inscriver-vous</a></center>
        </form>
        </div>
        </div>
    <section>
    <?php include('../Content/footer.php'); ?>
    </section>
</body>
</html>