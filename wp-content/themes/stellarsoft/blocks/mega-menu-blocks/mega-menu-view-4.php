<?php
/**
 * Mega menu View 4.
 * This block displays a simple item with post icon, title, post description and titles with two different categories.
 * @category Mega menu blocks
 */
if (isset($block['data']['preview_image_help'])): ?>
	<img src="<?php echo esc_url($block['data']['preview_image_help']); ?>" style="width:100%; height:auto;">
<?php else:
	$selected_content = get_field('mega_menu_4_posts');
	if (have_rows('mega_menu_4_posts')): ?>
		<div class="view view--model-4">
			<div class="view__wrapper">
				<?php
				while (have_rows('mega_menu_4_posts')) :
					the_row();
					$title = get_sub_field('enter_title');
					$content = get_sub_field('select_the_posts_for_the_category');
					?>
					<div class="view__content">
						<div class="view__title-category h3">
							<?= esc_html($title); ?>
						</div>
						<div class="view__items">
							<?php foreach ($content as $post):
								$post_id = $post->ID;
								$post_title = get_the_title($post_id);
								$post_icon = get_field('icon_item_mega_menu', $post_id);
								$post_link = get_permalink($post_id);
								$post_excerpt = get_the_excerpt($post_id);
								?>
								<div id="<?= esc_attr($post_id); ?>" class="view__item">
									<a href="<?= esc_url($post_link); ?>" class="view__wrap">
										<?php if ($post_icon): ?>
											<div class="view__icon">
												<img class="view__icon icon-item" src="<?= esc_url($post_icon); ?>"
													 alt="<?php echo esc_html($post_title); ?>">
											</div>
										<?php endif; ?>
										<div class="view__text">
											<p class="view__title g">
												<?= esc_html($post_title); ?>
											</p>
											<p class="view__about">
												<?= esc_html(mb_strimwidth($post_excerpt, 0, 60)); ?>
											</p>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>

					</div>

				<?php endwhile; ?>
			</div>
		</div>

	<?php endif; ?>
<?php endif; ?>
