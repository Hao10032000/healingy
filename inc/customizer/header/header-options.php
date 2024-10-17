<?php 
//Header Style
$wp_customize->add_setting(
    'style_header',
    array(
        'default'           => themesflat_customize_default('style_header'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_RadioImages($wp_customize,
    'style_header',
    array (
        'type'      => 'radio-images',           
        'section'   => 'section_options',
        'priority'  => 1,
        'label'         => esc_html__('Header Style', 'healingy'),
        'choices'   => array (
            'header-default' => array (
                'tooltip'   => esc_html__( 'Header Default','healingy' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header-default.jpg'
            ),
            'header-01' => array (
                'tooltip'   => esc_html__( 'Header 01','healingy' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header-01.jpg'
            ),
            'header-02' => array (
                'tooltip'   => esc_html__( 'Header 02','healingy' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header-03.jpg'
            ),
        ),
    ))
); 

// Enable Header Absolute
$wp_customize->add_setting(
  'header_absolute',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('header_absolute'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'header_absolute',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Header Absolute ( OFF | ON )', 'healingy'),
        'section' => 'section_options',
        'priority' => 2,
    ))
);

// Enable Header Sticky
$wp_customize->add_setting(
  'header_sticky',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('header_sticky'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'header_sticky',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Header Sticky ( OFF | ON )', 'healingy'),
        'section' => 'section_options',
        'priority' => 3,
    ))
);    

// Show search 
$wp_customize->add_setting(
  'header_search_box',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('header_search_box'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'header_search_box',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Search Box ( OFF | ON )', 'healingy'),
        'section' => 'section_options',
        'priority' => 4,
    ))
);

// Show search 
$wp_customize->add_setting(
  'header_sidebar_toggler',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('header_sidebar_toggler'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'header_sidebar_toggler',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Sidebar Toggler ( OFF | ON )', 'healingy'),
        'section' => 'section_options',
        'priority' => 5,
    ))
);

// Show infor 
$wp_customize->add_setting(
    'header_infor_phone',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('header_infor_phone'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'header_infor_phone',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Infor Contact ( OFF | ON )', 'healingy'),
          'section' => 'section_options',
          'priority' => 6,
          'active_callback' => function () use ( $wp_customize ) {
            return 'header-default' != $wp_customize->get_setting( 'style_header' )->value();
            return 'header-02' != $wp_customize->get_setting( 'style_header' )->value();
        }, 
      ))
  );

  $wp_customize->add_control( new themesflat_Info( $wp_customize, 'header_info_label_time', array(
    'label'    => esc_html__( 'Phone', 'maine' ),
    'section'  => 'section_options',
    'settings' => 'themesflat_options[info]',
    'priority' => 7,
    'active_callback' => function () use ( $wp_customize ) {
        $condition1 = $wp_customize->get_setting( 'header_infor_phone' )->value();
        $condition2    = $wp_customize->get_setting( 'style_header' )->value();
        return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
    
        if ( 1 === $condition1 || 'header-02' === $condition2 ) {
            return true;
        }
        return false;
    },
) )
);

// Phone Label
$wp_customize->add_setting(
    'header_info_phone_text',
    array(
        'default' => themesflat_customize_default('header_info_phone_text'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_info_phone_text',
    array(
        'label' => esc_html__( 'Phone Label', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 8,
        'active_callback' => function () use ( $wp_customize ) {
            $condition1 = $wp_customize->get_setting( 'header_infor_phone' )->value();
            $condition2    = $wp_customize->get_setting( 'style_header' )->value();      
            return 'header-default' != $wp_customize->get_setting( 'style_header' )->value();
        },
    )
);


// Phone Label2
$wp_customize->add_setting(
    'header_info_phone_icon',
    array(
        'default' => themesflat_customize_default('header_info_phone_icon'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_info_phone_icon',
    array(
        'label' => esc_html__( 'Phone Icon', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 9,
        'active_callback' => function () use ( $wp_customize ) {
            return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
        }, 
    )
);

// Phone Number title
$wp_customize->add_setting(
    'header_info_phone_number_title',
    array(
        'default' => themesflat_customize_default('header_info_phone_number_title'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_info_phone_number_title',
    array(
        'label' => esc_html__( 'Phone Title', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 10,
        'active_callback' => function () use ( $wp_customize ) {
            return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
        }, 
    )
);

// Phone Number
$wp_customize->add_setting(
    'header_info_phone_number',
    array(
        'default' => themesflat_customize_default('header_info_phone_number'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_info_phone_number',
    array(
        'label' => esc_html__( 'Phone Number', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 10,
        'active_callback' => function () use ( $wp_customize ) {
            $condition1 = $wp_customize->get_setting( 'header_infor_phone' )->value();
            $condition2    = $wp_customize->get_setting( 'style_header' )->value();
            return 'header-default' != $wp_customize->get_setting( 'style_header' )->value();
        },
    )
);

$wp_customize->add_control( new themesflat_Info( $wp_customize, 'header_info_label_email', array(
    'label'    => esc_html__( 'Email', 'maine' ),
    'section'  => 'section_options',
    'settings' => 'themesflat_options[info]',
    'priority' => 11,
    'active_callback' => function () use ( $wp_customize ) {
        return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
    }, 
) )
);

// Email Label
$wp_customize->add_setting(
    'topbar_email_label',
    array(
        'default' => themesflat_customize_default('topbar_email_label'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_email_label',
    array(
        'label' => esc_html__( 'Email Icon', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 12,
        'active_callback' => function () use ( $wp_customize ) {
            return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
        }, 
    )
);

// Email Title
$wp_customize->add_setting(
    'topbar_email_title',
    array(
        'default' => themesflat_customize_default('topbar_email_title'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_email_title',
    array(
        'label' => esc_html__( 'Email Title', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 13,
        'active_callback' => function () use ( $wp_customize ) {
            return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
        }, 
    )
);

// Email Label2
$wp_customize->add_setting(
    'topbar_email',
    array(
        'default' => themesflat_customize_default('topbar_email'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_email',
    array(
        'label' => esc_html__( 'Email Infor', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 13,
        'active_callback' => function () use ( $wp_customize ) {
            return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
        }, 
    )
);

$wp_customize->add_control( new themesflat_Info( $wp_customize, 'header_info_label_address', array(
    'label'    => esc_html__( 'Address', 'maine' ),
    'section'  => 'section_options',
    'settings' => 'themesflat_options[info]',
    'priority' => 14,
    'active_callback' => function () use ( $wp_customize ) {
        return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
    }, 
) )
);

// address Label
$wp_customize->add_setting(
    'topbar_address_label',
    array(
        'default' => themesflat_customize_default('topbar_address_label'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_address_label',
    array(
        'label' => esc_html__( 'Address Icon', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 15,
        'active_callback' => function () use ( $wp_customize ) {
            return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
        }, 
    )
);

// address Title
$wp_customize->add_setting(
    'topbar_address_title',
    array(
        'default' => themesflat_customize_default('topbar_address_title'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_address_title',
    array(
        'label' => esc_html__( 'Address Title', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 16,
        'active_callback' => function () use ( $wp_customize ) {
            return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
        }, 
    )
);

// address Label2
$wp_customize->add_setting(
    'topbar_address',
    array(
        'default' => themesflat_customize_default('topbar_address'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_address',
    array(
        'label' => esc_html__( 'Address Infor', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 16,
        'active_callback' => function () use ( $wp_customize ) {
            return 'header-02' === $wp_customize->get_setting( 'style_header' )->value();
        }, 
    )
);


// button
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'header_button_label', array(
    'label'    => esc_html__( 'Button', 'healingy' ),
    'section'  => 'section_options',
    'settings' => 'themesflat_options[info]',
    'priority' => 17,
    'active_callback' => function () use ( $wp_customize ) {
        return 1 === $wp_customize->get_setting( 'header_button' )->value();
    }, 
) )
);

$wp_customize->add_setting(
    'header_button',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('header_button'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'header_button',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Header Button ( OFF | ON )', 'healingy'),
          'section' => 'section_options',
          'priority' => 6,
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
        'label' => esc_html__( 'Button Text', 'healingy' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 18,
        'active_callback' => function () use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'header_button' )->value();
        }, 
    )
);

// Button url
$wp_customize->add_setting(
    'header_button_url',
    array(
        'default' => '',
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);

//add control
$wp_customize->add_control( 'header_button_url', array(
    'label' => 'Select page for button link to',
    'priority' => 19,
    'active_callback' => function () use ( $wp_customize ) {
        return 1 === $wp_customize->get_setting( 'header_button' )->value();
    }, 
    'type'  => 'dropdown-pages',
    'section' => 'section_options',
    'settings' => 'header_button_url'
));