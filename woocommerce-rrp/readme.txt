=== RRP (MSRP) for WooCommerce ===
Contributors: brad-davis
Tags: woocommerce, rrp, msrp, price, sale price
Requires at least: 6.5
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 1.9.1
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Add custom text, such as "RRP:" or "Sale Price:", before the regular price and sale price of your WooCommerce products.

== Description ==

RRP (MSRP) for WooCommerce allows users to add text before the regular price and sale price of a product from the WooCommerce > Settings > General screen. You can also select to have this text displayed on archive templates by simply ticking a checkbox.

If you would like to change the display text for a certain product, you can use the [WordPress add_filter() function](https://developer.wordpress.org/reference/functions/add_filter/ "add_filter() function reference"), please see the FAQ for an example.

If you have suggestions for new features, please add your idea in the "Support" area for this plugin.

If RRP (MSRP) for WooCommerce has made your life a little easier, please leave a positive review in the "Reviews" area for this plugin.

= Requires WooCommerce to be installed and active. =

== Installation ==

1. Upload the RRP (MSRP) for WooCommerce plugin folder to the `/wp-content/plugins/` directory, or install it from the Plugins > Add New screen in WordPress.
2. Make sure WooCommerce is installed and active, then activate the plugin through the 'Plugins' menu in WordPress.
3. Go to WooCommerce > Settings > General and add your text to the input areas below "Currency Options". See Screenshots for a visual explanation.

== Frequently Asked Questions ==

= What if I want to change the "Product Price Text" for a certain product? =

This can be done using the built in [WordPress add_filter() function](https://developer.wordpress.org/reference/functions/add_filter/ "add_filter() function reference"). For example, if we had a product with an ID of 96 and we wanted to change the text of the "Product Price Text" field to "Your new Product Price Text", the function would look like this:

`
function myprefix_change_before_regular_price( $woo_rrp_before_price ) {
	global $post;

	if ( $post instanceof WP_Post && 96 === $post->ID ) :
		return 'Your new Product Price Text';
	endif;

	return $woo_rrp_before_price;
}
add_filter( 'woo_rrp_before_price', 'myprefix_change_before_regular_price' );
`

= What if I want to change the "Sale Price Text" for a certain product? =

This can be done using the built in [WordPress add_filter() function](https://developer.wordpress.org/reference/functions/add_filter/ "add_filter() function reference"). For example, if we had a product with an ID of 96 and we wanted to change the text of the "Sale Price Text" field to "Your new Sale Price Text", the function would look like this:

`
function myprefix_change_before_sale_price( $woo_rrp_before_sale_price ) {
	global $post;

	if ( $post instanceof WP_Post && 96 === $post->ID ) :
		return 'Your new Sale Price Text';
	endif;

	return $woo_rrp_before_sale_price;
}
add_filter( 'woo_rrp_before_sale_price', 'myprefix_change_before_sale_price' );
`

Replace `myprefix` with a prefix unique to your theme or plugin.

= Can you provide a list of filters that are available and a description of what they control? =

Sure, there are two filters available for you to use:

* woo_rrp_before_price - Controls the text that is displayed before the regular price of a product.
* woo_rrp_before_sale_price - Controls the text that is displayed before the sale price of a product.

= Enabling the "Show Text On Archives" messes up the archive display, can you please fix this? =

You will need to tidy this up using a little CSS styling. The text is wrapped in `span.rrp-price` and `span.rrp-sale` elements so it can be targeted easily.

= There aren't any translations of this plugin in my language, can I provide one? =

Yes please! Translations are managed on [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/woocommerce-rrp/). Anyone can contribute a translation there and it will be delivered to sites automatically once approved.

== Screenshots ==

1. Entering text into the "Product Price Text" will display before the regular price for the product.
2. Here you can see the arrow pointing to the text displayed that you entered in the "Product Price Text" field.
3. Entering text into the "Sale Price Text" will display before the sale price for the product.
4. Here you can see the arrow pointing to the text displayed that you entered in the "Sale Price Text" field.
5. Selecting the "Show Text On Archives" will display the text entered in the "Product Price Text" and "Sale Price Text" fields on archive templates.
6. Here you can see the arrows pointing to the text entered in "Product Price Text" and "Sale Price Text" on an archive.

== Changelog ==

= 1.9.1 =
* Added "Requires Plugins: woocommerce" header, plus "Requires at least" and "Requires PHP" headers
* Load the plugin on plugins_loaded and check WooCommerce is available with class_exists()
* Removed manual text domain loading, translations are loaded automatically by WordPress
* Escape the price text with esc_html() instead of esc_attr()
* Fixed invalid HTML (stray opening ins tag) in the sale price output
* Price filters now always return a string
* Removed WordPress.org directory screenshots from the plugin package
* Readme updates: plugin name, tags, links, FAQ examples and typos

= 1.9.0 =
* This plugin is now known as RRP (MSRP) for WooCommerce, it's a trademark thing.

= 1.8.0 =
* Added compatible with High Performance Order Storage (HPOS)
* Tested on WordPress 6.5.3
* Tested on WooCommerce 8.9.0

= 1.7.6 =
* Tested on WordPress 5.9
* Tested on WooCommerce 6.2.0
* Fixed display bug for "Product Price Text" when item is on sale
* Fixed display for "Product Price Text" when product does not have a price
* Changed filter priority to fire later
* Refactoring functions in render category and single product classes

= 1.7.5 =
* Updated single product to not output product price text field when price is empty
* Updated category view to not output product price text field when price is empty

= 1.7.4 =
* Tested on WordPress 5.5.1
* Tested on WooCommerce 4.6.1

= 1.7.3 =
* Tested on WordPress 5.2.2
* Tested on WooCommerce 3.7.0

= 1.7.2 =
* Tested on WordPress 5.1
* Tested on WooCommerce 3.5.5

= 1.7.1 =
* Tested on WooCommerce 3.5.3

= 1.7.0 =
* WPCS refactor
* Tested on WordPress 5.0.0
* Tested on WooCommerce 3.5.2

= 1.6 =
* Added translation functions on user input strings
* Added languages folder with po, mo and pot file in en_AU
* Tested on WordPress v4.9.8
* Tested on WooCommerce v3.4.4

= 1.5 =
* Tested on WordPress v4.9.6
* Tested on WooCommerce v3.4.1

= 1.4 =
* Tested on WordPress 4.9
* Tested on WooCommerce 3.2.4
* Added span with class="rrp-price" around before price string
* Added span with class="rrp-sale" around before sale price string

= 1.3 =
* Tested on WordPress 4.8.2
* Tested on WooCommerce 3.2.1
* Add WooCommerce header version check

= 1.2 =
* Tested on WordPress 4.8
* Tested on WooCommerce 3.0.8
* Removed &nbsp; and replaced with whitespace for readers

= 1.1 =
* Added conditional check to price so text only shows if price is not empty

= 1.0 =
* Original commit and released to the world

== Upgrade Notice ==

= 1.9.1 =
* Compatibility and standards update: declares WooCommerce as a required plugin, fixes invalid sale price HTML and improves output escaping.

= 1.0 =
* You should use RRP (MSRP) for WooCommerce 1.0 for the convenience of having the ability to add text before the regular and sale price from the WooCommerce settings screen.
