<?php
// Register action to declare required plugins
add_action('tgmpa_register', 'themesflat_recommend_plugin');
function themesflat_recommend_plugin() {
    
    $plugins = array(
        array(
            'name' => esc_html__('Elementor', 'healingy'),
            'slug' => 'elementor',
            'required' => true
        ),
        array(
            'name' => esc_html__('ThemesFlat Core', 'healingy'),
            'slug' => 'themesflat-core',
            'source' => THEMESFLAT_DIR . 'inc/plugins/themesflat-core.zip',
            'required' => true
        ),
        array(
            'name' => esc_html__('ThemesFlat Addons for Elementor', 'healingy'),
            'slug' => 'themesflat-addons-for-elementor',
            'required' => true
        ),
        array(
            'name' => esc_html__('Metform', 'healingy'),
            'slug' => 'metform',
            'required' => true
        ),
        array(
            'name' => esc_html__('Contact Form 7', 'healingy'),
            'slug' => 'contact-form-7',
            'required' => false
        ),    
        array(
            'name' => esc_html__('Mailchimp', 'healingy'),
            'slug' => 'mailchimp-for-wp',
            'required' => false
        ),        
        array(
            'name' => esc_html__('One Click Demo Import', 'healingy'),
            'slug' => 'one-click-demo-import',
            'required' => false
        )   
    );
    
    tgmpa($plugins);
}

