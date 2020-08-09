<?php

namespace JCC\FndSESF\Modules\Search;

class SiteSearch {

	/**
	 * Property representing the search modal id.
	 *
	 * @var string the modal id.
	 */
	private $modalId = 'search-modal';

	/**
	 * Thd SiteSearch Constructor.
	 */
	public function __construct() {
		add_action( 'corSearchModal', array( $this, 'getModalView' ) );
	}

	/**
	 * Method to get the modal view.
	 */
	public function getModalView() {

		?>
		<div id="js-modal-overlay" class="modal-overlay" aria-hidden="true"></div>
		<div id="<?php echo esc_attr( $this->modalId ); ?>" class="modal-wrapper" data-modal-id="<?php echo esc_attr( $this->modalId ); ?>" data-modal-target="<?php echo esc_attr( $this->modalId ); ?>" role="dialog" aria-labelledby="modal-title" aria-describedby="modal-descriptions" aria-hidden="true">
			<div class="modal-dialog">
				<button id="js-close-modal" data-model-action="close" data-modal-target="<?php echo esc_attr( $this->modalId ); ?>" class="modal-close" aria-label="Close"><?php inline_svg( 'close' ); ?></button>
				<div class="modal-content">
					<?php $this->getModalContent(); ?>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Method to get the modal content.
	 */
	public function getModalContent() {

		$siteUrl = get_home_url();
		?>
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( $siteUrl ); ?>">
			<input type="search" class="search-input" id="search-input" value="" name="s" title="Search for:" placeholder="type to search" />
			<div class="search-icon">
				<?php inline_svg( 'search' ); ?>
			</div>
			<label for="search-input" class="screen-reader-text"><?php _e( 'Search this site', 'jcc-fnd-sesf' ); ?></label>
		</form>
		<?php
	}
}
