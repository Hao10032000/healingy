<?php
// Blog Post Title Fonts
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'typography-blog', array(
    'label' => esc_html__('Blog', 'healingy'),
    'section' => 'panel_typo_blog_post',
    'settings' => 'themesflat_options[info]',
    'priority' => 1
    ) )
);
$wp_customize->add_setting(
    'typography_blog_post_title',
    array(
        'default' => themesflat_customize_default('typography_blog_post_title'),
        'sanitize_callback' => 'esc_html',
    )
);
$wp_customize->add_control( new themesflat_Typography($wp_customize,
    'typography_blog_post_title',
    array(
        'label' => esc_html__( 'Font name/style/sets', 'healingy' ),
        'section' => 'panel_typo_blog_post',
        'type' => 'typography',
        'fields' => array('family','style','size','line_height','letter_spacing'),
        'priority' => 2
    ))
);

// Blog Post Meta Fonts
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'typography-blog-meta', array(
    'label' => esc_html__('Blog Meta', 'healingy'),
    'section' => 'panel_typo_blog_post',
    'settings' => 'themesflat_options[info]',
    'priority' => 10
    ) )
);
$wp_customize->add_setting(
    'typography_blog_post_meta',
    array(
        'default' => themesflat_customize_default('typography_blog_post_meta'),
        'sanitize_callback' => 'esc_html',
    )
);
$wp_customize->add_control( new themesflat_Typography($wp_customize,
    'typography_blog_post_meta',
    array(
        'label' => esc_html__( 'Font name/style/sets', 'healingy' ),
        'section' => 'panel_typo_blog_post',
        'type' => 'typography',
        'fields' => array('family','style','size','line_height','letter_spacing'),
        'priority' => 11
    ))
);

// Blog Post Buttons Fonts
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'typography-blog-button', array(
    'label' => esc_html__('Blog Buttons', 'healingy'),
    'section' => 'panel_typo_blog_post',
    'settings' => 'themesflat_options[info]',
    'priority' => 20
    ) )
);
$wp_customize->add_setting(
    'typography_blog_post_buttons',
    array(
        'default' => themesflat_customize_default('typography_blog_post_buttons'),
        'sanitize_callback' => 'esc_html',
    )
);
$wp_customize->add_control( new themesflat_Typography($wp_customize,
    'typography_blog_post_buttons',
    array(
        'label' => esc_html__( 'Font name/style/sets', 'healingy' ),
        'section' => 'panel_typo_blog_post',
        'type' => 'typography',
        'fields' => array('family','style','size','line_height','letter_spacing'),
        'priority' => 21
    ))
);

// Blog Single Title Fonts
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'typography-blog-single', array(
    'label' => esc_html__('Blog Single', 'healingy'),
    'section' => 'panel_typo_blog_post',
    'settings' => 'themesflat_options[info]',
    'priority' => 30
    ) )
);
$wp_customize->add_setting(
    'typography_blog_single_title',
    array(
        'default' => themesflat_customize_default('typography_blog_single_title'),
        'sanitize_callback' => 'esc_html',
    )
);
$wp_customize->add_control( new themesflat_Typography($wp_customize,
    'typography_blog_single_title',
    array(
        'label' => esc_html__( 'Font name/style/sets', 'healingy' ),
        'section' => 'panel_typo_blog_post',
        'type' => 'typography',
        'fields' => array('family','style','size','line_height','letter_spacing'),
        'priority' => 31
    ))
);

// Blog Single Comment Title Fonts
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'typography-blog-single-comment', array(
    'label' => esc_html__('Blog Single Comment Title', 'healingy'),
    'section' => 'panel_typo_blog_post',
    'settings' => 'themesflat_options[info]',
    'priority' => 40
    ) )
);
$wp_customize->add_setting(
    'typography_blog_single_comment_title',
    array(
        'default' => themesflat_customize_default('typography_blog_single_comment_title'),
        'sanitize_callback' => 'esc_html',
    )
);
$wp_customize->add_control( new themesflat_Typography($wp_customize,
    'typography_blog_single_comment_title',
    array(
        'label' => esc_html__( 'Font name/style/sets', 'healingy' ),
        'section' => 'panel_typo_blog_post',
        'type' => 'typography',
        'fields' => array('family','style','size','line_height','letter_spacing'),
        'priority' => 41
    ))
);
