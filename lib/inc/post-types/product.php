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

    /**
      Allow this post type to use the regular post category / tag taxonomies.
     */
    //register_taxonomy_for_object_type( 'category', $product_post_type['single'] );
    //register_taxonomy_for_object_type( 'post_tag', $product_post_type['single'] );

  }

  add_action('init', 'product_post_type');


  /**
    Custom hierarchical taxonomy (acts like regular post categories, but scoped to
    this post type).
   */
  /*register_taxonomy( 'product_cat',
    array( $product_post_type['single'] ),
    array( 'hierarchical' => true,
      'labels' => array(
        'name' => __( 'Categories', 'boilerplate_theme' ),
        'singular_name' => __( 'Category', 'boilerplate_theme' ),
        'search_items' =>  __( 'Search Categories', 'boilerplate_theme' ),
        'all_items' => __( 'All Categories', 'boilerplate_theme' ),
        'parent_item' => __( 'Parent Category', 'boilerplate_theme' ),
        'parent_item_colon' => __( 'Parent Category:', 'boilerplate_theme' ),
        'edit_item' => __( 'Edit Category', 'boilerplate_theme' ),
        'update_item' => __( 'Update Category', 'boilerplate_theme' ),
        'add_new_item' => __( 'Add New Category', 'boilerplate_theme' ),
        'new_item_name' => __( 'New Category Name', 'boilerplate_theme' )
      ),
      'show_admin_column' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'product_cat' ),
    )
  );*/


  /**
    Custom non-hierarchical taxonomy (acts like regular post tags, but scoped to
    this post type).
   */
  /*register_taxonomy( 'product_tag',
    array( $product_post_type['single'] ),
    array( 'hierarchical' => false,
      'labels' => array(
        'name' => __( 'Tags', 'boilerplate_theme' ),
        'singular_name' => __( 'Tag', 'boilerplate_theme' ),
        'search_items' =>  __( 'Search Tags', 'boilerplate_theme' ),
        'all_items' => __( 'All Tags', 'boilerplate_theme' ),
        'parent_item' => __( 'Parent Tag', 'boilerplate_theme' ),
        'parent_item_colon' => __( 'Parent Tag:', 'boilerplate_theme' ),
        'edit_item' => __( 'Edit Tag', 'boilerplate_theme' ),
        'update_item' => __( 'Update Tag', 'boilerplate_theme' ),
        'add_new_item' => __( 'Add New Tag', 'boilerplate_theme' ),
        'new_item_name' => __( 'New Tag Name', 'boilerplate_theme' )
      ),
      'show_admin_column' => true,
      'show_ui' => true,
      'query_var' => true,
    )
  );*/