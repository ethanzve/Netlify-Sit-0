<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NewsX Paper Lite
 */
$newsx_paper_lite_blog_layout = get_theme_mod('newsx_paper_lite_blog_layout', 'rightside');
if ($newsx_paper_lite_blog_layout == 'fullwidth' || !is_active_sidebar('sidebar-1')) {
	$newsx_paper_lite_grid = 4;
} else {
	$newsx_paper_lite_grid = 6;
}
$newsx_paper_lite_categories = get_the_category();
if ($newsx_paper_lite_categories) {
	$newsx_paper_lite_category = $newsx_paper_lite_categories[mt_rand(0, count($newsx_paper_lite_categories) - 1)];
} else {
	$newsx_paper_lite_category = '';
}
?>
<div class="col-lg-<?php echo esc_attr($newsx_paper_lite_grid); ?> grid-item mb-5">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="grid-item-post nx-shadow">
			<?php if (has_post_thumbnail()) : ?>
				<div class="grid-item-img">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
			<div class="grid-item-details">
				<?php if ($newsx_paper_lite_category) : ?>
					<a class="fashion-bototm-categories" href="<?php echo esc_url(get_category_link($newsx_paper_lite_category)); ?>"><?php echo esc_html($newsx_paper_lite_category->name); ?></a>
				<?php endif; ?>
				<?php the_title('<h2 class="grid-item-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
				<?php the_excerpt(); ?>
				<a class="grid-item-btn" href="<?php the_permalink(); ?>">
					<?php esc_html_e('Read More ', 'newsx-paper-lite'); ?>
				</a>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>