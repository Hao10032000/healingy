<?php
/**
 * Return the default options of the theme
 * 
 * @return  void
 */

function themesflat_customize_default($key) {
	$default = array(
		'social_links'	=> array ("facebook" => '#', "twitter" => '#', "instagram" => '#', "linkedin"  => '#'),
		'show_social_share' => 0,		
		'social_footer' => 0,
		'go_top' => 1,
		'topbar_background_color'	=> '',
		'message_background_color'	=> '',
		'topbar_textcolor'	=> '',
		'topbar_link_color' => '',
		'topbar_link_color_hover' => '',
		'message_textcolor'	=> '',
		'message_link_color' => '',
		'message_link_color_hover' => '',
		'topbar_show' => 0 ,
		'header_message' => 0 ,
		'topbar_address_title' => 'Address',

		'topbar_address2' => '<i class="icon-healingy-map"></i> 101 E 129th St, East Chicago, IN 46312, US',
		'topbar_address3' => '<i class="icon-healingy-mail"></i> hi.avitex@gmail.com',
		'topbar_address4' => '<i class="icon-healingy-phone"></i> 1-555-678-8888',

		'topbar_email_label' => '<i class="icon-healingy-ona-50"></i>',
		'topbar_email' => 'hello@support.com',
		'topbar_email_title' => 'Support',
		'social_topbar' => 1,
		'social_header' => 1,
		'typography_topbar' => array(
			'family' => 'Archivo',
			'style'  => '400',
			'size'   => '13',
			'line_height'=>'1.5384615384615385',
			'letter_spacing' => '',
		),
		'topbar_controls' => array('padding-top' => 0,'padding-bottom' => 0),
		'logo_controls' => array('padding-top' => '','padding-bottom' => ''),
		'style_header'	=> 'header-default',	
		'style_topbar'	=> 'topbar-default',	
		'header_backgroundcolor'=>'#fff',
		'header_background_bottom_color'=>'',
		'header_sticky' => 0,
		'header_search_box' => 0,
		'header_content_right' => '',
		'header_absolute'	=> 0,		
		'header_sidebar_toggler' => 0,
		'header_infor_phone' => 0,
		'header_button'=>1,
		'header_button_text' => 'Get Your Consult!',
		'header_button_url' => '',
		'header_info_phone_icon' => '<i class="icon-healingy-ona-49"></i>',
		'header_info_phone_number' => 'Phone Number',
		'header_info_phone_number_title' => 'Call us',
		'show_post_navigator' => 0,
		'show_entry_footer_content'	=> 0,
		'logo_width' => 192,
		'menu_location_primary' => 'primary',
		'site_logo'	=> THEMESFLAT_LINK . 'images/logo.png',
		'site_logo_sticky'	=> THEMESFLAT_LINK . 'images/logo.png',
		'site_logo_fixed'	=> THEMESFLAT_LINK . 'images/logo.png',
		'site_logo_mobile'	=> THEMESFLAT_LINK . 'images/logo.png',	
		'header_color_sticky' => '',
		'show_bottom' => 1,		
		'header_backgroundcolor_sticky'=>'#fff',	

		'primary_color'=>'#3C210E',
		'secondary_color'=>'#FEDAC2',
		'accent_color'=>'#F2EDDC',
		
		'typography_body' => array(
			'family' => 'Archivo',
			'style'  => '400',
			'size'   => '18',
			'line_height'=>'30px',
			'letter_spacing' => '0px',
		),
		'body_text_color'=>'#5E5A56',
		'body_background_color' => '',
		'page_sidebar_layout' => 'sidebar-right',
		'content_controls' => array('padding-top' => 80,'padding-bottom' => 80),

		'typography_menu' => array(
			'family' => 'Archivo',
			'style'  => '500',
			'size'   => '18',
			'line_height'=>'93px',
			'letter_spacing' => '0px',
		), 
		'mainnav_color'		=> '#3C210E',
		'mainnav_hover_color'=>'#3C210E',
		'mainnav_active_color'=>'#3C210E',
		'sub_sub_nav_color'=>'',
		'sub_sub_nav_background'=>'',
		'sub_sub_nav_color_hover'=>'',
		'sub_sub_nav_background_hover'=>'',
		'menu_distance_between' => 16,
		'typography_sub_menu' => array(
			'family' => 'Archivo',
			'style'  => '600',
			'size'   => '16',
			'line_height'=>'24px',
			'letter_spacing' => '0px',
		),
		'sub_nav_color'		=>'',		
		'sub_nav_color_hover'	=>	'',
		'sub_nav_background'=>'#ffffff',
		'sub_nav_background_hover'=>'',
		'sub_nav_border_color' => '',
		'typography_headings'	=> array(
			'family' => 'Archivo',
			'style'  => '500',
			'line_height'=>'1.333',
			'letter_spacing' => '0px'		
		),
		'h1_size' => 80,
		'h2_size' => 56,
		'h3_size' => 44,
		'h4_size' => 32,
		'h5_size' => 24,
		'h6_size' => 20,
		'typography_blockquote' => array(
			'family' => 'Archivo',
			'style'  => '400',
			'size'   => '16',
			'line_height'=>'30px',
			'letter_spacing' => '0px',
		),	
		'typography_blog_post_title' => array(
			'family' => 'Archivo',
			'style'  => '500',
			'size'   => '24',
			'line_height'=>'32px',
			'letter_spacing' => '',
		),
		'typography_blog_post_meta' => array(
			'family' => 'Archivo',
			'style'  => '600',
			'size'   => '14',
			'line_height'=>'22px',
			'letter_spacing' => '0.08em',
		),
		'typography_blog_post_buttons' => array(
			'family' => 'Archivo',
			'style'  => '600',
			'size'   => '16',
			'line_height'=>'22px',
			'letter_spacing' => '0px',
		),
		'typography_blog_single_title' => array(
			'family' => 'Archivo',
			'style'  => '500',
			'size'   => '44',
			'line_height'=>'1.1818181818181819',
			'letter_spacing' => '',
		),
		'typography_blog_single_comment_title' => array(
			'family' => 'Archivo',
			'style'  => '500',
			'size'   => '24',
			'line_height'=>'32px',
			'letter_spacing' => '0px',
		),
		'typography_sidebar_widget_title' => array(
			'family' => 'Archivo',
			'style'  => '500',
			'size'   => '24',
			'line_height'=>'1.5',
			'letter_spacing' => '0px',
		),	
		'typography_footer_widget_title' => array(
			'family' => 'Archivo',
			'style'  => '500',
			'size'   => '20',
			'line_height'=>'28px',
			'letter_spacing' => '0px',
		),	
		'typography_page_title'	=> array(
			'family' => 'Archivo',
			'style'  => '500',
			'size'   => '44',
			'line_height'=>'1.5',
			'letter_spacing' => '',
		),
		'page_title_background_color' => '#F5F1ED',
		'page_title_background_color_opacity' => '100',
		'page_title_text_color' => '',		
		'page_title_controls' => array('padding-top' => 59, 'padding-bottom' => 63),
		'page_title_background_image' => '',
		'page_title_image_size' => 'cover',
		'page_title_heading_enabled' => 1,
		'typography_breadcrumb'	=> array(
			'family' => 'Archivo',
			'style'  => '400',
			'size'   => '16',
			'line_height'=>'26px',
			'letter_spacing' => '0px',
		),
		'bread_crumb_prefix' =>'',
		'breadcrumb_separator' =>  '/',
		'breadcrumb_color' => '#535656',

		'typography_buttons' => array(
			'family' => 'Archivo',
			'style'  => '600',
			'size'   => '16',
			'line_height'=>'24px',
			'letter_spacing' => '0px',
		),
		'typography_pagination'	=> array(
			'family' => 'Archivo',
			'style'  => '600',
			'size'   => '16',
			'line_height'=>'1',
			'letter_spacing' => '0px',
		),		
		'typography_bottom_menu' => array(
			'family' => 'Archivo',
			'style'  => '400',
			'size'   => '14',
			'line_height'=>'1.7142857142857142',
			'letter_spacing' => '0px',
		),
		'breadcrumb_enabled' => 1,
		'show_post_paginator' => 1,
		'blog_grid_columns' => 2,
		'post_content_elements' => 'meta,title,excerpt_content,readmore',
		'meta_elements' => 'category',
		'blog_archive_exclude' => '',
		'blog_featured_title' => 'Blog Details',
		'style_blog_single' => 'content-single',
		'sidebar_layout' => 'sidebar-right',
		'blog_archive_layout' => 'blog-list',
		'related_post_style'	=> 'blog-grid',
		'grid_columns_post_related' => 2,
		'number_related_post' => 2,
		'blog_sidebar_list'		  => 'blog-sidebar',	
		'blog_archive_readmore' => 1,
		'blog_archive_post_excepts_length' => 25,
		'blog_archive_readmore_text' => 'Read More <i class="icon-healingy-right"></i>',
		'blog_archive_pagination_style' => 'pager-numeric',
		'blog_posts_per_page'	=> 3,
		'blog_order_by'	=> 'date',
		'blog_order_direction' => 'DESC',
		'page_sidebar_list'	=> 'blog-sidebar',	

		'therapists_slug' => '',
		'therapists_name' => '',
		'therapists_show_filter' => 0,
		'therapists_grid_columns' => 3,
		'therapists_number_post'=> 9,
		'therapists_filter_category_order' => '',
		'therapists_order_by' => 'author,date,comment',
		'therapists_order_direction' => 'DESC',
		'therapists_exclude' => '',
		'therapists_layout' => 'fullwidth',
		'therapists_show_post_navigator' => 0,
		'therapists_show_entry_footer_content'	=> 0,
		'therapists_show_related' => 0,
		'therapists_related_grid_columns' => 3,
		'therapists_sidebar_list' => 'blog-sidebar',
		'therapists_post_image'	=> THEMESFLAT_LINK . 'images/logo.png',
		'number_related_post_therapists' => 3,
		'therapists_featured_title' => 'Therapists Details',


		'services_slug' => '',
		'services_name' => '',
		'services_show_filter' => 0,
		'services_grid_columns' => 3,
		'services_number_post'=> 6,
		'services_archive_pagination_style' => 'pager-numeric',
		'services_filter_category_order' => '',
		'services_order_by' => 'date',
		'services_order_direction' => 'DESC',
		'services_exclude' => '',
		'services_layout' => 'fullwidth',
		'services_sidebar_list' => 'themesflat-custom-sidebar-servicessidebar',
		'services_show_post_navigator' => 0,
		'services_show_related' => 0,
		'services_related_grid_columns' => 3,
		'number_related_post_services' => 3,
		'services_featured_title' => '',
		'services_title_single' => 1,
		
		'typography_footer' => array(
			'family' => 'Archivo',
			'style'  => '400',
			'size'   => '14',
			'line_height'=>'28px',
			'letter_spacing' => '',
		),
		'footer_background_color'	=> '#28221D',
		'footer_title_widget_color' => '#fff',
		'footer_text_color'			=> '#ABB0B4',
		'footer_text_color_hover'   => '',
		'footer_widget_areas' => 2,
		'footer_controls' => array('padding-top' => '', 'padding-bottom' =>'' ),
		'footer1' => 'footer-1',
		'footer2' => 'footer-2',
		'footer3' => 'footer-3',
		'footer4' => 'footer-4',
		'footer_background_image' => '',
		'footer_image_size' => 'cover',
		'typography_bottom_copyright' => array(
			'family' => 'Archivo',
			'style'  => '400',
			'size'   => '14',
			'line_height'=>'22px',
			'letter_spacing' => '',
		),
		'bottom_background_color'	=> '#28221D',
		'bottom_text_color'			=> '#ABB0B4',
		'bottom_link_color'         => '#ffffff',
		'bottom_text_color_hover'   => '',		
		'social_bottom'   => 1,		
		'layout_version'			=> 'wide',		
		'footer_copyright'			=> 'Copyright © 2024 Healingy By <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat </a> All rights reserved',
		'enable_smooth_scroll'	=> 0,
		'enable_preload' => 1,
		'preload' => 'preload-6',
		'page_title_styles' => 'default',
		'page_title_alignment' => 'center',
		'page_title_video_url' => '',

        'show_partner'	=> 1,
		'img_partner' => '',
		'show_number_img_partner_desktop' => 6,
		'show_number_img_partner_tablet' => 4,
		'show_number_img_partner_mobile' => 2,
		'gap_img_partner' => 30,
		'partner_box_controls' => array('padding-top' => 67,'padding-bottom' => 64),
		'partner_box_background_color' => '#f2f7f5',
        'show_footer_info'	=> 0,
        'footer_info_text' => 'Solve Your IT Needs Today!',
		'footer_info_button_url' => '/contact-us',
        'footer_info_button' => 'GET SOLUTIONS',
	);
	return $default[$key];
}