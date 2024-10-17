<?php 
// Get Settings options of elementor
function themesflat_get_opt_elementor( $settings ) {
	if ( did_action( 'elementor/loaded' ) ) {
		$post_id = get_the_ID();
		$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );
		$page_settings   = $page_settings_manager->get_model( $post_id )->get_data('settings');
		return isset($page_settings[$settings]) ? $page_settings[$settings] : false;
	}
}