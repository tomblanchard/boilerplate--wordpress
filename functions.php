<?php

  /***********************************************************************************
    BONES
   **********************************************************************************/

  require_once( 'inc/bones.php' );





  /***********************************************************************************
    PLUGINS / LIBS / CLASSES
   **********************************************************************************/

  //





  /***********************************************************************************
    THEME CUSTOMIZER
   **********************************************************************************/

  require_once( 'inc/theme-customizer.php' );





  /***********************************************************************************
    CUSTOM POST TYPES
   **********************************************************************************/

  require_once( 'inc/post-types/product.php' );





  /***********************************************************************************
    THEME SUPPORT
   **********************************************************************************/

  function theme_support() {

    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 125, 125, true );

    add_theme_support('html5',
      array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
      )
    );

    add_theme_support('custom-background',
      array(
        'default-image' => '',
        'default-color' => '',
        'wp-head-callback' => '_custom_background_cb',
        'admin-head-callback' => '',
        'admin-preview-callback' => ''
      )
    );

    add_theme_support('automatic-feed-links');

    add_theme_support('post-formats',
      array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
      )
    );

    add_theme_support('menus');

  }

  add_action( 'after_setup_theme', 'theme_support' );





  /***********************************************************************************
    MENUS
   **********************************************************************************/

  function nav_menus() {

    register_nav_menus(
      array(
        'main-nav' => __( 'The Main Menu', 'boilerplate_theme' )
      )
    );

  }

  add_action( 'after_setup_theme', 'nav_menus' );





  /***********************************************************************************
    IMAGE SIZES
   **********************************************************************************/

  /**
    500 x 500px hard cropped.
   */

  add_image_size( '500x500', 500, 500, true );

  /**
    Width hard cropped to 1000px, height can be anything.
   */

  add_image_size( '1000x9999', 1000, 9999, true );





  /***********************************************************************************
    SCRIPTS / STYLES
   **********************************************************************************/

  function enqueue_styles_scripts() {

    if( ! is_admin() ) {

      wp_enqueue_style(
        'primary',
        get_template_directory_uri() . '/lib/css/style.min.css'
      );

      wp_enqueue_style(
        'secondary',
        get_stylesheet_uri(),
        array( 'primary' )
      );

      wp_enqueue_script( 'jquery' );

      wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/lib/js/main.min.js',
        array( 'jquery' ),
        false,
        true
      );

    }

  }

  add_action( 'wp_enqueue_scripts', 'enqueue_styles_scripts' );





  /***********************************************************************************
    HELPERS
   **********************************************************************************/

  /**
    `wp_list_comments` callback.
   */

  function comments_template_custom( $comment, $args, $depth ) {
    include( locate_template('comment.php') );
  }


  /**
    Remove HTML whitespace.
   */

  function remove_html_whitespace( $html ) {
    return preg_replace( '~>\s+<~', '><', $html );
  }


  /**
    Get permalink by using the slug as reference.
   */

  function get_permalink_by_slug( $slug, $post_type = '' ) {
    $permalink = null;
    $args = array(
      'name' => $slug,
      'max_num_posts' => 1
    );
    if( '' != $post_type ) {
      $args = array_merge( $args, array( 'post_type' => $post_type ) );
    }
    $query = new WP_Query( $args );
    if( $query->have_posts() ) {
      $query->the_post();
      $permalink = get_permalink( get_the_ID() );
    }
    wp_reset_postdata();
    return $permalink;
  }


  /**
    Get attachment ID from it's URL.
   */

  function get_attachment_id_by_url($url) {
    $parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
    $this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
    $file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
    if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
      return;
    }
    global $wpdb;
    $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );
    return $attachment[0];
  }





  /***********************************************************************************
    FILTERS / ACTIONS
   **********************************************************************************/

  /**
    `/?s=` to `/search/` in URLs.
   */

  function change_search_url_rewrite() {
    if( is_search() && ! empty( $_GET['s'] ) ) {
      wp_redirect( home_url( '/search/') . urlencode( get_query_var( 's' ) ) );
      exit();
    }
  }
  add_action( 'template_redirect', 'change_search_url_rewrite' );


  /**
    Add custom body classes.
   */

  function body_classes($classes) {

    //if( is_page('about') ) $classes[] = 'page-about';

    return $classes;
  }
  add_filter( 'body_class', 'body_classes' );


  /**
    Remove `width` and `height` attributes from post thumbnail `img` elements.
   */

  function remove_thumb_size_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
    return $html;
  }
  add_filter( 'post_thumbnail_html', 'remove_thumb_size_attribute', 10 );
  add_filter( 'image_send_to_editor', 'remove_thumb_size_attribute', 10 );


  /**
    Add class to `a` element generated by `previous_posts_link`.
   */

  function pagination_class_prev() {
    return 'class=""';
  }
  add_filter( 'previous_posts_link_attributes', 'pagination_class_prev' );


  /**
    Add class to `a` element generated by `next_posts_link`.
   */

  function pagination_class_next() {
    return 'class=""';
  }
  add_filter( 'next_posts_link_attributes', 'pagination_class_next' );


  /**
    Remove unneeded stuff from the dashboard.
   */

  function remove_dashboard_stuff() {
    //remove_menu_page( 'edit.php' );
    //remove_menu_page( 'edit-comments.php' );
  }
  add_action( 'admin_menu', 'remove_dashboard_stuff', 999 );