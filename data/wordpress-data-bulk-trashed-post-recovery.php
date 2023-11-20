<?php
	/*
		Plugin Name: [ ~ ] Data: Bulk Trashed Post Recovery
		Plugin URI: https://github.com/ex-mi/wpts
		Description: Functional plugin (with the self-deactivation function) that restores all posts from the trash. 
		Author: ΞX.MI
		Version: 1.1
		Author URI: https://ex-mi.ru/
		License: GPL3
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit( 'Nope :)' );
	
	add_action( 'admin_init', 'bulk_trashed_post_recovery' );
	
	function bulk_trashed_post_recovery() {
		$postsintrash = get_posts('post_status=trash&numberposts=-1&fields=ids');
		
		if ( $postsintrash ) {
			foreach ( $postsintrash as $post ) {
				wp_update_post( array(
					'ID'           => $post,
					'post_status'  => 'publish'
				) );
			}
		}
		
		deactivate_plugins( plugin_basename( __FILE__ ) );
	}
?>