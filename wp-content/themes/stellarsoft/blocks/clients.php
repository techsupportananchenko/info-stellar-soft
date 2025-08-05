<?php
/**
 * Block Name: Clients
 *
 * This is the template that displays Clients Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$alt_title = get_the_title();
	$title = get_field('title') ?? false;
	$description = get_field('description') ?? false;
	$dark_theme = get_field('dark_theme_clients'); // Repeater.
	$light_theme = get_field('light_theme_clients'); // Repeater.
	?>
	<section class="clients-section">
		<div class="clients-section__container">
			<div class="section-head">
				<?php if ($title) : ?>
					<div class="section-head__title">
						<h2><?php echo wp_kses_post($title) ?></h2>
					</div>
				<?php endif; ?>
				<?php if ($description) : ?>
					<div class="section-head__text">
						<?php echo apply_filters('the_content', $description) ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="marquee-infinite">
			<?php if ($dark_theme) : ?>
				<div class="marquee-infinite__wrap marquee-infinite__wrap--dark">
					<?php for ($i = 0; $i < 6; $i++): ?>
						<div class="marquee-infinite__items">
							<?php foreach ($dark_theme as $item):
								$logo = $item['logo'];
								if ($logo): ?>
									<div class="marquee-infinite__item">
										<?php echo wp_get_attachment_image($logo['id'], 'full', false, ['class' => 'skip-lazy', 'alt' => $alt_title]) ?>
									</div>
								<?php endif;
							endforeach; ?>
						</div>
					<?php endfor; ?>
				</div>
			<?php endif; ?>
			<?php if ($light_theme) : ?>
				<div class="marquee-infinite__wrap marquee-infinite__wrap--light">
					<?php for ($i = 0; $i < 6; $i++): ?>
						<div class="marquee-infinite__items">
							<?php foreach ($light_theme as $item):
								$logo = $item['logo'];
								if ($logo): ?>
									<div class="marquee-infinite__item">
										<?php echo wp_get_attachment_image($logo['id'], 'full', false, ['class' => 'skip-lazy', 'alt' => $alt_title]) ?>
									</div>
								<?php endif;
							endforeach; ?>
						</div>
					<?php endfor; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>


