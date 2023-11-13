<?php
	/*
		Plugin Name: [ ! ] Dashboard: Disable Right-click
		Plugin URI: https://github.com/ex-mi/
		Description: Functional plugin for disabling the context menu on right-click inside the WordPress dashboard.
		Author: ΞX.MI
		Version: 1.0
		Author URI: https://ex-mi.ru/
		License: GPL3
	*/
	
	add_action( 'admin_head', 'admin_disable_right_click' );
	
	function admin_disable_right_click() {
		echo '<script>document.addEventListener("contextmenu", event => event.preventDefault());</script>';
	}
?>