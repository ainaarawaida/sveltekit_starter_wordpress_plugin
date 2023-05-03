<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sveltekitauth
 * @since      1.0.0
 *
 * @package    Sveltekitauth
 * @subpackage Sveltekitauth/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sveltekitauth
 * @subpackage Sveltekitauth/includes
 * @author     sveltekitauth <sveltekitauth@luqmannordin.com>
 */
class Sveltekitauth_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sveltekitauth',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
