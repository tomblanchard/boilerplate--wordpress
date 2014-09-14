<?php get_header(); ?>


<?php if( have_posts() ) : ?>

  <?php while( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content-archive', get_post_type() ); ?>

  <?php endwhile; ?>

  <?php get_template_part( 'inc/template-parts/pagination' ); ?>

<?php else : ?>

  <?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>


<?php get_footer(); ?>