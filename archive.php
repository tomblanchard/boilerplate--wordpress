<?php get_header(); ?>


<h1>
  <?php
    if( is_day() ) {
      printf( __( 'Daily Archives: %s', 'boilerplate_theme' ), get_the_date() );
    } elseif( is_month() ) {
      printf( __( 'Monthly Archives: %s', 'boilerplate_theme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'boilerplate_theme' ) ) );
    } elseif( is_year() ) {
      printf( __( 'Yearly Archives: %s', 'boilerplate_theme' ), get_the_date( _x( 'Y', 'yearly archives date format', 'boilerplate_theme' ) ) );
    } elseif( is_category() ) {
      printf( __( 'Category Archives: %s', 'boilerplate_theme' ), single_cat_title( '', false ) );
    } elseif( is_tag() ) {
      printf( __( 'Tag Archives: %s', 'boilerplate_theme' ), single_tag_title( '', false ) );
    } elseif( is_search() ) {
      printf( __( 'Search Results for: %s', 'boilerplate_theme' ), get_search_query() );
    } else {
      _e( 'Archives', 'boilerplate_theme' );
    }
  ?>
</h1>

<?php if( have_posts() ) : ?>

  <?php while( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', get_post_format() ); ?>

  <?php endwhile; ?>

  <?php get_template_part( 'inc/template-parts/pagination' ); ?>

<?php else : ?>

  <?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>


<?php get_footer(); ?>