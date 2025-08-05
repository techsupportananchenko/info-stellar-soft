<?php
/**
 * Block Name: Blog Information.
 * Single blog page.
 * This is the template that displays Single blog page Blog information block.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$posts_tags = get_tags();
	$post_types = get_field('select_the_post_type');
	$view_more_btn_text = get_field('view_more_button');
	$additional_css = get_field('additional_css_class') ?? '';
	$term_id = [];
	$display_only_the_authors_posts = get_field('display_only_the_authors_posts');
	$author_id = get_queried_object_id();;
	$is_have_more_posts = false;
	$show_tags_buttons = apply_filters('show_tags_buttons', true);
	$title = apply_filters('add_title_to_blog_information', $title = '');

	//If block have params "Show only author post" we overwrite var with tags.
	if ($display_only_the_authors_posts) {
		$post_ids = get_posts(['author' => $author_id, 'post_type' => $post_types, 'post_status' => 'publish', 'posts_per_page' => -1, 'fields' => 'ids']);

		if (!empty($post_ids)) {
			$posts_tags = get_terms(['taxonomy' => 'post_tag', 'object_ids' => $post_ids]);
		}
	}

	?>
	<section class="blog-information-section <?= $additional_css ?>">
		<div class="blog-information-section__container">
			<?php
			echo $title ?>
			<?php if ($show_tags_buttons): ?>
				<div class="blog-information">
					<div class="blog-main-button" id="mainButton">All articles</div>
					<div class="blog-information-navigations" id="hiddenBlock">
						<div class="blog-information-navigations__row">
							<?php if (!empty($posts_tags) && is_array($posts_tags)) :
								//Get all tags from posts.
								foreach ($posts_tags as $post_tag) :
									$tag_name = $post_tag->name;
									$tag_slug = $post_tag->slug;
									$tag_term_id = $post_tag->term_id;
									if (!empty($tag_name) && isset($tag_term_id)):
										?>
										<div class="blog-information-navigations__col">
											<a data-blog-information-slug="<?= $tag_slug; ?>"
											   data-blog-information-title="<?= $tag_term_id; ?>" href="#"
											   class="blog-information-navigation__link js-block-button button-active">
												<?= $tag_name; ?>
											</a>
										</div>
									<?php
									endif;
								endforeach;
							endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="blog-information"
				 id="blog-information-data"
				 data-current-post-types="<?= esc_attr(implode(' ', $post_types)); ?>"
				 data-current-post-slug="all"
				 data-current-posts-count="1"
				<?= ($display_only_the_authors_posts ? 'data-current-author-id="' . $author_id . '"' : ''); ?>
			>

				<?php
				$args = [
					'post_type' => $post_types,
					'posts_per_page' => 6,
					'post_status' => 'publish',
					'orderby' => 'date',
					'order' => 'DESC',
				];

				//If in block chose option "Display current author posts" (For author page)
				if ($display_only_the_authors_posts) {
					$args['author'] = $author_id;
				}
				$posts = new WP_Query($args);
				?>
				<div class="blog-information-cards">
					<div id="blog-information-cards-content" class="blog-information-cards__row">
						<?php if (!empty($post_types)) :
							//Post types from block ACF field.
							if ($posts->have_posts()):
								while ($posts->have_posts()) :
									$posts->the_post();
									//Set value how many posts we have
									$is_have_more_posts = $posts->found_posts > 6;
									//Render template
									get_template_part('template-parts/loop-posts-blog-information');
								endwhile;
								wp_reset_postdata();
							endif;
						endif; ?>
					</div>
				</div>
				<?php if (!empty($view_more_btn_text) && $is_have_more_posts) :
					?>
					<div class="blog-information__view-more">
						<button
							id="blog-information-view-more-btn"
							class="view-more__item new-btn--primary">
							<?= $view_more_btn_text; ?>
						</button>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
endif; ?>
