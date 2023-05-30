<?php

/**
 * NewsX Paper Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NewsX Paper Lite
 */


if (!defined('NEWSXPAPER_VERSION')) {
	$newsx_paper_lite_theme = wp_get_theme();
	define('NEWSXPAPER_VERSION', $newsx_paper_lite_theme->get('Version'));
}

if (!function_exists('newsx_paper_lite_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newsx_paper_lite_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on NewsX Paper Lite, use a find and replace
		 * to change 'newsx-paper-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('newsx-paper-lite', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Main Menu', 'newsx-paper-lite'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'newsx_paper_lite_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');
		add_theme_support("responsive-embeds");

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_editor_style(array(newsx_paper_lite_fonts_url()));

		$newsx_paperlite_install_date = get_option('newsx_paperlite_install_date');
		if (empty($newsx_paperlite_install_date)) {
			update_option('newsx_paperlite_install_date', current_time('mysql'));
		}
	}
endif;
add_action('after_setup_theme', 'newsx_paper_lite_setup');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newsx_paper_lite_content_width()
{
	$GLOBALS['content_width'] = apply_filters('newsx_paper_lite_content_width', 1170);
}
add_action('after_setup_theme', 'newsx_paper_lite_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newsx_paper_lite_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'newsx-paper-lite'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'newsx-paper-lite'),
			'before_widget' => '<section id="%1$s" class="widget bg-light mb-4 p-3 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'newsx_paper_lite_widgets_init');

/**
 * Register custom fonts.
 */
function newsx_paper_lite_fonts_url()
{
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'STIX Two Math:400,400i,700,700i';
	$font_families[] = 'Inter:400,400i,700,700i';

	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');


	return esc_url_raw($fonts_url);
}


/**
 * Enqueue scripts and styles.
 */
function newsx_paper_lite_scripts()
{
	wp_enqueue_style('newsx-paper-lite-google-font', newsx_paper_lite_fonts_url(), array(), null);
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.0.1', 'all');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.css', array(), '5.15.3');
	wp_enqueue_style('newsx-paper-lite-block-style', get_template_directory_uri() . '/assets/css/block.css', array(), NEWSXPAPER_VERSION);
	wp_enqueue_style('newsx-paper-lite-default-style', get_template_directory_uri() . '/assets/css/default-style.css', array(), NEWSXPAPER_VERSION);
	wp_enqueue_style('newsx-paper-lite-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), NEWSXPAPER_VERSION);
	wp_enqueue_style('newsx-paper-lite-style', get_stylesheet_uri(), array(), NEWSXPAPER_VERSION);
	wp_enqueue_style('newsx-paper-lite-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), NEWSXPAPER_VERSION);

	wp_enqueue_script('masonry');
	wp_enqueue_script('newsx-paper-lite-mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array(), NEWSXPAPER_VERSION, true);
	wp_enqueue_script('jquery.ticker', get_template_directory_uri() . '/assets/js/ticker.js', array('jquery'), '1.2.1', true);
	wp_enqueue_script('newsx-paper-lite-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), NEWSXPAPER_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'newsx_paper_lite_scripts');

function newsx_paper_lite_gb_block_style()
{

	wp_enqueue_style('newsx-paper-lite-gb-block', get_theme_file_uri('/assets/css/admin-block.css'), false, '1.0', 'all');
	wp_enqueue_style('newsx-paper-lite-admin-google-font', newsx_paper_lite_fonts_url(), array(), null);
}
add_action('enqueue_block_assets', 'newsx_paper_lite_gb_block_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/*
* Customizer pro info .
*/
require get_template_directory() . '/inc/info/class-customize.php';

if (is_admin()) {
	require_once trailingslashit(get_template_directory()) . 'inc/about/about.php';
}
/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load all actions file
require get_template_directory() . '/actions/header-actions.php';

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
add_filter('excerpt_more', '__return_empty_string', 999);

/**
 * Add tem plugin activation
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/recomended-plugin.php';
