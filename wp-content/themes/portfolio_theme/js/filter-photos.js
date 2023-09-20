// Appel  pour filtrer les photos par date

jQuery(document).ready(function ($) {
    // Lorsque la valeur des champs de filtre change
    jQuery('#category-filter, #format-filter, #order-filter, #year-filter').on('change', function () {
        var category = $('#category-filter').val(); // Valeur de la catégorie sélectionnée
        var format = $('#format-filter').val(); // Valeur du format sélectionné
        var order = $('#order-filter').val(); // Valeur de l'ordre de tri sélectionné
        var year = $('#year-filter').val(); // Valeur de l'année sélectionnée

        console.log('Appel AJAX pour les filtres...'); // Message de débogage



        // Appel AJAX pour filtrer les photos par date
        jQuery.ajax({
            url: load_more_photos.ajax_url, // URL de l'API AJAX de WordPress
            type: 'post',
            data: {
                action: 'filter_photos', // Action à appeler dans WordPress
                category: category,
                format: format,
                order: order, // Ajout de l'ordre de tri
                year: year, // Ajout de la valeur de l'année
                nonce: load_more_photos.nonce // Jeton de sécurité
            },
            success: function (response) {
                jQuery('#catalog').html(response); // Remplace le contenu de #catalog avec les photos filtrées
                console.log('AJAX Response:', response);
            }
        });
    });
});
