
        var catcE = document.getElementById("catc");
        var fusion = document.getElementById("fusion");
        var clickCount = 0;
        var selectedCategories = [];

        catcE.addEventListener("change", function() {
            var catc = catcE.value;

            // Si l'utilisateur choisit "nn", on ne fait rien
            if (catc === "nn") {
                return;
            }

            clickCount++;
            selectedCategories.push(catc); // Ajouter la catégorie sélectionnée à la liste

            if (clickCount === 1) {
                // Affichage de la première sélection
                fusion.innerHTML = '<span> Fusionner : <strong>' + catc + '</strong> + </span>';
            }

            if (clickCount === 2 && catc !== "nn") {
                // Affichage de la deuxième sélection
                fusion.innerHTML += ' <strong>' + catc + '</strong> <a href="" id="vv"><i class="fas fa-times-circle"></i></a>';

                // Remettre à zéro le compteur après deux sélections
                clickCount = 0;
                selectedCategories = [];

                // Ajout d'un écouteur d'événement pour réinitialiser la fusion quand l'utilisateur clique sur l'icône "fa-times-circle"
                document.getElementById("vv").addEventListener("click", function(e) {
                    e.preventDefault();
                    fusion.innerHTML = ""; // Réinitialiser l'affichage de la fusion
                    clickCount = 0; // Réinitialiser le compteur
                    selectedCategories = []; // Vider les catégories sélectionnées
                });
            }
        });

        