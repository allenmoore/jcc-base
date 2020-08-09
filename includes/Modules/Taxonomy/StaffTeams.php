<?php

namespace JCC\FndSESF\Modules\Taxonomy;

class StaffTeams {

	/**
	 * The StaffTeams Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'registerTaxonomy' ), 0 );
	}

	/**
	 * Method that returns the taxonomy labels.
	 *
	 * @return array an array of labels.
	 */
	public function getLabels() {

		$labels = array(
			'name'                       => _x( 'Teams', 'Taxonomy General Name', 'jcc-fnd-sesf' ),
			'singular_name'              => _x( 'Team', 'Taxonomy Singular Name', 'jcc-fnd-sesf' ),
			'menu_name'                  => __( 'Teams', 'jcc-fnd-sesf' ),
			'all_items'                  => __( 'All Items', 'jcc-fnd-sesf' ),
			'parent_item'                => __( 'Parent Item', 'jcc-fnd-sesf' ),
			'parent_item_colon'          => __( 'Parent Item:', 'jcc-fnd-sesf' ),
			'new_item_name'              => __( 'New Item Name', 'jcc-fnd-sesf' ),
			'add_new_item'               => __( 'Add New Item', 'jcc-fnd-sesf' ),
			'edit_item'                  => __( 'Edit Item', 'jcc-fnd-sesf' ),
			'update_item'                => __( 'Update Item', 'jcc-fnd-sesf' ),
			'view_item'                  => __( 'View Item', 'jcc-fnd-sesf' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'jcc-fnd-sesf' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'jcc-fnd-sesf' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'jcc-fnd-sesf' ),
			'popular_items'              => __( 'Popular Items', 'jcc-fnd-sesf' ),
			'search_items'               => __( 'Search Items', 'jcc-fnd-sesf' ),
			'not_found'                  => __( 'Not Found', 'jcc-fnd-sesf' ),
			'no_terms'                   => __( 'No items', 'jcc-fnd-sesf' ),
			'items_list'                 => __( 'Items list', 'jcc-fnd-sesf' ),
			'items_list_navigation'      => __( 'Items list navigation', 'jcc-fnd-sesf' ),
		);

		return $labels;
	}

	/**
	 * Method that returns the taxonomy arguments.
	 *
	 * @return array an array of arguments.
	 */
	public function getArgs() {

		$labels = $this->getLabels();

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'show_in_rest'               => true,
			'rest_base'                  => 'staff-teams-api',
			'rest_controller_class'      => 'WPRESTStaffTeamsController',
		);

		return $args;
	}

	/**
	 * Method that registers the taxonomy.
	 */
	public function registerTaxonomy() {

		$args = $this->getArgs();

		register_taxonomy( 'staff-team', array( 'staff' ), $args );
	}
}
