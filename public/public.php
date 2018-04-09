<?php
/**
 * DBRL_Hours
 *
 * @package   DBRL_Hours
 * @author    dbrl staff
 * @license   GPL-2.0+
 * @link      https://dbrl.org
 * @copyright 2018 DBRL
 */

namespace DBRL_Hours\Public_Facing;

// Load public-facing style sheet and JavaScript.
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_styles_scripts' );

// Add the skeletonized hours version of the template.
add_shortcode( 'dbrl-branch-hours', __NAMESPACE__ . '\\render_dbrl_branch_hours' );

// Handle the AJAX response (logged-in users).
add_action( 'wp_ajax_get_dbrl_hours', __NAMESPACE__ . '\\ajax_get_hours' );
// Handle the AJAX response (non-logged-in users).
add_action( 'wp_ajax_nopriv_get_dbrl_hours', __NAMESPACE__ . '\\ajax_get_hours' );


/**
 * Add the necessary scripts.
 *
 * @since    1.0.0
 */
function enqueue_styles_scripts() {
	// Register the script, but only enqueue it when the shortcode is used.
	wp_register_script( 'dbrl-hours-fetcher', plugins_url( 'js/dbrl-hours-fetcher.js', __FILE__ ) , array( 'jquery' ), \DBRL_Hours\get_plugin_version(), true );
}


/**
 * Handle the AJAX response.
 *
 * @since    1.0.0
 */
function ajax_get_hours() {
	// @TODO: Maybe get some stuff out of post.
	$args = isset( $_POST['some_arg'] ) ? $_POST['some_arg'] : '';

	// @TODO: Hours-fetching logic goes here.
	// Here's some dummy info.

	$hours = array(
		array(
			'branch' => 'sbc',
			'label'  => 'Ashland',
			'hours'  => '9AM&ndash;7PM',
		),
		array(
			'branch' => 'cpl',
			'label'  => 'Ashland',
			'hours'  => '9AM&ndash;5PM',
		),
		array(
			'branch' => 'ccpl',
			'label'  => 'Ashland',
			'hours'  => '11AM&ndash;7PM',
		),
		array(
			'branch' => 'bkm',
			'label'  => 'Bookmobile: Sturgeon',
			'hours'  => '1PM&ndash;7PM',
		),
	);

	wp_send_json_success( $hours );
}

/**
 * Add the skeletonized hours version of the template.
 *
 * @return html (as a string, because shortcodes must return strings.)
 */
function render_dbrl_branch_hours( $atts, $content ) {
	// @TODO: Maybe you need to customize this thing in multiple locations on the site.
	$a = shortcode_atts( array(
		'style' => '',
		), $atts );

	// Enqueue the script that makes the request and populates the hours entries.
	wp_enqueue_script( 'dbrl-hours-fetcher' );
	ob_start();
	?>
	<aside>
	<ul id="branch-hours">
		<li id="hours-sbc">
			<h5 class="branch-name"></h5>
			<span class="hours-detail"></span>
		</li>
		<li id="hours-cpl">
			<h5 class="branch-name"></h5>
			<span class="hours-detail"></span>
		</li>
		<li id="hours-ccpl">
			<h5 class="branch-name"></h5>
			<span class="hours-detail"></span>
		</li>
		<li id="hours-bkm">
			<h5 class="branch-name"></h5>
			<span class="hours-detail"></span>
		</li>
	</ul>
	</aside>
	<?php
	return ob_get_clean();
}
