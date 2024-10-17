<?php 
$wp_customize->add_setting(
    'show_footer_info',
    array(
        'default'   => themesflat_customize_default('show_footer_info'),
        'sanitize_callback'  => 'themesflat_sanitize_checkbox',
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'show_footer_info',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Info Box ( OFF | ON )', 'healingy'),
            'section'   => 'section_info_footer',
            'priority'  => 2
        )
    )
);

$wp_customize->add_setting(
    'footer_info_text',
    array(
        'default'   =>  themesflat_customize_default('footer_info_text'),
        'sanitize_callback'  =>  'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'footer_info_text',
    array(
        'type'      =>  'text',
        'label'     =>  esc_html__('Text', 'healingy'),
        'section'   =>  'section_info_footer',
        'priority'  =>  3
    )
);

$wp_customize->add_setting(
    'footer_info_button',
    array(
        'default'   =>  themesflat_customize_default('footer_info_button'),
        'sanitize_callback'  =>  'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'footer_info_button',
    array(
        'type'      =>  'text',
        'section'   =>  'section_info_footer',
        'label'     =>  esc_html__('Button Text', 'healingy'),
        'priority'  => 8
    )
);

// Button Url
$wp_customize->add_setting(
    'footer_info_button_url',
    array(
        'default' => themesflat_customize_default('footer_info_button_url'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'footer_info_button_url',
    array(
        'label' => esc_html__( 'Url', 'healingy' ),
        'section' => 'section_info_footer',
        'type' => 'text',
        'priority' => 2
    )
);