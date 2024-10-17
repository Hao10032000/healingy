<?php 

// Show button
$wp_customize->add_setting(
    'header_button_show',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('header_button_show'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'header_button_show',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Header Button ( OFF | ON )', 'healingy'),
          'section' => 'section_button',
          'priority' => 1,
      ))
  );

// Button Text
$wp_customize->add_setting(
    'header_button_text',
    array(
        'default' => themesflat_customize_default('header_button_text'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_button_text',
    array(
        'label' => esc_html__( 'Text', 'healingy' ),
        'section' => 'section_button',
        'type' => 'text',
        'priority' => 2
    )
);
// Button Url
$wp_customize->add_setting(
    'header_button_url',
    array(
        'default' => themesflat_customize_default('header_button_url'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_button_url',
    array(
        'label' => esc_html__( 'Url', 'healingy' ),
        'section' => 'section_button',
        'type' => 'text',
        'priority' => 3
    )
);