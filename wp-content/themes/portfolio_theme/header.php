<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!-- J'ouvre la balise HTML et déclare les attributs de langue du site -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <!-- J'ajoute la balise méta pour définir le jeu de caractères du site, basé sur les paramètres de WordPress -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- J'ajoute la balise méta pour définir la largeur de l'affichage et l'échelle initiale pour les appareils mobiles -->
    <meta name="description" content="Découvrez notre collection exclusive de photos de haute qualité. Parcourez des images uniques dans différentes catégories et formats. Trouvez la photo parfaite pour votre projet dès maintenant." />

    <title>
        <?php bloginfo('name'); ?> |
        <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
    </title>
    <!--ajoute le titre de la page, comprenant le nom du site et la description de la page d'accueil ou le titre de la page actuelle -->

    <?php wp_head(); ?>
    <!-- appelle la fonction wp_head() pour inclure les scripts et les styles nécessaires dans l'en-tête du site -->
</head>
<header id='header'>
<body <?php body_class(); ?>>
<!-- ouvre la balise body et j'ajoute des classes dynamiques qui dépendent de la page affichée -->

    <nav id="navigation">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Titre">
        <!-- ajoute une image du logo en utilisant le chemin du modèle de thème -->

        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="menu-icon"></span>
        </button>

        <?php
        wp_nav_menu( 
            array(
                'theme_location' => 'main-menu',
                'menu_id' => 'primary-menu',
            )
        );
        ?> <!--appelle la fonction wp_nav_menu() pour afficher le menu de navigation principal,"main-menu" -->


    </nav>

    <?php afficher_shortcode_dans_entete(); ?> 
    <!--appelle la fonction personnalisée pour afficher la modale au click -->
    <div class="header-container  ">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/Titre%20header2.png" alt="Titre"
        class="header-title-image">
</div>


    </header>