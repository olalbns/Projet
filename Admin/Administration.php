<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/adm.css">
    <link rel="stylesheet" href="../Css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Administration - Jonas TECH</title>
</head>
<?php
if (isset($_COOKIE['Admin'])) {


?>

    <body class="n4kke">


        <div class="Ensemble">
            <div class="NavAdm">
                <section id="lol" class="nlojshk">
                    <div class="Ppba">
                        <div>
                            <p style="font-size:28px; font-weight:bolder; text-align:center;">Jonas <span style="color: blue;">TECH</span></p>
                        </div><br>
                        <div class="Dashboard">
                            <span>Tableau de bord</span>
                        </div>
                        <div id="nnp" class="Detail">
                            <span>Utilisateur</span>
                            <div id="roo" class="underli"></div>
                        </div>
                        <div id="modelisa" class="modelisa">
                            <span>Modelisation</span>
                            <div></div>
                        </div>
                        <div id="Conm" class="com">
                            <span>Produits</span>
                            <span class="PluAff"><i class="fa fa-chevron-down"></i></span>
                            <div id="cha" class="underli1" hidden></div>
                        </div>
                        <div class="Cate">
                            <span>Catégorie de produit</span>
                        </div>
                        <div id="ms" class="disconnet">
                            <span>Messages</span>
                            <div class="underli2" id="ik" hidden></div>
                        </div>
                        <div class="evenrt">
                            <span>Advertissement</span>
                        </div>
                    </div>

                </section>
            </div>
            <div class="InnfoMaAdm">
                <section id="ha" class="Paffp">
                    <h1>Liste des utilisateur</h1> <br>
                    <table>
                        <thead>
                            <tr class="trH">
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('connect.php');
                            $listUsers = $con->query('SELECT * FROM utilisateur');

                            while ($unUser = $listUsers->fetch()) {
                                echo '
            <tr  class="tr">
            <td> ' . $unUser['id'] . '</td>
            <td>' . $unUser['nom'] . '</td>
            <td>' . $unUser['prenom'] . '</td>
            <td>' . $unUser['email'] . '</td>
            </tr>
            ';
                            }
                            ?>

                        </tbody>
                    </table>
            </div>

            </section>
            <section id="kk" class="nnu" hidden>
                <div class="flexx">
                    <?php $listUsers = $con->query('SELECT * FROM  produit');
                    while ($unUser = $listUsers->fetch()) {
                    ?>


                        <div class="fl">
                            <div class="phone">
                                <img src="<?php echo $unUser['img']; ?>" alt="">
                                <h3><?php echo $unUser['nom']; ?></h2>
                                    <h4><?php echo $unUser['prix']; ?> Fcfa
                                </h3>
                                <p>
                                    <?php echo $unUser['processeur']; ?>, <?php echo $unUser['ram']; ?>, <?php echo $unUser['stockage']; ?>;
                                </p>
                                <p class="bv">
                                    <a style="color: blue;" id="n<?php echo $unUser['id']; ?>" href="">Modifier</a>
                                    <a id="nia" style="color: red;" href="?id=<?php echo $unUser['id']; ?>">Supprimer</a>
                                </p>
                            </div>
                        </div>


                        <div class="mdl">

                            <div id="<?php echo $unUser['id']; ?>" class="modale" style="display: none;">
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
                                                        <option value="<?php echo $unUser['marque']; ?>"><?php echo $unUser['marque']; ?></option>
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
                        <div id="modalen">
                            <div class="validationMod">
                                <p>Ete vous sur de vouloir supprimer cet element ?</p>
                                <button id="Decbtn">Supprimer</button>
                                <button id="Canbtn">Annuler</button>
                            </div>
                        </div>
                        <script>
                            var nia = document.getElementById('nia');
                            var modalen = document.getElementById('modalen');
                            var Decbtn = document.getElementById('Decbtn');
                            var Canbtn = document.getElementById('Canbtn');

                            nia.addEventListener("click", function(event) {

                                event.preventDefault();
                                modalen.style.display = "flex";


                            });
                            Decbtn.onclick = function() {
                                location.href = "?id=<?php echo $unUser['id']; ?>";

                            }

                            Canbtn.onclick = function() {
                                modalen.style.display = "none";
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
                                                <option value="samsung">Samsung</option>
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
        <section id="msee" hidden>
            <div class="msee">
                <div class="kmqp">
                    <div>
                        <h1>Contact</h1>
                    </div>
                    <div>
                        <h1>Message</h1>
                    </div>
                    <div>
                        <h1>Date</h1>
                    </div>
                    <div>
                        <h1>Action</h1>
                    </div>
                </div>
                <div>
                    <div class="mesCont">
                        <?php
                        include('connect.php');
                        $listUsers = $con->query('SELECT * FROM message ORDER BY dateheur DESC');
                        // $listUsers.= " ORDER BY prix DESC";

                        while ($unUser = $listUsers->fetch()) { ?>


                            <div id="modan<?php echo $unUser['id']; ?>" class="modan" style="display: none;">
                                <div class="niop">
                                    <span id="close<?php echo $unUser['id']; ?>" class="close">&times;</span>
                                    <div class="main">
                                    </div>
                                    <div class="detailpr">
                                        <label for="">Nom</label>
                                        <input type="text" value="<?php echo $unUser['nom']; ?> <?php echo $unUser['prenom']; ?>" readonly><br>
                                        <label for="">Date</label>
                                        <input type="text" value="<?php echo $unUser['dateheur']; ?>" readonly><br>
                                        <label for="">Contact</label>
                                        <input type="text" value="<?php echo $unUser['num']; ?>" readonly><br>
                                        <label for="">Email</label>
                                        <input type="text" value="<?php echo $unUser['email']; ?>" readonly><br>
                                        <label for="">Message</label>
                                        <center><textarea name="" id="" cols="100" rows="20" readonly>
                        <?php echo $unUser['messages']; ?>
                        </textarea></center>


                                    </div>
                                </div>
                            </div>
                    </div>

                </div>

                <?php echo ' 
            <div  class="onmlk"><span id="local' . $unUser['id'] . '" class="onclikk"></span></div>
            <div id="limos' . $unUser['id'] . '" class="message">
            <div class="UserNaNick"><h3>' . $unUser['nom'] . ' ' . $unUser['prenom'] . '</h3></div>
            <div>
            <div class="pm"><span class="msSp" id="mpom' . $unUser['id'] . '">' . $unUser['messages'] . '</span></div>
            </div>
            <div>
            <div class="DatePosi"><span  id="dthr' . $unUser['id'] . '">' . $unUser['dateheur'] . '</span></div>
            </div>
            <div class="ActMes"><span><i style="color:red;" class="fa fa-trash"></i></span></div>
           
            </div>

            <script>
            var Sipt = document.getElementById("Conm");
var ha = document.getElementById("ha");
var kk = document.getElementById("kk");
var nnp = document.getElementById("nnp");
var cha=document.getElementById("cha")
var roo= document.getElementById("roo")
var ms = document.getElementById("ms");
var msee= document.getElementById("msee");
var ik= document.getElementById("ik");
var limos' . $unUser['id'] . '=document.getElementById("limos' . $unUser['id'] . '");
mpom' . $unUser['id'] . '=document.getElementById("mpom' . $unUser['id'] . '");
dthr' . $unUser['id'] . '= document.getElementById("dthr' . $unUser['id'] . '");
var local' . $unUser['id'] . '=document.getElementById("local' . $unUser['id'] . '");

limos' . $unUser['id'] . '.addEventListener("click", function() {
    document.cookie = "lue' . $unUser['id'] . '=' . $unUser['id'] . '";expire="+ 7*24*60*1000 +";path="/";
         local' . $unUser['id'] . '.style.display="none";

    });

   
    

function cpt(text, maxLength){
    if(text.length > maxLength){
        return text.substring(0, maxLength)+"....";
    }else {
        return text;
    }
}

function cpt2(text, maxLength){
    if(text.length > maxLength){
        return text.substring(0, maxLength);
    }else {
        return text;
    }
}
 var npom' . $unUser['id'] . '="' . $unUser['messages'] . '";
 var testre= cpt(npom' . $unUser['id'] . ', 20);
 mpom' . $unUser['id'] . '.innerHTML= testre;

 var nlmmp' . $unUser['id'] . '="' . $unUser['dateheur'] . '";
var lonbc' . $unUser['id'] . '= cpt2(nlmmp' . $unUser['id'] . ', 10);
dthr' . $unUser['id'] . '.textContent= lonbc' . $unUser['id'] . ';
 


ms.addEventListener("click", function() {
    msee.removeAttribute("hidden");
    msee.style.display="flex";
    limos' . $unUser['id'] . '.style.display="flex";
    ik.removeAttribute("hidden");
    ha.setAttribute("hidden", true);
    roo.setAttribute("hidden", true);
    cha.setAttribute("hidden", true);
    kk.setAttribute("hidden", true);
    model.setAttribute("hidden", true);


});

Sipt.addEventListener("click", function() {
    ha.setAttribute("hidden", true);
    cha.removeAttribute("hidden");
    roo.setAttribute("hidden", true);
    kk.removeAttribute("hidden");
    msee.setAttribute("hidden",true);
    msee.style.display="none";
    limos' . $unUser['id'] . '.style.display="none";
    ik.setAttribute("hidden", true);
    model.setAttribute("hidden", true);
});

nnp.addEventListener("click", function() {
    kk.setAttribute("hidden", true);
    ha.removeAttribute("hidden");
    roo.removeAttribute("hidden"); 
    cha.setAttribute("hidden", true);
    msee.setAttribute("hidden",true);
    msee.style.display="none";
    limos' . $unUser['id'] . '.style.display="none";
    ik.setAttribute("hidden", true);
    model.setAttribute("hidden", true);
});

';
                            if (isset($_COOKIE['lue' . $unUser['id'] . ''])) {
                ?>
                    var local<?php echo $unUser['id']; ?>=document.getElementById("local<?php echo $unUser['id']; ?>");
                    local<?php echo $unUser['id']; ?>.style.display="none";
                <?php } ?>

                // Obtenir les éléments spécifiques de chaque utilisateur
                var limos<?php echo $unUser['id']; ?> = document.getElementById('limos<?php echo $unUser['id']; ?>');
                var modan<?php echo $unUser['id']; ?> = document.getElementById('modan<?php echo $unUser['id']; ?>');
                var close<?php echo $unUser['id']; ?> = document.getElementById('close<?php echo $unUser['id']; ?>');
                var lol= document.getElementById('lol');


                // Afficher le modal quand on clique sur le lien "Details"
                limos<?php echo $unUser['id']; ?>.onclick = function(event) {
                modan<?php echo $unUser['id']; ?>.style.display = "flex"; // Affiche le modal
                lol.style.position="relative";
                lol.style.zIndex="0";
                lol.style.top="auto";
                }

                // Fermer le modal quand on clique sur le bouton "Fermer"
                close<?php echo $unUser['id']; ?>.onclick = function() {
                modan<?php echo $unUser['id']; ?>.style.display = "none"; // Cache le modal
                lol.style.position="sticky";
                }

                </script>





            <?php }
            ?>
            </div>
            </div>
            </div>
        </section>
        <section id="model" hidden>
            <h1>Modelisation</h1>


        </section>
        <script>
            var model = document.getElementById("model");
            var modelisa = document.getElementById("modelisa");
            modelisa.addEventListener("click", function() {
                kk.setAttribute("hidden", true);
                ha.setAttribute("hidden", true);
                roo.setAttribute("hidden", true);
                cha.setAttribute("hidden", true);
                msee.setAttribute("hidden", true);
                ik.setAttribute("hidden", true);
                model.removeAttribute("hidden", true);
            });
        </script>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $del = $con->prepare("DELETE FROM produit where id= '$id'");
            $del->execute(); ?>
            <script>
                location.href = "./Administration.php";
            </script>
    <?php }
    } else {
        include('error.php');
    }
    ?>

    </div>
    </div>
    </body>

</html>