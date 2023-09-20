//Charger Plus//
// Attend que le document soit prêt 
jQuery(document).ready(function () {
    // Initialise la variable pour suivre la page
    var page = 2; // Commencez à la page 2 car la première page est déjà affichée

    // Variable pour suivre l'état de chargement
    var loading = false;

    // Fonction pour charger plus de photos
    function loadPhotos() {
        // Vérifie si le chargement est en cours, sinon sort de la fonction
        if (loading) return;

        // Indique que le chargement est en cours
        loading = true;

        // Modifie le texte du bouton pour indiquer le chargement
        jQuery('#load-more-button').text('Chargement en cours...');

        // Effectue une requête AJAX vers le serveur
        jQuery.ajax({
            url: load_more_photos.ajax_url,
            type: 'post',
            data: {
                action: 'load_more_photos',
                page: page, // Envoie le numéro de page
                security: load_more_photos.nonce // Envoie le jeton de sécurité
            },
            success: function (response) {
                // Ajoute la réponse (nouvelles photos) à la fin de la liste
                jQuery('#catalog').append(response);

                // Rétablit le texte du bouton
                jQuery('#load-more-button').text('Charger plus');

                // Réinitialise l'état de chargement
                loading = false;

                // Passe à la page suivante pour la prochaine fois
                page++;
            }
        });
    }

    // Associe la fonction loadPhotos au clic sur le bouton "Charger plus"
    jQuery('#load-more-button').on('click', function () {
        loadPhotos();
    });


    // Gestionnaire d'événement pour le bouton "toutes les photos"
    jQuery('#load-more-related-photos').on('click', function () {
        jQuery('.liens_apparentes li:hidden').removeClass('hidden-photo').addClass('visible-photo');
        // Ajoute la classe "visible-photo" aux éléments cachés devenus visibles
        jQuery(this).hide();
        // Cache le bouton "load-more-related-photos"

    });
});


