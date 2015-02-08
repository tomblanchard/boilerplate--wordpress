<section>

  <h1><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></h1>

  <?php if ( have_comments() ) : ?>
    <?php
      wp_list_comments(array(
        'style'       => 'div',
        'short_ping'  => true,
        'avatar_size' => 86,
        'callback'    => 'comments_template_custom'
      ));
    ?>
  <?php endif; ?>

  <?php comment_form(); ?>

</section>