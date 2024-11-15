<?php 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use Elementor\Modules\DynamicTags\Module as TagsModule;


class themesflat_options_elementor {
	public function __construct(){	
        add_action('elementor/documents/register_controls', [$this, 'themesflat_elementor_register_options'], 10);
        add_action('elementor/editor/before_enqueue_scripts', function() { wp_enqueue_script( 'elementor-preview-load', THEMESFLAT_LINK . 'js/elementor/elementor-preview-load.js', array( 'jquery' ), null, true );
        }, 10, 3);
    }

    public function themesflat_elementor_register_options($element){
        $post_id = $element->get_id();
        $post_type = get_post_type($post_id);

        if ( ($post_type !== 'post') ) {
        	$this->themesflat_options_page_header($element);
            $this->themesflat_options_page_footer($element);                      
        }

        $this->themesflat_options_page($element);
        $this->themesflat_options_page_pagetitle($element);

        if ( $post_type == 'post' ) {
            $this->themesflat_options_blog($element);
        }

    }

    public function themesflat_options_page_header($element) {
        // TF Header
        $element->start_controls_section(
            'themesflat_header_options',
            [
                'label' => esc_html__('TF Header', 'healingy'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );
        $element->add_control(
            'style_header',
            [
                'label'     => esc_html__( 'Header Style', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'healingy'),
                    'header-default' => esc_html__( 'Header Default', 'healingy'),
                    'header-01' => esc_html__( 'Header 01', 'healingy'),
                    'header-02' => esc_html__( 'Header 02', 'healingy'),
                    'header-03' => esc_html__( 'Header 03', 'healingy'),
                ],
            ]
        );
        $element->add_control(
            'h_options_topbar',
            [
                'label' => esc_html__( 'Topbar', 'healingy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'topbar_show',
            [
                'label'     => esc_html__( 'Top Bar', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'healingy'),
                    0       => esc_html__( 'Hide', 'healingy'),
                    1       => esc_html__( 'Show', 'healingy'),                    
                ],
            ]
        ); 

        $element->add_control(
            'style_topbar',
            [
                'label'     => esc_html__( 'TopBar Style', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'healingy'),
                    'topbar-default' => esc_html__( 'TopBar Default', 'healingy'),
                    'topbar-01' => esc_html__( 'TopBar 01', 'healingy'),
                ],
                'condition' => [
                    'topbar_show' => '1',
                ],
            ]
        );

        $element->add_control(
            'social_topbar',
            [
                'label'     => esc_html__( 'Social Top Bar', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'healingy'),
                    0       => esc_html__( 'Hide', 'healingy'),
                    1       => esc_html__( 'Show', 'healingy'),                    
                ],
                'condition' => [
                    'topbar_show' => '1',
                ],
            ]
        );

        $element->add_control (
            'topbar_address2',
            [
                'label' => esc_html__( 'Top Bar Address', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'topbar_show' => '1',
                    'style_topbar' => 'topbar-default',
                ],
            ]
        );	

        $element->add_control(
            'topbar_height',
            [
                'label' => esc_html__( 'Top Bar Height', 'healingy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
	
        $element->add_group_control( 
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'topbar_border',
                'label' => esc_html__( 'Border', 'themesflat-core' ),
                'selector' => '{{WRAPPER}} .header-absolute .themesflat-top.select-2, {{WRAPPER}} .themesflat-top, {{WRAPPER}} .themesflat-top.select-2 ',
            ]
        );

        $element->add_responsive_control(
            'topbar_padding',
            [
                'label' => esc_html__( 'Padding', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => ['top','bottom'],
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top .container-inside' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $element->add_responsive_control(
            'topbar_margin',
            [
                'label' => esc_html__( 'Margin', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => ['top','bottom'],
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top .container-inside' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $element->add_control(
            'topbar_background_color',
            [
                'label' => esc_html__( 'Background', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top' => 'background: {{VALUE}}; border-color: {{VALUE}};',                  
                ],
            ]
        );
        $element->add_control(
            'topbar_textcolor',
            [
                'label' => esc_html__( 'Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top .content-left ul li,{{WRAPPER}} .themesflat-top .content-left ul li i, {{WRAPPER}} .themesflat-top.style-01 .infor-topbar, {{WRAPPER}} .themesflat-top' => 'color: {{VALUE}};',                  
                ],
            ]
        );
        $element->add_control(
            'topbar_link_color',
            [
                'label' => esc_html__( 'Link Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top a, {{WRAPPER}} .header-03 .themesflat-top.style-01 a,{{WRAPPER}} .themesflat-top .themesflat-socials li a' => 'color: {{VALUE}};',                  
                ],
            ]
        );
        $element->add_control(
            'topbar_link_color_hover',
            [
                'label' => esc_html__( 'Link Hover Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top a:hover,{{WRAPPER}} .header-03 .themesflat-top.style-01 a:hover,{{WRAPPER}} .themesflat-top.style-01 .themesflat-socials a:hover,{{WRAPPER}} .themesflat-top .themesflat-socials a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'topbar_typography',
                'label' => esc_html__( 'Typography', 'healingy' ),
                'selector' => '{{WRAPPER}} .themesflat-top',
            ]
        );

        $element->add_control(
            'h_options_header',
            [
                'label' => esc_html__( 'Header', 'healingy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Logo
        $element->add_control(
            'site_logo',
            [
                'label'   => esc_html__( 'Custom Logo', 'healingy' ),
                'type'    => Controls_Manager::MEDIA,
            ]
        );
        $element->add_control(
            'site_logo_fixed',
            [
                'label'   => esc_html__( 'Custom Logo Fixed', 'healingy' ),
                'type'    => Controls_Manager::MEDIA,
            ]
        );
        $element->add_responsive_control(
            'logo_width',
            [
                'label'      => esc_html__( 'Logo Width', 'healingy' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range'      => [
                    'px' => [
                        'min' => 30,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 50,
                        'max' => 150,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} #header #logo a img, {{WRAPPER}} .modal-menu__panel-footer .logo-panel a img' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $element->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'logo_bg_color',
                'label' => esc_html__( 'Logo Background Color', 'healingy' ),
                'types' => ['gradient' ],
                'selector' => '{{WRAPPER}}  #header .logo,{{WRAPPER}}  #header .logo::after',
            ]
        );


        $element->add_control(
            'header_absolute',
            [
                'label'     => esc_html__( 'Header Absolute', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'healingy'),
                    0       => esc_html__( 'No', 'healingy'),
                    1       => esc_html__( 'Yes', 'healingy'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_sticky',
            [
                'label'     => esc_html__( 'Header Sticky', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'healingy'),
                    0       => esc_html__( 'No', 'healingy'),
                    1       => esc_html__( 'Yes', 'healingy'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        

        $element->add_control(
            'header_backgroundcolor',
            [
                'label' => esc_html__( 'Header Background', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header.header-default' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header-style1' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header.header-02' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header-style3 .header-ct-center, {{WRAPPER}} #header.header-style3 .header-ct-right' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header-style4' => 'background: {{VALUE}};',                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_group_control( 
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_header',
                'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
                'selector' => '{{WRAPPER}} .header-default, {{WRAPPER}} .header-01, {{WRAPPER}} .header-02',
            ]
        );
        $element->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'header_border',
                'label' => esc_html__( 'Border', 'healingy' ),
                'selector' => '{{WRAPPER}} .header-default, {{WRAPPER}} .header-01, {{WRAPPER}} .header-02',
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );
        $element->add_control(
            'header_backgroundcolor_sticky',
            [
                'label' => esc_html__( 'Header Background Sticky', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header.header-sticky' => 'background: {{VALUE}};',
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_height',
            [
                'label' => esc_html__( 'Header Height', 'healingy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li > a, {{WRAPPER}} #header .show-search, {{WRAPPER}} header .block a, {{WRAPPER}} .button-menu' => 'line-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} #header .header-wrap' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_responsive_control(
            'header_padding',
            [
                'label' => esc_html__( 'Padding', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%' ],
                'selectors' => [
                    '{{WRAPPER}} #header.header.header-default .inner-header, {{WRAPPER}} .themesflat-top.default .container, {{WRAPPER}} .header-default .themesflat-top.style-01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $element->add_responsive_control(
            'header_margin',
            [
                'label' => esc_html__( 'Margin', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%' ],
                'selectors' => [
                    '{{WRAPPER}} #header.header.header-default .inner-header, {{WRAPPER}} .themesflat-top.default .container, {{WRAPPER}} .header-default .themesflat-top.style-01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'h_options_nav_search',
            [
                'label' => esc_html__( 'Button Search & Toggle', 'healingy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'header_search_box',
            [
                'label'     => esc_html__( 'Search Box', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'healingy'),
                    0       => esc_html__( 'Hide', 'healingy'),
                    1       => esc_html__( 'Show', 'healingy'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );        

        $element->add_control(
            'header_sidebar_toggler',
            [
                'label'     => esc_html__( 'Sidebar Toggler', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'healingy'),
                    0       => esc_html__( 'Hide', 'healingy'),
                    1       => esc_html__( 'Show', 'healingy'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );

        $element->add_control(
            'search_toggle_color',
            [
                'label' => esc_html__( 'Search & Toggle Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .show-search > a, {{WRAPPER}} .modal-menu-left-btn' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'search_toggle_color_hover',
            [
                'label' => esc_html__( 'Search & Toggle Color Hover', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .show-search > a:hover, {{WRAPPER}} .modal-menu-left-btn:hover' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'search_toggle_color_stick',
            [
                'label' => esc_html__( 'Search & Toggle Color Sticky', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sticky .show-search > a, {{WRAPPER}} .header-sticky .modal-menu-left-btn' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'search_toggle_color_hover_sticky',
            [
                'label' => esc_html__( 'Search & Toggle Color Hover Sticky', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sticky .show-search > a:hover, {{WRAPPER}} .header-sticky .modal-menu-left-btn:hover' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'h_options_nav',
            [
                'label' => esc_html__( 'Menu', 'healingy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_menu',
                'label' => esc_html__( 'Typography', 'healingy' ),
                'selector' => '{{WRAPPER}} #mainnav > ul > li > a',
            ]
        );

        $element->add_control(
            'mainnav_color',
            [
                'label' => esc_html__( 'Link Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li > a' => 'color: {{VALUE}};',                  
                ],
            ]
        );
        $element->add_control(
            'mainnav_hover_color',
            [
                'label' => esc_html__( 'Link Hover & active Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li.current-menu-item > a, {{WRAPPER}} #mainnav > ul > li > a:hover, {{WRAPPER}} #mainnav > ul > li.current-menu-ancestor > a, {{WRAPPER}} #mainnav > ul > li.current-menu-parent > a' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'mainnav_space',
            [
                'label' => esc_html__( 'MainNav Space', 'healingy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'h_options_nav_sub',
            [
                'label' => esc_html__( 'Sub Menu', 'healingy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_sub_menu',
                'label' => esc_html__( 'Typography', 'healingy' ),
                'selector' => '#mainnav ul.sub-menu > li > a',
            ]
        );

        $element->add_control(
            'sub_nav_color',
            [
                'label' => esc_html__( 'SubMenu Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu > li > a, {{WRAPPER}} #mainnav li.megamenu > ul.sub-menu > .menu-item-has-children > a' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'sub_nav_color_hover',
            [
                'label' => esc_html__( 'SubMenu Color Hover', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu > li > a:hover,
                     {{WRAPPER}} #mainnav ul.sub-menu > li.current-menu-item > a,
                      {{WRAPPER}} #mainnav-mobi ul li.current-menu-item > a,
                       {{WRAPPER}} #mainnav-mobi ul li.current-menu-ancestor > a,
                        {{WRAPPER}} #mainnav ul.sub-menu > li.current-menu-ancestor > a,
                         {{WRAPPER}} #mainnav-mobi ul li .current-menu-item > a,
                         {{WRAPPER}} #mainnav-mobi ul li.current-menu-item .btn-submenu:before,
                         {{WRAPPER}} #mainnav-mobi ul li .current-menu-item .btn-submenu:before' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'sub_nav_background',
            [
                'label' => esc_html__( 'SubMenu Background Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu' => 'background: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'sub_nav_background_hover',
            [
                'label' => esc_html__( 'SubMenu Background Color Hover', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu > li > a:hover' => 'background: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'sub_nav_border_color',
            [
                'label' => esc_html__( 'SubMenu Border Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu > li' => ' border-top-color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'h_options_nav_inner',
            [
                'label' => esc_html__( 'Sub Inner Menu', 'healingy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'sub_sub_nav_color',
            [
                'label' => esc_html__( 'Sub Inner Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu li ul.sub-menu li a' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'sub_sub_nav_color_hover',
            [
                'label' => esc_html__( 'Sub Inner Color Hover', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu li ul.sub-menu li a:hover, {{WRAPPER}} #mainnav ul.sub-menu li ul.sub-menu li.current-menu-item a' => 'color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'sub_sub_nav_background',
            [
                'label' => esc_html__( 'Sub Inner Background Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu li ul.sub-menu li a' => 'background-color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'sub_sub_nav_background_hover',
            [
                'label' => esc_html__( 'Sub Inner Background Color Hover', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu li ul.sub-menu li a:hover, {{WRAPPER}} #mainnav ul.sub-menu li ul.sub-menu li.current-menu-item a' => 'background-color: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'h_options_Infor',
            [
                'label' => esc_html__( 'Information Header', 'healingy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $element->add_control(
            'header_infor_phone',
            [
                'label'     => esc_html__( 'Header Infor Contact', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'healingy'),
                    0       => esc_html__( 'Hide', 'healingy'),
                    1       => esc_html__( 'Show', 'healingy'),                    
                ],
                'condition' => [ 'style_header!' => 'header-02' ],
            ]
        ); 

        $element->add_control(
            'infor_color',
            [
                'label' => esc_html__( 'Infor Color Label', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header .header-wrap .header-ct-right .phone-header-box' => 'color: {{VALUE}};',                  
                ],
                'condition' => [ 'style_header!' => 'header-02' ],
            ]
        );

        $element->add_control(
            'infor_hd_color',
            [
                'label' => esc_html__( 'Infor Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header .header-wrap .header-ct-right .phone-header-box h3 ' => 'color: {{VALUE}};',                  
                ],
                'condition' => [ 'style_header!' => 'header-02' ],
            ]
        );




        // infor home 2

        $element->add_control (
            'header_info_phone_icon',
            [
                'label' => esc_html__( 'Infor Contact Icon', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [ 'style_header' => 'header-02' ],
            ]
        );

        $element->add_control (
            'header_info_phone_number',
            [
                'label' => esc_html__( 'Infor Contact', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $element->add_control (
            'topbar_email_label',
            [
                'label' => esc_html__( 'Email Icon', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [ 'style_header' => 'header-02' ],
            ]
        );

        $element->add_control (
            'topbar_email',
            [
                'label' => esc_html__( 'Email Infor', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [ 'style_header' => 'header-02' ],
            ]
        );


        $element->add_control (
            'topbar_address',
            [
                'label' => esc_html__( 'Address Infor', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [ 'style_header' => 'header-02' ],
            ]
        );

        $element->add_control(
            'header_infor_color_over',
            [
                'label' => esc_html__( 'Icon Background Color Label', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header .header-info-item .info-label' => 'background: {{VALUE}};',                  
                ],
                'condition' => [ 'style_header' => 'header-02' ],
            ]
        );

        $element->add_control(
            'header_infor_color',
            [
                'label' => esc_html__( 'Icon Color Label', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header .header-info-item .info-label' => 'color: {{VALUE}};',                  
                ],
                'condition' => [ 'style_header' => 'header-02' ],
            ]
        );

        $element->add_control(
            'header_infor_color_title',
            [
                'label' => esc_html__( 'Subtitle Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header .header-info-item .content .title' => 'color: {{VALUE}};',                  
                ],
                'condition' => [ 'style_header' => 'header-02' ],
            ]
        );

        $element->add_control(
            'header_infor_color_title_bottom',
            [
                'label' => esc_html__( 'Title Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header .header-info-item .content .info-content' => 'color: {{VALUE}};',                  
                ],
                'condition' => [ 'style_header' => 'header-02' ],
            ]
        );

        //Extra Classes Header
        $element->add_control(
            'extra_classes_header',
            [
                'label'   => esc_html__( 'Extra Classes', 'healingy' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_pagetitle($element) {
        // TF Page Title
        $element->start_controls_section(
            'themesflat_pagetitle_options',
            [
                'label' => esc_html__('TF Page Title', 'healingy'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );       

        $element->add_control(
            'hide_pagetitle',
            [
                'label'     => esc_html__( 'Hide Page Title', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'healingy'),
                    'block'      => esc_html__( 'No', 'healingy'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} .page-title' => 'display: {{VALUE}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_padding',
            [
                'label' => esc_html__( 'Padding', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_margin',
            [
                'label' => esc_html__( 'Margin', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );              

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'pagetitle_bg',
                'label' => esc_html__( 'Background', 'healingy' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .page-title',
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        $element->add_responsive_control(
            'pagetitle_title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '7',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .page-title.default .page-title-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        $element->add_control(
            'pagetitle_overlay_color',
            [
                'label' => esc_html__( 'Overlay Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-title .overlay' => 'background: {{VALUE}}; opacity: 100%;filter: alpha(opacity=100);',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        //Extra Classes Page Title
        $element->add_control(
            'extra_classes_pagetitle',
            [
                'label'   => esc_html__( 'Extra Classes', 'healingy' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_footer($element) {
        // TF Footer
        $element->start_controls_section(
            'themesflat_footer_options',
            [
                'label' => esc_html__('TF Footer', 'healingy'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'footer_heading',
            [
                'label'     => esc_html__( 'Footer', 'healingy'),
                'type'      => Controls_Manager::HEADING,
            ]
        );       

        $element->add_control(
            'hide_footer',
            [
                'label'     => esc_html__( 'Hide Footer', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'healingy'),
                    'block'      => esc_html__( 'No', 'healingy'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} #footer' => 'display: {{VALUE}};',
                    '{{WRAPPER}} .info-footer' => 'display: {{VALUE}};' 
                ],
            ]
        );

        $element->add_responsive_control(
            'footer_padding',
            [
                'label' => esc_html__( 'Padding', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );
        $element->add_responsive_control(
            'footer_margin',
            [
                'label' => esc_html__( 'margin', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer_background ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );


        $element->add_control(
            'footer_color',
            [
                'label' => esc_html__( 'Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'color: {{VALUE}}',
                    '{{WRAPPER}} #footer h1, {{WRAPPER}} #footer h2, {{WRAPPER}} #footer h3, {{WRAPPER}} #footer h4, {{WRAPPER}} #footer h5, {{WRAPPER}} #footer h6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} #footer, #footer input, #footer select, {{WRAPPER}} #footer textarea, {{WRAPPER}} #footer a, {{WRAPPER}} footer .widget.widget-recent-news li .text .post-date, {{WRAPPER}} footer .widget.widget_latest_news li .text .post-date, {{WRAPPER}} #footer .footer-widgets .widget.widget_themesflat_socials ul li a' => 'color: {{VALUE}}',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );       

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'footer_bg',
                'label' => esc_html__( 'Background', 'healingy' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .footer_background .overlay-footer',
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        $element->add_control(
            'footer_bg_overlay',
            [
                'label' => esc_html__( 'Background Overlay', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer_background' => 'background-color: {{VALUE}}',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        // Bottom
        $element->add_control(
            'bottom_heading',
            [
                'label'     => esc_html__( 'Bottom', 'healingy'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_control(
            'hide_bottom',
            [
                'label'     => esc_html__( 'Hide?', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'healingy'),
                    'block'      => esc_html__( 'No', 'healingy'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} #bottom' => 'display: {{VALUE}};' 
                ],
            ]
        );

        $element->add_control(
            'bottom_color',
            [
                'label' => esc_html__( 'Color', 'healingy' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bottom *' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bottom, {{WRAPPER}} .bottom a' => 'color: {{VALUE}}',
                ],
                'condition' => [ 'hide_bottom' => 'block' ]
            ]
        );

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bottom_bg',
                'label' => esc_html__( 'Background', 'healingy' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} #bottom',
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        $element->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'bottom_border',
                'label' => esc_html__( 'Border', 'healingy' ),
                'selector' => '{{WRAPPER}} #bottom .container-inside',
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        $element->add_responsive_control(
            'bottom_padding',
            [
                'label' => esc_html__( 'Padding', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #bottom .container-inside' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        //Extra Classes Footer
        $element->add_control(
            'extra_classes_footer',
            [
                'label'   => esc_html__( 'Extra Classes', 'healingy' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page($element) {
        // TF Page
        $element->start_controls_section(
            'themesflat_page_options',
            [
                'label' => esc_html__('TF Page', 'healingy'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'page_sidebar_layout',
            [
                'label'     => esc_html__( 'Sidebar Position', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'No Sidebar', 'healingy'),
                    'sidebar-right'     => esc_html__( 'Sidebar Right','healingy' ),
                    'sidebar-left'      =>  esc_html__( 'Sidebar Left','healingy' ),
                    'fullwidth'         =>   esc_html__( 'Full Width','healingy' ),
                    'fullwidth-small'   =>   esc_html__( 'Full Width Small','healingy' ),
                    'fullwidth-center'  =>   esc_html__( 'Full Width Center','healingy' ),
                ],
            ]
        );

        $element->add_control(
            'main_content_heading',
            [
                'label'     => esc_html__( 'Main Content', 'healingy'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_responsive_control(
            'main_content_padding',
            [
                'label' => esc_html__( 'Padding', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'main_content_margin',
            [
                'label' => esc_html__( 'Margin', 'healingy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_blog($element) {
        // TF Blog
        $element->start_controls_section(
            'themesflat_blog_options',
            [
                'label' => esc_html__('TF Blog', 'healingy'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'style_blog_single',
            [
                'label'     => esc_html__( 'Style Single Blog', 'healingy'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'healingy'),
                    'content-single' => esc_html__( 'Style Has Sidebar', 'healingy'),
                    'content-single2' => esc_html__( 'Style Fullwidth', 'healingy'),
                ],
            ]
        );


        $element->end_controls_section();
    }

}

new themesflat_options_elementor();