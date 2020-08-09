<?php

$navWalker = new \JCC\FndSESF\Modules\NavMenus\NavWalker();

$mainNav = array(
	'theme_location'  => 'primary-navigation',
	'menu'            => '',
	'container'       => '',
	'container_class' => 'main-navigation',
	'container_id'    => '',
	'menu_class'      => 'nav-list',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
	'depth'           => 0,
	'walker'          => $navWalker
);

wp_nav_menu( $mainNav );
?>
