<?php
/**
 * The main template file
 *
 * @package WPBase
 * @since 1.0.1
 */

get_header(); ?>
	<div class="container-fluid -column">
		<div class="grid-row">
			<div class="grid-column">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php get_footer();
