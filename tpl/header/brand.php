<?php
$logo_site = themesflat_get_opt('site_logo');
if (!empty(themesflat_get_opt_elementor('site_logo'))) {
    if (themesflat_get_opt_elementor('site_logo')['url'] != '') {
        $logo_site = themesflat_get_opt_elementor('site_logo')['url'];
    }else {
        $logo_site = themesflat_get_opt('site_logo');
    }    
}

$site_logo_sticky = themesflat_get_opt('site_logo_sticky');
if (!empty(themesflat_get_opt_elementor('site_logo_sticky'))) {
    if (themesflat_get_opt_elementor('site_logo_sticky')['url'] != '') {
        $site_logo_sticky = themesflat_get_opt_elementor('site_logo_sticky')['url'];
    }else {
        $site_logo_sticky = themesflat_get_opt('site_logo_sticky');
    }    
}

if ( $logo_site ) : ?>
    <div id="logo" class="logo" >                  
        <a href="<?php echo esc_url( home_url('/') ); ?>"  title="<?php bloginfo('name'); ?>">
            <?php if  (!empty($logo_site)) { ?>
                <img class="site-logo"  src="<?php echo esc_url($logo_site); ?>" alt="<?php bloginfo('name'); ?>"/>
                <img class="site-logo-fixed"  src="<?php echo esc_url($site_logo_sticky); ?>" alt="logo-fixed"/>
            <?php } ?>
        </a>
    </div>       
<?php endif; ?>