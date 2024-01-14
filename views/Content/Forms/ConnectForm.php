<div id="js-connect-form-view" class="contact-form" aria-hidden="false">
	<h3 class="form-title">Want more information?</h3>
	<form id="form_33bf7802-d193-450c-94b3-d9c0aec53573" name="contact-form" method="post" class="ldpforms " autocomplete="off">
		<div class="form-row -hidden">
			<span class="hp33bf7802-d193-450c-94b3-d9c0aec53573">
				<label class="hp33bf7802-d193-450c-94b3-d9c0aec53573">If you see this don't fill out this input box.</label>
				<input type="text" id="hp33bf7802-d193-450c-94b3-d9c0aec53573" aria-label="no-fill">
			</span>
		</div>
		<?php
		getTemplateFile( 'FormFields/InputField', array( 'field' => 'id_name', 'label' => 'Name', 'name' => 'name', 'placeholder' => 'Your Full Name', 'required' => true, 'tabindex' => '1', 'type' => 'text' ) );
		getTemplateFile( 'FormFields/InputField', array( 'field' => 'id_emailaddress', 'label' => 'Email Address', 'name' => 'emailaddress', 'placeholder' => 'Your Valid Email address', 'required' => true, 'tabindex' => '2', 'type' => 'email' ) );
		getTemplateFile( 'FormFields/InputField', array( 'field' => 'id_phonenumber', 'label' => 'Phone Number', 'name' => 'phonenumber', 'placeholder' => 'Phone Number including area code', 'required' => true, 'tabindex' => '3', 'type' => 'phone' ) ); ?>
		<div class="form-row">
			<fieldset class="form-fieldset">
				<legend class="legend">How would you prefer we connect?<span class="required-field">*</span></legend>
				<?php
				getTemplateFile( 'FormFields/RadioField', array ( 'field' => 'connectpreference', 'id' => 'connectpreference.email', 'label' => 'Email', 'tabindex' => '4' ) );
				getTemplateFile( 'FormFields/RadioField', array ( 'field' => 'connectpreference', 'id' => 'connectpreference.text-message', 'label' => 'Text Message', 'tabindex' => '5' ) );
				getTemplateFile( 'FormFields/RadioField', array ( 'field' => 'connectpreference', 'id' => 'connectpreference.131995506.phone-number', 'label' => 'Phone Number', 'tabindex' => '6' ) );
				?>
			</fieldset>
		</div>
		<input type="hidden" name="form_uuid" value="33bf7802-d193-450c-94b3-d9c0aec53573">
		<input type="hidden" name="site_name" value="www">
		<?php getTemplateFile( 'FormFields/SubmitButton', array( 'id' => 'btn_33bf7802-d193-450c-94b3-d9c0aec53573', 'label' => 'Submit the information request form and connect with WPBase', 'tabindex' => '7', 'type' => 'submit', 'value' => 'Let\'s Connect' ) ); ?>
	</form>
</div>
