<article>

  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

  <?php if ( is_single() ) { ?>

    <?php the_content(); ?>

  <?php } else { ?>

    <?php the_excerpt(); ?>

  <?php } ?>

</article>