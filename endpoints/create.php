<?php
/**
 * Create a new link
 */
function iewp_dashboard_links_endpoint_create( $request_data )
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

	if( !isset( $data['label'] ) || trim( $data['label'] ) == '' ):
		$data['error'] = 'Please enter a label for the link';
		return $data;
	endif;

	if( !isset( $data['url'] ) || trim( $data['url'] ) == '' ):
		$data['error'] = 'Please enter an URL';
		return $data;
	endif;

	if ( filter_var( $data['url'], FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED ) === false ):
	    $data['error'] = 'Please enter a valid URL';
		return $data;
	endif;

	if( !isset( $data['error'] ) ):
		unset( $data['apikey'] );

		global $wpdb;

		$sql = "SELECT * FROM `iewp_dashboard_links`
				WHERE `url` = '" . $data['url'] . "';";
		$result = $wpdb->get_results( $sql, ARRAY_A );

		if( $wpdb->num_rows == 0 ):
			$url = parse_url( $data['url'] );
			$png = file_get_contents( 'http://www.google.com/s2/favicons?domain=' . $url['host'] );
			$data['favicon'] = 'data:image/png;base64,' . base64_encode( $png );

			$wpdb->insert( 'iewp_dashboard_links', $data, array( '%s', '%s', '%s' ) );

			$data['error'] = false;
			return $data;
		else:
			$data['error'] = 'Link already exists';
			return $data;
		endif;

	endif;

}
