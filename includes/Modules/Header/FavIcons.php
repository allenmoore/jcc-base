<?php

namespace JCC\FndSESF\Modules\Header;

class FavIcons {

	public function __construct() {
		add_action( 'wp_head', array( $this, 'addIcons' ) );
	}

	public function addIcons() {

		$assetsUrl = trailingslashit( JCC_FND_SESF_URL . '/dist/images/device-icons' );
		?>
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( $assetsUrl . 'apple-touch-icon-60x60.png' ); ?>">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( $assetsUrl . 'apple-touch-icon-76x76.png' ); ?>">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( $assetsUrl . 'apple-touch-icon-120x120.png' ); ?>">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( $assetsUrl . 'apple-touch-icon-152x152.png' ); ?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( $assetsUrl . 'apple-touch-icon-180x180.png' ); ?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( $assetsUrl . 'favicon-32x32.png' ); ?>">
		<link rel="icon" type="image/png" sizes="194x194" href="<?php echo esc_url( $assetsUrl . 'favicon-194x194.png' ); ?>">
		<link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( $assetsUrl . 'android-chrome-192x192.png' ); ?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( $assetsUrl . 'favicon-16x16.png' ); ?>">
		<link rel="manifest" href="<?php echo esc_url( $assetsUrl . 'site.webmanifest' ); ?>">
		<link rel="mask-icon" href="<?php echo esc_url( $assetsUrl . 'safari-pinned-tab.svg" color="#0086c1' ); ?>">
		<meta name="msapplication-TileColor" content="#0086c1">
		<meta name="msapplication-TileImage" content="<?php echo esc_url( $assetsUrl . 'mstile-144x144.png' ); ?>">
		<meta name="theme-color" content="#ffffff">
		<?php
	}
}
