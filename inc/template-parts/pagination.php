<?php if ( $wp_query->max_num_pages > 1 ) { ?>
  <nav>
    <ul>
      <?php
        if ( get_next_posts_link() ) {
          echo '<li>' . get_next_posts_link( '&laquo; Older Entries' ) . '</li>';
        }
        if ( get_previous_posts_link() ) {
          echo '<li>' . get_previous_posts_link( 'Newer Entries &raquo;' ) . '</li>';
        }
      ?>
    </ul>
  </nav>
<?php } ?>