<?php

namespace JCC\FndSESF\Modules\Divi\Filters;

class BuilderContentClasses {

	/**
	 * The BuilderContentClasses Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'removeFunc' ), 10 );
	}

	/**
	 * Method to remove a content filter added by Divi.
	 */
	public function removeFunc() {
		remove_filter( 'the_content', 'et_builder_add_builder_content_wrapper' );
	}
}
