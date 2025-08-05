<?php
/**
 * Response to @ajax-filter-posts.js request.
 */

function get_ajax_filter_posts(): void
{

	if (!isset($_POST['term_id']) || empty($_POST['slug']) || empty($_POST['post_types'])) {
		return;
	}

	$term_id = intval(sanitize_text_field($_POST["term_id"])) ?? null;
	$slug = sanitize_text_field($_POST["slug"]) ?? null;
	$author_id = intval(sanitize_text_field($_POST["author_id"])) ?? null;
	$post_type = sanitize_text_field($_POST["post_types"]) ?? null;
	$taxonomy = 'post_tag';
	$is_all_post = $slug === 'all';
	$posts_count = 0;


	//Render for all posts request.
	$args = [
		'post_type' => $post_type,
		'posts_per_page' => 6,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
	];


	//Render for tax query
	if (!$is_all_post) {
		$args['tax_query'] = [
			[
				'taxonomy' => $taxonomy,
				'field' => 'term_id',
				'terms' => $term_id,
			],
		];
	}

	//Add to query author if isset on front end data.
	if ($author_id) {
		$args['author'] = $author_id;
	}


	$query = new WP_Query($args);

	if ($query->have_posts()) {
		$posts_count = $query->found_posts;
		ob_start();
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/loop-posts-blog-information');
		}
		$posts = ob_get_clean();
		wp_reset_postdata();
	} else {
		$posts = 'Not Found';
	}

	wp_send_json_success(
		[
			'posts_count' => $posts_count,
			'posts' => $posts,
		]

	);

}

add_action('wp_ajax_get_ajax_filter_posts', 'get_ajax_filter_posts');
add_action('wp_ajax_nopriv_get_ajax_filter_posts', 'get_ajax_filter_posts');
