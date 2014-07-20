<?php

  function theme_customizer($wp_customize) {


    class Customizer_Textarea_Control extends WP_Customize_Control {
      public $type = 'textarea';
      public function render_content() { ?>
        <label>
          <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <textarea rows="8" style="font-size:12px;width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
      <?php }
    }


    $wp_customize->add_section('sample_section', array(
      'title'       => __('Sample Section', 'boilerplate_theme'),
      'priority'    => 120,
      'description' => ''
    ));


    $wp_customize->add_setting('sample_section_textbox_setting');

    $wp_customize->add_control('sample_section_textbox_control', array(
      'label'    => __('Text Box', 'boilerplate_theme'),
      'section'  => 'sample_section',
      'settings' => 'sample_section_textbox_setting'
    ));


    $wp_customize->add_setting('sample_section_textarea_setting');

    $wp_customize->add_control(new Customizer_Textarea_Control($wp_customize, 'sample_section_textarea_control', array(
      'label'    => __('Textarea', 'boilerplate_theme'),
      'section'  => 'sample_section',
      'settings' => 'sample_section_textarea_setting'
    )));


  }


  add_action('customize_register', 'theme_customizer');