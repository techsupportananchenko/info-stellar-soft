<?php
/**
 * Mega menu View 3.
 * This block displays a item like a cart,with image,link,and text.
 * @see prewiew photo in assets.
 * @category Mega menu blocks.
 */
if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$selected_content = get_field('mega_menu_3_posts');
	if ($selected_content) : ?>
		<div class="view view--model-3">
			<div class="view__wrapper">
				<?php foreach ($selected_content as $content) :
					$image = $content['select_image']['url'] ? $content['select_image']['url'] : '';
					$image_alt = $content['select_image']['alt'] ? $content['select_image']['alt'] : '';
					$title = $content['title'];
					$about = $content['about'];
					$link = $content['link'] ? $content['link'] : '';
					$link_title = $link['title'] ? $link['title'] : '';
					$link_url = $link['url'] ? $link['url'] : '';
					?>
					<a href="<?= $link_url ?>" class="view__item"
					   aria-label="<?= $title ?> - <?= $about ?> <?= $link_title ?>">
						<?php if ($image): ?>
							<div class="view__image">
								<img loading="lazy" src="<?= $image ?>" alt="<?= $title ?>">
							</div>
						<?php endif; ?>
						<?php if ($about): ?>
							<div class="view__text">
								<p class="view__title"><?= $title ?></p>
								<p class="view__about"><?= $about ?></p>
								<p class="view__link"><?= $link_title ?></p>
							</div>
						<?php endif; ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif;
endif; ?>
