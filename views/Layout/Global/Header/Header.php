<header id="js-site-header" class="site-header">
	<div class="container-fluid -between">
		<h1 class="site-logo">
			<?php
				$logoLocation = '-header';
				include( locate_template( 'views/Modules/Logo.php' ) );
			?>
		</h1>
		<?php get_template_part( 'views/Layout/Global/Navigation/Navigation' ); ?>
	</div>
</header>
