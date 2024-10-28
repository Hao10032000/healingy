<?php 
$header_search_box = themesflat_get_opt('header_search_box');
if (themesflat_get_opt_elementor('header_search_box') != '') {
    $header_search_box = themesflat_get_opt_elementor('header_search_box');
}

$header_sidebar_toggler = themesflat_get_opt('header_sidebar_toggler');
if (themesflat_get_opt_elementor('header_sidebar_toggler') != '') {
    $header_sidebar_toggler = themesflat_get_opt_elementor('header_sidebar_toggler');
}

$header_button = themesflat_get_opt('header_button');
if (themesflat_get_opt_elementor('header_button') != '') {
    $header_button = themesflat_get_opt_elementor('header_button');
}
$header_button_text = themesflat_get_opt('header_button_text');
$header_button_url = themesflat_get_opt('header_button_url');

?>
<?php get_template_part( 'tpl/topbar'); ?>
<header id="header" class="header header-01 <?php echo themesflat_get_opt_elementor('extra_classes_header'); ?>">
    <div class="inner-header">
        <div class="container-full">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-wrap clearfix">
                        <div class="header-ct-left">
                            <?php get_template_part( 'tpl/header/brand'); ?>
                        </div>
                        <div class="header-ct-center">
                            <div class="inner-center">
                                <?php get_template_part( 'tpl/header/navigator'); ?>
                            </div>
                        </div>
                        <?php if(  $header_button == 1 || $header_search_box == 1 || $header_sidebar_toggler == 1): ?>
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
                            <?php if ( $header_button == 1 ) :?>
                            <a href="<?php echo get_permalink ( get_theme_mod ( 'header_button_url' )); ?>" class="tf-btn <?php if(!is_user_logged_in()) echo 'display-pop-login'; ?>"><span><?php echo wp_kses($header_button_text, themesflat_kses_allowed_html()); ?></span></a>
                            <?php endif;?> 

                        </div>
                        <?php endif; ?>
                        <div class="btn-menu">
                            <span class="line-1"></span>
                        </div><!-- //mobile menu button -->
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

    <div class="canvas-nav-wrap">
        <div class="overlay-canvas-nav">
            <div class="canvas-menu-close"><span></span></div>
        </div>
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