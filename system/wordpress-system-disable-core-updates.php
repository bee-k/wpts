<?php
	/*
		Plugin Name: [ ! ] System: Disable Core Updates
		Plugin URI: https://github.com/ex-mi/wpts
		Description: Functional plugin that turns off all WordPress Core updates.
		Author: ΞX.MI
		Version: 1.3
		Author URI: https://ex-mi.ru/
		License: GPL3
	*/
	
	function disable_core_updates() {
		global $wp_version; return(object) array( 'last_checked' => time(), 'version_checked' => $wp_version );
	}
	
	add_filter( 'auto_update_translation', '__return_false' );
	add_filter( 'automatic_updater_disabled', '__return_true' );
	add_filter( 'allow_minor_auto_core_updates', '__return_false' );
	add_filter( 'allow_major_auto_core_updates', '__return_false' );
	add_filter( 'allow_dev_auto_core_updates', '__return_false' );
	add_filter( 'auto_update_core', '__return_false' );
	add_filter( 'wp_auto_update_core', '__return_false' );
	add_filter( 'auto_core_update_send_email', '__return_false' );
	add_filter( 'send_core_update_notification_email', '__return_false' );
	add_filter( 'auto_update_plugin', '__return_false' );
	add_filter( 'auto_update_theme', '__return_false' );
	add_filter( 'automatic_updates_send_debug_email', '__return_false' );
	add_filter( 'automatic_updates_is_vcs_checkout', '__return_true' );
	
	remove_action( 'init', 'wp_schedule_update_checks' );
	remove_all_filters( 'plugins_api' );
	
	add_filter( 'automatic_updates_send_debug_email ', '__return_false', 1 );
	if( !defined( 'AUTOMATIC_UPDATER_DISABLED' ) ) define( 'AUTOMATIC_UPDATER_DISABLED', true );
	if( !defined( 'WP_AUTO_UPDATE_CORE') ) define( 'WP_AUTO_UPDATE_CORE', false );
?>