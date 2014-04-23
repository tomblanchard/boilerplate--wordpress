<?php

  /**
    Let's fire off all the functions and tools. I put it up here so it's right up
    top and clean.
  */

  function bones_ahoy() {
    add_action('init', 'bones_head_cleanup');
    add_filter('the_generator', 'bones_rss_version');
    add_filter('wp_head', 'bones_remove_wp_widget_recent_comments_style', 1);
    add_action('wp_head', 'bones_remove_recent_comments_style', 1);
    add_filter('gallery_style', 'bones_gallery_style');
    bones_theme_support();
    add_filter('the_content', 'bones_filter_ptags_on_images');
    add_filter('excerpt_more', 'bones_excerpt_more');
  }

  add_action('after_setup_theme', 'bones_ahoy', 16);





  /**
    WordPress includes a lot of stuff that we don't need, a lot gets injected via
    `wp_head`, this removes everything we don't need from there and improves a few
    other little things.
   */

  function bones_head_cleanup() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    add_filter('style_loader_src', 'bones_remove_wp_ver_css_js', 9999);
    add_filter('script_loader_src', 'bones_remove_wp_ver_css_js', 9999);
  }

  function bones_rss_version() {
    return '';
  }

  function bones_remove_wp_ver_css_js($src) {
    if(strpos($src, 'ver=')) {
      $src = remove_query_arg('ver', $src);
      return $src;
    }
  }

  function bones_remove_wp_widget_recent_comments_style() {
    if(has_filter('wp_head', 'wp_widget_recent_comments_style')) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
  }

  function bones_remove_recent_comments_style() {
    global $wp_widget_factory;
    if(isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
      remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
  }

  function bones_gallery_style($css) {
    return preg_replace('!<style type=\'text/css\'>(.*?)</style>!s', '', $css);
  }

  function bones_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  }

  function bones_excerpt_more($more) {
    global $post;
    return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __('Read', 'boilerplate_theme') . get_the_title($post->ID).'">'. __('Read more &raquo;', 'boilerplate_theme') .'</a>';
  }





  /**
    Theme support.
  */

  function bones_theme_support() {
    add_theme_support('post-thumbnails');

    set_post_thumbnail_size(125, 125, true);

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