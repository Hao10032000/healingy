<?php
$show_footer_info = themesflat_get_opt('show_footer_info');
if (themesflat_get_opt_elementor('show_footer_info') != '') {
    $show_footer_info = themesflat_get_opt_elementor('show_footer_info');
}

if ($show_footer_info == 1) :         
?>  
    <div class="info-footer"> 
        <div class="container">
            <div class="wrap-info">
                <div class="info-text">
                    <div class="wrap-info-text">
                        <h2 class="text"><?php echo themesflat_get_opt('footer_info_text'); ?></h2>
                    </div>
                </div>
                <div class="info-button">
                    <div class="wrap-btn-infor-footer">
                        <a class="btn-infor-footer themesflat-button" href="<?php echo esc_url(themesflat_get_opt('footer_info_button_url')) ?>"><?php echo themesflat_get_opt('footer_info_button'); ?></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>