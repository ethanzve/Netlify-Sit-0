<?php

/**
 * The file for header all actions
 *
 *
 * @package NewsX Paper Lite
 */

function newsx_paper_lite_header_latestbar_output()
{
	$newsx_paper_lite_latest_news = get_theme_mod('newsx_paper_lite_latest_news', 1);
	$newsx_paper_lite_date_show = get_theme_mod('newsx_paper_lite_date_show', 1);
	if ($newsx_paper_lite_latest_news && $newsx_paper_lite_date_show) {
		$newsx_paper_lite_break_col = '10';
		$newsx_paper_lite_date_col = '2';
	} elseif ($newsx_paper_lite_latest_news) {
		$newsx_paper_lite_break_col = '12';
		$newsx_paper_lite_date_col = ' ';
	} elseif ($newsx_paper_lite_date_show) {
		$newsx_paper_lite_break_col = ' ';
		$newsx_paper_lite_date_col = '12';
	}
?>
	<div class="header-top">
		<div class="container">
			<div class="header-top-all-items">
				<div class="row">
					<?php if ($newsx_paper_lite_latest_news) : ?>
						<div class="col-lg-<?php echo esc_attr($newsx_paper_lite_break_col); ?>">
							<div class="breaking-news">
								<div class="breaking-news-title">
									<h5 class="breaking-title"><?php esc_html_e('BREAKING NEWS', 'newsx-paper-lite'); ?></h5>
								</div>
								<div class="news-update ticker news-noload">
									<?php
									$news_update_args = array(
										'post_type'  		=>	'post',
										'post_status'  		=>	'publish',
										'posts_per_page' 	=> 5,
										'ignore_sticky_posts' 	    =>	1,
									);
									$news_update_loop = new WP_Query($news_update_args);
									while ($news_update_loop->have_posts()) :  $news_update_loop->the_post(); ?>
										<div> <?php the_title(); ?>&nbsp; | &nbsp;</div>
									<?php endwhile;
									wp_reset_postdata(); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($newsx_paper_lite_date_show) : ?>
						<div class="col-lg-<?php echo esc_attr($newsx_paper_lite_date_col); ?> ml-auto">
							<div class="web-date d-flex">
								<i class="far fa-calendar-check"></i>
								<p><?php echo date(get_option('date_format')); ?></p>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php
}
add_action('newsx_paper_lite_header_latestbar', 'newsx_paper_lite_header_latestbar_output');

function newsx_paper_lite_header_logo_output()
{
	$newsx_paper_lite_search_show = get_theme_mod('newsx_paper_lite_search_show', 1);
	$newsx_paper_lite_header_social_show = get_theme_mod('newsx_paper_lite_header_social_show');
	$newsx_paper_lite_hfacebook_link = get_theme_mod('newsx_paper_lite_hfacebook_link');
	$newsx_paper_lite_htwitter_link = get_theme_mod('newsx_paper_lite_htwitter_link');
	$newsx_paper_lite_hlinkedin_link = get_theme_mod('newsx_paper_lite_hlinkedin_link');
	$newsx_paper_lite_hyoutube_link = get_theme_mod('newsx_paper_lite_hyoutube_link');
	$newsx_paper_lite_hpinterest_link = get_theme_mod('newsx_paper_lite_hpinterest_link');
	$newsx_paper_lite_hinstagram_link = get_theme_mod('newsx_paper_lite_hinstagram_link');

	if ($newsx_paper_lite_search_show && $newsx_paper_lite_header_social_show) {
		$newsx_paper_lite_logo_col = '4';
		$newsx_paper_lite_search_col = '5';
		$newsx_paper_lite_social_col = '3';
	} elseif ($newsx_paper_lite_header_social_show) {
		$newsx_paper_lite_logo_col = '8';
		$newsx_paper_lite_search_col = ' ';
		$newsx_paper_lite_social_col = '4';
	} elseif ($newsx_paper_lite_search_show) {
		$newsx_paper_lite_logo_col = '7';
		$newsx_paper_lite_search_col = '5';
		$newsx_paper_lite_social_col = ' ';
	} else {
		$newsx_paper_lite_logo_col = '12';
		$newsx_paper_lite_search_col = ' ';
		$newsx_paper_lite_social_col = ' ';
	}

?>
	<div class="header-middle">
		<div class="container">
			<div class="header-middle-all-content">
				<div class="row">
					<div class="col-lg-<?php echo esc_attr($newsx_paper_lite_logo_col); ?>">
						<div class="head-logo-sec">
							<?php if (has_custom_logo()) : ?>
								<div class="site-branding brand-logo">
									<?php the_custom_logo(); ?>
								</div>
							<?php endif; ?>
							<?php
							if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
								<div class="site-branding brand-text">
									<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
										<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
										<?php
										$newsx_paper_lite_description = get_bloginfo('description', 'display');
										if ($newsx_paper_lite_description || is_customize_preview()) :
										?>
											<p class="site-description"><?php echo $newsx_paper_lite_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																		?></p>
										<?php endif; ?>
									<?php endif; ?>

								</div><!-- .site-branding -->
							<?php endif; ?>
						</div>
					</div>
					<?php if ($newsx_paper_lite_search_show) : ?>
						<div class="col-lg-<?php echo esc_attr($newsx_paper_lite_search_col); ?>">
							<div class="npaper search-box">
								<?php echo get_search_form(); ?>

							</div>
						</div>
					<?php endif; ?>
					<?php if ($newsx_paper_lite_header_social_show) : ?>
						<div class="col-lg-<?php echo esc_attr($newsx_paper_lite_social_col); ?>">
							<div class="header-links">
								<div class="social-links">
									<?php if ($newsx_paper_lite_hfacebook_link) : ?>
										<a href="<?php echo esc_url($newsx_paper_lite_hfacebook_link); ?>"><i class="fab fa-facebook-f"></i></a>
									<?php endif; ?>
									<?php if ($newsx_paper_lite_htwitter_link) : ?>
										<a href="<?php echo esc_url($newsx_paper_lite_htwitter_link); ?>"><i class="fab fa-twitter"></i></a>
									<?php endif; ?>
									<?php if ($newsx_paper_lite_hlinkedin_link) : ?>
										<a href="<?php echo esc_url($newsx_paper_lite_hlinkedin_link); ?>"><i class="fab fa-linkedin-in"></i></a>
									<?php endif; ?>
									<?php if ($newsx_paper_lite_hyoutube_link) : ?>
										<a href="<?php echo esc_url($newsx_paper_lite_hyoutube_link); ?>"><i class="fab fa-youtube"></i></a>
									<?php endif; ?>
									<?php if ($newsx_paper_lite_hpinterest_link) : ?>
										<a href="<?php echo esc_url($newsx_paper_lite_hpinterest_link); ?>"><i class="fab fa-pinterest"></i></a>
									<?php endif; ?>
									<?php if ($newsx_paper_lite_hinstagram_link) : ?>
										<a href="<?php echo esc_url($newsx_paper_lite_hinstagram_link); ?>"><i class="fab fa-instagram"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php
}
add_action('newsx_paper_lite_header_logo', 'newsx_paper_lite_header_logo_output');

// newsxpaper mene style
function newsx_paper_lite_main_menu_output()
{
	$newsx_paper_lite_main_menu_position = get_theme_mod('newsx_paper_lite_main_menu_position', 'left')
?>
	<div class="menu-bar text-<?php echo esc_attr($newsx_paper_lite_main_menu_position); ?>">
		<div class="container">
			<div class="newsx-paper-lite-container menu-inner">
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'newsx-paper-lite-menu',
						'menu_class'        => 'newsx-paper-lite-menu',
					));
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</div>

<?php
}
add_action('newsx_paper_lite_main_menu', 'newsx_paper_lite_main_menu_output');



// newsxpaper mene style
function newsx_paper_lite_mobile_menu_output()
{
?>
	<div class="mobile-menu-bar">
		<div class="container">
			<nav id="mobile-navigation" class="mobile-navigation">
				<button id="mmenu-btn" class="menu-btn" aria-expanded="false">
					<span class="mopen"><?php esc_html_e('Menu', 'newsx-paper-lite'); ?></span>
					<span class="mclose"><?php esc_html_e('Close', 'newsx-paper-lite'); ?></span>
				</button>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'wsm-menu',
					'menu_class'        => 'wsm-menu',
				));
				?>
			</nav><!-- #site-navigation -->
		</div>
	</div>

<?php
}
add_action('newsx_paper_lite_mobile_menu', 'newsx_paper_lite_mobile_menu_output');
