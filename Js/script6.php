<?php foreach ($result as $unUser) { ?>
    <script>
        // Obtenir les éléments spécifiques de chaque utilisateur
        var n<?php echo $unUser['id']; ?> = document.getElementById('n<?php echo $unUser['id']; ?>');
        var modale<?php echo $unUser['id']; ?> = document.getElementById('modale<?php echo $unUser['id']; ?>');
        var close<?php echo $unUser['id']; ?> = document.getElementById('close<?php echo $unUser['id']; ?>');
        var phone<?php echo $unUser['id']; ?> = document.getElementById('phone<?php echo $unUser['id']; ?>');
        

        // Fermer le modal quand on clique sur le bouton "Fermer"
        close<?php echo $unUser['id']; ?>.onclick = function() {
            modale<?php echo $unUser['id']; ?>.style.display = "none"; // Cache le modal
            location.href="./#phone<?php echo $unUser['id']; ?>";
        }
    </script>


<?php } ?>