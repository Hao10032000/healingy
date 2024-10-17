<?php 
// Top bar Background
$wp_customize->add_setting(
    'topbar_background_color',
    array(
        'default'           => themesflat_customize_default('topbar_background_color'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_ColorOverlay(
        $wp_customize,
        'topbar_background_color',
        array(
            'label'         => esc_html__('Background', 'healingy'),
            'section'       => 'color_topbar',
            'priority'      => 1
        )
    )
);

// Top bar text color
$wp_customize->add_setting(
    'topbar_textcolor',
    array(
        'default'           => themesflat_customize_default('topbar_textcolor'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'topbar_textcolor',
        array(
            'label'         => esc_html__('Text Color', 'healingy'),
            'section'       => 'color_topbar',
            'settings'      => 'topbar_textcolor',
            'priority'      => 3
        )
    )
);

// Topbar Link Color Hover
$wp_customize->add_setting(
    'topbar_link_color',
    array(
        'default'           => themesflat_customize_default('topbar_link_color'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'topbar_link_color',
        array(
            'label'         => esc_html__('Link Color', 'healingy'),
            'section'       => 'color_topbar',
            'settings'      => 'topbar_link_color',
            'priority'      => 4
        )
    )
);

// Topbar Link Color Hover
$wp_customize->add_setting(
    'topbar_link_color_hover',
    array(
        'default'           => themesflat_customize_default('topbar_link_color_hover'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'topbar_link_color_hover',
        array(
            'label'         => esc_html__('Link Color Hover', 'healingy'),
            'section'       => 'color_topbar',
            'settings'      => 'topbar_link_color_hover',
            'priority'      => 5
        )
    )
);


// Message text color
$wp_customize->add_setting(
    'message_textcolor',
    array(
        'default'           => themesflat_customize_default('message_textcolor'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'message_textcolor',
        array(
            'label'         => esc_html__('Message Text Color', 'healingy'),
            'section'       => 'color_topbar',
            'settings'      => 'message_textcolor',
            'priority'      => 6
        )
    )
);

// Message Link Color Hover
$wp_customize->add_setting(
    'message_link_color',
    array(
        'default'           => themesflat_customize_default('message_link_color'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'message_link_color',
        array(
            'label'         => esc_html__('Message Link Color', 'healingy'),
            'section'       => 'color_topbar',
            'settings'      => 'message_link_color',
            'priority'      => 7
        )
    )
);

// Message Link Color Hover
$wp_customize->add_setting(
    'message_link_color_hover',
    array(
        'default'           => themesflat_customize_default('message_link_color_hover'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    new themesflat_ColorOverlay(
        $wp_customize,
        'message_link_color_hover',
        array(
            'label'         => esc_html__('Message Link Color Hover', 'healingy'),
            'section'       => 'color_topbar',
            'settings'      => 'message_link_color_hover',
            'priority'      => 8
        )
    )
);