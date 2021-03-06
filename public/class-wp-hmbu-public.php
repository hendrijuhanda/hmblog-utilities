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
class Wp_Hmbu_Public {

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

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Hmbu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Hmbu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-hmbu-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Hmbu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Hmbu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-hmbu-public.js', array( 'jquery' ), $this->version, false );

	}

	public function check_theme_render () {
		$is_rest = false;

		if (!empty($_SERVER['REQUEST_URI'])) {
			$sRestUrlBase = get_rest_url(get_current_blog_id(), '/');
			$sRestPath = trim( parse_url($sRestUrlBase, PHP_URL_PATH ), '/');
			$sRequestPath = trim($_SERVER[ 'REQUEST_URI' ], '/');
			$is_rest = (strpos($sRequestPath, $sRestPath) === 0);
		}

		$is_login = $GLOBALS['pagenow'] === 'wp-login.php';

		if (!is_admin() && !$is_rest && !$is_login) {
			$disabled = get_option('disable_render');

			if ($disabled) {
				header('HTTP/1.0 403 Forbidden');
				die('Access is denied.');
			}
		}
	}
}
