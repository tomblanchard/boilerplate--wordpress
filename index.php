<?php get_header(); ?>

<?php if( have_posts() ) : ?>

  <?php while( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', get_post_format() ); ?>

  <?php endwhile; ?>

  <?php next_posts_link( '&laquo; Older Entries' ); ?>
  <?php previous_posts_link( 'Newer Entries &raquo;' ); ?>

<?php else : ?>

  <?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>

<?php get_footer(); ?>