<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NewsX Paper Lite
 */

$newsx_paper_lite_blog_style = get_theme_mod('newsx_paper_lite_blog_style', 'list');
if ($newsx_paper_lite_blog_style == 'grid') :
	get_template_part('template-parts/content', 'grid');
elseif ($newsx_paper_lite_blog_style == 'list') :
	get_template_part('template-parts/content', 'list');

else :
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="xpost-item shadow pb-5 mb-5">

			<?php newsx_paper_lite_post_thumbnail(); ?>
			<div class="xpost-text p-3">
				<div class="sncats mb-4">
					<?php
					newpaper_category_btn();
					?>
				</div>
				<header class="entry-header text-center pb-4">
					<?php
					if (is_singular()) :
						the_title('<h1 class="entry-title">', '</h1>');
					else :
						the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
					endif;

					if ('post' === get_post_type()) :
					?>
						<div class="entry-meta">
							<?php
							newsx_paper_lite_posted_on();
							newsx_paper_lite_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
					the_excerpt();
					?>
				</div><!-- .entry-content -->
				<footer class="tag-btns mt-5 mb-2">
					<?php newsx_paper_lite_tag_btn(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>