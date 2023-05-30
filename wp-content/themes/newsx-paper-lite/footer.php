<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NewsX Paper Lite
 */

?>

<footer id="colophon" class="site-footer pt-3 pb-3">
	<div class="container">
		<div class="site-info text-center">
			&copy;
			<?php
			echo date_i18n(
				/* translators: Copyright date format, see https://www.php.net/date */
				_x('Y', 'copyright date format', 'newsx-paper-lite')
			);
			?>
			<a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf(esc_html__('%1$s by %2$s.', 'newsx-paper-lite'), '<a href="https://wpthemespace.com/product/newsx-paper-lite/">NewsX Paper Lite Theme</a>', 'Wp Theme Space');
			?>

		</div><!-- .site-info -->
	</div><!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>