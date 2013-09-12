<?php
/**
 * Redirect Front End
 *
 * Redirects all front end requests to the WP Dashboard
 *
 * @package   RFE_Redirect_Front_End
 * @author    Josh Eaton <josh@josheaton.org>
 * @license   GPL-2.0+
 * @link      http://www.josheaton.org/
 * @copyright 2013 Josh Eaton
 *
 * @wordpress-plugin
 * Plugin Name: Redirect Front End
 * Plugin URI:  http://www.josheaton.org/
 * Description: Redirects all front end requests to the WP Dashboard
 * Version:     0.1
 * Author:      Josh Eaton
 * Author URI:  http://www.josheaton.org/
 * Text Domain: redirect-front-end
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Redirect Front End class
 *
 * @package RFE_Redirect_Front_End
 * @author  Josh Eaton <josh@josheaton.org>
 */
class RFE_Redirect_Front_End {
	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   0.1
	 *
	 * @var     string
	 */
	protected $version = '0.1';

	/**
	 * Unique identifier
	 *
	 * @since    0.1
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'redirect-front-end';

	/**
	 * Instance of this class.
	 *
	 * @since    0.1
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen. (Not currently used.)
	 *
	 * @since    0.1
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     0.1
	 */
	private function __construct() {

		// Load plugin text domain (Nothing to translate yet!)
		// add_action( 'init',              array( $this, 'load_plugin_textdomain' )         );

		// Add redirect
		add_action( 'template_redirect', array( $this, 'redirect'               )         );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     0.1
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Redirects all front-end requests (with template_redirect) to a filterable URL
	 * defaults to admin_url().
	 *
	 * @uses filter [rfe_redirect_caps] - Control capabilities required to bypass redirect, lets Administrators access front-end by default (default: 'manage_options')
	 * @uses filter [rfe_redirect_url] - Change the redirect URL (default: admin_url())
	 *
	 * @return null
	 * @since 0.1
	 */
	public function redirect() {

		// Bail if we're in the admin or login page
		if ( is_admin() || $GLOBALS['pagenow'] == 'wp-login.php' )
			return;

		// Check capabilities (let admins do whatever they want by default)
		if ( current_user_can( apply_filters( 'rfe_redirect_caps', 'manage_options' ) ) )
			return;

		// Redirect to the admin
		wp_redirect( apply_filters( 'rfe_redirect_url', admin_url() ) );
		exit();
	}

} // end class RFE_Redirect_Front_End

// Load the plugin class instance
add_action( 'plugins_loaded', array( 'RFE_Redirect_Front_End', 'get_instance' ) );
