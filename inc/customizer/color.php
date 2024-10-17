<?php 
 // ADD SECTION GENERAL
$wp_customize->add_section('color_general',array(
    'title'         => 'General',
    'priority'      => 1,
    'panel'         => 'color_panel',
));
require THEMESFLAT_DIR . "inc/customizer/color/general.php";

// ADD SECTION TOPBAR
$wp_customize->add_section('color_topbar',array(
    'title'=>'Topbar',
    'priority'=> 2,
    'panel'=>'color_panel',
)); 
require THEMESFLAT_DIR . "inc/customizer/color/topbar.php";

// ADD SECTION HEADER
$wp_customize->add_section('color_header',array(
    'title'=>'Header',
    'priority'=> 3,
    'panel'=>'color_panel',
));  
require THEMESFLAT_DIR . "inc/customizer/color/header.php";

// ADD SECTION FOOTER
$wp_customize->add_section('color_footer',array(
    'title'=>'Footer',
    'priority'=> 5,
    'panel'=>'color_panel',
));
require THEMESFLAT_DIR . "inc/customizer/color/footer.php";

// ADD SECTION COLOR BOTTOM
$wp_customize->add_section('color_bottom',array(
    'title'=>'Bottom',
    'priority'=> 6,
    'panel'=>'color_panel',
));
require THEMESFLAT_DIR . "inc/customizer/color/bottom.php";