<?php
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
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

	$query = $wpdb->query( $sql );

}

iewp_dashboard_links_create_tables();
