<article id="post-<?php the_id(); ?>">

  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

  <time datetime="<?php echo get_the_time('Y-m-d'); ?>">
    <?php echo get_the_time(get_option('date_format')); ?>
  </time>

  <?php the_post_thumbnail( '500x500', array('class' => '') ); ?>

  <?php if( is_single() ) { ?>

    <?php the_content(); ?>

  <?php } else { ?>

    <?php the_excerpt(); ?>

  <?php } ?>

</article>