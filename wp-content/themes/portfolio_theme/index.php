<?php get_header(); ?>


<?php while (have_posts()) : the_post(); ?>
    <article>
        <!--<h2><?php the_title(); ?></h2> -->
        <div><?php the_content(); ?></div>
    </article>
<?php endwhile; ?>



<?php get_footer(); ?>