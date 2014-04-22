<?php

  /**
    Sample custom post type, replace the `product_post_type()` function name and the
    `$product_post_type` varialbe name / array key values with more relevant info.
   */

  $product_post_type = array(
    'single' => 'product',
    'plural' => 'products',
    'single_sentence' => __( 'Product', 'boilerplate_theme' ),
    'plural_sentence' => __( 'Products', 'boilerplate_theme' )
  );

  function product_post_type() {

    global $product_post_type;

    register_post_type( $product_post_type['single'],

      array(

        'labels' => array(
          'name' => __( $product_post_type['plural_sentence'], 'boilerplate_theme' ),
          'singular_name' => $product_post_type['single_sentence'],
          'all_items' => __( 'All ', 'boilerplate_theme' ) . $product_post_type['plural_sentence'],
          'add_new' => __( 'Add New', 'boilerplate_theme' ),
          'add_new_item' => __( 'Add New ', 'boilerplate_theme' ) . $product_post_type['single_sentence'],
          'edit' => __( 'Edit', 'boilerplate_theme' ),
          'edit_item' => __( 'Edit ', 'boilerplate_theme' ) . $product_post_type['single_sentence'],
          'new_item' => __( 'New ', 'boilerplate_theme' ) . $product_post_type['single_sentence'],
          'view_item' => __( 'View ', 'boilerplate_theme' ) . $product_post_type['single_sentence'],
          'search_items' => __( 'Search ', 'boilerplate_theme' ) . $product_post_type['plural_sentence'],
          'not_found' =>  __( 'Nothing found in the Database.', 'boilerplate_theme' ),
          'not_found_in_trash' => __( 'Nothing found in Trash', 'boilerplate_theme' ),
          'parent_item_colon' => ''
        ),

        'description' => __( 'This is the ' . $product_post_type['single'] . 'post type', 'boilerplate_theme' ),
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8,
        'rewrite'  => array( 'slug' => $product_post_type['single'], 'with_front' => false ),
        'has_archive' => $product_post_type['plural'],
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
          'title',
          'editor',
          'author',
          'thumbnail',
          'excerpt',
          'trackbacks',
          'custom-fields',
          'comments',
          'revisions',
          'sticky'
        )

      )

    );

  }

  add_action('init', 'product_post_type');