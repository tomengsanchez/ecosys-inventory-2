<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/tomengsanchez
 * @since      1.0.0
 *
 * @package    Ecosys_Inventory
 * @subpackage Ecosys_Inventory/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ecosys_Inventory
 * @subpackage Ecosys_Inventory/admin
 * @author     Ecosys Tech Team <tomengskiee@gmail.com>
 */
class Ecosys_Inventory_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {


		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ecosys_Inventory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ecosys_Inventory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ecosys-inventory-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'eco-inv-bt', plugin_dir_url( __FILE__ ) . 'css/css/bootstrap.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ecosys_Inventory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ecosys_Inventory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 * Dashboard
		* New Asset
		* Inventory
		* Dispatch
		* Return
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ecosys-inventory-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'eco-inv-bt', plugin_dir_url( __FILE__ ) . 'js/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'eco-inv-bt-bun', plugin_dir_url( __FILE__ ) . 'js/js/bootstrap.bundle.min.js', array( 'jquery' ), $this->version, false );

	}
	public function add_menu_for_ecosys(){
		add_menu_page('Ecosys Inventory','Ecosys Inventory','manage_options','ecosys-inventory',array($this,'ecosys_dashboard'),'dashicons-location-alt',22);
		add_submenu_page( 'ecosys-inventory', 'Dashboard', 'Dashboard', 'manage_options', 'ecosys-inventory', array($this,'ecosys_dashboard') );
		add_submenu_page( 'ecosys-inventory', 'Asset', 'Asset', 'manage_options', 'ecosys-asset', array($this,'ecosys_asset') );
		add_submenu_page( 'ecosys-inventory', 'Invetory', 'Inventory', 'manage_options', 'ecosys-inventory-module', array($this,'ecosys_inventory') );
		add_submenu_page( 'ecosys-inventory', 'Dispatch', 'Dispatch', 'manage_options', 'ecosys-dispatch', array($this,'ecosys_dispatch') );
		add_submenu_page( 'ecosys-inventory', 'Return', 'Return', 'manage_options', 'ecosys-return', array($this,'ecosys_return') );
		add_submenu_page( 'ecosys-inventory', 'Settings', 'Settings', 'manage_options', 'ecosys-inv-settings', array($this,'ecosys_inventory_settings') );
	}
	public function ecosys_dashboard(){
		
		include_once( plugin_dir_path( __FILE__ ) . 'partials/dashboard/ecosys-dashboard.php');
	}
	public function ecosys_asset(){
		include_once( plugin_dir_path( __FILE__ ) . 'partials/asset/ecosys-asset.php');
	}
	public function ecosys_inventory(){
		include_once( plugin_dir_path( __FILE__ ) . 'partials/inventory/ecosys-inventory.php');
	}
	public function ecosys_dispatch(){
		include_once( plugin_dir_path( __FILE__ ) . 'partials/dispatch/ecosys-dispatch.php');
	}
	public function ecosys_return(){
		include_once( plugin_dir_path( __FILE__ ) . 'partials/return/ecosys-return.php');
	}
	public function ecosys_inventory_settings(){
		include_once( plugin_dir_path( __FILE__ ) . 'partials/settings/ecosys-settings.php');
	}

}
