<?php
/**
 * This is where we configure all the features and methods to protect the site.
 */


//Remove Version wp from head.

remove_action('wp_head', 'wp_generator');


//Block comments.
add_action('init', function () {
	foreach (get_post_types() as $type) {
		remove_post_type_support($type, 'comments');
	}
}, 100);
// Block wp-comments-post.php
add_action('pre_comment_on_post', function () {
	wp_die(
		'Nothing to see here.',
		'Access Denied',
		['response' => 403]
	);
});

