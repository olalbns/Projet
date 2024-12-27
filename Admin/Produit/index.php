<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Css/adm.css">
    <title>Tout les produit</title>
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
            <section id="kk" class="nnu">
                <div class="flexx">

                    <?php
                    include('../connect.php');
                    $listcate = $con->query('SELECT * FROM  categorie');
                    $listmrq = $con->query('SELECT * FROM  marque');

                    $marque = $listmrq->fetch();
                    $listUsers = $con->query('SELECT * FROM  produit ORDER BY id DESC');
                    while ($unUser = $listUsers->fetch()) {
                    ?>





                        <div class="fl">
                            <div class="phone">
                                <img src="../../Assets/img_tel/<?php echo $unUser['img']; ?>" alt="">
                                <h3><?php echo $unUser['nom']; ?></h2>
                                    <h4><?php echo $unUser['prix']; ?> Fcfa
                                </h3>
                                <p>
                                    <?php echo $unUser['processeur']; ?>, <?php echo $unUser['ram']; ?>, <?php echo $unUser['stockage']; ?>;
                                </p>
                                <p class="bv">
                                    <a style="color: blue;" id="n<?php echo $unUser['id']; ?>" href="">Modifier</a>
                                    <a id="nia<?php echo $unUser['id']; ?>" style="color: red;" href="?id=<?php echo $unUser['id']; ?>">Supprimer</a>
                                </p>
                            </div>
                        </div>


                        <div class="mdl">

                            <div id="modale<?php echo $unUser['id']; ?>" class="modale" style="display: none;">
                                <div class="niop">
                                    <span id="close<?php echo $unUser['id']; ?>" class="close">&times;</span>
                                    <div class="main">

                                        <script>
                                            // Obtenir les éléments spécifiques de chaque utilisateur
                                            var n<?php echo $unUser['id']; ?> = document.getElementById('n<?php echo $unUser['id']; ?>');
                                            var modale<?php echo $unUser['id']; ?> = document.getElementById('modale<?php echo $unUser['id']; ?>');
                                            var close<?php echo $unUser['id']; ?> = document.getElementById('close<?php echo $unUser['id']; ?>');


                                            // Afficher le modal quand on clique sur le lien "Details"
                                            n<?php echo $unUser['id']; ?>.onclick = function(event) {
                                                event.preventDefault(); // Empêche le comportement par défaut du lien
                                                modale<?php echo $unUser['id']; ?>.style.display = "flex"; // Affiche le modal
                                                lol.style.position = "relative";
                                                lol.style.zIndex = "0";
                                                lol.style.top = "auto";
                                            }

                                            // Fermer le modal quand on clique sur le bouton "Fermer"
                                            close<?php echo $unUser['id']; ?>.onclick = function() {
                                                modale<?php echo $unUser['id']; ?>.style.display = "none"; // Cache le modal
                                                lol.style.position = "sticky";

                                            }
                                        </script>



                                    </div>
                                    <div class="detailpr">
                                        <form method="post" action="trait.php" enctype="multipart/form-data">
                                            <div class="klow">
                                                <div>
                                                    <input name="id" value="<?php echo $unUser['id']; ?>" type="text" hidden>
                                                    <label for="img">Image</label><br>
                                                    <input type="file" name="img" accept="image/*" onchange="displayImage(this)" required><br>
                                                    <label for="nom">Nom</label><br>
                                                    <input value="<?php echo $unUser['nom']; ?>" name="nom" type="text" required><br>
                                                    <label for="prix">Prix</label><br>
                                                    <input name="prix" value="<?php echo $unUser['prix']; ?>" type="number"><br>
                                                    <label for="pro">Processeur</label><br>
                                                    <input name="processeur" value="<?php echo $unUser['processeur']; ?>" type="text" required><br>
                                                    <label for="cam">Camera</label><br>
                                                    <input name="camera" value="<?php echo $unUser['camera']; ?>" type="text" required><br>
                                                    <label for="ecran">Ecran</label><br>
                                                    <input name="ecran" value="<?php echo $unUser['ecran']; ?>" type="text" required><br>
                                                </div>
                                                <div>
                                                    <label for="ram">Ram</label><br>
                                                    <input name="ram" value="<?php echo $unUser['ram']; ?>" type="text" required><br>
                                                    <label for="stock">Stockage</label><br>
                                                    <input name="stockage" value="stockage" type="text" required><br>

                                                    <label for="cat">Categorie</label><br>
                                                    <select name="categorie" id="">
                                                        <option value="<?php echo $unUser['categorie']; ?>"><?php echo $unUser['categorie']; ?></option>
                                                        <option value="Photographie">Photographie</option>
                                                        <option value="Premium">Premium</option>
                                                        <option value="Pliable">Pliable</option>
                                                        <option value="Entrée de gamme">Entrée de gamme</option>
                                                        <option value="Milieu de gamme">Milieu de gamme</option>
                                                        <option value="Resistant">Resistant</option>
                                                        <option value="Seniors">Seniors</option>
                                                        <option value="Secure phone">Secure phone</option>
                                                        <option value="Grande autonomie">Grande autonomie</option>
                                                        <option value="5G">5G</option>
                                                        <option value="Gaming">Gaming</option>

                                                    </select><br>

                                                    <label for="marque">Marque</label><br>
                                                    <select name="marque" id="">
                                                        <option value="<?php echo $unUser['marque']; ?>"><?php echo $unUser['marque']; ?></option>
                                                        <option value="Tecno">Tecno</option>
                                                        <option value="Redmi">Redmi</option>
                                                        <option value="Asus">Asus</option>
                                                        <option value="Infinix">Infinix</option>
                                                        <option value="samsung">Samsung</option>


                                                    </select><br>
                                                    <label for="aut">Autonomie</label><br>
                                                    <input name="autonomie" value="<?php echo $unUser['autonomie']; ?>" type="text" required><br>
                                                    <label for="cha">Chargeur</label><br>
                                                    <input name="chargeur" value="<?php echo $unUser['chargeur']; ?>" type="text" required><br>
                                                </div>
                                            </div>
                                            <center><button type="submit">Modifier</button>
                                            </center>
                                        </form>
                                        <div>
                                            <p style=" font-size:26px;"><i class="fa fa-warning" style="color: red; "></i><strong>Attention</strong> bien verifier les
                                                information saisis avant validation</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modalen" id="modalen<?php echo $unUser['id']; ?>">
                            <div class="validationMod">
                                <p>Ete vous sur de vouloir supprimer cet element ?</p>
                                <button id="Decbtn<?php echo $unUser['id']; ?>">Supprimer</button>
                                <button id="Canbtn<?php echo $unUser['id']; ?>">Annuler</button>
                            </div>
                        </div>
                        <script>
                            var nia<?php echo $unUser['id']; ?> = document.getElementById('nia<?php echo $unUser['id']; ?>');
                            var modalen<?php echo $unUser['id']; ?> = document.getElementById('modalen<?php echo $unUser['id']; ?>');
                            var Decbtn<?php echo $unUser['id']; ?> = document.getElementById('Decbtn<?php echo $unUser['id']; ?>');
                            var Canbtn<?php echo $unUser['id']; ?> = document.getElementById('Canbtn<?php echo $unUser['id']; ?>');

                            nia<?php echo $unUser['id']; ?>.addEventListener("click", function(event) {

                                event.preventDefault();
                                modalen<?php echo $unUser['id']; ?>.style.display = "flex";


                            });
                            Decbtn<?php echo $unUser['id']; ?>.onclick = function() {
                                location.href = "?id=<?php echo $unUser['id']; ?>";

                            }

                            Canbtn<?php echo $unUser['id']; ?>.onclick = function() {
                                modalen<?php echo $unUser['id']; ?>.style.display = "none";
                            }
                        </script>

                    <?php } ?>
                </div>
                <div id="ajou" class="ajou">
                    <div>
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="span"><strong>Nouveau</strong></div>
                </div>

                <div class="mdl">
                    <div style="display: none;" id="modale" class="modale">
                        <div class="niop">
                            <span id="close" class="close">&times;</span>
                            <div class="main">
                            </div>
                            <div class="detailpr">
                                <form class="klemllsµ" method="post" action="traitAj.php" enctype="multipart/form-data">
                                    <div class="klow">
                                        <div>
                                            <label for="img">Image</label><br>
                                            <input type="file" name="img" accept="image/*" onchange="displayImage(this)" required><br>
                                            <label for="nom">Nom</label><br>
                                            <input name="nom" type="text" required><br>
                                            <label for="prix">Prix</label><br>
                                            <input name="prix" type="number"><br>
                                            <label for="pro">Processeur</label><br>
                                            <input name="processeur" type="text" required><br>
                                            <label for="cam">Camera</label><br>
                                            <input name="camera" type="text" required><br>
                                            <label for="ecran">Ecran</label><br>
                                            <input name="ecran" type="text" required><br>
                                        </div>
                                        <div>
                                            <label for="ram">Ram</label><br>
                                            <input name="ram" type="text" required><br>
                                            <label for="stock">Stockage</label><br>
                                            <input name="stockage" value="stockage" type="text" required><br>
                                            <label for="cat">Categorie</label><br>
                                            <select name="categorie" id="">
                                                <option value="Photographie">Photographie</option>
                                                <option value="Premium">Premium</option>
                                                <option value="Pliable">Pliable</option>
                                                <option value="Entrée de gamme">Entrée de gamme</option>
                                                <option value="Milieu de gamme">Milieu de gamme</option>
                                                <option value="Resistant">Resistant</option>
                                                <option value="Seniors">Seniors</option>
                                                <option value="Secure phone">Secure phone</option>
                                                <option value="Grande autonomie">Grande autonomie</option>
                                                <option value="5G">5G</option>
                                                <option value="Gaming">Gaming</option>

                                            </select><br>
                                            <label for="marque">Marque</label><br>
                                            <select name="marque" id="">
                                                <option value="Tecno">Tecno</option>
                                                <option value="Redmi">Redmi</option>
                                                <option value="Asus">Asus</option>
                                                <option value="Infinix">Infinix</option>
                                                <option value="Samsung">Samsung</option>
                                                <option value="Google">Google</option>
                                            </select><br>
                                            <label for="aut">Autonomie</label><br>
                                            <input name="autonomie" type="text" required><br>
                                            <label for="cha">Chargeur</label><br>
                                            <input name="chargeur" type="text" required><br>
                                        </div>
                                    </div>
                                    <center><button class="button" type="submit">Ajouter</button>
                                    </center>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <script>
            // Obtenir les éléments spécifiques de chaque utilisateur
            var ajou = document.getElementById('ajou');
            var modale = document.getElementById('modale');
            var close = document.getElementById('close');
            var lol = document.getElementById('lol');


            // Afficher le modal quand on clique sur le lien "Details"
            ajou.onclick = function(event) {
                event.preventDefault(); // Empêche le comportement par défaut du lien
                modale.style.display = "flex"; // Affiche le modal
                lol.style.position = "relative";
                lol.style.zIndex = "0";
                lol.style.top = "auto";
            }

            // Fermer le modal quand on clique sur le bouton "Fermer"
            close.onclick = function() {
                modale.style.display = "none"; // Cache le modal
                lol.style.position = "sticky";
            }
        </script>
        </section>
    </div>
    </div>
    <?php
    include('../connect.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $del = $con->prepare("DELETE FROM produit where id= '$id'");
        $del->execute(); ?>
        <script>
            location.href = "./";
        </script>
    <?php }

    ?>
</body>

</html>