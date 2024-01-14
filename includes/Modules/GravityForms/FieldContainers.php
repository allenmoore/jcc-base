<?php

namespace WPBase\Modules\GravityForms;

/**
 * The FieldContainers Class.
 *
 * @package WPBase\Modules\GravityForms
 */
class FieldContainers {

	/**
	 * The FieldContainers Constructor.
	 */
	public function __construct() {
		add_filter( 'gform_field_container', array( $this, 'markup' ), 10, 6 );
	}

	/**
	 * Method to modify the default Gravity Forms field markup.
	 *
	 * @param string $cont the field container markup.
	 * @param object $field the field currently being processed.
	 * @param string $form the form currently being processed.
	 * @param string $cssClass the CSS classes to be assigned to the HTML elements.
	 * @param string $style An empty string of CSS Styles.
	 * @param string $content the markup for the field content.
	 * @return string the modified field markup.
	 */
	public function markup( $cont, $field, $form, $cssClass, $style, $content ) {
		
		if ( ! is_admin() ) {
			return '<div class="form-row">{FIELD_CONTENT}</div>';
		}
		
		return $content;
	}
}
