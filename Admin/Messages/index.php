<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Css/adm.css">
    <script src="fnt Aws.js"></script>
    <title>Messages</title>
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
            <section id="msee">
                <div class="msee1">
                    <div class="kmqp">

                        <table class="tbMesa">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Contact</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                    </div>
                    <div>
                        <div class="mesCont">
                            <?php
                            include('../connect.php');
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




                                <?php echo ' 
                
                
                <tr class"tr">
                            <td ><span id="local' . $unUser['id'] . '" class="onclikk"></span></td>
                <td style="padding: 20px; cursor:pointer;" id="limos' . $unUser['id'] . '"><span><i class="fa fa-chevron-down"></i></span></td>
            <td> <h4>' . $unUser['nom'] . ' ' . $unUser['prenom'] . '</h4></td>
            
           
           <td><span  id="mpom' . $unUser['id'] . '">' . $unUser['messages'] . '</span></td>
            <td><span  id="dthr' . $unUser['id'] . '">' . $unUser['dateheur'] . '</span></td>
            <td style="text-align:center;" id="del' . $unUser['id'] . '" class="delitam"><span><i style="color:red;" class="fa fa-trash"></i></span></td>
           
           <div class="modalen" id="modalen' . $unUser['id'] . '">
                            <div class="validationMod">
                                <p>Ete vous sur de vouloir supprimer cet element ?</p>
                                <button id="Decbtn' . $unUser['id'] . '">Supprimer</button>
                                <button id="Canbtn' . $unUser['id'] . '">Annuler</button>
                            </div>
                        </div>
                        
                        <script>
                            var nia' . $unUser['id'] . ' = document.getElementById("del' . $unUser['id'] . '");
                            var modalen' . $unUser['id'] . ' = document.getElementById("modalen' . $unUser['id'] . '");
                            var Decbtn' . $unUser['id'] . ' = document.getElementById("Decbtn' . $unUser['id'] . '");
                            var Canbtn' . $unUser['id'] . ' = document.getElementById("Canbtn' . $unUser['id'] . '");

                            nia' . $unUser['id'] . '.addEventListener("click", function(event) {

                                event.preventDefault();
                                modalen' . $unUser['id'] . '.style.display = "flex";


                            });
                            Decbtn' . $unUser['id'] . '.onclick = function() {
                                location.href = "?idDe=' . $unUser['id'] . '";

                            }

                            Canbtn' . $unUser['id'] . '.onclick = function() {
                                modalen' . $unUser['id'] . '.style.display = "none";
                            }
                        </script>


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
                            </tr>
                            </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php
    if (isset($_GET['idDe'])) {
        $id = $_GET['idDe'];
        $del = $con->prepare("DELETE FROM message where id= '$id'");
        $del->execute(); ?>
        <script>
            location.href = "./";
        </script>
    <?php  } ?>
</body>

</html>