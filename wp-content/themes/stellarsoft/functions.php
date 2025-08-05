<?php
/**
 * Stellarsoft functions
 *
 * @package Stellarsoft
 */

//Init session.
if (!session_id()) {
	session_start();
}


function prefix_remove_core_block_styles()
{
	global $wp_styles;

	foreach ($wp_styles->queue as $key => $handle) {
		if (strpos($handle, 'wp-block-') === 0) {
			wp_dequeue_style($handle);
		}
	}
}

add_action('wp_enqueue_scripts', 'prefix_remove_core_block_styles');


/**
 * Set up theme defaults and registers support for various WordPress feaures.
 */
add_action(
	'after_setup_theme',
	function () {
		load_theme_textdomain('stellarsoft', get_theme_file_uri('languages'));

		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);
		add_theme_support(
			'custom-background',
			apply_filters(
				'stellarsoft_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height' => 200,
				'width' => 50,
				'flex-width' => true,
				'flex-height' => true,
			)
		);

		register_nav_menus(
			array(
				'menu-primary' => __('Primary Menu', 'stellarsoft'),
			)
		);
	}
);
function add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
function add_menuclass($ulclass)
{
	return preg_replace('/<a(.*?)class="(.*?)"/', '<a$1class="$2 list__link js-burger-close js-link-to"', $ulclass);
}

add_filter('wp_nav_menu', 'add_menuclass');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action(
	'after_setup_theme',
	function () {
		$GLOBALS['content_width'] = apply_filters('stellarsoft_content_width', 960);
	},
	0
);

/**
 * Register widget area.
 */
add_action(
	'widgets_init',
	function () {
		$config_footer['before_title'] = '<div class="footer-link__title js-footer-accordion-title"><span class="middle-text">';
		$config_footer['after_title'] = '</span></div>';
		$config_footer['before_widget'] = '<div class="footer-links__col"><div class="widget js-footer-accordion footer-link %1$s %2$s js-footer-widget">';
		$config_footer['after_widget'] = '</div></div>';
		register_sidebar(
			array(
				'name' => __('Sidebar', 'stellarsoft'),
				'id' => 'sidebar-1',
				'description' => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>',
			)
		);
		register_sidebar([
				'name' => __('Footer', 'website'),
				'description' => __('This sidebar is located on the footer', 'stellarsoft'),
				'class' => '-footer sidebar',
				'id' => 'sidebar-footer',
				'widget_id' => 'js-accordion-footer-content'
			] + $config_footer);
	}
);

/**
 * Enqueue scripts and styles.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		//Url to current theme for JS.
		$theme_url = get_template_directory_uri();
		$home_url = home_url();
		$version = wp_get_theme()->get('Version');
		$google_tag_manager = get_field('google_tag_manager', 'option') ?? false;
		$script = $google_tag_manager['script'] ?? false;
		$noscript = $google_tag_manager['noscript'] ?? false;


		//Default styles and scripts.
		wp_enqueue_style('stellarsoft', get_theme_file_uri('assets/css/main.css'), array(), $version);
		wp_enqueue_script('stellarsoft', get_theme_file_uri('assets/js/main.js'), array(), $version, true);

		wp_localize_script('stellarsoft', 'themeData', array(
			'themeUrl' => $theme_url,
			'homeUrl' => $home_url,
			'ajaxUrl' => admin_url('admin-ajax.php'),
			//CSRF token
			'nonce' => wp_create_nonce('stellarsoft'),
			'gtm_head' => $script,
			'gtm_body' => $noscript,
		));

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
);
function ss_theme_style_admin()
{
	$screen = get_current_screen();
	if (is_admin() && function_exists('get_current_screen')) {
		if ($screen->is_block_editor) {
			wp_enqueue_style('stellarsoft', get_theme_file_uri('assets/css/main.css'), array(), null);
		}
	}
}

add_action('enqueue_block_editor_assets', 'ss_theme_style_admin', 100);


/**
 * All functions for site security.
 */
require_once get_template_directory() . '/inc/site-security.php';

/**
 * Theme color data.
 */

require_once get_template_directory() . '/inc/theme-color-switch.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/after-theme-setup.php';
require get_template_directory() . '/inc/svg-support.php';
require get_template_directory() . '/inc/block-widgets.php';

require_once get_stylesheet_directory() . '/inc/acf-blocks.php';

/**
 * Custom menu Walker Nav Stellar soft.
 */
require_once get_stylesheet_directory() . '/inc/class-stallar-soft-menu.php';


/**
 * Ajax View more button component and filter posts.
 */
require_once get_stylesheet_directory() . '/inc/ajax-view-more.php';
require_once get_stylesheet_directory() . '/inc/ajax-filter-posts.php';


/**
 * Ajax Cases post type controller.
 */
require_once get_stylesheet_directory() . '/inc/ajax-cases-posts.php';


/**
 * Ajax Search controller.
 */
require_once get_stylesheet_directory() . '/inc/ajax-search.php';


/**
 * Get current user ip.
 */
require_once get_stylesheet_directory() . '/inc/class-get-user-ip.php';


/**
 * Ajax Rating controller.
 */
require_once get_stylesheet_directory() . '/inc/ajax-rating.php';;


/**
 * Class Rating , for posts rate data.
 */
require_once get_stylesheet_directory() . '/inc/class-rating.php';

