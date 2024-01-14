<?php

namespace WPBase;

use WPBase\Admin\Options;
use WPBase\Modules\Content\Tables;
use WPBase\Modules\GravityForms\Fields as GFFields;
use WPBase\Modules\Header\FavIcons;
use WPBase\Modules\Header\Fonts;

class Theme {

	/**
	 * Property representing the Options class.
	 *
	 * @var \WPBase\Admin\Options
	 */
	public $options;

	/**
	 * Property representing the Tables class.
	 *
	 * @var \WPBase\Modules\Content\Tables
	 */
	public $tables;

	/**
	 * Property representing the Fields class.
	 *
	 * @var \WPBase\Modules\GravityForms\Fields
	 */
	public $gfFields;

	/**
	 * Property representing the FavIcons class.
	 *
	 * @var \WPBase\Modules\Header\FavIcons
	 */
	public $favIcons;

	/**
	 * Property representing the Fonts class.
	 *
	 * @var \WPBase\Modules\Header\Fonts
	 */
	public $themeFonts;

	/**
	 * The Theme Constructor.
	 */
	public function __construct() {
		global $content_width;

		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}

		$this->options = new Options();
		$this->tables = new Tables();
		$this->gfFields = new GFFields();
		$this->favIcons = new FavIcons();
		$this->themeFonts = new Fonts();

		$this->setupL10n();
		$this->registerThemeMenus();
		$this->registerImageSizes();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueStyles' ) );

		add_filter( 'body_class', array( $this, 'addBodyClass' ) );
		add_action( 'wp_head', array( $this, 'adjustHtmlHeight' ), 100 );
	}

	/**
	 * Method to setup the textdomain.
	 */
	public function setupL10n() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'wpbase' );
		load_textdomain( 'wpbase', WP_LANG_DIR . '/wpbase/wpbase-' . $locale . '.mo' );
		load_theme_textdomain( 'wpbase', WPBASE_PATH . '/languages' );
	}

	/**
	 * Method to enqueue the front end JavaScript.
	 */
	public function enqueueScripts() {
		$min = defined( 'SCRIPT_DEBUG' ) && filter_var( SCRIPT_DEBUG, FILTER_VALIDATE_BOOLEAN ) ? '' : '.min';
		$themeUrl = trailingslashit( WPBASE_URL );

		wp_enqueue_script(
			'wpbase-js',
			$themeUrl . 'dist/js/frontend.js',
			array(),
			WPBASE_VERSION,
			true
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Method to enqueue the front end CSS.
	 */
	public function enqueueStyles() {
		$min = defined( 'SCRIPT_DEBUG' ) && filter_var( SCRIPT_DEBUG, FILTER_VALIDATE_BOOLEAN ) ? '' : '.min';
		$themeUrl = trailingslashit( WPBASE_URL );

		wp_enqueue_style(
			'wpbase-style',
			$themeUrl . 'dist/css/style' . $min . '.css',
			array(),
			WPBASE_VERSION,
			'all'
		);
	}

	/**
	 * Method to register theme menus.
	 */
	public function registerThemeMenus() {
		register_nav_menus(['primary-navigation' => __( 'Primary Navigation', 'wpbase' )]);
	}

	/**
	 * Method to register custom image sizes.
	 */
	public function registerImageSizes() {
		add_image_size( 'full-width-hero', 1920, 9999, false );
	}

	/**
	 * Method to add a new body class.
	 *
	 * @param array $classes collection of classes to be added to the body tag
	 * @return array the filtered array of body classes
	 */
	public function addBodyClass( $classes ) {
		if ( ! is_admin() ) {
			$classes[] = 'site-body';
		}

		return $classes;
	}

	/**
	 * Method to adjust the height of the html document tag.
	 */
	public function adjustHtmlHeight() {
		if ( false === is_user_logged_in() ) {
			return;
		}
		?>
		<style type="text/css" media="screen">
			html {
				height: calc(100% - 46px);
			}

			@media screen and ( min-width: 783px ) {
				html {
					height: calc(100% - 32px);
				}
			}
		</style>
		<?php
	}
}
