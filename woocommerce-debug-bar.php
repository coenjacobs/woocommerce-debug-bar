<?php

/*
Plugin Name: WooCommerce Debug Bar
Description: Adds a WooCommerce debug panel to the Debug Bar plugin. Requires the Debug Bar plugin to function.
Author: Coen Jacobs
Author URI: http://coenjacobs.me
Version: 0.1
*/

add_filter( 'debug_bar_panels', 'woocommerce_debug_bar_panel' );

function woocommerce_debug_bar_panel( $panels ) {
	require_once 'classes/class-woocommerce-debug-bar-panel.php';
	$panels[] = new WooCommerce_Debug_Bar_Panel();
	return $panels;
}

add_action( 'debug_bar_enqueue_scripts', 'woocommerce_debug_bar_scripts' );

function woocommerce_debug_bar_scripts() {
	wp_enqueue_style( 'woocommerce-debug-bar', plugins_url( 'assets/woocommerce-debug-bar.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_script( 'woocommerce-debug-bar', plugins_url( 'assets/woocommerce-debug-bar.js', __FILE__ ), array( 'jquery' ), '1.0', true );
}

?>