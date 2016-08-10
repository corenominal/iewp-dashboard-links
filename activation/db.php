<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Set-up database tables.
 */
function iewp_dashboard_links_create_tables()
{
	global $wpdb;

	$sql = "CREATE TABLE IF NOT EXISTS `iewp_dashboard_links` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `label` varchar(255) NOT NULL DEFAULT '',
			  `url` varchar(255) NOT NULL DEFAULT '',
			  `favicon` text NOT NULL DEFAULT '',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$query = $wpdb->query( $sql );

	$sql = "SELECT * FROM `iewp_dashboard_links`
			WHERE `url` = 'https://corenominal.org';";
	$result = $wpdb->get_results( $sql, ARRAY_A );

	if( $wpdb->num_rows == 0 )
	{
		$data['label'] = 'corenominal';
		$data['url'] = 'https://corenominal.org';
		$png = file_get_contents( 'http://www.google.com/s2/favicons?domain=https://corenominal.org' );
		$data['favicon'] = 'data:image/png;base64,' . base64_encode( $png );
		$wpdb->insert( 'iewp_dashboard_links', $data, array( '%s', '%s', '%s' ) );
	}

}

iewp_dashboard_links_create_tables();
