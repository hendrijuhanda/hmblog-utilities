<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://juhanda.net
 * @since      1.0.0
 *
 * @package    Wp_Hmbu
 * @subpackage Wp_Hmbu/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Hmbu
 * @subpackage Wp_Hmbu/public
 * @author     Hendri Juhanda <hendri.juhanda@indosystem.com>
 */
class Wp_Hmbu_Rest {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function check_authority ($server) {
		$api_key = $server->get_headers($_SERVER)['X_API_KEY'];

		$key = get_option('apikey');

		if (!$api_key || $api_key !== $key) {
			header('HTTP/1.0 403 Forbidden');
			die('Access is denied.');
		}

		return $result;
	}
}
