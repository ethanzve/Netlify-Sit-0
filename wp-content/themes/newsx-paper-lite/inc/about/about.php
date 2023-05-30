<?php

/**
 * About setup
 *
 * @package NewsX Paper
 */

require_once trailingslashit(get_template_directory()) . 'inc/about/class.about.php';

if (!function_exists('newsx_paper_lite_about_setup')) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function newsx_paper_lite_about_setup()
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');
		$xtheme_domain = $theme->get('TextDomain');
		if ($xtheme_domain == 'x-magazine') {
			$theme_slug = $xtheme_domain;
		} else {
			$theme_slug = 'newsx-paper-lite';
		}



		$config = array(
			// Menu name under Appearance.
			'menu_name'               => sprintf(esc_html__('%s Info', 'newsx-paper-lite'), $xtheme_name),
			// Page title.
			'page_name'               => sprintf(esc_html__('%s Info', 'newsx-paper-lite'), $xtheme_name),
			/* translators: Main welcome title */
			'welcome_title'         => sprintf(esc_html__('Welcome to %s! - Version ', 'newsx-paper-lite'), $theme['Name']),
			// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf(esc_html__('%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'newsx-paper-lite'), $theme['Name']),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__('Getting Started', 'newsx-paper-lite'),
				'recommended_actions' => esc_html__('Recommended Actions', 'newsx-paper-lite'),
				'useful_plugins'  => esc_html__('Useful Plugins', 'newsx-paper-lite'),
				'free_pro'  => esc_html__('Free Vs Pro', 'newsx-paper-lite'),
			),

			// Quick links.
			'quick_links' => array(
				'xmagazine_url' => array(
					'text'   => esc_html__('UPGRADE NewsX Paper PRO', 'newsx-paper-lite'),
					'url'    => 'https://wpthemespace.com/product/newsx-paper-pro/?add-to-cart=6534',
					'button' => 'danger',
				),

				'update_url' => array(
					'text'   => esc_html__('NewsX Paper PRO Video', 'newsx-paper-lite'),
					'url'    => 'https://www.youtube.com/watch?v=dEFBLfCbBbg',
					'button' => 'danger',
				),

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__('Demo Content', 'newsx-paper-lite'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'newsx-paper-lite'), esc_html__('One Click Demo Import', 'newsx-paper-lite')),
					'button_text' => esc_html__('UPGRADE For  Demo Content', 'newsx-paper-lite'),
					'button_url'  => 'https://wpthemespace.com/product/newsx-paper-pro/?add-to-cart=6534',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),

				'two' => array(
					'title'       => esc_html__('Theme Options', 'newsx-paper-lite'),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'newsx-paper-lite'),
					'button_text' => esc_html__('Customize', 'newsx-paper-lite'),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
				),
				'three' => array(
					'title'       => esc_html__('Show Video', 'newsx-paper-lite'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('You may show NewsX Paper short video for better understanding', 'newsx-paper-lite'), esc_html__('One Click Demo Import', 'newsx-paper-lite')),
					'button_text' => esc_html__('Show video', 'newsx-paper-lite'),
					'button_url'  => 'https://www.youtube.com/watch?v=dEFBLfCbBbg',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'five' => array(
					'title'       => esc_html__('Set Widgets', 'newsx-paper-lite'),
					'icon'        => 'dashicons dashicons-tagcloud',
					'description' => esc_html__('Set widgets in your sidebar, Offcanvas as well as footer.', 'newsx-paper-lite'),
					'button_text' => esc_html__('Add Widgets', 'newsx-paper-lite'),
					'button_url'  => admin_url() . '/widgets.php',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__('Theme Preview', 'newsx-paper-lite'),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__('You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'newsx-paper-lite'),
					'button_text' => esc_html__('View Demo', 'newsx-paper-lite'),
					'button_url'  => 'https://px.wpteamx.com/demos',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'seven' => array(
					'title'       => esc_html__('Contact Support', 'newsx-paper-lite'),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__('Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'newsx-paper-lite'),
					'button_text' => esc_html__('Contact Support', 'newsx-paper-lite'),
					'button_url'  => 'https://wpthemespace.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
			),

			'useful_plugins'        => array(
				'description' => esc_html__('Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'newsx-paper-lite'),
				'already_activated_message' => esc_html__('Already activated', 'newsx-paper-lite'),
				'version_label' => esc_html__('Version: ', 'newsx-paper-lite'),
				'install_label' => esc_html__('Install and Activate', 'newsx-paper-lite'),
				'activate_label' => esc_html__('Activate', 'newsx-paper-lite'),
				'deactivate_label' => esc_html__('Deactivate', 'newsx-paper-lite'),
				'content'                   => array(
					array(
						'slug' => 'magical-addons-for-elementor',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-products-display'
					),
					array(
						'slug' => 'magical-posts-display'
					),
					array(
						'slug' => 'click-to-top'
					),
					array(
						'slug' => 'gallery-box',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-blocks'
					),
					array(
						'slug' => 'easy-share-solution',
						'icon' => 'svg',
					),
					array(
						'slug' => 'wp-edit-password-protected',
						'icon' => 'svg',
					),
				),
			),
			// Required actions array.
			'recommended_actions'        => array(
				'install_label' => esc_html__('Install and Activate', 'newsx-paper-lite'),
				'activate_label' => esc_html__('Activate', 'newsx-paper-lite'),
				'deactivate_label' => esc_html__('Deactivate', 'newsx-paper-lite'),
				'content'            => array(
					'magical-blocks' => array(
						'title'       => __('Magical Posts Display', 'newsx-paper-lite'),
						'description' => __('Now you can add or update your site elements very easily by Magical Products Display. Supercharge your Elementor block with highly customizable Magical Blocks For WooCommerce.', 'newsx-paper-lite'),
						'plugin_slug' => 'magical-products-display',
						'id' => 'magical-posts-display'
					),
					'go-pro' => array(
						'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/newsx-paper-pro/?add-to-cart=6534">' . __('UPGRADE NewsX Paper PRO', 'newsx-paper-lite') . '</a>',
						'description' => __('You will get more frequent updates and quicker support with the Pro version.', 'newsx-paper-lite'),
						//'plugin_slug' => 'x-instafeed',
						'id' => 'go-pro'
					),

				),
			),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name . __(' Pro', 'newsx-paper-lite'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/newsx-paper-pro/',
				/* translators: View link */
				'get_pro_theme_label' => sprintf(__('Get %s', 'newsx-paper-lite'), 'NewsX Paper Pro'),
				'features'            => array(
					array(
						'title'       => esc_html__('Daring Design for Devoted Readers', 'newsx-paper-lite'),
						'description' => esc_html__('NewsX Paper\'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'newsx-paper-lite'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Mobile-Ready For All Devices', 'newsx-paper-lite'),
						'description' => esc_html__('NewsX Paper makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'newsx-paper-lite'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Home slider', 'newsx-paper-lite'),
						'description' => esc_html__('NewsX Paper gives you extra slider feature. You can create awesome home slider in this theme.', 'newsx-paper-lite'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Widgetized Sidebars To Keep Attention', 'newsx-paper-lite'),
						'description' => esc_html__('NewsX Paper comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'newsx-paper-lite'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Auto Set-up Feature', 'newsx-paper-lite'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'newsx-paper-lite'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Multiple Header Layout', 'newsx-paper-lite'),
						'description' => esc_html__('NewsX Paper gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'newsx-paper-lite'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('One Click Demo install', 'newsx-paper-lite'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'newsx-paper-lite'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Extra Drag and drop support', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advanced News Filter', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('News/posts Carousel', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Diffrent Style Blog', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Flexible Home Page Design', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Pro Service Section', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Animation Home Text', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Customizer Options', 'newsx-paper-lite'),
						'description' => esc_html__('Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Pagination', 'newsx-paper-lite'),
						'description' => esc_html__('Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.', 'newsx-paper-lite'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),

					array(
						'title'       => esc_html__('Premium Support and Assistance', 'newsx-paper-lite'),
						'description' => esc_html__('We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('No Credit Footer Link', 'newsx-paper-lite'),
						'description' => esc_html__('You can easily remove the Theme: NewsX Paper by NewsX Paper copyright from the footer area and make the theme yours from start to finish.', 'newsx-paper-lite'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

		);

		newsx_paper_lite_About::init($config);
	}

endif;

add_action('after_setup_theme', 'newsx_paper_lite_about_setup');


//Admin notice 
function newsx_paper_lite_new_optins_texts()
{

	$hide_date = get_option('newsxpaper_lite_hide_date1');
	if (!empty($hide_date)) {
		$clickhide = round((time() - strtotime($hide_date)) / 24 / 60 / 60);
		if ($clickhide < 29) {
			return;
		}
	}

	$class = 'eye-notice notice notice-warning is-dismissible';
	$message = __('<strong> <span style="color:#014301"> Take your website to the next level with NewsX Paper Pro - the ultimate theme with premium features, customization options and more security that will help you to create a unique and stunning website. Now create your site like a pro with only a few clicks!!!!  So why late? Upgrade Pro </span>  </strong>', 'newsx-paper-lite');
	$url1 = esc_url('https://wpthemespace.com/product/newsx-paper-pro/?add-to-cart=6534');
	$url2 = esc_url('https://wpthemespace.com/product/newsx-paper-pro');

	printf('<div class="%1$s" style="padding:10px 15px 20px;"><p>%2$s</p><a target="_blank" class="button button-danger" href="%3$s" style="margin-right:10px">' . __('Upgrade Pro Now', 'newsx-paper-lite') . '</a><a target="_blank" class="button button-primary" href="%4$s" style="margin-right:10px">' . __('View Details', 'newsx-paper-lite') . '</a><button class="button button-info btnend" style="margin-left:10px">' . __('Dismiss the notice', 'newsx-paper-lite') . '</button></div>', esc_attr($class), wp_kses_post($message), $url1, $url2);
}
add_action('admin_notices', 'newsx_paper_lite_new_optins_texts');

function newsx_paper_lite_new_optins_texts_init()
{
	if (isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1) {
		delete_option('newsxpaper11');
		update_option('newsxpaper_lite_hide_date1', current_time('mysql'));
	}
}
add_action('init', 'newsx_paper_lite_new_optins_texts_init');
