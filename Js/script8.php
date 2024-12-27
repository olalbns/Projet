<?php foreach ($list as $unUser) { ?>
    <script>
        // Obtenir les éléments spécifiques de chaque utilisateur
        var n<?php echo $unUser['id']; ?> = document.getElementById('n<?php echo $unUser['id']; ?>');
        var modale<?php echo $unUser['id']; ?> = document.getElementById('modale<?php echo $unUser['id']; ?>');
        var close<?php echo $unUser['id']; ?> = document.getElementById('close<?php echo $unUser['id']; ?>');

        // Afficher le modal quand on clique sur le lien "Details"
        n<?php echo $unUser['id']; ?>.onclick = function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien
            modale<?php echo $unUser['id']; ?>.style.display = "flex"; // Affiche le modal
        }

        // Fermer le modal quand on clique sur le bouton "Fermer"
        close<?php echo $unUser['id']; ?>.onclick = function() {
            modale<?php echo $unUser['id']; ?>.style.display = "none"; // Cache le modal
        }
    </script>


<?php } ?>