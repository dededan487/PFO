<?php
/*
Template Name: Template single
*/
// Ce fichier est un modèle de page WordPress "Template-single".

// Inclure l'en-tête du site
get_header();
// Appelle l'en-tête du site.
?>
<body <?php body_class(); ?>>

<main id="main" class="site-main single-main " role="main">
    <!-- Balise principale du contenu de la page. -->

    <div id="primary" class="content-area single">
        <!-- Div principale de la zone de contenu. -->

        <?php
        while (have_posts()) :
            the_post();
            // Boucle pour afficher le contenu de la page.
        ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="single-one">
                <!-- Article avec un ID et des classes basées sur le type de contenu -->

                <div class="entry-content single">
                    <?php the_content(); ?>
                    <!-- Affiche le contenu de la page -->
                </div>

            </article>

        <?php
        endwhile;
        ?>

    </div>
    <!-- Fin de la div principale de la zone de contenu. -->
</main>
<!-- Fin de la balise principale du contenu. -->
</div>

<?php
// Inclure le pied de page du site
get_footer();
// Appelle le pied de page du site.
?>
