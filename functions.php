<?php

namespace JCC\FndSESF;

use JCC\FndSESF\Theme;

require_once 'vendor/autoload.php';

add_action( 'after_setup_theme', function() {
	global $jccFndSESF;

	if ( ! empty( $jccFndSESF ) ) {
		return;
	}

	if ( ! defined( 'JCC_FND_SESF_VERSION' ) ) {
		define( 'JCC_FND_SESF_VERSION', '1.0.0' );
	}
	if ( ! defined( 'JCC_FND_SESF_URL' ) ) {
		define( 'JCC_FND_SESF_URL', get_stylesheet_directory_uri() );
	}
	if ( ! defined( 'JCC_FND_SESF_TEMPLATE_URL' ) ) {
		define( 'JCC_FND_SESF_TEMPLATE_URL', get_template_directory_uri() );
	}
	if ( ! defined( 'JCC_FND_SESF_PATH' ) ) {
		define( 'JCC_FND_SESF_PATH', trailingslashit( get_stylesheet_directory() ) );
	}
	if ( ! defined( 'JCC_FND_SESF_INC' ) ) {
		define( 'JCC_FND_SESF_INC', JCC_FND_SESF_PATH . 'includes/' );
	}

	$jccFndSESF = new Theme();
});

