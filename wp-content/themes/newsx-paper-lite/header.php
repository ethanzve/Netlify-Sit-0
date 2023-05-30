<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NewsX Paper Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'newsx-paper-lite'); ?></a>
		<header class="header" id="header">
			<?php do_action('newsx_paper_lite_mobile_menu'); ?>
			<?php
			$newsx_paper_lite_header_latestbar = get_theme_mod('newsx_paper_lite_header_top', 1);
			?>

			<?php do_action('newsx_paper_lite_header_logo'); ?>
			<?php do_action('newsx_paper_lite_main_menu'); ?>
			<?php
			if ($newsx_paper_lite_header_latestbar) {
				do_action('newsx_paper_lite_header_latestbar');
			}

			?>
		</header>