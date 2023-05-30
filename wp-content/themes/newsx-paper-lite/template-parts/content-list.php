<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NewsX Paper Lite
 */
$newsx_paper_lite_categories = get_the_category();
if ($newsx_paper_lite_categories) {
	$newsx_paper_lite_category = $newsx_paper_lite_categories[mt_rand(0, count($newsx_paper_lite_categories) - 1)];
} else {
	$newsx_paper_lite_category = '';
}
if (has_post_thumbnail()) {
	$newsx_paper_lite_imgclass = 'nx-has-img';
} else {
	$newsx_paper_lite_imgclass = 'nx-no-img';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('nx-list-item'); ?>>
	<div class="single-nx-list-item  <?php echo esc_attr($newsx_paper_lite_imgclass); ?> nx-shadow">
		<?php if (has_post_thumbnail()) : ?>
			<div class="nx-single-list-img">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('medium_large'); ?>
				</a>
			</div>
		<?php endif; ?>
		<div class="nx-single-list-details">
			<?php if ($newsx_paper_lite_category) : ?>
				<a href="<?php echo esc_url(get_category_link($newsx_paper_lite_category)); ?>" class="nx-list-categories"><?php echo esc_html($newsx_paper_lite_category->name); ?></a>
			<?php endif; ?>
			<?php the_title('<h2 class="nx-list-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
			<?php the_excerpt(); ?>
			<a class="newsx-paper-lite-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE', 'newsx-paper-lite'); ?> <i class="fas fa-long-arrow-alt-right"></i></a>

		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->