<?php
/**
 * Response to @ajax-view-more.js request.
 * View more button component.
 */

function get_ajax_view_more(): void
{

	$post_types = $_POST['post_types'] ? explode(' ', sanitize_text_field($_POST['post_types'])) : null;
	$slug = $_POST['slug'] ? sanitize_text_field($_POST['slug']) : null;
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
	$author_id = $_POST['author_id'] ? intval(sanitize_text_field($_POST['author_id'])) : false;
	$remaining_posts = 0;


	$args = [
		'post_type' => $post_types,
		'posts_per_page' => 6,
		'paged' => $paged,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'tax_query' => [
			[
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => $slug,
			],
		],
	];

	if ($author_id) {
		$args['author'] = $author_id;
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		ob_start();
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/loop-posts-blog-information');
		}
		$posts = ob_get_clean();

		$remaining_posts = $query->found_posts - ($paged * $args['posts_per_page']);
		$has_more_posts = $remaining_posts > 0;

		wp_reset_postdata();
	} else {
		$posts = false;
		$has_more_posts = false;
	}

	wp_send_json_success([
		'posts' => $posts,
		'has_more_posts' => $has_more_posts,
		'remaining_posts' => max($remaining_posts, 0)
	]);
}

add_action('wp_ajax_get_ajax_view_more', 'get_ajax_view_more');
add_action('wp_ajax_nopriv_get_ajax_view_more', 'get_ajax_view_more');
