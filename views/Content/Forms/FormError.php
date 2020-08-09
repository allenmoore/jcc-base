<div id="js-form-error-view" class="contact-form -hidden" aria-hidden="true" hidden>
	<div class="form-row">
		<div class="form-message">
			We were unable to process your submission. Please click the "Retry" button below and re-submit your information.
		</div>
	</div>
	<?php getTemplateFile( 'FormFields/SubmitButton', array( 'id' => 'js-retry-form-submission', 'label' => 'Retry submitting the connect form', 'tabindex' => '1', 'type' => 'button', 'value' => 'Retry' ) ); ?>
</div>
