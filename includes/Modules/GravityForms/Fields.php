<?php

namespace WPBase\Modules\GravityForms;

class Fields {

	/**
	 * The Fields Constructor.
	 */
	public function __construct() {
		add_filter( 'gform_field_content', array( $this, 'largeInputField' ), 10, 2 );
		add_filter( 'gform_field_content', array( $this, 'medInputField' ), 10, 2 );
		add_filter( 'gform_field_content', array( $this, 'addressInputField' ), 10, 2 );
		add_filter( 'gform_field_content', array( $this, 'selectField' ), 10, 2 );
		add_filter( 'gform_field_content', array( $this, 'addressSelectField' ), 10, 2 );
		add_filter( 'gform_field_content', array( $this, 'textareaField' ), 10, 2 );
		add_filter( 'gform_submit_button', array( $this, 'submitButton' ), 10, 2 );
		add_filter( 'gform_field_content', array( $this, 'consentField' ), 10, 2 );
		add_filter( 'gform_form_post_get_meta', array( $this, 'commentFields' ) );
		add_filter( 'gform_form_post_update_meta', array( $this, 'removeField' ), 10, 3 );
	}

	/**
	 * Method to add a custom CSS class to a Gravity Forms large input fields.
	 *
	 * @param string $content the field content to be filtered.
	 * @param object $field the field the content applies to.
	 * @return string the filtered content.
	 */
	public function largeInputField( $content, $field ) {

		$field_types = [ 'text', 'number', 'name', 'phone', 'website', 'email' ];

		foreach ( $field_types as $type ) {
			if ( $field->type === $type ) {
				return str_replace( "class='large'", "class='input-field'", $content );
			}
		}
		return $content;
	}

	/**
	 * Method to add a custom CSS class to a Gravity Forms medium input fields.
	 *
	 * @param string $content the field content to be filtered.
	 * @param object $field the field the content applies to.
	 * @return string the filtered content.
	 */
	public function medInputField( $content, $field ) {

		$field_types = [ 'text', 'number', 'name', 'phone', 'website', 'email' ];

		foreach ( $field_types as $type ) {
			if ( $field->type === $type ) {
				return str_replace( "class='medium'", "class='input-field'", $content );
			}
		}
		return $content;
	}

	/**
	 * Method to add a custom CSS class to a Gravity Forms address input field.
	 *
	 * @param string $content the field content to be filtered.
	 * @param object $field the field the content applies to.
	 * @return string the filtered content.
	 */
	public function addressInputField( $content, $field ) {

		if ( $field->type === 'address' ) {
			return str_replace( "type='text'", "type='text' class='input-field'", $content );
		}
		return $content;
	}

	/**
	 * Method to add a custom CSS class to a Gravity Forms select field.
	 *
	 * @param string $content the field content to be filtered.
	 * @param object $field the field the content applies to.
	 * @return string the filtered content.
	 */
	public function selectField( $content, $field ) {

		if ( $field->type === 'select' ) {
			return str_replace( "class='large gfield_select'", "class='select-box'", $content );
		}
		return $content;
	}

	/**
	 * Method to add a custom CSS class to a Gravity Forms address select field.
	 *
	 * @param string $content the field content to be filtered.
	 * @param object $field the field the content applies to.
	 * @return string the filtered content.
	 */
	public function addressSelectField( $content, $field ) {

		if ( $field->type === 'address' ) {
			return str_replace( "<select", "<select class='select-box'", $content );
		}
		return $content;
	}

	/**
	 * Method to add a custom CSS class to a Gravity Forms textarea field.
	 *
	 * @param string $content the field content to be filtered.
	 * @param object $field the field the content applies to.
	 * @return string the filtered content.
	 */
	public function textareaField( $content, $field ) {

		if ( $field["type"] === 'textarea' ) {
			$content = str_replace('class=\'textarea large', 'class=\'textarea-field', $content );
		}

		return $content;
	}
	
	/**
	 * Method to replace the submit button with a `<button>` element with a custom CSS class.
	 *
	 * @param string $button the tag string to be filtered.
	 * @param object $form the form currently being processed.
	 * @return string the filtered tag string.
	 */
	public function submitButton( $button, $form ) {

		$button = sprintf( '<button class="submit-button" id="gform_submit_button_%s">%s</button>', esc_attr( $form['id'] ), esc_html( $form['button']['text'] ) );

		return $button;
	}

	/**
	 * Method to add a custom CSS class to a Gravity Forms consent checkbox field.
	 *
	 * @param string $content the field content to be filtered.
	 * @param object $field the field the content applies to.
	 * @return string the filtered content.
	 */
	public function consentField( $content, $field ) {

		if ( $field['type'] === 'consent' ) {
			return str_replace( '<input', '<input class=\'checkbox-field\'', $content );
		}
		return $content;
	}

	/**
	 * Method to add a custom repeatable comment field.
	 *
	 * @param object $form the current form object to be filtered.
	 * @return object the form.
	 */
	public function commentFields( $form ) {
		
		$name = \GF_Fields::create( array( 
			'type' => 'text',
			'id' => 1003,
			'formId' => $form['id'],
			'label' => 'Committee Member Name',
			'pageNumber' => 1,
			'class' => 'input-field'
		) );

		$email = \GF_Fields::create( array(
			'type' => 'email',
			'id' => 1002,
			'formId' => $form['id'],
			'label' => 'Committee Member Email',
			'pageNumber' => 1,
			'class' => 'input-field'
		) );

		$comment = \GF_Fields::create( array(
			'type' => 'textarea',
			'id' => 1001,
			'formId' => $form['id'],
			'label' => 'Committee Member Comment',
			'pageNumber' => 1
		) );

		$comments = \GF_Fields::create( array(
			'type'  => 'repeater',
			'description' => 'Add comments and thoughts regarding this application. Please click "Add New Comment", then enter your name, email address, and comment.',
			'id' => 1000,
			'formId' => $form['id'],
			'label' => 'Committee Comments',
			'addButtonText'  => 'Add New Comment',
			'removeButtonText' => 'Remove Comment',
			'pageNumber' => 1,
			'fields' => array( $name, $email, $comment ),
		) );

		$form['fields'][] = $comments;

		return $form;
	}

	/**
	 * Method to remove the field before the form is saved.
	 *
	 * @param bool $formMeta the meta data for the current form.
	 * @param int $formId the current form ID.
	 * @param string $metaName the meta name.
	 * @return mixed
	 */
	public function removeField( $formMeta, $formId, $metaName ) {
		
		if ( 'display_meta' === $metaName ) {
			$formMeta['fields'] = wp_list_filter( $formMeta['fields'], array( 'id' => 1000 ), 'NOT' );
		}
		
		return $formMeta;
	}
}
