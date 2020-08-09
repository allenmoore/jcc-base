<?php

namespace JCC\FndSESF\Admin;

class Options {

	/**
	 * Property representing the options group.
	 *
	 * @var string The option group name.
	 */
	public $optGroup = 'jcc-fnd-sesf-options';

	/**
	 * Property representing the options name.
	 *
	 * @var string The options name.
	 */
	public $optName = 'jcc-fnd-sesf-options';

	/**
	 * Property representing the options page slug.
	 *
	 * @var string The options page hook.
	 */
	protected $_optionsPageHook;

	/**
	 * The Options Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'addMenuPage' ) );
		add_action( 'admin_init', array( $this, 'registerSocialOptions' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueStyles' ) );

		$this->options = wp_parse_args( get_option( $this->optName ), array(
			'facebook'  => $this->getDefaultOption( 'facebook' ),
			'twitter'   => $this->getDefaultOption( 'twitter' ),
			'instagram' => $this->getDefaultOption( 'instagram' ),
			'vimeo'     => $this->getDefaultOption( 'vimeo' ),
		) );
	}

	/**
	 * Method to add the options page to the main WordPress menu.
	 */
	public function addMenuPage() {

		$icon = JCC_FND_SESF_PATH . 'dist/svg/johnston-community-college-shield-logo.svg';

		$this->_optionsPageHook = add_menu_page(
			'JCC Foundation: Student Emergency Support Fund',
			'JCC Foundation',
			'manage_options',
			$this->optName,
			array( $this, 'renderOptionsPage' ),
			'data:image/svg+xml;base64,' . base64_encode( file_get_contents( $icon ) )
		);
	}

	/**
	 * Method to render the options page view.
	 */
	public function renderOptionsPage() {

		?>
		<div class="wrap">
			<h2 style="width: 350px;"><?php inline_svg( 'johnston-community-college-full-color-logo' ); ?></h2>
			<hr />
			<form action="<?php echo esc_url( admin_url( 'options.php' ) ); ?>" method="post">
				<?php
				do_settings_sections( $this->_optionsPageHook );
				settings_fields( $this->optGroup );
				?>
				<p class="submit">
					<?php submit_button( 'Save Changes', 'primary', 'submit', false ); ?>
					<button type="reset" class="button button-secondary"><?php esc_html_e( 'Reset Changes', 'jcc-fnd-sesf' ); ?></button>
				</p>
			</form>
		</div>
		<?php
	}

	/**
	 * Method to register the social media options.
	 */
	public function registerSocialOptions() {

		add_settings_section(
			'social-accounts',
			'Social Media Accounts',
			array( $this, 'renderSocialSection' ),
			$this->_optionsPageHook
		);

		add_settings_field(
			'facebook',
			__( 'Facebook', 'jcc-fnd-sesf' ),
			array( $this, 'facebookField'),
			$this->_optionsPageHook,
			'social-accounts'
		);

		add_settings_field(
			'twitter',
			__( 'Twitter', 'jcc-fnd-sesf' ),
			array( $this, 'twitterField'),
			$this->_optionsPageHook,
			'social-accounts'
		);

		add_settings_field(
			'instagram',
			__( 'Instagram', 'jcc-fnd-sesf' ),
			array( $this, 'instagramField'),
			$this->_optionsPageHook,
			'social-accounts'
		);

		register_setting(
			$this->optGroup,
			$this->optName,
			array( $this, 'saveOptions' )
		);
	}

	/**
	 * Method to render the scripture reference section view.
	 */
	public function renderSocialSection() {
		getTemplateFile( 'Admin/Options/SectionMsg',
			array(
				'msg' => 'Enter the usernames for the associated social media accounts.',
			)
		);
	}

	/**
	 * Method to render the facebook input field view.
	 */
	public function facebookField() {
		getTemplateFile( 'Admin/Options/InputField',
			array(
				'desc'  => 'Enter the facebook username.',
				'field' => $this->optName . '[facebook]',
				'value' => $this->options['facebook'],
			)
		);
	}

	/**
	 * Method to render the twitter input field view.
	 */
	public function twitterField() {
		getTemplateFile( 'Admin/Options/InputField',
			array(
				'desc'  => 'Enter the twitter username.',
				'field' => $this->optName . '[twitter]',
				'value' => $this->options['twitter'],
			)
		);
	}

	/**
	 * Method to render the instagram input field view.
	 */
	public function instagramField() {
		getTemplateFile( 'Admin/Options/InputField',
			array(
				'desc'  => 'Enter the instagram username.',
				'field' => $this->optName . '[instagram]',
				'value' => $this->options['instagram'],
			)
		);
	}

	/**
	 * Method to render the vimeo input field view.
	 */
	public function vimeoField() {
		getTemplateFile( 'Admin/Options/InputField',
			array(
				'desc'  => 'Enter the vimeo username.',
				'field' => $this->optName . '[vimeo]',
				'value' => $this->options['vimeo'],
			)
		);
	}

	/**
	 * Method to return the default for a option.
	 *
	 * @param string $key the option to return a default for.
	 * @return string the default of the option.
	 */
	public function getDefaultOption( $key ) {

		if ( empty( $key ) ) {
			return null;
		}

		switch ( $key ) {
			case 'facebook':
				return '';
				break;
			case 'twitter':
				return '';
				break;
			case 'instagram':
				return '';
				break;
			case 'vimeo':
				return '';
				break;
			default:
				return null;
				break;
		}
	}

	/**
	 * Method to save options.
	 *
	 * @param array $options the options to save.
	 * @return array the saved options.
	 */
	public function saveOptions( $options ) {

		if ( ! current_user_can( 'manage_live' ) ) {
			return;
		}

		$saved = array();
		$optNames = array( 'facebook', 'twitter', 'instagram', 'vimeo' );

		foreach ( $options as $name => $option ) {
			if ( in_array( $name, $optNames ) ) {

				switch ( $name ) {
					case 'facebook':
						if ( empty( $option ) ) {

							$option = $this->getDefaultOption( 'facebook' );

							add_settings_error(
								$name,
								$name,
								__( 'Please enter a username.', 'jcc-fnd-sesf' ),
								'error ' . esc_html( $name )
							);
						}
						break;
					case 'twitter':
						if ( empty( $option ) ) {

							$option = $this->getDefaultOption( 'twitter' );

							add_settings_error(
								$name,
								$name,
								__( 'Please enter a username.', 'jcc-fnd-sesf' ),
								'error ' . esc_html( $name )
							);
						}
						break;
					case 'instagram':
						if ( empty( $option ) ) {

							$option = $this->getDefaultOption( 'instagram' );

							add_settings_error(
								$name,
								$name,
								__( 'Please enter a username.', 'jcc-fnd-sesf' ),
								'error ' . esc_html( $name )
							);
						}
						break;
					case 'vimeo':
						if ( empty( $option ) ) {

							$option = $this->getDefaultOption( 'vimeo' );

							add_settings_error(
								$name,
								$name,
								__( 'Please enter a username.', 'jcc-fnd-sesf' ),
								'error ' . esc_html( $name )
							);
						}
						break;
					default:
						break;
				}
				$saved[$name] = trim( $option );
			}
		}

		return $saved;
	}

	/**
	 * Method to enqueue the admin CSS.
	 */
	public function enqueueStyles() {
		$min = defined( 'SCRIPT_DEBUG' ) && filter_var( SCRIPT_DEBUG, FILTER_VALIDATE_BOOLEAN ) ? '' : '.min';
		$themeUrl = trailingslashit( get_stylesheet_directory_uri() );

		wp_enqueue_style( 'jcc-fnd-sesf-admin', $themeUrl . 'dist/css/admin-style' . $min . '.css', [], JCC_FND_SESF_VERSION, 'all' );
	}
}
