<?php
/**
 * Delete link
 */
function iewp_dashboard_links_endpoint_delete( $request_data )
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

	if( !isset( $data['id'] ) || trim( $data['id'] ) == '' ):
		$data['error'] = 'No ID provided';
		return $data;
	endif;

	if( !isset( $data['error'] ) ):
		unset( $data['apikey'] );
		global $wpdb;
		$wpdb->delete( 'iewp_dashboard_links', array( 'id' => $data['id'] ), array( '%d' ) );
		return $data;
	endif;

}
