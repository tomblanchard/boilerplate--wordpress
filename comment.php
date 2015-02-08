<div>

  <article id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>

    <?php if ( $comment->comment_approved == '0' ) : ?>
      <p><?php _e( 'Your comment is awaiting moderation.', 'boilerplate_theme' ) ?></p>
    <?php endif; ?>

    <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>

    <?php echo get_comment_author_link(); ?>

    <time datetime="<?php comment_time('Y-m-d'); ?>">
      <?php comment_time('M d Y'); ?>
    </time>

    <?php edit_comment_link('Edit Comment'); ?>

    <?php comment_reply_link(); ?>

    <?php comment_text() ?>

  </article>

<?php // </div> ?>