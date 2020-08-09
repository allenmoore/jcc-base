<select id="<?php echo esc_attr( $field ); ?>" name="<?php echo esc_attr( $field ); ?>">
	<?php
	foreach ( $options as $key => $val ) {
		$selected = ( $key === $value ) ? 'selected="selected"' : ''; ?>
		<option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo esc_html( $val ); ?></option>
	<?php } ?>
</select>
<p class="description">
	<?php esc_html_e( $desc, 'jcc-fnd-sesf' ); ?>
</p>
