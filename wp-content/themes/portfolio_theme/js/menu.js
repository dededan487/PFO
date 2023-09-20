
// menu toggle pour responsive
jQuery(document).ready(function($) {
    jQuery('.menu-toggle').click(function() {
        jQuery('body').toggleClass('menu-open'); // Ajoute ou supprime la classe "menu-open" du corps de la page
    });
});
