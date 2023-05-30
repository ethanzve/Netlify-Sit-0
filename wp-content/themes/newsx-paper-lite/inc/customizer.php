<?php

/**
 * NewsX Paper Lite Theme Customizer
 *
 * @package NewsX Paper Lite
 */

//calback functon for topbar header
if (!function_exists('newsx_paper_lite_header_top_calback')) :
	function newsx_paper_lite_header_top_calback()
	{
		if (get_theme_mod('newsx_paper_lite_header_top') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;

// adctive call back function for header social
if (!function_exists('newsx_paper_lite_header_social_callback')) :
	function newsx_paper_lite_header_social_callback()
	{
		if (get_theme_mod('newsx_paper_lite_header_social_show') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function newsx_paper_lite_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	//select sanitization function
	function newsx_paper_lite_sanitize_select($input, $setting)
	{
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control($setting->id)->choices;
		return (array_key_exists($input, $choices) ? $input : $setting->default);
	}

	$wp_customize->add_panel('newsx_paper_lite_settings', array(
		'priority'       => 50,
		'title'          => __('NewsX Paper Lite Theme settings', 'newsx-paper-lite'),
		'description'    => __('All NewsX Paper Lite theme settings', 'newsx-paper-lite'),
	));
	$wp_customize->add_section('newsx_paper_lite_header', array(
		'title' => __('NewsX Paper Lite Header Settings', 'newsx-paper-lite'),
		'capability'     => 'edit_theme_options',
		'description'     => __('NewsX Paper Lite theme header settings', 'newsx-paper-lite'),
		'panel'    => 'newsx_paper_lite_settings',

	));

	$wp_customize->add_setting('newsx_paper_lite_header_top', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_header_top', array(
		'label'      => __('Show Header Area Top?', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_header_top',
		'type'       => 'checkbox',
	));

	$wp_customize->add_setting('newsx_paper_lite_latest_news', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_latest_news', array(
		'label'      => __('Show Latest News Ticker?', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_latest_news',
		'type'       => 'checkbox',
		'active_callback' => 'newsx_paper_lite_header_top_calback',
	));
	$wp_customize->add_setting('newsx_paper_lite_date_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_date_show', array(
		'label'      => __('Date Show?', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_date_show',
		'type'       => 'checkbox',
		'active_callback' => 'newsx_paper_lite_header_top_calback',
	));

	$wp_customize->add_setting('newsx_paper_lite_search_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_search_show', array(
		'label'      => __('Show Header Search?', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_search_show',
		'type'       => 'checkbox',
	));
	$wp_customize->add_setting('newsx_paper_lite_header_social_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_header_social_show', array(
		'label'      => __('Show Header Social?', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_header_social_show',
		'type'       => 'checkbox',
	));
	// header social link start
	// Header facebook url
	$wp_customize->add_setting('newsx_paper_lite_hfacebook_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_hfacebook_link', array(
		'label'      => __('Header Facebook url', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_hfacebook_link',
		'type'       => 'url',
		'active_callback' => 'newsx_paper_lite_header_social_callback',
	));
	// Header twitter url
	$wp_customize->add_setting('newsx_paper_lite_htwitter_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_htwitter_link', array(
		'label'      => __('Header Twitter url', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_htwitter_link',
		'type'       => 'url',
		'active_callback' => 'newsx_paper_lite_header_social_callback',
	));
	// Header linkedin url
	$wp_customize->add_setting('newsx_paper_lite_hlinkedin_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_hlinkedin_link', array(
		'label'      => __('Header Linkedin url', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_hlinkedin_link',
		'type'       => 'url',
		'active_callback' => 'newsx_paper_lite_header_social_callback',
	));
	// Header linkedin url
	$wp_customize->add_setting('newsx_paper_lite_hyoutube_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_hyoutube_link', array(
		'label'      => __('Header Youtube url', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_hyoutube_link',
		'type'       => 'url',
		'active_callback' => 'newsx_paper_lite_header_social_callback',
	));
	// Header pinterest url
	$wp_customize->add_setting('newsx_paper_lite_hpinterest_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_hpinterest_link', array(
		'label'      => __('Header Pinterest url', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_hpinterest_link',
		'type'       => 'url',
		'active_callback' => 'newsx_paper_lite_header_social_callback',
	));
	// Header INSTAGRAM url
	$wp_customize->add_setting('newsx_paper_lite_hinstagram_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_hinstagram_link', array(
		'label'      => __('Header Instagram url', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_hinstagram_link',
		'type'       => 'url',
		'active_callback' => 'newsx_paper_lite_header_social_callback',
	));

	//Header social link end

	$wp_customize->add_setting('newsx_paper_lite_main_menu_position', array(
		'default'        => 'left',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newsx_paper_lite_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_main_menu_position', array(
		'label'      => __('Main Menu Position', 'newsx-paper-lite'),
		'description' => __('You can set the menu top of the page or under logo. ', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_header',
		'settings'   => 'newsx_paper_lite_main_menu_position',
		'type'       => 'select',
		'choices'    => array(
			'left' => __('Left', 'newsx-paper-lite'),
			'center' => __('Center', 'newsx-paper-lite'),
			'right' => __('Right', 'newsx-paper-lite'),
		),
	));

	//NewsBox PLus blog settings
	$wp_customize->add_section('newsx_paper_lite_blog', array(
		'title' => __('NewsX Paper Lite Blog Settings', 'newsx-paper-lite'),
		'capability'     => 'edit_theme_options',
		'description'     => __('NewsX Paper Lite theme blog settings', 'newsx-paper-lite'),
		'panel'    => 'newsx_paper_lite_settings',

	));
	$wp_customize->add_setting('newsx_paper_lite_blog_container', array(
		'default'        => 'container',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newsx_paper_lite_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_blog_container', array(
		'label'      => __('Container type', 'newsx-paper-lite'),
		'description' => __('You can set standard container or full width container. ', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_blog',
		'settings'   => 'newsx_paper_lite_blog_container',
		'type'       => 'select',
		'choices'    => array(
			'container' => __('Standard Container', 'newsx-paper-lite'),
			'container-fluid' => __('Full width Container', 'newsx-paper-lite'),
		),
	));
	$wp_customize->add_setting('newsx_paper_lite_posts_mtitle', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_posts_mtitle', array(
		'label'      => __('Posts Main Header', 'newsx-paper-lite'),
		'description' => __('Posts main title. Leave empty if you hide the title. ', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_blog',
		'settings'   => 'newsx_paper_lite_posts_mtitle',
		'type'       => 'text',
	));
	$wp_customize->add_setting('newsx_paper_lite_blog_layout', array(
		'default'        => 'rightside',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newsx_paper_lite_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_blog_layout', array(
		'label'      => __('Select Blog Layout', 'newsx-paper-lite'),
		'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_blog',
		'settings'   => 'newsx_paper_lite_blog_layout',
		'type'       => 'select',
		'choices'    => array(
			'rightside' => __('Right Sidebar', 'newsx-paper-lite'),
			'leftside' => __('Left Sidebar', 'newsx-paper-lite'),
			'fullwidth' => __('No Sidebar', 'newsx-paper-lite'),
		),
	));
	$wp_customize->add_setting('newsx_paper_lite_blog_style', array(
		'default'        => 'list',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newsx_paper_lite_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_blog_style', array(
		'label'      => __('Select Blog Style', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_blog',
		'settings'   => 'newsx_paper_lite_blog_style',
		'type'       => 'select',
		'choices'    => array(
			'grid' => __('Grid Style', 'newsx-paper-lite'),
			'list' => __('List Style', 'newsx-paper-lite'),
			'classic' => __('Classic Style', 'newsx-paper-lite'),
		),
	));
	//NewsX Paper Lite page settings
	$wp_customize->add_section('newsx_paper_lite_page', array(
		'title' => __('NewsX Paper Lite Page Settings', 'newsx-paper-lite'),
		'capability'     => 'edit_theme_options',
		'description'     => __('NewsX Paper Lite theme blog settings', 'newsx-paper-lite'),
		'panel'    => 'newsx_paper_lite_settings',

	));
	$wp_customize->add_setting('newsx_paper_lite_page_container', array(
		'default'        => 'container',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newsx_paper_lite_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_page_container', array(
		'label'      => __('Page Container type', 'newsx-paper-lite'),
		'description' => __('You can set standard container or full width container for page. ', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_page',
		'settings'   => 'newsx_paper_lite_page_container',
		'type'       => 'select',
		'choices'    => array(
			'container' => __('Standard Container', 'newsx-paper-lite'),
			'container-fluid' => __('Full width Container', 'newsx-paper-lite'),
		),
	));
	$wp_customize->add_setting('newsx_paper_lite_page_header', array(
		'default'        => 'show',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newsx_paper_lite_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newsx_paper_lite_page_header', array(
		'label'      => __('Show Page header', 'newsx-paper-lite'),
		'section'    => 'newsx_paper_lite_page',
		'settings'   => 'newsx_paper_lite_page_header',
		'type'       => 'select',
		'choices'    => array(
			'show' => __('Show all pages', 'newsx-paper-lite'),
			'hide-home' => __('Hide Only Front Page', 'newsx-paper-lite'),
			'hide' => __('Hide All Pages', 'newsx-paper-lite'),
		),
	));




	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'newsx_paper_lite_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'newsx_paper_lite_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'newsx_paper_lite_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newsx_paper_lite_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newsx_paper_lite_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsx_paper_lite_customize_preview_js()
{
	wp_enqueue_script('newsx-paper-lite-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), NEWSXPAPER_VERSION, true);
}
add_action('customize_preview_init', 'newsx_paper_lite_customize_preview_js');
