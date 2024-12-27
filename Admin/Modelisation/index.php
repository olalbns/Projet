<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Css/adm.css">
    <title>Modelisation</title>
</head>

<body>
    <div class="Ensemble">
        <div class="NavAdm">
            <section id="lol" class="nlojshk">
                <div class="Ppba">
                    <div>
                        <p style="font-size:30px; padding:-10px; font-weight:bold; text-align:center;">Jonas <span style="color: blue;">TECH</span></p>
                    </div><br>
                    <div class="Dashboard">
                        <span><i class="fa fa-dashboard" style="color: blue;font-size:20px;"></i> <a href="../Dashboard/">Tableau de bord</a></span>
                    </div>
                    <div id="nnp" class="Detail">
                        <span><i class="fa fa-users" style="color: blue;font-size:20px;"></i> <a href="../Utilisateurs/">Utilisateurs</a></span>
                        <div id="roo" class="underli"></div>
                    </div>
                    <div class="evenrt">
                        <span><i class="fa fa-list" style="color: blue;font-size:20px;"></i><a href="../Commandes/">Commande</a></span>
                    </div>
                    <div id="modelisa" class="modelisa">
                        <span><i class="fa fa-pencil" style="color: blue;font-size:20px;"></i> <a href="../Modelisation/">Modelisation</a></span>
                        <div></div>
                    </div>
                    <div id="Conm" class="com">
                    <div class="PdsAdm">
                            <span> <i class="fa fa-tag" style="color: blue;font-size:20px;"></i> <a href="../Produit/">Produits</a></span>
                            <span  class="PluAff"><i id="chevron-drop" style="display: none;" class="fa fa-chevron-down"></i> <i id="up" class="fa fa-chevron-up"></i></span>
                        </div>
                        <div id="cha" class="underli1" hidden></div>
                        <div id="element-down" class="back">
                            <hr>
                            <div class="liste23">
                                <i class="fa fa-plus-square" style="color: blue;font-size:20px;"></i> <a href="../Ajouter/">Ajouter un produit</a>
                            </div>
                            <div class="liste23">
                                <i class="fa fa-tags" style="color: blue;font-size:20px;"></i> <a href="../Produit/">Tout les produits</a>
                                <hr>
                            </div>
                        </div>
                        
                    </div>
                    <div class="Cate">
                        <span><i class="fa fa-tags" style="color: blue;font-size:20px;"></i> <a href="../Categorie/">Catégorie de produit</a></span>
                    </div>
                    <div id="ms" class="disconnet" style=" background-color: rgba(0, 0, 0, 0.242) ;">
                        <span><i class="fa fa-envelope" style="color: blue;font-size:20px;"></i> <a href="../Messages/">Messages</a></span>
                        <div class="underli2" id="ik" hidden></div>
                    </div>
                    <script>
                        var chevro = document.getElementById('chevron-drop');
                        var element_down= document.getElementById('element-down');
                        var up=document.getElementById('up');
                        up.addEventListener("click", function() {
                            
                            if (chevro.style.display === "none") {
                                element_down.style.display = "none";
                                chevro.style.display="inline-block";
                                up.style.display="none";
                            }else{
                               alert("njkjkjjhj");
                            } 
                        });
                        chevro.addEventListener("click", function(){
                            if (element_down.style.display === "none") {
                                element_down.style.display = "block";
                                up.style.display="inline-block";
                                chevro.style.display="none";
                            }else{
                                alert("fff");
                            }
                        });
                            
                        
                    </script>
                </div>

            </section>
        </div>
        <div class="InnfoMaAdm">
            <h1>Modelisation</h1><br><br>
            <h3>*Image deroulant</h3>
            <?php
            include('switch-img.php');
            ?>
            <div class="BtnModAdmDiv">
                <button id="n" class="BtnModAdm">Modifier</button>
                <button id="md" class="BtnModAdm2">
                    Ajouter une nouvelle image
                </button>
            </div>
        </div>
        <div style="display: none;" class="modaleMod" id="modaleAj">
            <div class="niop">
                <span id="close4" class="close">&times;</span>
                <div class="main">
                    <script>
                        // Obtenir les éléments spécifiques de chaque utilisateur
                        var md = document.getElementById('md');
                        var modaleAj = document.getElementById('modaleAj');
                        var close4 = document.getElementById('close4');


                        // Afficher le modal quand on clique 
                        md.onclick = function() {
                            modaleAj.style.display = "flex"; // Affiche le modal

                        }

                        // Fermer le modal quand on clique sur le bouton "Fermer"
                        close4.onclick = function() {
                            modaleAj.style.display = "none"; // Cache le modal

                        }
                    </script>
                </div>
                <form action="traitAj.php" method="post" enctype="multipart/form-data">
                    <div style="display: flex; justify-content:space-around; margin-top:30px;">

                        <div>
                            <label for="img">Image</label><br>
                            <input name="img" type="file" readfile required>
                        </div>
                        <div>
                            <label for="nom">Nom du produit</label><br>
                            <input name="nom" class="iptNameModAdm" type="text" required>
                        </div>
                        <div>
                            <label for="info">Information sur l'image</label><br><br>
                            <textarea name="info" id="" cols="30" rows="8" required></textarea>
                        </div>

                    </div>
                    <button class="btnAjModeAdm" type="submit">Ajouter</button>

                </form>
            </div>
        </div>
        <div id="modale" class="modaleMod">
            <div class="niop">
                <span id="close" class="close">&times;</span>
                <div class="main">
                    <script>
                        // Obtenir les éléments spécifiques de chaque utilisateur
                        var n = document.getElementById('n');
                        var modale = document.getElementById('modale');
                        var close = document.getElementById('close');


                        // Afficher le modal quand on clique 
                        n.onclick = function() {
                            modale.style.display = "flex"; // Affiche le modal

                        }

                        // Fermer le modal quand on clique sur le bouton "Fermer"
                        close.onclick = function() {
                            modale.style.display = "none"; // Cache le modal

                        }
                    </script>
                </div>
                <div>
                    <form action="" method="post">
                        <?php
                        include('../connect.php');
                        $listUsers = $con->query('SELECT * FROM  model');
                        while ($unUser = $listUsers->fetch()) {
                        ?>
                            <div style="display: flex; justify-content:space-between; margin-top:30px;">

                                <div>
                                    <label for="">Image</label><br>
                                    <input type="file">
                                </div>
                                <div>
                                    <label for="">Nom du produit</label><br>
                                    <input value="<?php echo $unUser['nom']; ?>" class="iptNameModAdm" type="text">
                                </div>
                                <div>
                                    <label for="">Information sur l'image</label><br><br>
                                    <textarea name="" id="" cols="30" rows="8"><?php echo $unUser['info']; ?></textarea>
                                </div>
                                <div>
                                    <button id="btnDelModAdm<?php echo $unUser['id']; ?>">Supprimer<i class="fa fa-trash" style="color: red;"></i></button>
                                    <script>
                                        document.getElementById('btnDelModAdm<?php echo $unUser['id']; ?>').onclick = function() {
                                            location.href = "?id=<?php echo $unUser['id']; ?>";
                                        }
                                    </script>
                                </div>
                            </div>
                        <?php } ?>
                        <button class="àççèèè">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $del = $con->prepare("DELETE FROM model where id= '$id'");
        $del->execute(); ?>
        <script>
            location.href = "./";
        </script>
    <?php } ?>
</body>

</html>