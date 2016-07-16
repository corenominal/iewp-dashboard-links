<?php
/**
 * Create a new link
 */
function iewp_dashboard_links_endpoint_create( $request_data )
{
	$apikey = get_option( 'iewp_dashboard_links_apikey', '' );

	$data = $request_data->get_params();
	$data['error'] = false;

	if( !isset( $data['apikey'] ) )
	{
		$data['error'] = 'Please provide an API key';
		return $data;
	}

	if( $data['apikey'] != $apikey )
	{
		$data['error'] = 'Invalid API key';
		return $data;
	}

	global $wpdb;


    return $data;
}
