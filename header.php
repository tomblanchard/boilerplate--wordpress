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

  <?php get_template_part( 'lib/inc/template-parts/header' ); ?>