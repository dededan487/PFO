<?php
/*
Template Name: Catalog Template
*/
// Ce fichier est un modèle de page WordPress  "Catalog Template".

// Inclure l'en-tête du site
get_header();
// Appelle l'en-tête du site.

?>


<main id="main" class="site-main" role="main">
    <!-- Balise principale du contenu de la page. -->

    <div id="primary" class="content-area">
        <!-- Div principale de la zone de contenu. -->

        <div class="filtres">
            <!-- Div contenant les filtres pour la sélection des photos. -->




            <!-- Champ de sélection pour l'ordre de tri -->
            <select id="order-filter" class="filter-range">
                <!-- Menu déroulant pour trier les photos. -->
                <option value="ASC">Premier Projet</option>
                <!-- Option pour trier par photos les plus anciennes. -->
                <option value="DESC">Dernier Projet</option>
                <!-- Option pour trier par photos les plus récentes. -->

            </select>
            <!-- Fin du champ de sélection pour l'ordre de tri. -->
        </div>
        <!-- Fin de la div contenant les filtres. -->

        <div id="catalog">
            <!-- Div pour afficher les photos chargées via AJAX. -->

            <!-- Boucle pour afficher les photos du CPT "photos" -->
            <?php
            // Arguments pour la requête WP_Query
            $args = array(
                'post_type' => 'photos',
                // Utilise le CPT (Custom Post Type) "photos".
                'posts_per_page' => 12,
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

                            <span class="titre1">
                                <?php echo esc_attr(strip_tags(get_field('titre'))); ?>
                            </span> <!-- Affiche le titre du projet -->

                        </div>
                        <div class="icon-class">
                            <div class="eye-icon">
                                <a href="<?php the_permalink(); ?>" class="liens">INFO</a>
                                <!-- Lien vers la page de la photo (icône d'œil) -->
                            </div>

                            <div class="screen-icon liens" data-fancybox="gallery"
                                data-src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>">DIAPOS
                            </div>
                            <!-- Lien pour afficher la photo en grand dans une lightbox. -->
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

        <div id="load-more">
            <!-- Div pour charger plus de photos. -->
            <button id="load-more-button">Charger plus</button>
            <!-- Bouton pour charger plus de photos via AJAX. -->
        </div>
        <!-- Fin de la div pour charger plus de photos. -->

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