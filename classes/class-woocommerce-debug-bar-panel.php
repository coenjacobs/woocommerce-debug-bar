<?php

class WooCommerce_Debug_Bar_Panel extends Debug_Bar_Panel {
	function init() {
		$this->title( 'WooCommerce' );
	}

	function render() {
		global $woocommerce;

		echo '<div id="wc-debug-bar">';
		echo '<div class="wc-debug-bar-box" id="wc-debug-bar-cart">';

		echo '<h3>' . __( 'Cart contents', 'wc-debug-bar' ) . '</h3>';

		if ( isset( $woocommerce->cart ) ) {
			echo '<p><strong>' . __( 'Number of products:', 'wc-debug-bar' ) . '</strong> ' . count( $woocommerce->cart->cart_contents ) . '<br />';
			echo '<strong>' . __( 'Total quantity:', 'wc-debug-bar' ) . '</strong> ' . $woocommerce->cart->cart_contents_count . '</p>';

			if ( ! empty( $woocommerce->cart->cart_contents ) ) {
				echo '<p><a href="#" id="wc-debug-bar-hide-products">' . __( 'Hide cart products &uarr;', 'wc-debug-bar' ) .'</a>';
				echo '<a href="#" id="wc-debug-bar-show-products">' . __( 'Show cart products &darr;', 'wc-debug-bar' ) . '</a></p>';

				echo '<div id="wc-debug-bar-products">';

				echo '<h4>' . __( 'Products in cart', 'wc-debug-bar' ) . '</h4>';
				
				echo '<table class="wc-debug-bar-table" id="wc-debug-bar-products-table">';

				echo '<tr>';
					echo '<th>cart_contents_key</th>';
					echo '<th>product_id</th>';
					echo '<th>product title</th>';
					echo '<th>quantity</th>';
					echo '<th>variation_id</th>';
					echo '<th>variation</th>';
				echo '</tr>';

				foreach ( $woocommerce->cart->cart_contents as $key => $value ) {
					$product = get_post( $value['product_id'] );

					echo '<tr>';
						echo '<td>' . $key . '</td>';
						echo '<td>' . $value['product_id'] . '</td>';
						echo '<td>' . $product->post_title . '</td>';
						echo '<td>' . $value['quantity'] . '</td>';
						echo '<td>' . $value['variation_id'] . '</td>';
						echo '<td>' . $value['variation'] . '</td>';
					echo '</tr>';
				}

				echo '</table>';

				echo '</div>';
			}

			echo '<p><strong>' . __( 'Applied coupons:', 'wc-debug-bar' ) . '</strong> ' . count( $woocommerce->cart->applied_coupons ) . '</p>';

			if ( ! empty( $woocommerce->cart->applied_coupons ) ) {
				echo '<p><a href="#" id="wc-debug-bar-hide-coupons">' . __( 'Hide applied coupons &uarr;', 'wc-debug-bar' ) .'</a>';
				echo '<a href="#" id="wc-debug-bar-show-coupons">' . __( 'Show applied coupons &darr;', 'wc-debug-bar' ) . '</a></p>';

				echo '<div id="wc-debug-bar-coupons">';

				echo '<h4>' . __( 'Coupons applied to cart', 'wc-debug-bar' ) . '</h4>';
				
				echo '<table class="wc-debug-bar-table" id="wc-debug-bar-coupons-table">';

				echo '<tr>';
					echo '<th>coupon_code</th>';
				echo '</tr>';

				foreach ( $woocommerce->cart->applied_coupons as $key => $value ) {
					echo '<tr>';
						echo '<td>' . $value . '</td>';
					echo '</tr>';
				}
			}
		} else {
			echo '<p>' . __( 'Cart contents not available.', 'wc-debug-bar' ) .'</p>';
		}

		echo '</div>';

		echo '</div>';
	}
}

?>