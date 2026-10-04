<?php
/**
 * Renders the rrp output on a single product.
 *
 * @author     Bradley Davis
 * @package    WooCommerce_RRP
 * @subpackage WooCommerce_RRP/public/partials
 * @since      1.7.0
 */

if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly.
endif;

/**
 * Adds the RRP and sale price text to prices on single product pages.
 *
 * @since 1.7.0
 */
class WooCommerce_RRP_Render_Single_Product {
	/**
	 * The Constructor.
	 *
	 * @since 1.7.0
	 */
	public function __construct() {
		$this->woo_rrp_public_single_activate();
	}

	/**
	 * Add all filter type actions.
	 *
	 * @since 1.7.0
	 * @return void
	 */
	public function woo_rrp_public_single_activate() {
		if ( ! is_admin() ) :
			add_filter( 'woocommerce_get_price_html', array( $this, 'woo_rrp_price_html_single' ), 999, 2 );
		endif;
	}

	/**
	 * Output the field values to the product price on the front end.
	 *
	 * @since 1.0
	 * @param string          $price   Allows access to the product price html.
	 * @param WC_Product|null $product Allows access to product object.
	 * @return string $price Updated price html string.
	 */
	public function woo_rrp_price_html_single( $price, $product ) {
		$price = (string) $price;

		if ( '' === $price || ! $product || ! is_product() ) :
			return $price;
		endif;

		if ( $product->is_on_sale() ) :
			return $this->woo_rrp_product_on_sale_string( $price );
		endif;

		return $this->woo_rrp_product_not_on_string( $price );
	}

	/**
	 * Gets the user input from field "Product Price Text" under WooCommerce Settings.
	 *
	 * @since 1.7.6
	 * @return string $woo_rrp_before_price for displaying before the price.
	 */
	private function woo_rrp_before_price_getter() {
		$woo_rrp_before_price = apply_filters( 'woo_rrp_before_price', get_option( 'woo_rrp_before_price', '' ) ) . ' ';

		return $woo_rrp_before_price;
	}

	/**
	 * Gets the user input from field "Sale Price Text" under WooCommerce Settings.
	 *
	 * @since 1.7.6
	 * @return string $woo_rrp_before_sale_price for displaying before the sale price.
	 */
	private function woo_rrp_before_sale_price_getter() {
		$woo_rrp_before_sale_price = apply_filters( 'woo_rrp_before_sale_price', get_option( 'woo_rrp_before_sale_price', '' ) ) . ' ';

		return $woo_rrp_before_sale_price;
	}

	/**
	 * Returns the $price with modified html for products when on sale.
	 *
	 * @since 1.7.6
	 * @param string $price product price html.
	 * @return string Updated price html string.
	 */
	private function woo_rrp_product_on_sale_string( $price ) {

		$woo_rrp_replace = array(
			'<del aria-hidden="true">' => '<del aria-hidden="true"><span class="rrp-price">' . esc_html( $this->woo_rrp_before_price_getter() ) . '</span>',
			'<ins aria-hidden="true">' => '<br /><ins aria-hidden="true"><span class="rrp-sale">' . esc_html( $this->woo_rrp_before_sale_price_getter() ) . '</span>',
		);

		$price = str_replace( array_keys( $woo_rrp_replace ), array_values( $woo_rrp_replace ), $price );

		return $price;
	}

	/**
	 * Returns the $price with modified html for products when not on sale.
	 *
	 * @since 1.7.6
	 * @param string $price product price html.
	 * @return string Updated price html string.
	 */
	private function woo_rrp_product_not_on_string( $price ) {

		$price = '<span class="rrp-price">' . esc_html( $this->woo_rrp_before_price_getter() ) . '</span>' . $price;

		return $price;
	}
}

/**
 * Instantiate the class
 *
 * @since 1.7.0
 */
$woocommerce_rrp_render_single_product = new WooCommerce_RRP_Render_Single_Product();
