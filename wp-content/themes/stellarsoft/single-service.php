<?php
/**
 * Single Service post template.
 */
get_header(); ?>


<?php
$post = get_post();
$post_id = get_the_ID();
$title = get_the_title();
$description = get_the_excerpt();
$image = get_the_post_thumbnail($post_id, 'full');
$button = get_field('button_intro', $post_id) ?? false;
$button_label = $button['title'] ?? 'Service';
$button_link = $button['url'] ?? '#';
$overlay_background = get_field('overlay_background', $post_id);

$args = [
	'post_id' => $post_id,
	'post_title' => $title,
	'post_description' => $description,
	'post_image' => $image,
	'post_button' => ['text' => $button_label, 'link' => $button_link],
	'post_link' => '#',
	'post_breadcrumbs' => (function_exists('yoast_breadcrumb')
		? yoast_breadcrumb('<div class="breadcrumbs" id="breadcrumbs">', '</div>', false) : null),
	'post_overlay_color' => $overlay_background,
	'css_class' => 'single-service',
];

//Include case intro banner section.
get_template_part('template-parts/case-intro', 'post', $args);

the_content();


get_footer();
