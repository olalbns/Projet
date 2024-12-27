<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../Css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Css/adm.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <section>
            <h1>Tableau de bord</h1>
        </section>
    </div>
</body>

</html>