<?php

/*
Plugin Name: WooCommerce Debug Bar
Author: Coen Jacobs
Author URI: http://coenjacobs.me
*/

add_filter( 'debug_bar_panels', 'woocommerce_debug_bar_panel' );

function woocommerce_debug_bar_panel( $panels ) {
	require_once 'classes/class-woocommerce-debug-bar-panel.php';
	$panels[] = new WooCommerce_Debug_Bar_Panel();
	return $panels;
}

add_action( 'debug_bar_enqueue_scripts', 'woocommerce_debug_bar_scripts' );

function woocommerce_debug_bar_scripts() {
	wp_enqueue_style( 'woocommerce-debug-bar', plugins_url( 'assets/woocommerce-debug-bar.css', __FILE__ ) );
}

?>