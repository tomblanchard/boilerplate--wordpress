<?php

  function theme_customizer($wp_customize) {


    $wp_customize->add_panel('sample_panel', array(
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Sample Panel',
        'description'    => '',
    ));


    $wp_customize->add_section('sample_panel_sample_section', array(
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Section One',
        'description'    => '',
        'panel'          => 'sample_panel',
    ));


    $wp_customize->add_setting('sample_panel_sample_section_text');

    $wp_customize->add_control('sample_panel_sample_section_text', array(
        'type'        => 'text',
        'section'     => 'sample_panel_sample_section',
        'label'       => 'Text Box',
        'description' => ''
    ));


    $wp_customize->add_setting('sample_panel_sample_section_textarea');

    $wp_customize->add_control('sample_panel_sample_section_textarea', array(
        'type'        => 'textarea',
        'section'     => 'sample_panel_sample_section',
        'label'       => 'Textarea',
        'description' => ''
    ));


  }


  add_action('customize_register', 'theme_customizer');