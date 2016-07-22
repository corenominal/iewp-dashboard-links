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

	// Endpoint:/wp-json/iewp_dashboard_links/delete
	register_rest_route( 'iewp_dashboard_links', '/delete', array(
        'methods' => 'POST',
        'callback' => 'iewp_dashboard_links_endpoint_delete',
        'show_in_index' => false,
    ));

	// Endpoint:/wp-json/iewp_dashboard_links/list
	register_rest_route( 'iewp_dashboard_links', '/list', array(
        'methods' => 'GET',
        'callback' => 'iewp_dashboard_links_endpoint_list',
        'show_in_index' => false,
    ));
}
add_action( 'rest_api_init', 'iewp_dashboard_links_register_endpoints' );

// Endpoint:/wp-json/iewp_dashboard_links/create
require_once( plugin_dir_path( __FILE__ ) . 'create.php' );

// Endpoint:/wp-json/iewp_dashboard_links/create
require_once( plugin_dir_path( __FILE__ ) . 'delete.php' );

// Endpoint:/wp-json/iewp_dashboard_links/list
require_once( plugin_dir_path( __FILE__ ) . 'list.php' );
