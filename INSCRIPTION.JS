// js/inscription.js
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');
    const welcomeMessage = document.getElementById('welcome-message');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le rechargement de la page

        // Vérification des champs (si nécessaire)
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Simulation de la création du compte
        setTimeout(() => {
            form.style.display = 'none'; // Masque le formulaire
            welcomeMessage.style.display = 'block'; // Affiche le message de bienvenue
            welcomeMessage.textContent = `Bienvenue chez nous, ${username}! Votre compte a été créé avec succès.`;
        }, 500); // Ajoute un délai pour simuler le traitement
    });
});
