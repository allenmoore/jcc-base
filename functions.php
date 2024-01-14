<?php

namespace WPBase;

use WPBase\Theme;

require_once 'vendor/autoload.php';

add_action( 'after_setup_theme', function() {
	global $wpbase;

	if ( ! empty( $wpbase ) ) {
		return;
	}

	if ( ! defined( 'WPBASE_VERSION' ) ) {
		define( 'WPBASE_VERSION', '1.0.1' );
	}
	if ( ! defined( 'WPBASE_URL' ) ) {
		define( 'WPBASE_URL', get_stylesheet_directory_uri() );
	}
	if ( ! defined( 'WPBASE_TEMPLATE_URL' ) ) {
		define( 'WPBASE_TEMPLATE_URL', get_template_directory_uri() );
	}
	if ( ! defined( 'WPBASE_PATH' ) ) {
		define( 'WPBASE_PATH', trailingslashit( get_stylesheet_directory() ) );
	}
	if ( ! defined( 'WPBASE_INC' ) ) {
		define( 'WPBASE_INC', WPBASE_PATH . 'includes/' );
	}

	$wpbase = new Theme();
});

