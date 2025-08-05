<?php

/**
 * Filtration and pagination AJAX
 * @param &_POST careers_term_id - id current category.
 * @param  &_POST current_paginate - your paginate.
 * @return void
 */
function cases_post_type_ajax()
{
	if (empty($_POST)) {
		return;
	}

	$paged = isset($_POST['current_paginate']) ? intval(sanitize_text_field($_POST['current_paginate'])) : 1;
	$term_id = isset($_POST['careers_term_id']) ? sanitize_text_field($_POST['careers_term_id']) : "all";
	$is_all_posts = ($term_id === "all");
	$data_term_id = $is_all_posts ? [] : intval($term_id);
	$filtered_posts = [];


	$args = [
		'post_type' => 'case',
		'post_status' => 'publish',
		'posts_per_page' => 6,
		'paged' => $paged,
	];


	if (!$is_all_posts) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'post_tag',
				'field' => 'term_id',
				'terms' => [$data_term_id],
			]
		];
	}

	$query = new WP_Query($args);

	$paginated_info = [
		'total' => $query->found_posts,
		'max_pages' => $query->max_num_pages,
		'has_next' => $paged < $query->max_num_pages,
		'has_prev' => $paged > 1,
	];

	if ($query->have_posts()) :
		while ($query->have_posts()) :
			$query->the_post();
			$id = get_the_ID();
			$tags = wp_get_post_terms(get_the_ID(), 'post_tag', ['fields' => 'names']);
			$technologies = get_field('technologies', $id) ? array_column(get_field('technologies', $id), 'technology') : false;
			$technologies_data = [];


			if ($technologies) :
				foreach ($technologies as $id) :
					$technologies_data[] = [
						'icon_url' => get_field('technology_icon', $id)['url'] ?? null,
						'name' => get_the_title($id),
					];
				endforeach;
			endif;

			$filtered_posts[] = [
				'id' => $id,
				'title' => get_the_title(),
				'image' => get_the_post_thumbnail_url(get_the_ID(), 'full') ?? '',
				'excerpt' => get_the_excerpt(),
				'link' => get_the_permalink(),
				'tags' => $tags,
				'technologies' => $technologies_data,
			];
		endwhile;
		wp_reset_postdata();

		wp_send_json_success([
			'posts' => $filtered_posts,
			'pagination' => $paginated_info
		]);
	else:
		wp_send_json_success(['posts' => ['massage' => "Posts? What posts? They've vanished into the void.🕳️"]]);
	endif;


}

add_action('wp_ajax_cases_ajax_action', 'cases_post_type_ajax');
add_action('wp_ajax_nopriv_cases_ajax_action', 'cases_post_type_ajax');
