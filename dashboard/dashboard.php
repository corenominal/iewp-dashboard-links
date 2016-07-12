<?php
/**
 * Dashboard widget
 */
function iewp_dashboard_links_widget()
{
	wp_add_dashboard_widget(
		'iewp_dashboard_links_widget', // Widget slug.
		'Links', // Title.
		'iewp_dashboard_links_widget_function' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'iewp_dashboard_links_widget' );

/**
* Widget content
*/
function iewp_dashboard_links_widget_function()
{
    ?>
    <!-- Content goes here -->
    <?php
}
