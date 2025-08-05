<?php
/**
 * Handles the AJAX search request by checking for a search query parameter
 * and processing it using sanitization.
 * Also includes author name in the search scope.
 *
 * @return void
 */
function get_ajax_search(): void
{
	if (empty($_GET['s'])) {
		wp_send_json_error('Search term is empty.');
		return;
	}

	$search_key = sanitize_text_field($_GET['s']);

	$args = [
		'post_type' => 'post',
		's' => $search_key,
		'posts_per_page' => 6,
		'post_status' => 'publish',
	];

	add_filter('posts_where', 'extend_search_to_author');
	$query = new WP_Query($args);
	remove_filter('posts_where', 'extend_search_to_author');

	if ($query->have_posts()) {
		ob_start();
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/loop-posts-blog-information');
		}
		$posts = ob_get_clean();

		wp_reset_postdata();
		$posts_count = $query->found_posts;
		$tag = get_the_tags()[0]->slug;


		wp_send_json_success(['posts' => $posts, 'posts_count' => $posts_count, 'tag' => $tag]);
	} else {
		wp_send_json_error('No posts found.');
	}
}

function extend_search_to_author($where)
{
	global $wpdb;

	if (!empty($_GET['s'])) {
		$search = esc_sql($wpdb->esc_like($_GET['s']));
		$where = preg_replace(
			"/\(\s*{$wpdb->posts}\.post_title\s+LIKE\s*(.*?)\)/",
			"($0 OR {$wpdb->posts}.post_author IN (
				SELECT ID FROM {$wpdb->users}
				WHERE display_name LIKE '%{$search}%'
			))",
			$where
		);
	}

	return $where;
}

add_action('wp_ajax_get_ajax_search', 'get_ajax_search');
add_action('wp_ajax_nopriv_get_ajax_search', 'get_ajax_search');
