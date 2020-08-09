<div class="wrap">
	<?php
	if ( isset( $logo ) ) { ?>
		<h1><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/' . $logo ); ?>" <?php if ( isset( $altText )
			) { ?> alt="<?php echo esc_attr( $altText ); } ?>" style="width: 350px;"></h1>
	<?php } else { ?>
		<h1><?php echo esc_html( $title ); ?></h1>
	<?php }
	settings_errors();
	?>
	<hr />
	<form action="<?php echo esc_url( admin_url( 'options.php' ) ); ?>" method="post">
		<?php
		settings_fields( $fields );
		do_settings_sections( $options );
		?>
		<p class="submit">
			<?php submit_button( 'Save Changes', 'primary', 'submit', false ); ?>
			<button type="reset" class="button button-secondary"><?php esc_html_e( 'Reset Changes', 'summit-live' ); ?></button>
		</p>
	</form>
</div>
