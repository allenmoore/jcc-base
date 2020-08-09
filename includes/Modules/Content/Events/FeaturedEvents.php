<?php

namespace JCC\FndSESF\Modules\Content\Events;

use \WP_Query;

class FeaturedEvents {

	/**
	 * Property declaring the post type to query.
	 *
	 * @var array an array of post types.
	 */
	static $postTypes = array( 'tribe_events' );

	/**
	 * Property declaring the posts per page to return.
	 *
	 * @var string the posts per page to return when the query executes.
	 */
	public $postsPerPage = '3';

	/**
	 * The FeaturedEvents constructor.
	 */
	public function __construct() {
		add_shortcode( 'coraleigh_featured_events', array( $this, 'renderView' ) );
	}

	/**
	 * Method to return a query of featured events.
	 *
	 * @return object \WP_Query the WP Query object.
	 */
	public function getQuery() {

		$args = array(
			'post_type'              => self::$postTypes,
			'posts_per_page'         => $this->postsPerPage,
			'cache_results'          => true,
			'update_post_meta_cache' => true,
			'update_post_term_cache' => true,
			'meta_query' => array(
				array(
					'key'   => '_tribe_featured',
					'value' => '1',
				)
			)
		);


		$query = new WP_Query( $args );

		return $query;
	}

	/**
	 * Method to get a single event.
	 *
	 * @param int $id the post ID of the event.
	 */
	public function getSingleEvent( $id ) {

		$eventImg = tribe_event_featured_image( $id, 'full', false, false );
		$city = tribe_get_city( $id );
		$state = tribe_get_state( $id );
		?>
		<article id="<?php echo esc_attr( 'post-' . $id ); ?>" <?php post_class( 'entry-article -featured'); ?>>
			<a class="entry-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ['before' => 'Permalink to: ', 'after' => ''] ); ?>">
				<header class="entry-header -featured" role="banner">
					<div class="entry-image -featured" style="background-image: url(<?php echo esc_url( $eventImg ); ?> );">
					</div>
					<?php the_title( '<h3 class="entry-title -featured">', '</h2>' ); ?>
					<div class="entry-meta -featured">
						<?php getEventDates( $id, 'featured' ); ?>

						<?php if ( $city && $state ) { ?>
							<div class="location-separator -featured">
								<?php esc_html_e( '|', 'jcc-fnd-sesf' ); ?>
							</div>
							<div class="event-location -featured">
								<?php echo sprintf( '%1$s, %2$s', esc_html( $city ), esc_html( $state ) ); ?>
							</div>
						<?php } ?>
					</div>
				</header>
				<section class="entry-content -featured">
					<?php the_excerpt(); ?>
				</section>
			</a>
			<footer class="entry-footer -featured" role="contentinfo">
				<a class="entry-link -featured" href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ['before' => 'Permalink to: ', 'after' => ''] ); ?>"><?php esc_html_e( 'Learn More', 'jcc-fnd-sesf' ); ?></a>
			</footer>

		</article>
		<?php
	}

	/**
	 * Method to loop through and return the queried featured events.
	 */
	public function getEvents() {

		$query = $this->getQuery();

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$eventId = get_the_ID();

				$this->getSingleEvent( $eventId );
			}
		} else { ?>
			<h4>No Featured Events</h4>
		<?php }

		wp_reset_query();
	}

	/**
	 * Method to render the featured events view.
	 */
	public function renderView() {

		ob_start();
		?>

		<div id="js-featured-events" class="featured-events">
			<header class="section-header -featured">
				<h2 class="section-title -featured"><?php esc_html_e( 'Featured Events', 'coraleigh' ); ?></h2>
			</header>
			<div class="section-content -featured">
				<?php $this->getEvents(); ?>
			</div>
		</div>

		<?php $output = ob_get_contents();

		ob_get_clean();

		return $output;
	}
}
