<?php

namespace JCC\FndSESF\Modules\PostTypes\Meta;

/**
 * The Applicant Class.
 *
 * @package JCC\FndSESF\Modules\PostTypes\Meta
 */
class Applicant {

	/**
	 * The Applicant constructor.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'addMetaBox') );
		add_action( 'save_post', array( $this, 'saveData' ) );
	}

	/**
	 * Method to add a meta box to the welcome videos post type.
	 */
	public function addMetaBox() {
		add_meta_box(
			'applicant-meta',
			'Applicant Member Details',
			array( $this, 'renderMetaBox' ),
			'applicant',
			'normal',
			'high'
		);
	}

	/**
	 * Method to render the meta box.
	 *
	 * @param WP_Post $post the post object.
	 */
	public function renderMetaBox( $post ) {

		wp_nonce_field( 'applicant_meta_boxes', '_applicant_nonce', false );
		?>

		<label for="applicant_giving_url"><?php esc_html_e( 'Giving URL:', 'jcc-fnd-sesf' ); ?></label>

		<input type="text" name="applicant_giving_url" id="applicant_giving_url" class="widefat" value="<?php echo esc_attr( get_post_meta( $post->ID, 'applicant_giving_url', true ) ); ?>">

		<p class="description">
			<?php esc_html_e( 'Enter the url for the applicant members online giving page.', 'jcc-fnd-sesf' ); ?>
		</p>

		<label for="applicant_title"><?php esc_html_e( 'Title:', 'jcc-fnd-sesf' ); ?></label>

		<input type="text" name="applicant_title" id="applicant_title" class="widefat" value="<?php echo esc_attr( get_post_meta( $post->ID, 'applicant_title', true ) ); ?>">

		<p class="description">
			<?php esc_html_e( 'Enter the applicant member\'s job title.', 'jcc-fnd-sesf' ); ?>
		</p>
		<?php
	}

	/**
	 * Method to save the meta data.
	 *
	 * @param int $postId the post id.
	 */
	public function saveData( $postId ) {

		$doing_autosave = defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE;
		$valid_nonce = wp_verify_nonce( filter_input( INPUT_POST, '_applicant_nonce' ), 'applicant_meta_boxes' );
		$can_edit = current_user_can( 'edit_post', $postId );

		if ( $doing_autosave || ! $valid_nonce || ! $can_edit ) {
			return;
		}

		$givingUrl = sanitize_text_field( filter_input( INPUT_POST, 'applicant_giving_url' ) );
		$jobTitle = sanitize_text_field( filter_input( INPUT_POST, 'applicant_title' ) );

		update_post_meta( $postId, 'applicant_giving_url', $givingUrl );
		update_post_meta( $postId, 'applicant_title', $jobTitle );
	}
}
