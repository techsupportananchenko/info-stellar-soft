<?php
/**
 * Mega menu View 2.
 * This block displays a item with post icon, title ,background.
 * @see prewiew photo in assets.
 * @category Mega menu blocks.
 */
if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$selected_content = get_field('mega_menu_2_posts');
	if ($selected_content):
		?>
		<div class="view view--model-2">
		<div class="view__page-title h3">
			<?php
			$title_view = '';
			$title_view = apply_filters('view-title', $title_view);
			echo(!empty($title_view) ? $title_view : '');
			?>
		</div>
		<div class="view__wrapper">
		<?php foreach ($selected_content as $select_content):
		$category_name = $select_content['enter_title'];
		$selected_posts = $select_content['select_the_posts_for_the_category'];
		?>
		<div class="view__item">
			<?php if (!empty($category_name)): ?>
				<p class="view__category">
					<?= $category_name ?>
				</p>
			<?php endif; ?>
			<?php if (!empty($selected_posts && is_array($selected_posts))): ?>
				<div class="view__wrap">
					<?php foreach ($select_content['select_the_posts_for_the_category'] as $select_post):
						$posts_icon = get_field('technology_icon', $select_post->ID)['url'] ?
							get_field('technology_icon', $select_post->ID) : '';
						$post_title = get_the_title($select_post->ID);
						$post_link = get_post_permalink($select_post->ID);
						?>
						<?php if ($post_title && $post_link): ?>
						<a href="<?= $post_link;?>" class="view__technoligies">
							<div class="view__icon">
								<img class="view__icon icon-item" src="<?= $posts_icon['url'] ?>"
									 alt="<?= $posts_icon['alt'] ?>">
							</div>
							<p class="view__title">
								<?= $select_post->post_title ?>
							</p>
						</a>
					<?php endif; ?>

					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
	<?php endif; ?>
	</div>
	</div>
<?php endif; ?>
