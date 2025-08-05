<?php


/*
 * Single post widget area.
 * Single post.
 */

function single_post_widget()
{
	register_sidebar([
		'name' => __('Single post', 'stellarsoft'),
		'id' => 'single-post',
		'before_widget' => '',
		'after_widget' => '',
		'description' => __('Single post default widgets area,after main content.', 'stellarsoft'),
	]);
}

add_action('widgets_init', 'single_post_widget');


/*
 * Single post case widget area.
 * Single Case post.
 */

function single_post_our_case_widget()
{
	register_sidebar([
		'name' => __('Single post Case', 'stellarsoft'),
		'id' => 'single-post-case',
		'before_widget' => '',
		'after_widget' => '',
		'description' => __('Single post Case', 'stellarsoft'),
	]);
}

add_action('widgets_init', 'single_post_our_case_widget');


/*
 * Author page.
 * Other content after cart author.
 */

function author_single_page_widget()
{
	register_sidebar([
		'name' => __('Author Single Page', 'stellarsoft'),
		'id' => 'author-single-page',
		'before_widget' => '',
		'after_widget' => '',
		'description' => __('Author widget area.', 'stellarsoft'),
	]);
}

add_action('widgets_init', 'author_single_page_widget');


/*
 * Vacancy page.
 * Other content after Vacancy.
 */

function vacancy_single_page_widget()
{
	register_sidebar([
		'name' => __('Vacancy Single Page', 'stellarsoft'),
		'id' => 'vacancy-single-page',
		'before_widget' => '',
		'after_widget' => '',
		'description' => __('Vacancy widget area.', 'stellarsoft'),
	]);
}

add_action('widgets_init', 'vacancy_single_page_widget');


