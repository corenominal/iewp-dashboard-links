<?php
/**
 * Register endpoints
 */
function iewp_dashboard_links_register_endpoints()
{
	// Endpoint:/wp-json/iewp_dashboard_links/create
	register_rest_route( 'iewp_dashboard_links', '/create', array(
        'methods' => 'POST',
        'callback' => 'iewp_dashboard_links_endpoint_create',
        'show_in_index' => false,
    ));
}
add_action( 'rest_api_init', 'iewp_dashboard_links_register_endpoints' );

// Endpoint:/wp-json/iewp_dashboard_links/create
require_once( plugin_dir_path( __FILE__ ) . 'create.php' );
