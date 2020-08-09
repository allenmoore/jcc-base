<div class="scripture-reference">
	<div class="reference-item">
		<select id="<?php echo esc_attr( $field ); ?>" name="<?php echo esc_attr( $field ); ?>">
			<?php
			foreach ( $options as $key => $val ) {
				$selected = ( $key === $value ) ? 'selected="selected"' : ''; ?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo esc_html( $val ); ?></option>
			<?php } ?>
		</select>
		<p class="description">
			<?php esc_html_e( $desc, 'summit-live' ); ?>
		</p>
	</div>
	<div class="reference-item">
		<select id="<?php echo esc_attr( $field ); ?>" name="<?php echo esc_attr( $field ); ?>">
			<?php
			foreach ( $options as $key => $val ) {
				$selected = ( $key === $value ) ? 'selected="selected"' : ''; ?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo esc_html( $val ); ?></option>
			<?php } ?>
		</select>
		<p class="description">
			<?php esc_html_e( $desc, 'summit-live' ); ?>
		</p>
	</div>
	<div class="reference-item">
		<input type="text" name="<?php echo esc_attr( $field ); ?>" id="<?php echo esc_attr( $field  ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description">
			<?php esc_html_e( $desc, 'summit-live' ); ?>
		</p>
	</div>
	<div class="reference-item">
		<input type="text" name="<?php echo esc_attr( $field ); ?>" id="<?php echo esc_attr( $field  ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description">
			<?php esc_html_e( $desc, 'summit-live' ); ?>
		</p>
	</div>
</div>
