<?php
/**
 * The includes are included for RRP (MSRP) for WooCommerce.
 *
 * @author     Bradley Davis
 * @package    WooCommerce_RRP
 * @subpackage WooCommerce_RRP/includes
 * @since      1.7.0
 */

if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly.
endif;

/**
 * Includes parent class that pulls everything together.
 *
 * @since 1.0
 */
class WooCommerce_RRP {

	/**
	 * The Constructor.
	 *
	 * @since 1.7.0
	 */
	public function __construct() {
		$this->woo_rrp_includes_require();
	}

	/**
	 * Include all the required include partials.
	 *
	 * @since 1.7.0
	 * @return void
	 */
	public function woo_rrp_includes_require() {
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once dirname( __DIR__ ) . '/admin/class-woocommerce-rrp-admin.php';
		/**
		 * The class responsible for defining all actions that occur on the public-facing side of the site.
		 */
		require_once dirname( __DIR__ ) . '/public/class-woocommerce-rrp-public.php';
	}
}

/**
 * Instantiate the class
 *
 * @since 1.7.0
 */
$woocommerce_rrp = new WooCommerce_RRP();
