<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sveltekitauth
 * @since      1.0.0
 *
 * @package    Sveltekitauth
 * @subpackage Sveltekitauth/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sveltekitauth
 * @subpackage Sveltekitauth/public
 * @author     sveltekitauth <sveltekitauth@luqmannordin.com>
 */
class Sveltekitauth_Public {

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
		 * defined in Sveltekitauth_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sveltekitauth_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sveltekitauth-public.css', array(), $this->version, 'all' );

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
		 * defined in Sveltekitauth_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sveltekitauth_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sveltekitauth-public.js', array( 'jquery' ), $this->version, false );

		global $wp, $wp_scripts;
		foreach( $wp_scripts->queue as $script ) :
			
			$include = array("admin-bar","woocommerce", "wc-checkout",
			"selectWoo", "wc-add-to-cart","wc-cart-fragments", "sveltekit") ;
			if (in_array($script, $include))
				continue;
		wp_dequeue_script( $script );
		endforeach;
		
		
		global $wp_styles;
		foreach( $wp_styles->queue as $style ) :
			$include = array("admin-bar","wp-block-library","global-styles","wp-webfonts","select2",
			"woocommerce-layout","woocommerce-smallscreen","woocommerce-general","woocommerce-inline") ;
			if (in_array($style, $include))
				continue;
		wp_dequeue_style( $style );
		endforeach;


	}

	public function mypwp_template_redirect($data){
		global $wp;
		if(is_front_page()){
			include_once dirname( __FILE__ ) . '/partials/front_page.php';
			exit();
		}else{
			include_once dirname( __FILE__ ) . '/partials/front_page.php';
			exit();
		}

	}
	

}
