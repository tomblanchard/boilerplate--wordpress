<a href="<?php echo home_url(); ?>">
  <img src="<?php echo get_template_directory_uri(); ?>/lib/img/logo.png" alt="">
  <?php bloginfo('name'); ?>
</a>

<?php
  echo remove_html_whitespace(
    wp_nav_menu( array(
      'container' => '',
      'menu' => __('The Main Menu', 'boilerplate_theme'),
      'menu_class' => '',
      'theme_location' => 'main-nav',
      'echo' => false
    ) )
  );
?>