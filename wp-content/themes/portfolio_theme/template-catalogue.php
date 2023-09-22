<?php
/*
Template Name: Catalog Template
*/
// Ce fichier est un modèle de page WordPress "Catalog Template".

// Inclure l'en-tête du site
get_header();
// Appelle l'en-tête du site.
?>

<main id="main" class="site-main" role="main">
    <!-- Balise principale du contenu de la page. -->

    <div id="primary" class="content-area">
        <!-- Div principale de la zone de contenu. -->

        <label class="switch">
            <input type="checkbox" id="toggle-catalog">
            <div class="button">
                <div class="light"></div>
                <div class="dots"></div>
                <div class="characters"></div>
                <div class="shine"></div>
                <div class="shadow"></div>
            </div>
        </label>

        <div id="catalog" style="display: none;">
            <!-- Div pour afficher les photos chargées via AJAX. -->

            <!-- Boucle pour afficher les photos du CPT "photos" -->
            <?php
            // Arguments pour la requête WP_Query
            $args = array(
                'post_type' => 'photos',
                // Utilise le CPT (Custom Post Type) "photos".
                'posts_per_page' => 9,
                // Nombre de photos à afficher par page.
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                // Pagination.
            );

            // Créer une nouvelle requête WP_Query
            $query = new WP_Query($args);

            // Si des photos sont trouvées
            if ($query->have_posts()):
                // Boucle pour afficher chaque photo
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="related-thumbnail image-galerie">
                        <!-- Div pour chaque photo affichée. -->
                        <div class="titre_categorie">
                            <!-- Titre de la catégorie -->
                            <span class="titre1">
                                <?php the_title(); ?>
                            </span> <!-- Affiche le titre de l'article -->

                            <span class="titre2">
                                <?php echo esc_attr(strip_tags(get_field('titre'))); ?>
                            </span> <!-- Affiche le titre du projet -->

                        </div>

                        <div class="icon-class">
                            <div class="eye-icon">
                                <a href="<?php the_permalink(); ?>" class="liens">🔗</a>
                                <!-- Lien vers la page de la photo (icône d'œil) -->
                            </div>

                            <div class="screen-icon liens" data-fancybox="gallery"
                                data-src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>"
                                data-caption="<?php echo esc_attr(strip_tags(get_field('titre'))); ?>">📸
                            </div>
                            <!-- Lien pour afficher la photo en grand dans une lightbox avec la légende -->
                        </div>

                        <?php the_post_thumbnail('full'); ?>
                        <!-- Afficher la photo en miniature. -->
                    </div>
                    <!-- Fin de la div pour chaque photo. -->
                    <?php
                endwhile;
                wp_reset_postdata(); // Réinitialise les données de la requête.
            else:
                echo 'Aucune photo trouvée.'; // Afficher un message si aucune photo n'est trouvée.
            endif;
            ?>
        </div>
        <!-- Fin de la div pour afficher les photos. -->

        <div id="load-more" style="display: none;">
            <!-- Div pour charger plus de photos. -->
            <button id="load-more-button">Charger plus</button>
            <!-- Bouton pour charger plus de photos via AJAX. -->
        </div>
        <!-- Fin de la div pour charger plus de photos. -->

    </div>
    <!-- Fin de la div principale de la zone de contenu. -->
</main>
<!-- Fin de la balise principale du contenu. -->

<?php
// Inclure le pied de page du site
get_footer();
// Appelle le pied de page du site.
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleCatalog = document.getElementById('toggle-catalog');
        const catalog = document.getElementById('catalog');
        const loadMoreButton = document.getElementById('load-more');

        toggleCatalog.addEventListener('change', function () {
            if (toggleCatalog.checked) {
                catalog.style.display = 'grid'; // Afficher le catalogue
                loadMoreButton.style.display = 'block'; // Afficher le bouton "Charger plus"
            } else {
                catalog.style.display = 'none'; // Masquer le catalogue
                loadMoreButton.style.display = 'none'; // Masquer le bouton "Charger plus"
            }
        });
    });
</script>


<script>

document.addEventListener('DOMContentLoaded', function () {
    const catalog = document.getElementById('main');
    const header = document.getElementById('header-bandeau');
    const footer = document.getElementById('footer'); // Assurez-vous de récupérer l'élément du footer

    // Vérifiez si l'élément du footer a été correctement récupéré
    if (footer) {
        // Affiche le contenu du footer dans la console
        console.log(footer.innerHTML);
    } else {
        // Si l'élément n'a pas été trouvé, affiche un message d'erreur
        console.error('Le footer n\'a pas été trouvé.');
    }

    window.addEventListener('scroll', function () {
        const scrollY = window.scrollY;
        catalog.style.transform = `translateY(${scrollY * 0.5}px)`;
        header.style.transform = `translateY(${scrollY * 0.2}px)`;

        // Ajustez la hauteur du conteneur principal pour inclure la hauteur du footer
        if (footer) {
            const footerHeight = footer.offsetHeight;
            catalog.style.height = `calc(100vh - ${footerHeight}px)`;
        }
    });
});

</script>

