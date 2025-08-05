<?php
/**
 * Mega menu View 1.
 * This block displays a simple item with post icon, title, and post description.
 * @see prewiew photo in assets.
 * @category Mega menu blocks.
 */
if (isset($block['data']['preview_image_help'])): ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else:
	// Content displaying on Mega menu content.
	$selected_content = get_field('mega_menu_1_posts');

	if ($selected_content):
		?>

		<div class="view view--model-1">
			<div class="view__page-title h3">
				<?php
				$title_view = '';
				$title_view = apply_filters('view-title', $title_view);
				echo(!empty($title_view) ? $title_view : '');
				?>
			</div>
			<div class="view__wrapper">
				<?php foreach ($selected_content as $select_content):
					$post_id = $select_content->ID;
					$post_title = get_the_title($post_id);
					$post_link = get_post_permalink($post_id);
					$post_excerpt = get_the_excerpt($post_id);
					$post_icon = get_field('icon_item_mega_menu', $post_id);

					?>
					<div id="<?= $post_id; ?>" class="view__item">
						<a href="<?= $post_link; ?>" class="view__wrap">
							<?php if ($post_icon): ?>
								<div class="view__icon">
									<img class="view__icon icon-item" src="<?= esc_html($post_icon) ?>" alt="<?php echo esc_html($post_title); ?>">
								</div>
							<?php endif; ?>
							<div class="view__text">
								<p class="view__title">
									<?= $post_title; ?>
								</p>
								<p class="view__about">
									<?= mb_strimwidth($post_excerpt, 0, 60); ?>
								</p>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>

<?php endif; ?>
