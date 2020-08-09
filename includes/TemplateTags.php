<?php

/**
 * Function to load a template file and template data.
 *
 * @param string $__tmplFile the template file.
 * @param array  $__tmplData the template data.
 */
function getTemplateFile( $__tmplFile, array $__tmplData = [ ] ) {

	$__tmplFile = apply_filters(
		'jcc-fnd-sesf-template',
		JCC_FND_SESF_PATH . "views/$__tmplFile.php",
		$__tmplFile,
		$__tmplData
	);

	if ( $__tmplFile && file_exists( $__tmplFile ) ) {
		extract( $__tmplData, EXTR_SKIP );
		require $__tmplFile;
	}
}

/**
 * Function to render event dates.
 *
 * @param int $postId the post id.
 * @param string|null $classes css classes to append to each class.
 */
function getEventDates( $postId, $classes = null ) {

	if ( ! isset( $postId ) ) {
		return;
	}

	$startDate = tribe_get_start_date( $postId, true, 'F j' );
	$endDate = tribe_get_end_date( $postId, true, 'F j, Y' );
	$classes = ! is_null( $classes ) ? ' -' . $classes : ''; ?>

	<div class="<?php echo esc_attr( 'event-dates' . $classes ); ?>">

	<?php if ( true === tribe_event_is_multiday( $postId ) ) { ?>
			<div class="<?php echo esc_attr( 'event-date' . $classes ); ?>">
				<?php echo tribe_get_start_date( $postId, true, 'F j' ); ?>
			</div>
			<div class="<?php echo esc_attr( 'date-separator' . $classes ); ?>">
				<?php esc_html_e( '-', 'jcc-fnd-sesf' ); ?>
			</div>
			<div class="<?php echo esc_attr( 'event-date' . $classes ); ?>">
				<?php echo tribe_get_end_date( $postId, true, 'F j, Y' ); ?>
			</div>
	<?php } else { ?>
		<div class="<?php echo esc_attr( 'event-date' . $classes ); ?>">
			<?php echo tribe_get_start_date( $postId, true, 'F j, Y' ); ?>
		</div>
	<?php } ?>

	</div>
	<?php
}

/**
 * Function to render an event location.
 *
 * @param int $postId the post id.
 * @param string|null $classes css classes to append to each class.
 */
function getEventLocation( $postId, $classes = null ) {

	if ( ! isset( $postId ) ) {
		return;
	}

	$city = tribe_get_city( $postId );
	$classes = ! is_null( $classes ) ? ' -' . $classes : '';
	$state = tribe_get_state( $postId );

	if ( $city && $state ) { ?>
		<div class="<?php echo esc_attr( 'location-separator' . $classes ); ?>">
			<?php esc_html_e( '|', 'jcc-fnd-sesf' ); ?>
		</div>
		<div class="<?php echo esc_attr( 'event-location' . $classes ); ?>">
			<?php echo sprintf( '%1$s, %2$s', esc_html( $city ), esc_html( $state ) ); ?>
		</div>
	<?php }
}

/**
 * Function to render post comments.
 *
 * @param object $comment the comment object.
 * @param array $args the comment arguments.
 * @param int $depth the comment depth.
 */
function getComments( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );

	$approvedComment = $comment->comment_approved;
	$authorLink = get_comment_author_link();
	$avatarSize = $args['avatar_size'];
	$commentClass = comment_class( empty( $args['has_children'] ) ? '' : 'comment-parent' );
	$commentDate = get_comment_date();
	$commentDateRaw = get_comment_date( 'Y-m-d' );
	$commentId = comment_ID();
	$commentLink = get_comment_link( $commentId );
	$commentTime = get_comment_time();
	$commentTimeRaw = get_comment_time( 'H:iP' );
	$maxDepth = $args['max_depth'];
	$style = $args['style'];

	if ( 'div' === $style ) {
		$tag = 'div';
		$addBelow = 'comment';
	} else {
		$tag = 'li';
		$addBelow = 'div-comment';
	}

	echo sprintf( '<%1$s id="comment-%2$s" %3$s>', wp_kses_post( $tag ), esc_attr( $commentId ), wp_kses_post( $commentClass ) );

	if ( 'div' !== $args['style'] ) {
		echo sprintf( '<div id="comment-" class="comment-body">', esc_attr( $commentId ) );
	}

	if ( 0 !== $avatarSize ) { ?>
		<div class="author-thumb -comment">
			<?php echo wp_kses_post( get_avatar( $comment, $avatarSize ) ); ?>
		</div>
	<?php } ?>

	<div class="comment-block">

		<div class="comment-metadata" role="complementary">
			<div class="comment-author vcard">
				<?php echo sprintf( '<cite class="fn comment-author name">%s</cite>', wp_kses_post( $authorLink() ) ); ?>
			</div>
			<a href="<?php echo esc_url( $commentLink ); ?>" class="comment-link">
				<?php echo sprintf( '<time class="comment-date" datetime="%1$sT%2$s" itemprop="datePublished">%3$s at %4$s</time>', esc_attr( $commentDateRaw ), esc_attr( $commentTimeRaw ), esc_html( $commentDate ), esc_html( $commentTime ) ); ?>
			</a>
			<?php edit_comment_link( esc_html_e( 'Edit', 'jcc-fnd-sesf' ), '<span class="comment-edit"><i class="icon-edit"></i>', '</span>' ); ?>
			<?php if ( '0' === $approvedComment ) { ?>
				<p class="comment-status -pending"><?php esc_html_e( 'Your comment is awaiting moderation.', 'jcc-fnd-sesf' ); ?></p>
			<?php } ?>
		</div>

		<div class="comment-content" itemprop="text">
			<?php comment_text(); ?>
		</div>

		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $addBelow, 'depth' => $depth, 'max_depth' => $maxDepth ) ) ); ?>

	</div>

	<?php if ( 'div' !== $style ) { ?>
		</div>
	<?php }
}

/**
 * Function to render the author byline of a post.
 */
function getPostAuthor() {

	$author = get_the_author();
	$authorLink = get_author_posts_url( get_the_author_meta( 'ID' ) );

	?>
	<div class="entry-author" itemscope itemprop="author" itemtype="http://schema.org/Person"><?php esc_html_e( 'Published by ', 'jcc-fnd-sesf' ); ?>
		<span class="author-name" itemprop="name"><a itemprop="url" href="<?php echo esc_url( $authorLink ); ?>"><?php the_author(); ?></a></span>
	</div>
	<?php
}

/**
 * Function to render the time/date of a post.
 *
 * @param int $postId the ID of the post.
 */
function getPostDate( $postId ) {

	if ( ! isset( $postId ) ) {
		return;
	}

	$formattedTime = get_the_time( 'F j, Y', $postId );
	$time = get_the_time( '', $postId );

	echo sprintf( '<time class="entry-date" datetime="%1$s" itemprop="datePublished">Published on %2$s</time>', esc_attr( $time ), esc_html( $formattedTime ) );
}

/**
 * Function to render the first category associated with a post.
 *
 * @param int $postId the ID of the post.
 */
function getPostCategory( $postId ) {

	if ( ! isset( $postId ) ) {
		return;
	}

	if ( has_category() ) {
		$category = get_the_category( $postId );
		$categoryName = $category[0]->cat_name;
		$categoryId = get_cat_ID( $categoryName );
		$categoryLink = get_category_link( $categoryId );
		?>
		<div class="entry-category">
			<?php esc_html_e( ' in ', 'jcc-fnd-sesf' );
			echo sprintf( '<a href="%1$s" class="link" title="Permalink to: %2$s Archives">%2$s</a>', esc_url( $categoryLink ), esc_attr( $categoryName ) ); ?>
		</div>
	<?php }
}

/**
 * Function to render the comment count totals of a post.
 */
function getPostCommentCount() {

	$url = JCC_FND_SESF_URL;
	?>
	<div class="comment-count">
		<a href="<?php esc_url( comments_link() ); ?>" class="comment-link"><?php inline_svg( 'comment' ); ?><span class="comment-response"><?php comments_number( 'No Responses', '1 Response', '% Responses' ); ?></span></a>
	</div>
	<?php
}

/**
 * Function to get the title of an archive page.
 */
function getArchiveTitle() {

	$curCategory = single_cat_title( '', false );
	$curAuthor = ( get_query_var('author_name') ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
	$displayName = $curAuthor->display_name;
	$title = '';

	switch ( true ) {
		case is_category() :
			$title = sprintf( 'Browsing articles labeled "%1$s"', esc_html( $curCategory ) );
			break;
		case is_author() :
			$title = sprintf( 'Browsing articles by %1$s', esc_html( $displayName ) );
			break;
		case is_tag() :
			$title = sprintf( 'Browsing articles tagged "%1$s"', esc_html( single_tag_title() ) );
			break;
		default :
			$title = '';
	}

	echo $title;
}

/**
 * Function to get a staff member.
 *
 * @param int $id the post id.
 * @return void returns void if the $id argument is not set.
 */
function getStaffMember( $id ) {

	if ( ! isset( $id ) ) {
		return;
	}

	$givingUrl = get_post_meta( $id, 'staff_giving_url' )[0];
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'staff-headshot' )[0];
	$link = get_the_permalink( $id );
	$name = get_the_title( $id );
	$team = get_the_terms( $id, 'staff-team' );
	$title = get_post_meta( $id, 'staff_title' )[0];
	?>
	<div class="staff-member">
		<div class="staff-image">
			<img class="image" src="<?php echo esc_url( $image ); ?>">
		</div>
		<div class="staff-meta">
			<h3 class="staff-name"><a class="link" href="<?php echo esc_url( $link ); ?>" title="<?php echo esc_attr( 'Permalink to: Staff page of ' . $name ); ?>"><?php echo esc_html( $name ); ?></a></h3>
			<h4 class="staff-title"><?php echo esc_html( $title ); ?></h4>
		</div>
	</div>
	<?php
}

/**
 * Function to query staff members by team.
 *
 * @param string $term the term to query by.
 * @return void|\WP_Query returns void if the $term argument is not set or the WP_Query object.
 */
function getStaffQuery( $term ) {

	if ( ! isset( $term ) ) {
		return;
	}

	$args = array(
		'post_type'      => 'staff',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'tax_query'      => array(
			array(
				'taxonomy' => 'staff-team',
				'field'    => 'slug',
				'terms'    => $term,
			)
		)
	);

	$query = new WP_Query( $args );

	return $query;
}

/**
 * Function to get all staff members by team.
 *
 * @param string $term the term to query by.
 * @return void returns void if the $term argument is not set.
 */
function getAllStaffByTeam( $term ) {

	if ( ! isset( $term ) ) {
		return;
	}

	$query = getStaffQuery( $term );

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			$postId = get_the_ID();
			getStaffMember( $postId );
		endwhile;
	endif;
}
