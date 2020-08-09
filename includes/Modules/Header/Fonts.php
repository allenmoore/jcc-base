<?php

namespace JCC\FndSESF\Modules\Header;

class Fonts {

	/**
	 * The Fonts constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'importFonts' ), 5 );
	}

	/**
	 * Method to import fonts into the `<head>` tag.
	 *
	 * @author Allen Moore
	 *
	 * @return void
	 */
	public function importFonts() {

		$themeUrl = trailingslashit( get_stylesheet_directory_uri() );
		$fontDir = trailingslashit( $themeUrl . 'dist/fonts' );
		?>
		<style>
			@font-face {
				font-family: 'proxima-nova';
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light.eot' ); ?> );
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light.eot?#iefix' ); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light.woff2' ); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light.woff' ); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light.ttf' ); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light.svg#proxima-nova-light' ); ?> ) format('svg');
				font-weight: 300;
				font-style: normal;
			}

			@font-face {
				font-family: 'proxima-nova';
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light-italic.eot' ); ?> );
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light-italic.eot?#iefix' ); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light-italic.woff2' ); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light-italic.woff' ); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light-italic.ttf' ); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-light-italic.svg#proxima-nova-light-italic' ); ?> ) format('svg');
				font-weight: 300;
				font-style: italic;
			}

			@font-face {
				font-family: 'proxima-nova';
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular.eot' ); ?> )
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular.eot?#iefix' ); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular.woff2' ); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular.woff' ); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular.ttf' ); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular.svg#proxima-nova-regular' ); ?> ) format('svg');
				font-weight: normal;
				font-style: normal;
			}

			@font-face {
				font-family: 'proxima-nova';
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular-italic.eot' ); ?> );
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular-italic.eot?#iefix' ); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular-italic.woff2' ); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular-italic.woff' ); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular-italic.ttf' ); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-regular-italic.svg#proxima-nova-regular-italic' ); ?> ) format('svg');
				font-weight: normal;
				font-style: italic;
			}

			@font-face {
				font-family: 'proxima-nova';
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold.eot' ); ?> );
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold.eot?#iefix'); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold.woff2'); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold.woff'); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold.ttf'); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold.svg#proxima-nova-bold'); ?> ) format('svg');
				font-weight: bold;
				font-style: normal;
			}

			@font-face {
				font-family: 'proxima-nova';
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold-italic.eot' ); ?> );
				src: url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold-italic.eot?#iefix'); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold-italic.woff2'); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold-italic.woff'); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold-italic.ttf'); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'proxima-nova/proxima-nova-bold-italic.svg#proxima-nova-bold-italic'); ?> ) format('svg');
				font-weight: bold;
				font-style: italic;
			}
			@font-face {
				font-family: 'grad';
				src: url(<?php echo esc_url( $fontDir . 'grad/grad-regular.eot' ); ?> );
				src: url(<?php echo esc_url( $fontDir . 'grad/grad-regular.eot?#iefix' ); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-regular.woff2' ); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-regular.woff' ); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-regular.ttf' ); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-regular.svg#grad-regular' ); ?> ) format('svg');
				font-weight: normal;
				font-style: normal;
			}
			@font-face {
				font-family: 'grad';
				src: url(<?php echo esc_url( $fontDir . 'grad/grad-regular-italic.eot' ); ?> );
				src: url(<?php echo esc_url( $fontDir . 'grad/grad-regular-italic.eot?#iefix' ); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-regular-italic.woff2' ); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-regular-italic.woff' ); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-regular-italic.ttf' ); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-regular-italic.svg#grad-regular-italic' ); ?> ) format('svg');
				font-weight: normal;
				font-style: italic;
			}
			@font-face {
				font-family: 'grad';
				src: url(<?php echo esc_url( $fontDir . 'grad/grad-bold.eot' ); ?> );
				src: url(<?php echo esc_url( $fontDir . 'grad/grad-bold.eot?#iefix' ); ?> ) format('embedded-opentype'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-bold.woff2' ); ?> ) format('woff2'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-bold.woff' ); ?> ) format('woff'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-bold.ttf' ); ?> ) format('truetype'),
				url(<?php echo esc_url( $fontDir . 'grad/grad-bold.svg#grad-bold' ); ?> ) format('svg');
				font-weight: bold;
				font-style: normal;
			}
		</style>
		<?php
	}
}
