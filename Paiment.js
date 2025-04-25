function payWithMvola() {
    document.getElementById('payment-status').innerText = 'Paiement effectué via Mvola. Vous pouvez maintenant télécharger la chanson.';
    // Ajouter une logique de paiement réelle ici si nécessaire
}

function payWithAirtel() {
    document.getElementById('payment-status').innerText = 'Paiement effectué via Airtel Money. Vous pouvez maintenant télécharger la chanson.';
    // Ajouter une logique de paiement réelle ici si nécessaire
}

function payWithOrange() {
    document.getElementById('payment-status').innerText = 'Paiement effectué via Orange Money. Vous pouvez maintenant télécharger la chanson.';
    // Ajouter une logique de paiement réelle ici si nécessaire
}

<!-- Fin de payment.html -->
<script>
function showSuccessAndRedirect() {
    const status = document.getElementById('payment-status');
    status.textContent = "✅ Paiement confirmé ! Préparation du téléchargement...";
    status.style.opacity = 1;

    setTimeout(() => {
        window.location.href = "download.html";
    }, 4000);
}

function payWithMvola() {
    showSuccessAndRedirect();
}

function payWithAirtel() {
    showSuccessAndRedirect();
}

function payWithOrange() {
    showSuccessAndRedirect();
}
