<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package stellarsoft
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function stellarsoft_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

add_filter('body_class', 'stellarsoft_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function stellarsoft_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}

add_action('wp_head', 'stellarsoft_pingback_header');


/**
 * Replace all macros entries in the string:
 */

function stellarsoft_prepare_macros($str)
{
	return str_replace(
		array('((', '))'),
		array('<span>', '</span>'),
		$str
	);
}

function stellarsoft_allow_html_in_title($title)
{
	$title = stellarsoft_prepare_macros($title);
	return $title;
}

add_filter('the_title', 'stellarsoft_allow_html_in_title', 10, 2);
add_filter('the_title', 'stellarsoft_allow_html_in_title', 10, 2);
add_filter('the_content', 'stellarsoft_allow_html_in_title', 10, 2);

function stellarsoft_filter_title_parts($title)
{
	$title['title'] = str_replace('((', '', $title['title']);
	$title['title'] = str_replace('))', '', $title['title']);
	return $title;
}

add_filter('document_title_parts', 'stellarsoft_filter_title_parts');


/**
 * Add year shortcode
 */

function stellarsoft_show_current_year()
{
	return date('Y');
}

add_shortcode('current_year', 'stellarsoft_show_current_year');


/**
 * Clear default wp blocks css classes.
 * Find and replace css class.
 */
function stellarsoft_block_content_filter($content): string
{
	$replacements = [
		'wp-block-heading' => 'post-content__title',
		'wp-block-table' => 'post-table',
		'has-fixed-layout' => 'post-table__item',
		'wp-block-list' => 'post-content__list',
		'wp-block-image' => 'post-content__image'
	];


	foreach ($replacements as $search => $replace) {
		$content = str_replace($search, $replace, $content);
	}

	$content = preg_replace('/<!--\s*\/?wp:.*?-->/', '', $content);

	return $content;
}


//Yoast Breadcrumbs
function custom_add_post_type_to_breadcrumbs($links)
{
	$remove_parent_category = get_field('remove_parent_category');
	if (count($links) <= 1) {
		return $links;
	}

	$breadcrumb_configs = [
		'post' => ['name' => 'Blog', 'url' => '/blog/'],
		'industry' => ['name' => 'Industries', 'url' => '/industries/'],
		'service' => ['name' => 'Services', 'url' => '/services/'],
		'case' => ['name' => 'Case Studies', 'url' => '/case-studies/'],
		'technology' => ['name' => 'Technologies', 'url' => '/technologies/'],
		'vacancy' => ['name' => 'Careers', 'url' => '/careers/'],
		'review' => ['name' => 'Reviews', 'url' => ''],
		'author' => ['name' => 'Blog', 'url' => '/blog/']
	];

	if (is_singular() && !is_front_page()) {
		$post_type = get_post_type();
		if (!$post_type || $post_type === 'page') {
			return $links;
		}

		$post_type_obj = get_post_type_object($post_type);
		$default_name = $post_type_obj ? $post_type_obj->labels->singular_name : $post_type;
		$config = $breadcrumb_configs[$post_type] ?? ['name' => $default_name, 'url' => ''];

		if ($remove_parent_category):
			$post_type_breadcrumb = null;
		else:
			$post_type_breadcrumb = [
				'text' => $config['name'],
				'url' => $config['url'],
				'allow_html' => true,
			];
		endif;

		array_splice($links, 1, 0, [$post_type_breadcrumb]);
		error_log('Breadcrumb added for post type: ' . $post_type);
	} elseif (is_author()) {
		$config = $breadcrumb_configs['author'];
		$author_breadcrumb = [
			'text' => $config['name'],
			'url' => $config['url'],
			'allow_html' => true,
		];
		array_splice($links, 1, 0, [$author_breadcrumb]);

		$author = get_queried_object();
		if ($author instanceof WP_User) {
			$links[count($links) - 1] = [
				'text' => $author->display_name,
				'url' => '',
				'allow_html' => true,
			];
		}
		error_log('Breadcrumb added for author archive');
	}

	return $links;
}

add_filter('wpseo_breadcrumb_links', 'custom_add_post_type_to_breadcrumbs');

// Custom breadcrumbs color
function custom_breadcrumb_color_css()
{
	$breadcrumb_color = get_field('breadcrumbs_color');

	if ($breadcrumb_color) {
		$custom_css = ":root { --breadcrumbs-color: " . esc_attr($breadcrumb_color) . "; }";
		wp_add_inline_style('stellarsoft', $custom_css);
	}
}

add_action('wp_enqueue_scripts', 'custom_breadcrumb_color_css');


//Css class remove from body for single post.
add_filter('body_class', function ($classes) {
	$classes = array_diff($classes, ['single-post']);
	return $classes;
});

//Dumper
function dd(...$args)
{
	echo '<pre>';
	foreach ($args as $arg) {
		var_dump($arg);
	}
	echo '</pre>';
	die;
}
