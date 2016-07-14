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
 * Enqueue additional JavaScript and CSS
 */
function iewp_dashboard_links_enqueue_scripts( $hook )
{

	if( 'index.php' != $hook )
	{
		return;
	}

    wp_register_style( 'iewp_dashboard_links_css', plugin_dir_url( __FILE__ ) . 'css/iewp_dashboard_links.css', array(), '0.0.1', 'all' );
	wp_enqueue_style( 'iewp_dashboard_links_css' );

	wp_register_script( 'iewp_dashboard_links_js', plugin_dir_url( __FILE__ ) . 'js/iewp_dashboard_links.js', array('jquery'), '0.0.1', true );
	wp_enqueue_script( 'iewp_dashboard_links_js' );

}
add_action( 'admin_enqueue_scripts', 'iewp_dashboard_links_enqueue_scripts' );

/**
* Widget content
*/
function iewp_dashboard_links_widget_function()
{
    ?>
    <!-- Content goes here -->
    <?php
}
