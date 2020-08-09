<?php
/**
 * The template for displaying the header.
 *
 * @package JCC\FndSESF
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		
		<?php get_template_part( 'views/Layout/Global/Header/Header' ); ?>
		<?php get_template_part( 'views/Modules/Hero' ); ?>
		<main class="site-content" role="main">


