<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Css/adm.css">
    <title>Ajouter un produit</title>
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
                            <span class="PluAff"><i id="chevron-drop" style="display: none;" class="fa fa-chevron-down"></i> <i id="up" class="fa fa-chevron-up"></i></span>
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
                        var element_down = document.getElementById('element-down');
                        var up = document.getElementById('up');
                        up.addEventListener("click", function() {

                            if (chevro.style.display === "none") {
                                element_down.style.display = "none";
                                chevro.style.display = "inline-block";
                                up.style.display = "none";
                            } else {
                                alert("njkjkjjhj");
                            }
                        });
                        chevro.addEventListener("click", function() {
                            if (element_down.style.display === "none") {
                                element_down.style.display = "block";
                                up.style.display = "inline-block";
                                chevro.style.display = "none";
                            } else {
                                alert("fff");
                            }
                        });
                    </script>
                </div>

            </section>
        </div>
        <div class="InnfoMaAdm">
            <h1>Ajouter un produit</h1>
            <form class="kvvvjvh" method="post" action="traitAj.php" enctype="multipart/form-data">
                <div class="image-conteiner">
                    <label for="image">Image</label><br><br>
                    <button id="upload-btn1"><i class="fa fa-plus"></i></button>
                    <input name="img" type="file" id="file-input1" accept="image/*" style="display: none;" onchange="displayImage(this)">

                    <button id="upload-btn2"><i class="fa fa-plus"></i></button>
                    <input name="img2" type="file" id="file-input2" accept="image/*" style="display: none;" onchange="displayImage(this)">

                    <button id="upload-btn3"><i class="fa fa-plus"></i></button>
                    <input name="img3" type="file" id="file-input3" accept="image/*" style="display: none;" onchange="displayImage(this)">
                    <div class="vbjhgjugp">
                        <img class="preview" id="preview1" alt="Aperçu de l'image">
                        <img class="preview" id="preview2" alt="Aperçu de l'image">
                        <img class="preview" id="preview3" alt="Aperçu de l'image">
                    </div>
                </div>
                <script>
                    // Références des éléments HTML
                    const uploadBtn1 = document.getElementById('upload-btn1');
                    const uploadBtn2 = document.getElementById('upload-btn2');
                    const uploadBtn3 = document.getElementById('upload-btn3');
                    const fileInput1 = document.getElementById('file-input1');
                    const fileInput2 = document.getElementById('file-input2');
                    const fileInput3 = document.getElementById('file-input3');
                    const preview1 = document.getElementById('preview1');
                    const preview2 = document.getElementById('preview2');
                    const preview3 = document.getElementById('preview3');

                    // Clique sur le bouton -> Ouvrir l'input type file
                    uploadBtn1.addEventListener('click', () => {
                        fileInput1.click();
                    });
                    uploadBtn2.addEventListener('click', () => {
                        fileInput2.click();
                    });
                    uploadBtn3.addEventListener('click', () => {
                        fileInput3.click();
                    });

                    // Afficher l'image sélectionnée
                    fileInput1.addEventListener('change', (event) => {
                        const file1 = event.target.files[0];
                        if (file1) {
                            const reader1 = new FileReader();
                            reader1.onload = (e) => {
                                preview1.src = e.target.result;
                                preview1.style.display = 'block';
                            };
                            reader1.readAsDataURL(file1);
                        }
                    });


                    fileInput2.addEventListener('change', (event) => {
                        const file2 = event.target.files[0];
                        if (file2) {
                            const reader2 = new FileReader();
                            reader2.onload = (e) => {
                                preview2.src = e.target.result;
                                preview2.style.display = 'block';
                            };
                            reader2.readAsDataURL(file2);
                        }
                    });

                    fileInput3.addEventListener('change', (event) => {
                        const file3 = event.target.files[0];
                        if (file3) {
                            const reader3 = new FileReader();
                            reader3.onload = (e) => {
                                preview3.src = e.target.result;
                                preview3.style.display = 'block';
                            };
                            reader3.readAsDataURL(file3);
                        }
                    });
                </script>

                <div class="klow">
                    <div>
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
                        <label class="ljjj" for="ram">Ram</label><br>
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

</body>

</html>