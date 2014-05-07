<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="viewport" content="width=device-width">

  <title><?php bloginfo( 'name' ); ?><?php wp_title( '-' ); ?></title>

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

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