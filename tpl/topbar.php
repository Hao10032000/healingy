<?php 

$header_sidebar_toggler = themesflat_get_opt('header_sidebar_toggler');
if (themesflat_get_opt_elementor('header_sidebar_toggler') != '') {
    $header_sidebar_toggler = themesflat_get_opt_elementor('header_sidebar_toggler');
}
$style_header = themesflat_get_opt('style_header');
if (themesflat_get_opt_elementor('style_header') != '') {
    $style_header = themesflat_get_opt_elementor('style_header');
}
$topbar = themesflat_get_opt('topbar_show');
if (themesflat_get_opt_elementor('topbar_show') != '') {
    $topbar = themesflat_get_opt_elementor('topbar_show');
}
$header_message = themesflat_get_opt('header_message');
if (themesflat_get_opt_elementor('header_message') != '') {
    $header_message = themesflat_get_opt_elementor('header_message');
}
$topbar_address2 = themesflat_get_opt('topbar_address2');
if (themesflat_get_opt_elementor('topbar_address2') != '') {
    $topbar_address2 = themesflat_get_opt_elementor('topbar_address2');
}
$topbar_address3 = themesflat_get_opt('topbar_address3');
if (themesflat_get_opt_elementor('topbar_address3') != '') {
    $topbar_address3 = themesflat_get_opt_elementor('topbar_address3');
}
$topbar_address4 = themesflat_get_opt('topbar_address4');
if (themesflat_get_opt_elementor('topbar_address4') != '') {
    $topbar_address4 = themesflat_get_opt_elementor('topbar_address4');
}

$social_topbar = themesflat_get_opt('social_topbar');
if (themesflat_get_opt_elementor('social_topbar') != '') {
    $social_topbar = themesflat_get_opt_elementor('social_topbar');
}
$style_topbar = themesflat_get_opt('style_topbar');
if (themesflat_get_opt_elementor('style_topbar') != '') {
    $style_topbar = themesflat_get_opt_elementor('style_topbar');
}
?>

<?php if ( $topbar == 1 ) :?>
<div class="themesflat-top style-01">
    <div class="container-full">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inside">
                    <div class="content-left">
                        <?php if( $topbar_address2 != '' ): ?>
                        <div class="infor-topbar">
                            <span class="list"><?php echo $topbar_address2; ?></span>
                            <span class="list"><?php echo $topbar_address3; ?></span>
                        </div>
                        <?php endif; ?>
                    </div><!-- content-left -->
                    <div class="content-right">
                    <span class="list">
                        <?php echo $topbar_address4; ?></span>
                        <?php  
                            if ( $social_topbar == 1 ):
                                themesflat_render_social();    
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div><!-- /.topbar -->
<?php endif; ?>