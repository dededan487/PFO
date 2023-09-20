// S'assure que le code est exécuté après le chargement complet de la page
jQuery(document).ready(function($) {
    // Récupère l'élément de la modale par son ID
    var modal = document.getElementById('myModal');
    console.log("open1");
    
    // Récupère le lien du bouton "Contact" dans le menu par son ID spécifique
    var link = document.getElementById("menu-item-47");

    // Récupère l'élément de fermeture de la modale par sa classe "close"
    var span = document.getElementsByClassName("close")[0];
    
    // Définit un gestionnaire d'événement pour le clic sur le lien
    link.onclick = function(event) {
        event.preventDefault(); // Empêche la redirection du lien par défaut
        modal.style.display = "block"; // Affiche la modale
    }
    
    // Définit un gestionnaire d'événement pour le clic sur l'élément de fermeture
    span.onclick = function() {
        modal.style.display = "none"; // Masque la modale
        console.log("close1");
    }
    
    // Définit un gestionnaire d'événement pour le clic en dehors de la modale
    window.onclick = function(event) {
        // Si l'élément cliqué est la modale, la masque
        if (event.target == modal) {
            modal.style.display = "none";
            console.log("close2");
        }
    }
});
