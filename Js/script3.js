






function updateProductTotal(productId, quantity) {
    let price = parseFloat(document.getElementById('pr-' + productId).textContent);
    let total = price * quantity;

    
    document.getElementById('Som-' + productId).textContent = total;

    
    updateTotal();
}

// Fonction pour mettre à jour le total global
function updateTotal() {
    let total = 0;

    // Boucle pour parcourir chaque produit du panier
    document.querySelectorAll("[id^='Som-']").forEach(function (productTotal) {
        total += parseFloat(productTotal.textContent);
    });

    // Mise à jour du sous-total (Sam) et du total général (total-price)
    document.getElementById('Sam').textContent = total; // Sous-total
    document.getElementById('total-price').textContent = total + " Fcfa"; // Total
}

// Fonction JavaScript pour supprimer un produit
function removeProduct(productId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce produit du panier ?')) {
        window.location.href = 'index.php?remove_id=' + productId;
    }
}

// Initialiser le total global au chargement de la page
window.onload = function() {
    updateTotal();
}
