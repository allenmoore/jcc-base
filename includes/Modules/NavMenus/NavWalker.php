<?php

namespace JCC\FndSESF\Modules\NavMenus;

use \Walker_Nav_Menu;

class NavWalker extends Walker_Nav_Menu {

	public function display_element( $elem, &$childElems, $maxDepth, $depth = 0, $args, &$output ) {
		$id_field = $this->db_fields['id'];

		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = !empty( $childElems[$elem->$id_field] );
		}

		return parent::display_element( $elem, $childElems, $maxDepth, $depth, $args, $output );
	}

	/**
	 * Starts the list before the elements are added.
	 *
	 * @see   Walker_Nav_Menu::start_lvl()
	 *
	 * @param string $output
	 * @param int $depth
	 * @param array $args
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
		$classes = array(
			'sub-nav',
		);
		$classNames = implode( ' ', $classes );

		$output .= "\n" . $indent . '<ul class="' . $classNames . '" role="menu" aria-expanded="true" >' . "\n";
	}

	/**
	 * Start the element output.
	 *
	 * @see   Walker_Nav_Menu::start_el()
	 *
	 * @param string $output
	 * @param object $item
	 * @param int $depth
	 * @param array $args
	 * @param int $id
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		// Code indent
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

		// Add CSS classes based on depth
		$depthClasses = array(
			( $depth == 0 ? 'nav-item' : 'subnav-item' )
		);
		$depthClassNames = esc_attr( implode( ' ', $depthClasses ) );

		$ariaPopup = '';
		if ( $args->has_children ) {
			$ariaPopup = 'aria-haspopup="true"';
		}

		// Passes CSS classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classNames = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// Build the html structure
		$output .= $indent . '<li id="menu-item-' . intval( $item->ID ) . '" class="' . esc_attr( $depthClassNames ) . ' ' . esc_attr( $classNames ) . '" role="menuitem"' . $ariaPopup . '>';
		// Add attributes to links
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes .= ' class="' . ( $depth > 0 ? 'subnav-link' : 'nav-link' ) . '"';
		$attributes .= ' tabindex="' . ( $depth > 0 ? '-1' : '0' ) . '"';

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		// Build the html structure
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
