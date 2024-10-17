<?php 
$header_search_box = themesflat_get_opt('header_search_box');
if (themesflat_get_opt_elementor('header_search_box') != '') {
    $header_search_box = themesflat_get_opt_elementor('header_search_box');
}

$header_sidebar_toggler = themesflat_get_opt('header_sidebar_toggler');
if (themesflat_get_opt_elementor('header_sidebar_toggler') != '') {
    $header_sidebar_toggler = themesflat_get_opt_elementor('header_sidebar_toggler');
}

$header_infor_phone = themesflat_get_opt('header_infor_phone');
if (themesflat_get_opt_elementor('header_infor_phone') != '') {
    $header_infor_phone = themesflat_get_opt_elementor('header_infor_phone');
}
$topbar_address_label = themesflat_get_opt('topbar_address_label');
if (themesflat_get_opt_elementor('topbar_address_label') != '') {
    $topbar_address_label = themesflat_get_opt_elementor('topbar_address_label');
}
$topbar_address = themesflat_get_opt('topbar_address');
if (themesflat_get_opt_elementor('topbar_address') != '') {
    $topbar_address = themesflat_get_opt_elementor('topbar_address');
}
$topbar_address_title = themesflat_get_opt('topbar_address_title');
if (themesflat_get_opt_elementor('topbar_address_title') != '') {
    $topbar_address_title = themesflat_get_opt_elementor('topbar_address_title');
}
$topbar_email_label = themesflat_get_opt('topbar_email_label');
if (themesflat_get_opt_elementor('topbar_email_label') != '') {
    $topbar_email_label = themesflat_get_opt_elementor('topbar_email_label');
}
$topbar_email = themesflat_get_opt('topbar_email');
if (themesflat_get_opt_elementor('topbar_email') != '') {
    $topbar_email = themesflat_get_opt_elementor('topbar_email');
}
$topbar_email_title = themesflat_get_opt('topbar_email_title');
if (themesflat_get_opt_elementor('topbar_email_title') != '') {
    $topbar_email_title = themesflat_get_opt_elementor('topbar_email_title');
}
$header_info_phone_icon = themesflat_get_opt('header_info_phone_icon');
if (themesflat_get_opt_elementor('header_info_phone_icon') != '') {
    $header_info_phone_icon = themesflat_get_opt_elementor('header_info_phone_icon');
}
$header_info_phone_number = themesflat_get_opt('header_info_phone_number');
if (themesflat_get_opt_elementor('header_info_phone_number') != '') {
    $header_info_phone_number = themesflat_get_opt_elementor('header_info_phone_number');
}
$header_info_phone_number_title = themesflat_get_opt('header_info_phone_number_title');
if (themesflat_get_opt_elementor('header_info_phone_number_title') != '') {
    $header_info_phone_number_title = themesflat_get_opt_elementor('header_info_phone_number_title');
}
?>
<?php get_template_part( 'tpl/topbar'); ?>
<header id="header" class="header header-02 <?php echo themesflat_get_opt_elementor('extra_classes_header'); ?>">
    <div class="inner-header">  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-wrap clearfix">
                        <div class="header-ct-left">
                            <?php get_template_part( 'tpl/header/brand'); ?>
                        </div>
                        <div class="header-ct-right">

                            <?php if ($header_info_phone_icon != '' || $header_info_phone_number != '' || $header_info_phone_number_title != '') : ?>
                                <div class="header-info-item info-phone">
                                    <?php if ($header_info_phone_icon != '') : ?>
                                        <span class="info-label"><?php echo wp_kses($header_info_phone_icon, themesflat_kses_allowed_html()); ?></span>
                                    <?php endif; ?>
                                    <div class="content">
                                    <?php if ($header_info_phone_number_title != '') : ?>
                                    <div class="title"><?php echo esc_attr($header_info_phone_number_title); ?></div> 
                                    <?php endif; ?>
                                    <?php if ($header_info_phone_number != '') : ?>
                                        <span class="info-content"><?php echo esc_attr($header_info_phone_number); ?></span>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($topbar_email_label != '' || $topbar_email != '' || $topbar_email_title != '') : ?>
                                <div class="header-info-item info-phone">
                                    <?php if ($topbar_email_label != '') : ?>
                                        <span class="info-label"><?php echo wp_kses($topbar_email_label, themesflat_kses_allowed_html()); ?></span>
                                    <?php endif; ?>
                                    <div class="content">
                                    <?php if ($topbar_email_title != '') : ?>
                                    <div class="title"><?php echo esc_attr($topbar_email_title); ?></div> 
                                    <?php endif; ?>
                                    <?php if ($topbar_email != '') : ?>
                                        <span class="info-content"><?php echo esc_attr($topbar_email); ?></span>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($topbar_address_label != '' || $topbar_address != '' || $topbar_address_title != '') : ?>
                                <div class="header-info-item info-phone">
                                    <?php if ($topbar_address_label != '') : ?>
                                        <span class="info-label"><?php echo wp_kses($topbar_address_label, themesflat_kses_allowed_html()); ?></span>
                                    <?php endif; ?>
                                    <div class="content">
                                    <?php if ($topbar_address_title != '') : ?>
                                    <div class="title"><?php echo esc_attr($topbar_address_title); ?></div> 
                                    <?php endif; ?>
                                    <?php if ($topbar_address != '') : ?>
                                        <span class="info-content"><?php echo esc_attr($topbar_address); ?></span>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="btn-menu">
                                <span class="line-1"></span>
                            </div><!-- //mobile menu button -->
                        </div>
                    </div>                
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

    <div class="bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-wrap clearfix">
                        <div class="header-ct-left">
                            <div class="inner-left">
                                <?php get_template_part( 'tpl/header/navigator'); ?>
                            </div>
                        </div>
                    <?php if( $header_search_box == 1 || $header_sidebar_toggler == 1 || $header_infor_phone == 1): ?>
                        <div class="header-ct-right">
                        <?php if ( $header_search_box == 1 ) :?>
                                <div class="show-search">
                                    <a href="#"><i class="icon-healingy-search"></i></a> 
                                    <div class="submenu top-search widget_search">
                                        <?php get_search_form(); ?>
                                    </div>        
                                </div> 
                        <?php endif;?>
                        <?php if ( $header_sidebar_toggler == 1 ) :?>
                            <div class="header-modal-menu-left-btn">
                                <div class="modal-menu-left-btn">
                                <i class="icon-healingy-settings"></i>
                                </div>
                            </div><!-- /.header-modal-menu-left-btn -->
                        <?php endif;?>
                            </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="canvas-nav-wrap">
        <div class="overlay-canvas-nav"><div class="canvas-menu-close"><span></span></div></div>
        <div class="inner-canvas-nav">
            <?php get_template_part( 'tpl/header/brand-mobile'); ?>
            <nav id="mainnav_canvas" class="mainnav_canvas" role="navigation">
                <?php
                    wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false ) );
                ?>
            </nav><!-- #mainnav_canvas -->  
        </div>
    </div><!-- /.canvas-nav-wrap --> 
</header><!-- /.header --> 