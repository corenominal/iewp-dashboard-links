<?php
/**
 * Return list of dashboard links
 */
function iewp_dashboard_links_endpoint_list( $request_data )
{
	$apikey = get_option( 'iewp_dashboard_links_apikey', '' );

	$data = $request_data->get_params();

	if( !isset( $data['apikey'] ) ):
		$data['error'] = 'Please provide an API key';
		return $data;
	endif;

	if( $data['apikey'] != $apikey ):
		$data['error'] = 'Invalid API key';
		return $data;
	endif;

	global $wpdb;
	$sql = "SELECT * FROM `iewp_dashboard_links` ORDER BY `label` ASC";
	$data['links'] = $wpdb->get_results( $sql, ARRAY_A );
	$data['num_rows'] = $wpdb->num_rows;

	return $data;
}
