<?php
/*
Plugin Name: Admin Columns Pro
Version: 4.4
Description: Customize columns on the administration screens for post(types), users and other content. Filter and sort content, and edit posts directly from the posts overview. All via an intuitive, easy-to-use drag-and-drop interface.
Author: AdminColumns.com
Author URI: https://www.admincolumns.com
Plugin URI: https://www.admincolumns.com
Requires PHP: 5.3.6
Text Domain: codepress-admin-columns
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_admin() ) {
	return;
}

define( 'ACP_FILE', __FILE__ );

/**
 * Deactivate Admin Columns
 */
require_once ABSPATH . 'wp-admin/includes/plugin.php';

deactivate_plugins( 'codepress-admin-columns/codepress-admin-columns.php' );

/**
 * Load integrated Admin Columns
 */
function acp_ac_init() {
	require_once 'admin-columns/codepress-admin-columns.php';
}

add_action( 'plugins_loaded', 'acp_ac_init' );

/**
 * Load Admin Columns Pro
 */
function acp_init() {
	$dependencies = new AC_Dependencies( plugin_basename( ACP_FILE ) );
	$dependencies->check_php_version( '5.3.6' );

	if ( $dependencies->has_missing() ) {
		return;
	}

	require_once 'bootstrap.php';
}

add_action( 'after_setup_theme', 'acp_init', 5 );

function acp_deactivate_incompatible_addons() {
	$versions = array(

		// Minimum required version. False is incompatible.
		'ac-addon-acf/ac-addon-acf.php'                         => '2.4',
		'ac-addon-buddypress/ac-addon-buddypress.php'           => '1.3.2',
		'ac-addon-events-calendar/ac-addon-events-calendar.php' => '1.2.3',
		'ac-addon-ninjaforms/ac-addon-ninjaforms.php'           => '1.2.1',
		'ac-addon-pods/ac-addon-pods.php'                       => '1.2.1',
		'ac-addon-types/ac-addon-types.php'                     => '1.3.3',
		'ac-addon-woocommerce/ac-addon-woocommerce.php'         => '3.2',
	);

	// Deprecated basenames since 4.2
	$versions['cac-addon-acf/cac-addon-acf.php'] = $versions['ac-addon-acf/ac-addon-acf.php'];
	$versions['cac-addon-woocommerce/cac-addon-woocommerce.php'] = $versions['ac-addon-woocommerce/ac-addon-woocommerce.php'];

	$plugins = (array) get_plugins();

	foreach ( $versions as $basename => $version ) {
		if ( ! array_key_exists( $basename, $plugins ) ) {
			continue;
		}

		$current_version = $plugins[ $basename ]['Version'];

		if ( ! $version || version_compare( $version, $current_version, '>' ) ) {
			deactivate_plugins( array( $basename ) );

			add_action( 'after_plugin_row_' . $basename, function () {
				acp_inline_notice( sprintf( __( "This plugin is not compatible with %s.", 'codepress-admin-columns' ), 'Admin Columns Pro 4.4beta' ) );
			}, 5 );
		}
	}
}

add_action( 'after_setup_theme', 'acp_deactivate_incompatible_addons' );

function acp_inline_notice( $message ) {
	?>
	<tr class="plugin-update-tr active">
		<td colspan="3" class="plugin-update colspanchange">
			<div class="update-message notice inline notice-error notice-alt">
				<p><?php echo $message; ?></p>
			</div>
		</td>
	</tr>
	<?php
}