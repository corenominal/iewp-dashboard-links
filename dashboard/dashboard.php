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
	<div id="iewp-dashboard-links" class="iewp-dashboard-links" data-endpoint="<?php echo site_url('wp-json/iewp_dashboard_links/list') ?>" data-apikey="<?php echo get_option( 'iewp_dashboard_links_apikey', '' ); ?>">
		<div class="addlink">
			<button class="button">Add Link</button>
		</div>
		<div class="linkform">
			<input type="text" id="iewp_link_label" autocomplete="off" placeholder="Link label">
			<input type="text" id="iewp_link_url" autocomplete="off" placeholder="https://www...">
			<button id="iewp_link_save" class="button button-primary" data-endpoint="<?php echo site_url('wp-json/iewp_dashboard_links/create') ?>">Save Link</button>
			<button id="iewp_link_cancel" class="button">Cancel</button>
			<div id="iewp-linkform-notify" class="iewp-linkform-notify"></div>
		</div>
		<div class="links">

		</div>
	</div>
    <?php
}
