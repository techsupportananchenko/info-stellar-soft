<?php
/**
 * Block Name: Industries Awards
 *
 * This is the template that displays Awards section (Copy of default Our clients block).
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title') ?? false;
	$description = get_field('description') ?? false;
	?>
	<section class="awards">
		<div class="awards__container">
			<div class="section-head">
				<?php if ($title) : ?>
					<div class="section-head__title">
						<h2><?php echo wp_kses_post($title) ?></h2>
					</div>
				<?php endif; ?>
				<?php if ($description) : ?>
					<div class="section-head__text">
						<p>
							<?php echo apply_filters('the_content', $description) ?>
						</p>
					</div>
				<?php endif; ?>
			</div>
			<?php
			if (have_rows('add_section_awards')):
				while (have_rows('add_section_awards')) : the_row();
					$dark_theme = get_sub_field('dark_theme_clients'); // Repeater.
					$light_theme = get_sub_field('light_theme_clients'); // Repeater.
					if ($dark_theme) : ?>
						<div class="awards__wrap awards__wrap--dark awards-swiper">
							<div class="awards__items swiper-wrapper">
								<?php foreach ($dark_theme as $item):
									$logo = $item['logo'];
									?>
									<?php if ($logo) : ?>
									<div class="awards__item swiper-slide">
										<?php echo wp_get_attachment_image($logo['id'], 'full', false, ['class' => 'skip-lazy']) ?>
									</div>
								<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($light_theme) : ?>
						<div class="awards__wrap awards__wrap--light awards-swiper">
							<div class="awards__items swiper-wrapper">
								<?php foreach ($light_theme as $item):
									$logo = $item['logo'];
									?>
									<?php if ($logo) : ?>
									<div class="awards__item swiper-slide">
										<?php echo wp_get_attachment_image($logo['id'], 'full', false, ['class' => 'skip-lazy']) ?>
									</div>
								<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif;
				endwhile;
			endif;
			?>
		</div>
	</section>
<?php endif; ?>


