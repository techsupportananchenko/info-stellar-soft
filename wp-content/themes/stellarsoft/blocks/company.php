<?php
/**
 * Block Name: Company
 *
 * This is the template that displays Company Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title') ?? false;
	$description = get_field('description') ?? false;
	$advantages = get_field('advantages'); // Repeater.
	?>
	<section class="company-section">
		<div class="company-section__container">
			<?php if ($title || $description) : ?>
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
			<?php endif; ?>
			<?php if ($advantages) : ?>
				<div class="companys">
					<div class="companys__row">
						<?php foreach ($advantages as $item) :
							$item_title = $item['title'] ?? false;
							$item_description = $item['description'] ?? false;
							$icon = $item['icon'] ?? false;
							?>
							<div class="companys__col">
								<div class="company">
									<div class="company__wrap">
										<?php if ($icon) : ?>
											<div class="company__icon">
												<?php echo display_svg($icon) ?>
											</div>
										<?php endif; ?>
										<div class="company__head">
											<?php if ($item_title) : ?>
												<div class="company__title">
													<h3><?php echo wp_kses_post($item_title) ?></h3>
												</div>
											<?php endif; ?>
										</div>
										<?php if ($item_description) : ?>
											<div class="company__text">
												<?php echo apply_filters('the_content', $item_description) ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>


