<?php
/**
 * The main template file
 *
 * @package JCC\FndSESF
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
