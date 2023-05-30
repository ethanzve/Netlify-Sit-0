<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NewsX Paper Lite
 */
$newsx_paper_lite_blog_container = get_theme_mod('newsx_paper_lite_blog_container', 'container');
$newsx_paper_lite_blog_layout = get_theme_mod('newsx_paper_lite_blog_layout', 'rightside');
$newsx_paper_lite_blog_style = get_theme_mod('newsx_paper_lite_blog_style', 'list');

if (is_active_sidebar('sidebar-1') && $newsx_paper_lite_blog_layout != 'fullwidth') {
	$newsx_paper_lite_blog_column = 'col-lg-9';
} else {
	$newsx_paper_lite_blog_column = 'col-lg-12';
}
get_header();
?>

<div class="<?php echo esc_attr($newsx_paper_lite_blog_container); ?> mt-5 mb-5 pt-5 pb-5">
	<div class="row">
		<?php if (is_active_sidebar('sidebar-1') && $newsx_paper_lite_blog_layout == 'leftside') : ?>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($newsx_paper_lite_blog_column); ?>">
			<main id="primary" class="site-main">
				<?php
				$newsx_paper_lite_posts_mtitle = get_theme_mod('newsx_paper_lite_posts_mtitle');
				if (is_home() && ('post' === get_post_type()) && $newsx_paper_lite_posts_mtitle) :
				?>
					<h2 class="newsm-title"><?php echo esc_html($newsx_paper_lite_posts_mtitle); ?></h2>
				<?php endif; ?>

				<?php
				if (have_posts()) :

					if (is_home() && !is_front_page()) :
				?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php
					endif;
					if ($newsx_paper_lite_blog_style == 'grid') :
					?>
						<div class="row" data-masonry='{"percentPosition": true }'>

						<?php
					elseif ($newsx_paper_lite_blog_style == 'list') :
						?>
							<div class="row">
							<?php
						endif;
						/* Start the Loop */
						while (have_posts()) :
							the_post();

							/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
							get_template_part('template-parts/content', get_post_type());

						endwhile;

						if ($newsx_paper_lite_blog_style == 'grid' && $newsx_paper_lite_blog_style == 'list') :
							?>
							</div>
					<?php
						endif;
						the_posts_pagination();

					else :

						get_template_part('template-parts/content', 'none');

					endif;
					?>

			</main><!-- #main -->
		</div>
		<?php if (is_active_sidebar('sidebar-1') && $newsx_paper_lite_blog_layout == 'rightside') : ?>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
