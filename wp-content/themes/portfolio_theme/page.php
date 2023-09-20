<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        while (have_posts()) :
            the_post();

            // Affiche le titre de la page
            the_title('<h1>', '</h1>');

            // Affiche le contenu de la page
            the_content();

        endwhile;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
