<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        while (have_posts()) :
            the_post();

            // Affiche le titre de l'article
            the_title('<h1>', '</h1>');

            // Affiche la date et l'auteur de l'article
            echo '<p>Publié le ' . get_the_date() . ' par ' . get_the_author() . '</p>';

            // Affiche le contenu de l'article
            the_content();

        endwhile;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
