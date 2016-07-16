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
		$data['error'] = 'Please provide an API key';

	if( $data['apikey'] != $apikey )
		$data['error'] = 'Invalid API key';

	if( !isset( $data['label'] ) || trim( $data['label'] ) == '' )
		$data['error'] = 'Please enter a label for the link';

	if( !isset( $data['url'] ) || trim( $data['url'] ) == '' )
		$data['error'] = 'Please enter an URL';

	if ( filter_var( $data['url'], FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED ) === false )
	    $data['error'] = 'Please enter a valid URL';

	$url = parse_url( $data['url'] );
	$png = file_get_contents( 'http://www.google.com/s2/favicons?domain=' . $url['host'] );
	$data['favicon'] = 'data:image/png;base64,' . base64_encode( $png );

	if( !$data['error'] ):
		global $wpdb;

	endif;


    return $data;
}
