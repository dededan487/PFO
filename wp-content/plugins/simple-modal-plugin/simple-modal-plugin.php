<?php
/*
Plugin Name: Simple Modal Plugin
*/

// Ajout de scripts et de styles
function simple_modal_enqueue_scripts()
{
    // Enregistre le script 'simple-modal-script', avec dépendance jQuery, version 1.0, et chargé en bas de page (true)
    wp_enqueue_script('simple-modal-script', plugin_dir_url(__FILE__) . 'js/modal.js', array('jquery'), '1.0', true);

    // Enregistre la feuille de style 'simple-modal-style'
    wp_enqueue_style('simple-modal-style', plugin_dir_url(__FILE__) . 'css/modal.css');
}
// Appelle la fonction 'simple_modal_enqueue_scripts' lors du chargement des scripts et styles
add_action('wp_enqueue_scripts', 'simple_modal_enqueue_scripts');

// Crée le shortcode
function simple_modal_shortcode()
{
    ob_start(); ?>

    <!-- Contenu de la modale -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <!-- Bouton pour fermer la modale -->
            <span class="close">&times;</span>
            <!-- Titre de la modale -->
            <!-- Insère le shortcode du formulaire Contact Form 7 avec la clé "modal_form" -->
            <?php echo do_shortcode('[cf7form cf7key="modal_form"  width="800px" height="300px]'); ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}
// Associe le shortcode [simple_modal] à la fonction 'simple_modal_shortcode'
add_shortcode('simple_modal', 'simple_modal_shortcode');

