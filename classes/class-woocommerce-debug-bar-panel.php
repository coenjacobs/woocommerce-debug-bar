<?php

class WooCommerce_Debug_Bar_Panel extends Debug_Bar_Panel {
	function init() {
		$this->title( 'WooCommerce' );
	}

	function render() {
		global $woocommerce;

		echo '<div id="debug-bar-woocommerce">';
		echo '<div class="debug-bar-woocommerce-box" id="debug-bar-woocommerce-cart">';

		echo '<h3>Cart contents</h3>';
		echo '<p><strong>Number of products:</strong> ' . count( $woocommerce->cart->cart_contents ) . '<br />';
		echo '<strong>Total quantity:</strong> ' . $woocommerce->cart->cart_contents_count . '</p>';

		echo '</div>';

		echo '</div>';
	}
}

?>