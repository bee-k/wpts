<?php
	/*
		Plugin Name: [ + ] Tweak: Class Names for Category Links
		Plugin URI: https://github.com/ex-mi/wpts
		Description: Functional plugin that adds unique class names for category links.
		Author: ΞX.MI
		Version: 1.2
		Author URI: https://ex-mi.ru/
		License: GPL3
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit( 'Nope :)' );
	
	function wpts_class_names_for_category_links( $thelist ) {
		$categories = get_the_category();
		$output = "";
		if ( !$categories || is_wp_error( $categories ) ) {
			return $thelist;
		}
		
		foreach ( $categories as $category ) {
			$output .= '<a class="category-' . $category->slug . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . $category->name . '</a>';
		}
		
		return $output;
	}
	
	! is_admin() and add_filter( 'the_category', 'wpts_class_names_for_category_links' );
?>