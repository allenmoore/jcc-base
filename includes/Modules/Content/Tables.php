<?php

namespace WPBase\Modules\Content;

/**
 * The Tables Class.
 *
 * @package WPBase\Modules\Content
 */
class Tables {

	/**
	 * The Tables Constructor.
	 */
	public function __construct() {
		add_filter( 'the_content', array( $this, 'filterTables' ) );
		add_filter( 'the_content', array( $this, 'filterTableHeaders' ) );
		add_filter( 'the_content', array( $this, 'filterTableBodies' ) );
		add_filter( 'the_content', array( $this, 'filterTableFooters' ) );
		add_filter( 'the_content', array( $this, 'filterTableCaptions') );
		add_filter( 'the_content', array( $this, 'filterTableRows' ) );
		add_filter( 'the_content', array( $this, 'filterCellHeaders' ) );
		add_filter( 'the_content', array( $this, 'filterCellDefs' ) );
	}

	/**
	 * Method to filter all tables in a post.
	 *
	 * @param string|string[] $content the content of the current post.
	 * @return string|string[] the filtered post content.
	 */
	public function filterTables( $content ) {
		
		$tables = $updated = array();
		
		if ( ! is_admin() && preg_match_all( '/<table>(.*?)<\/table>/s', $content, $tables ) ) {
			
			foreach ( $tables[0] as $oldTable ) {
				
				$hasClass = false !== stripos( $oldTable, 'class="data-table"' );
				
				if ( $hasClass || in_array( $oldTable, $updated ) ) {
					continue;
				}
				
				if ( empty( $replace ) ) {
					$table = '<table';
					$replace = '<table class="data-table"';
				}
				
				if ( ! empty( $table ) && ! empty( $replace ) ) {
					$newTable = str_replace( $table, $replace, $oldTable );
					$content = str_replace( $oldTable, $newTable, $content );
				}
				
				$updated[] = $oldTable;
			}
		}
		
		return $content;
	}

	/**
	 * Method to filter all table headers in a post.
	 *
	 * @param string|string[] $content the content of the current post.
	 * @return string|string[] the filtered post content.
	 */
	public function filterTableHeaders( $content ) {
		
		$headers = $updated = array();

		if ( ! is_admin() && preg_match_all( '/<thead>(.*?)<\/thead>/s', $content, $headers ) ) {

			foreach ( $headers[0] as $oldHeader ) {

				$hasClass = false !== stripos( $oldHeader, 'class="table-header"' );

				if ( $hasClass || in_array( $oldHeader, $updated ) ) {
					continue;
				}

				if ( empty( $replace ) ) {
					$header = '<thead';
					$replace = '<thead class="table-header"';
				}

				if ( ! empty( $header ) && ! empty( $replace ) ) {
					$newHeader = str_replace( $header, $replace, $oldHeader );
					$content = str_replace( $oldHeader, $newHeader, $content );
				}

				$updated[] = $oldHeader;
			}
		}

		return $content;
	}

	/**
	 * Method to filter all table bodies in a post.
	 *
	 * @param string|string[] $content the content of the current post.
	 * @return string|string[] the filtered post content.
	 */
	public function filterTableBodies( $content ) {

		$bodies = $updated = array();

		if ( ! is_admin() && preg_match_all( '/<tbody>(.*?)<\/tbody>/s', $content, $bodies ) ) {

			foreach ( $bodies[0] as $oldBody ) {

				$hasClass = false !== stripos( $oldBody, 'class="table-body"' );

				if ( $hasClass || in_array( $oldBody, $updated ) ) {
					continue;
				}

				if ( empty( $replace ) ) {
					$body = '<tbody';
					$replace = '<tbody class="table-body"';
				}

				if ( ! empty( $body ) && ! empty( $replace ) ) {
					$newBody = str_replace( $body, $replace, $oldBody );
					$content = str_replace( $oldBody, $newBody, $content );
				}

				$updated[] = $oldBody;
			}
		}

		return $content;
	}

	/**
	 * Method to filter all table footers in a post.
	 *
	 * @param string|string[] $content the content of the current post.
	 * @return string|string[] the filtered post content.
	 */
	public function filterTableFooters( $content ) {

		$footers = $updated = array();

		if ( ! is_admin() && preg_match_all( '/<tfoot>(.*?)<\/tfoot>/s', $content, $footers ) ) {

			foreach ( $footers[0] as $oldFooter ) {

				$hasClass = false !== stripos( $oldFooter, 'class="table-footer"' );

				if ( $hasClass || in_array( $oldFooter, $updated ) ) {
					continue;
				}

				if ( empty( $replace ) ) {
					$footer = '<tfoot';
					$replace = '<tfoot class="table-footer"';
				}

				if ( ! empty( $footer ) && ! empty( $replace ) ) {
					$newFooter = str_replace( $footer, $replace, $oldFooter );
					$content = str_replace( $oldFooter, $newFooter, $content );
				}

				$updated[] = $oldFooter;
			}
		}

		return $content;
	}

	/**
	 * Method to filter all table captions in a post.
	 *
	 * @param string|string[] $content the content of the current post.
	 * @return string|string[] the filtered post content.
	 */
	public function filterTableCaptions( $content ) {

		$captions = $updated = array();

		if ( ! is_admin() && preg_match_all( '/<caption>(.*?)<\/caption>/s', $content, $captions ) ) {

			foreach ( $captions[0] as $oldCaption ) {

				$hasClass = false !== stripos( $oldCaption, 'class="table-caption"' );

				if ( $hasClass || in_array( $oldCaption, $updated ) ) {
					continue;
				}

				if ( empty( $replace ) ) {
					$caption = '<caption';
					$replace = '<caption class="table-caption"';
				}

				if ( ! empty( $caption ) && ! empty( $replace ) ) {
					$newCaption = str_replace( $caption, $replace, $oldCaption );
					$content = str_replace( $oldCaption, $newCaption, $content );
				}

				$updated[] = $oldCaption;
			}
		}

		return $content;
	}

	/**
	 * Method to filter all table rows in a post.
	 *
	 * @param string|string[] $content the content of the current post.
	 * @return string|string[] the filtered post content.
	 */
	public function filterTableRows( $content ) {

		$rows = $updated = array();

		if ( ! is_admin() && preg_match_all( '/<tr>(.*?)<\/tr>/s', $content, $rows ) ) {

			foreach ( $rows[0] as $oldRow ) {

				$hasClass = false !== stripos( $oldRow, 'class="table-row"' );

				if ( $hasClass || in_array( $oldRow, $updated ) ) {
					continue;
				}

				if ( empty( $replace ) ) {
					$caption = '<tr';
					$replace = '<tr class="table-row"';
				}

				if ( ! empty( $caption ) && ! empty( $replace ) ) {
					$newRow = str_replace( $caption, $replace, $oldRow );
					$content = str_replace( $oldRow, $newRow, $content );
				}

				$updated[] = $oldRow;
			}
		}

		return $content;
	}

	/**
	 * Method to filter all table cell headers in a post.
	 *
	 * @param string|string[] $content the content of the current post.
	 * @return string|string[] the filtered post content.
	 */
	public function filterCellHeaders( $content ) {

		$headers = $updated = array();

		if ( ! is_admin() && preg_match_all( '/<th>(.*?)<\/th>/s', $content, $headers ) ) {

			foreach ( $headers[0] as $oldHeader ) {

				$hasClass = false !== stripos( $oldHeader, 'class="cell-header"' );

				if ( $hasClass || in_array( $oldHeader, $updated ) ) {
					continue;
				}

				if ( empty( $replace ) ) {
					$header = '<th';
					$replace = '<th class="cell-header"';
				}

				if ( ! empty( $header ) && ! empty( $replace ) ) {
					$newHeader = str_replace( $header, $replace, $oldHeader );
					$content = str_replace( $oldHeader, $newHeader, $content );
				}

				$updated[] = $oldHeader;
			}
		}

		return $content;
	}

	/**
	 * Method to filter all table cell definitions in a post.
	 *
	 * @param string|string[] $content the content of the current post.
	 * @return string|string[] the filtered post content.
	 */
	public function filterCellDefs( $content ) {

		$defs = $updated = array();

		if ( ! is_admin() && preg_match_all( '/<td>(.*?)<\/td>/s', $content, $defs ) ) {

			foreach ( $defs[0] as $oldDef ) {

				$hasClass = false !== stripos( $oldDef, 'class="cell-definition"' );

				if ( $hasClass || in_array( $oldDef, $updated ) ) {
					continue;
				}

				if ( empty( $replace ) ) {
					$def = '<td';
					$replace = '<td class="cell-definition"';
				}

				if ( ! empty( $def ) && ! empty( $replace ) ) {
					$newDef = str_replace( $def, $replace, $oldDef );
					$content = str_replace( $oldDef, $newDef, $content );
				}

				$updated[] = $oldDef;
			}
		}

		return $content;
	}
}
