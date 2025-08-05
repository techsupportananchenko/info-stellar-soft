<?php
/**
 * Block Name: Our values.
 * About us page.
 * This is the template that displays Our values block.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title');
	$description = get_field('description');
	?>
	<section class="our-values">
		<div class="our-values__container">
			<div class="our-values__about">
				<?php if (!empty($title)): ?>
					<h2 class="our-values__title">
						<?= $title ?>
					</h2>
				<?php endif; ?>
				<?php if (!empty($description)): ?>
					<p class="our-values__description">
						<?= $description ?>
					</p>
				<?php endif; ?>
			</div>
			<div class="our-values__wrapper">
				<div class="values _tab-init" data-tabs-animate="500" data-tabs-index="0" data-tabs="768">
					<?php if (have_rows('content')): ?>
						<nav class="values-titles tabs__navigation" data-tabs-titles="">
							<?php
							$count = 0;
							while (have_rows('content')): the_row(); ?>
								<?php
								$count++;
								$title_values = get_sub_field('name_value');
								$title_icon_dark_theme = get_sub_field('icon_name_value_dark');
								$title_icon_light_theme = get_sub_field('icon_name_value_light');
								$is_first_tab = $count === 1 ? '_tab-active' : 'tab-hidden';
								?>
								<?php if ($title_values): ?>
									<button class="values-titles__title <?= $is_first_tab ?>" type="button"
											data-tabs-title="">
										<a href="#" class="title">
											<?= $title_values ?>
										</a>
										<span class="values-titles__icon">
												<img class="values-titles__icon-item values-titles__icon--item-dark"
													 src="<?= $title_icon_dark_theme ?>" alt="title-icon">
												<img class="values-titles__icon-item values-titles__icon--item-light"
													 src="<?= $title_icon_light_theme ?>" alt="title-icon">
										</span>
									</button>
								<?php endif; ?>
							<?php endwhile; ?>
						</nav>
						<div class="values-content tabs__content" data-tabs-body="">
							<?php while (have_rows('content')): the_row(); ?>
								<div class="values-content__block tab__body" data-tabs-item="">
									<div class="values-content__wrapper">
										<?php
										$content = get_sub_field('content_value');
										if ($content):
											$content_title = $content['title'] ?? null;
											$content_sub_title = $content['sub_title'] ?? null;
											$content_list = $content['list'] ?? null;
											$content_image = $content['image'] ? wp_get_attachment_image_url($content['image'], 'full') : null;
											?>
											<div class="values-content__about">
												<?php if ($content_title): ?>
													<h3 class="values-content__title">
														<?= $content_title ?>
													</h3>
												<?php endif; ?>
												<?php if ($content_sub_title): ?>
													<p class="values-content__sub-title">
														<?= $content_sub_title ?>
													</p>
												<?php endif; ?>
												<?php if ($content_list): ?>
													<div class="values-content__list">
														<?= $content_list ?>
													</div>
												<?php endif; ?>
											</div>
											<?php if ($content_image): ?>
											<div class="values-content__image">
												<img class="image" src="<?= $content_image ?>"
													 alt="<?php echo esc_html($content_title); ?>">
											</div>
										<?php endif;
										endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php endif;
