<?php

namespace JCC\FndSESF\Modules\PostTypes;

/**
 * The Applicant Class.
 *
 * @package JCC\FndSESF\Modules\PostTypes
 */
class Applicant {

	public $itemNamePlural = 'applicants';

	public $itemNameSingular = 'applicant';

	public $pluralName = 'applicants';

	public $singularName = 'applicant';

	public $slug = 'applicant';

	public $textDomain = 'jcc-fnd-sesf';

	/**
	 * The Applicant constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'registerPostType' ), 0 );
	}

	/**
	 * Method to return the post type labels.
	 *
	 * @return array an array of post type labels.
	 */
	public function getLabels() {

		$labels = array(
			'name'                  => _x( ucwords( $this->pluralName ), 'Post Type General Name', $this->textDomain ),
			'singular_name'         => _x( ucwords( $this->singularName ), 'Post Type Singular Name', $this->textDomain ),
			'menu_name'             => __( ucwords( $this->pluralName ), $this->textDomain ),
			'name_admin_bar'        => __( ucwords( $this->singularName ), $this->textDomain ),
			'archives'              => __( 'Welcome ' . ucfirst( $this->itemNameSingular ) . ' Archives', $this->textDomain ),
			'attributes'            => __( ucfirst( $this->itemNameSingular ) . ' Attributes', $this->textDomain ),
			'parent_item_colon'     => __( '', $this->textDomain ),
			'all_items'             => __( 'All ' . ucfirst( $this->itemNamePlural ), $this->textDomain ),
			'add_new_item'          => __( 'Add New ' . ucfirst( $this->itemNamePlural ), $this->textDomain ),
			'add_new'               => __( 'Add New', $this->textDomain ),
			'new_item'              => __( 'New ' . ucfirst( $this->itemNameSingular ), $this->textDomain ),
			'edit_item'             => __( 'Edit ' . ucfirst( $this->itemNameSingular ), $this->textDomain ),
			'update_item'           => __( 'Update ' . ucfirst( $this->itemNameSingular ), $this->textDomain ),
			'view_item'             => __( 'View ' . ucfirst( $this->itemNameSingular ), $this->textDomain ),
			'view_items'            => __( 'View ' . ucfirst( $this->itemNamePlural ), $this->textDomain ),
			'search_items'          => __( 'Search ' . ucfirst( $this->itemNameSingular ), $this->textDomain ),
			'not_found'             => __( 'Not found', $this->textDomain ),
			'not_found_in_trash'    => __( 'Not found in Trash', $this->textDomain ),
			'featured_image'        => __( 'Featured Image', $this->textDomain ),
			'set_featured_image'    => __( 'Set featured image', $this->textDomain ),
			'remove_featured_image' => __( 'Remove featured image', $this->textDomain ),
			'use_featured_image'    => __( 'Use as featured image', $this->textDomain ),
			'insert_into_item'      => __( 'Insert into ' . $this->itemNameSingular, $this->textDomain ),
			'uploaded_to_this_item' => __( 'Uploaded to this ' . $this->itemNameSingular, $this->textDomain ),
			'items_list'            => __( ucfirst( $this->itemNamePlural ) . ' list', $this->textDomain ),
			'items_list_navigation' => __( ucfirst( $this->itemNamePlural ) . ' list navigation', $this->textDomain ),
			'filter_items_list'     => __( 'Filter ' . $this->itemNamePlural . ' list', $this->textDomain ),
		);

		return $labels;
	}

	/**
	 * Method to return the post type arguments.

	 * @return array an array of post type arguments.
	 */
	public function getArgs() {

		$labels = $this->getLabels();
		$args = array(
			'label'                 => __( ucwords( $this->singularName ), $this->textDomain ),
			'description'           => __( ucwords( $this->pluralName ), $this->textDomain ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'page-attributes', 'editor', 'thumbnail' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
			'rest_base'             => 'applicant-api',
			'rest_controller_class' => 'WPRESTApplicantController',
		);

		return $args;
	}

	/**
	 * Method to register the custom post type.

	 * @returns void
	 */
	public function registerPostType() {

		$args = $this->getArgs();

		register_post_type( $this->slug, $args );
	}
}
