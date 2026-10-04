<?php
/**
 * Plugin Name:          RRP (MSRP) for WooCommerce
 * Plugin URI:           https://bradley-davis.com/wordpress-plugins/woocommerce-rrp/
 * Description:          RRP (MSRP) for WooCommerce allows users to add text before the regular price and sale price of a product from the WooCommerce > Settings > General screen.
 * Version:              1.9.1
 * Requires at least:    6.5
 * Requires PHP:         7.4
 * Requires Plugins:     woocommerce
 * Author:               Bradley Davis
 * Author URI:           https://bradley-davis.com
 * License:              GPLv3 or later
 * License URI:          https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:          woocommerce-rrp
 * Domain Path:          /languages
 * WC requires at least: 6.0.0
 * WC tested up to:      11.1.2
 *
 * @author    Bradley Davis
 * @package   WooCommerce_RRP
 * @since     1.0
 *
 * RRP (MSRP) for WooCommerce is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * RRP (MSRP) for WooCommerce is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see https://www.gnu.org/licenses/gpl-3.0.html.
 */

if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly.
endif;

add_action( 'plugins_loaded', 'woo_rrp_require' );

/**
 * Declare compatibility with High Performance Order Storage (HPOS).
 *
 * @since 1.8.0
 */
add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) :
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		endif;
	}
);

/**
 * Add in the includes, public and admin parent files once WooCommerce is loaded.
 *
 * WooCommerce is declared as a dependency via the "Requires Plugins" header,
 * the class_exists() check is a safety net in case it is not loaded.
 *
 * @since 1.7.0
 * @return void
 */
function woo_rrp_require() {
	if ( ! class_exists( 'WooCommerce' ) ) :
		return;
	endif;

	/**
	 * The class responsible for bringing all the includes, admin and public
	 * functionality together.
	 */
	require_once __DIR__ . '/includes/class-woocommerce-rrp.php';
}
