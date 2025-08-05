<?php
/**
 * Block Name: About company.
 * About us  page.
 * This is the template that displays About Company  block.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title');
	$description = get_field('description');
	$title_story = get_field('title_story');
	$story = get_field('story');
	$button = get_field('button');
	$founders_photo = get_field('founders_photo') ?? null;
	?>
	<section class="about-company">
		<div class="about-company__container">
			<div class="about-company__about">
				<?php if (!empty($title)): ?>
					<h2 class="about-company__title">
						<?= $title ?>
					</h2>
				<?php endif; ?>
				<?php if (!empty($description)): ?>
					<p class="about-company__description">
						<?= $description ?>
					</p>
				<?php endif; ?>
			</div>

			<div class="about-company__wrapper">
				<div class="about-company__content">
					<?php if ($founders_photo): ?>
						<div class="founders">
							<div class="founders__photographs">
								<?php foreach ($founders_photo as $photo):
									$photo = wp_get_attachment_image($photo, 'full', false, array('class' => 'photo'));
									?>
									<div class="founders__photo">
										<?php echo $photo ?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="story">
						<?php if ($title_story): ?>
							<h3 class="story__title">
								<?= $title_story ?>
							</h3>
						<?php endif; ?>
						<?php if ($story): ?>
							<div class="story__text">
								<?= $story ?>
							</div>
						<?php endif; ?>
						<?php if ($button):
							$label_btn = $button['title'] ?? null;
							$url_btn = $button['url'] ?? '#';
							if ($label_btn && $url_btn):
								?>
								<div class="story__button">
									<a href="<?= $url_btn ?>"
									   class="story__button-item new-btn--primary"><?= $label_btn ?></a>
								</div>
							<?php
							endif;
						endif; ?>
					</div>

				</div>
			</div>
		</div>

	</section>

<?php endif;
