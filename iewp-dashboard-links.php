<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Plugin Name: IEWP Dashboard Links
 * Plugin URI: https://github.com/corenominal/iewp-dashboard-links
 * Description: A simple WordPress plugin to provide links within the dashboard.
 * Author: Philip Newborough
 * Version: 0.0.1
 * Author URI: https://corenominal.org
 */

 /**
  * Plugin activation functions
  */
 function iewp_dashboard_links_activate()
 {
 	require_once( plugin_dir_path( __FILE__ ) . 'activation/db.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'activation/create-api-key.php' );
 }
 register_activation_hook( __FILE__, 'iewp_dashboard_links_activate' );

/**
 * The dashboard widget
 */
require_once( plugin_dir_path( __FILE__ ) . 'dashboard/dashboard.php' );

/**
 * Register the endpoints
 */
require_once( plugin_dir_path( __FILE__ ) . 'endpoints/endpoints.php' );
