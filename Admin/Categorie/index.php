<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Css/adm.css">
    <title>Categorie</title>
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
            <section>
            <div class="Pg-cate-div">
            <h1>Categorie de produit</h1>
            <div id="md" class="Ajs">
                <span><i class="fa fa-plus"> Nouvelle categorie</i></span>
            </div><br>



            <div class="categorie-Container">
                <?php
                include('../connect.php');
                $listUsers = $con->query('SELECT * FROM  categorie');
                while ($unUser = $listUsers->fetch()) {
                ?>
                    <div id="k<?php echo $unUser['id_cate']; ?>" class="categorie">

                        <h3><?php echo $unUser['nom']; ?></h3>

                    </div><br><br>


                    <div style="display: none;" class="modaleMod1" id="modaleAj<?php echo $unUser['id_cate']; ?>">
                        <div class="niop">
                            <span id="close<?php echo $unUser['id_cate']; ?>" class="close">&times;</span>
                            <div class="main">
                                <script>
                                    // Obtenir les éléments spécifiques de chaque utilisateur
                                    var k<?php echo $unUser['id_cate']; ?> = document.getElementById('k<?php echo $unUser['id_cate']; ?>');
                                    var modaleAj<?php echo $unUser['id_cate']; ?> = document.getElementById('modaleAj<?php echo $unUser['id_cate']; ?>');
                                    var close<?php echo $unUser['id_cate']; ?> = document.getElementById('close<?php echo $unUser['id_cate']; ?>');


                                    // Afficher le modal quand on clique 
                                    k<?php echo $unUser['id_cate']; ?>.onclick = function() {
                                        modaleAj<?php echo $unUser['id_cate']; ?>.style.display = "flex"; // Affiche le modal

                                    }

                                    // Fermer le modal quand on clique sur le bouton "Fermer"
                                    close<?php echo $unUser['id_cate']; ?>.onclick = function() {
                                        modaleAj<?php echo $unUser['id_cate']; ?>.style.display = "none"; // Cache le modal

                                    }
                                </script>
                            </div>
                            <form action="updateAj.php" method="post" enctype="multipart/form-data">
                                <div style="display: flex; justify-content:space-around; margin-top:30px;">
                                    <div>
                                        <label for="nom">Nom de la categorie</label><br>
                                        <input value="<?php echo $unUser['nom']; ?>" name="nom" class="iptNameModAdm" type="text" required> <br>
                                        <input name="id" value="<?php echo $unUser['id_cate']; ?>" type="text" hidden>
                                    </div>

                                </div>
                                <button class="btnAjModeAdm1" type="submit">Modifier</button><br><br>

                            </form>
                            <button id="Suv4uy<?php echo $unUser['id_cate']; ?>" class="btnAjModeAdm1">Supprimer <i class="fa fa-trash" style="color: red;"></i></button>
                            <script>
                                document.getElementById('Suv4uy<?php echo $unUser['id_cate']; ?>').onclick = function() {
                                    location.href = "./?id=<?php echo $unUser['id_cate']; ?>";
                                }
                            </script>
                        </div>
                    </div>
                    <?php
                    include('../connect.php');
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $del = $con->prepare("DELETE FROM categorie where id_cate= '$id'");
                        $del->execute(); ?>
                        <script>
                            location.href = "./";
                        </script>
                    <?php }
                    if (isset($_GET['idM'])) {
                        $id = $_GET['idM'];
                        $del = $con->prepare("DELETE FROM marque where id_marq= '$id'");
                        $del->execute(); ?>
                        <script>
                            location.href = "./";
                        </script>
                    <?php    }

                    ?>



                <?php } ?>
            </div>



            <div style="display: none;" class="modaleMod1" id="modaleAj">
                <div class="niop">
                    <span id="close" class="close">&times;</span>
                    <div class="main">
                        <script>
                            // Obtenir les éléments spécifiques de chaque utilisateur
                            var md = document.getElementById('md');
                            var modaleAj = document.getElementById('modaleAj');
                            var close = document.getElementById('close');


                            // Afficher le modal quand on clique 
                            md.onclick = function() {
                                modaleAj.style.display = "flex"; // Affiche le modal

                            }

                            // Fermer le modal quand on clique sur le bouton "Fermer"
                            close.onclick = function() {
                                modaleAj.style.display = "none"; // Cache le modal

                            }
                        </script>
                    </div>
                    <form action="traitAj" method="post" style="text-align: center;">
                        <label for="nom">Nom de la catégorie</label><br><br>
                        <input name="nom" type="text"><br>
                        <button class="btnAjModeAdm2" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>

            <h1>Marqes des produits</h1>
            <div id="mda" class="Ajs">
                <span><i class="fa fa-plus"> Nouvelle marque</i></span>
            </div><br>
            <div class="categorie-Container">
                <?php
                include('../connect.php');
                $listUsers = $con->query('SELECT * FROM  marque');
                while ($unUser = $listUsers->fetch()) {
                ?>
                    <div id="kl<?php echo $unUser['id_marq']; ?>" class="categorie">

                        <h3><?php echo $unUser['nom']; ?></h3>

                    </div><br><br>


                    <div style="display: none;" class="modaleMod1" id="modaleAjp<?php echo $unUser['id_marq']; ?>">
                        <div class="niop">
                            <span id="closek<?php echo $unUser['id_marq']; ?>" class="close">&times;</span>
                            <div class="main">
                                <script>
                                    // Obtenir les éléments spécifiques de chaque utilisateur
                                    var kl<?php echo $unUser['id_marq']; ?> = document.getElementById('kl<?php echo $unUser['id_marq']; ?>');
                                    var modaleAjp<?php echo $unUser['id_marq']; ?> = document.getElementById('modaleAjp<?php echo $unUser['id_marq']; ?>');
                                    var closek<?php echo $unUser['id_marq']; ?> = document.getElementById('closek<?php echo $unUser['id_marq']; ?>');


                                    // Afficher le modal quand on clique 
                                    kl<?php echo $unUser['id_marq']; ?>.onclick = function() {
                                        modaleAjp<?php echo $unUser['id_marq']; ?>.style.display = "flex"; // Affiche le modal

                                    }

                                    // Fermer le modal quand on clique sur le bouton "Fermer"
                                    closek<?php echo $unUser['id_marq']; ?>.onclick = function() {
                                        modaleAjp<?php echo $unUser['id_marq']; ?>.style.display = "none"; // Cache le modal

                                    }
                                </script>
                            </div>
                            <form action="updateAj2.php" method="post" enctype="multipart/form-data">
                                <div style="display: flex; justify-content:space-around; margin-top:30px;">
                                    <div>
                                        <label for="nom">Nom de la categorie</label><br>
                                        <input value="<?php echo $unUser['nom']; ?>" name="nom" class="iptNameModAdm" type="text" required> <br>
                                        <input name="id" value="<?php echo $unUser['id_marq']; ?>" type="text" hidden>
                                    </div>

                                </div>
                                <button class="btnAjModeAdm1" type="submit">Modifier</button><br><br>

                            </form>
                            <button id="Suv4uyl<?php echo $unUser['id_marq']; ?>" class="btnAjModeAdm1">Supprimer <i class="fa fa-trash" style="color: red;"></i></button>
                            <script>
                                document.getElementById('Suv4uyl<?php echo $unUser['id_marq']; ?>').onclick = function() {
                                    location.href = "./?idM=<?php echo $unUser['id_marq']; ?>";
                                }
                            </script>
                        </div>
                    </div>

                <?php } ?>

                <div style="display: none;" class="modaleMod1" id="modaleAjk">
                    <div class="niop">
                        <span id="closel" class="close">&times;</span>
                        <div class="main">
                            <script>
                                // Obtenir les éléments spécifiques de chaque utilisateur
                                var mda = document.getElementById('mda');
                                var modaleAjk = document.getElementById('modaleAjk');
                                var closel = document.getElementById('closel');


                                // Afficher le modal quand on clique 
                                mda.onclick = function() {
                                    modaleAjk.style.display = "flex"; // Affiche le modal

                                }

                                // Fermer le modal quand on clique sur le bouton "Fermer"
                                closel.onclick = function() {
                                    modaleAjk.style.display = "none"; // Cache le modal

                                }
                            </script>
                        </div>
                        <form action="traitAj2" method="post" style="text-align: center;">
                            <label for="nom">Nom de la Marque</label><br><br>
                            <input name="nom" type="text"><br>
                            <button class="btnAjModeAdm2" type="submit">Ajouter</button>
                        </form>
                    </div>
                </div>



            </div>
            </div>
            </section>
        </div>
</body>

</html>