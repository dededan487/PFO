<?php
/*
Template Name: CPT Perso
template Post Type: post, page, product
*/
?>

<?php get_header(); ?>
<!-- Inclut l'en-tête du site -->

<main id="main" class="site-main single-main-1" role="main">
    <div id="primary" class="content-area primary-one">

        <?php
        while (have_posts()):
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- Article avec un ID  et  classes basées sur le type de contenu -->

                <div class="entry-content">
                    <div class="format_single">
                        <header class="entry-header">
                            <h1>
                                <?php the_title(); ?> <!-- Affiche le titre de l'article -->
                            </h1>
                        </header>
                        <p><strong>Titre :</strong> <!-- nouveau champ-->
                            <?php echo get_field('titre'); ?> <!-- Affiche le champ "reference" du CPT -->
                        </p>
                        <p><strong>Description :</strong>
                            <?php echo get_field('description'); ?> <!-- Affiche le champ "type" du CPT -->
                        </p>

                        <?php
                        $competence = get_field('competence'); // Récupère la valeur du champ "compétence"
                        if (!empty($competence) && is_array($competence)) {
                            echo '<strong>Compétences :</strong>';
                            echo '<ul>'; // Commence une liste non ordonnée
                            foreach ($competence as $comp) {
                                echo '<li>' . esc_html($comp) . '</li>'; // Affiche chaque élément du tableau dans une liste
                            }
                            echo '</ul>'; // Termine la liste non ordonnée
                        }
                        ?>
                        <p><strong>Code sur GitHub :</strong>
                            <a href="<?php echo esc_url(get_field('code_github')); ?>" target="_blank">Voir sur GitHub</a>
                        </p>

                        <p><strong>Aller voir le site :</strong>
                            <a href="<?php echo esc_url(get_field('adresse_du_site')); ?>" target="_blank">Visiter le
                                site</a>
                        </p>



                        <p><strong>Date :</strong>
                            <?php echo get_field('annee'); ?> <!-- Affiche le champ "annee" du CPT -->
                        </p>
                    </div>

                    <div class="photo-container photo-container-one">
                        <?php the_post_thumbnail('full'); ?> <!-- Affiche l'image à la taille "full" -->
                    </div>
                </div>

                <?php the_content(); ?> <!-- Affiche le contenu de l'article -->
                <div class="pied_image">
                    <span class="texte_img"> Ce style vous intéresse ? </span>
                    <!-- Bouton pour ouvrir la popup -->
                    <button class="open-popup" data-reference="<?php echo esc_attr(get_field('reference')); ?>"
                        data-titre00="<?php echo esc_attr(get_field('titre')); ?>">Contact</button>

                    <!-- Ajout des miniatures et boutons de pagination -->
                    <div class="pagination-container">
                        <!-- Conteneur pour les miniatures et les boutons de pagination -->
                        <?php
                        // Ouvre une balise PHP pour exécuter du code PHP à l'intérieur du HTML
                        $previous_photo = get_previous_post();
                        // Récupère l'article précédent dans le flux de publications
                        $next_photo = get_next_post();
                        // Récupère l'article suivant dans le flux de publications
                        ?>

                        <?php if ($previous_photo): ?>
                            <!-- Vérifie si un article précédent existe -->

                            <a href="<?php echo get_permalink($previous_photo->ID); ?>"
                                class="previous-photo thumbnail-preview thumbnail-preview-one">
                                <!-- Lien vers l'article précédent avec la classe "previous-photo" et "thumbnail-preview" -->
                                <span class="pagination-label pagination-label-one">&larr;</span>
                                <!-- Chevron pointant vers la gauche -->
                                <?php echo get_the_post_thumbnail($previous_photo->ID, 'thumbnail'); ?>
                                <!-- Miniature de l'article précédent avec la taille "thumbnail" -->
                            </a>
                        <?php endif; ?>
                        <!-- Ferme la structure conditionnelle pour l'article précédent -->

                        <?php if ($next_photo): ?>
                            <!-- Vérifie si un article suivant existe -->

                            <a href="<?php echo get_permalink($next_photo->ID); ?>"
                                class="next-photo thumbnail-preview thumbnail-preview-one">
                                <!-- Lien vers l'article suivant avec la classe "next-photo" et "thumbnail-preview" -->
                                <span class="pagination-label pagination-label-one"> &rarr; </span>
                                <!-- Chevron pointant vers la droite -->
                                <?php echo get_the_post_thumbnail($next_photo->ID, 'thumbnail'); ?>
                                <!-- Miniature de l'article suivant avec la taille "thumbnail" -->
                            </a>
                        <?php endif; ?>
                        <!-- Ferme la structure conditionnelle pour l'article suivant -->
                    </div>
                    <!-- Ferme le conteneur des miniatures et boutons de pagination -->
                </div>
                <?php get_template_part('templates_parts/photo_block'); ?>
                <!-- Inclut le template pour les photos apparentées -->
            </article>

        <?php endwhile; ?>
    </div><!-- #primary -->
</main><!-- #main -->



<?php get_footer(); ?> <!-- Inclut le footer -->

<?php wp_footer(); ?> <!-- Inclut le script du footer -->


<!-- Script jQuery pour ouvrir la modale et préremplir le champ "RÉF. PHOTO" -->
<script>
    jQuery(document).ready(function (jQuery) {
        console.log('1test titre');
        jQuery('.open-popup').click(function () {
            console.log('2test titre');
            var titre00 = jQuery(this).data('titre00');
            console.log('3test titre');
            // Ouvre la modale
            jQuery('#myModal').show();
            console.log('4test titre');

            // Nettoyez le contenu de "titre00" pour supprimer tout encodage HTML
            titre00 = jQuery('<div/>').html(titre00).text();
            console.log('5test titre', titre00);

            // Préremplit le champ "TITRE00" de la modale avec la valeur de "titre00"
            jQuery('#titre00_modal').val(titre00);
        });
    });
</script>


<!-- Script jQuery pour préremplir les attributs data du bouton du menu -->
<script>
    jQuery(document).ready(function (jQuery) {
        // Récupérez les valeurs nécessaires depuis les champs ACF ou où vous les stockez
        var referenceValue = "<?php echo esc_attr(strip_tags(get_field('reference'))); ?>";
        var titreValue = "<?php echo esc_attr(strip_tags(get_field('titre'))); ?>";

        // Sélectionnez le bouton du menu par son ID
        var menuButton = jQuery('#menu-item-47');

        // Ajoutez les attributs data au bouton du menu
        menuButton.attr('data-reference', referenceValue);
        menuButton.attr('data-titre00', titreValue);
    });
</script>

</body>

</html> <!-- Fin du document HTML -->