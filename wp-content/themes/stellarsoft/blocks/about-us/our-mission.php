<?php
/**
 * Block Name:Our mission.
 * About us  page.
 * This is the template that displays Our mission block.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('our_mission_title');
	$description = get_field('our_mission_description');
	$button = get_field('our_mission_button');
	$photo = get_field('our_mission_photo_hero');
	$statistics = get_field('our_mission_statistics');
	?>
	<section class="our-mission">
		<div class="our-mission__container">
			<div class="our-mission__wrapper">
				<div class="our-mission__content">
					<div class="about">
						<?php if ($title): ?>
							<h3 class="about__title">
								<?= $title ?>
							</h3>
						<?php endif; ?>
						<?php if ($description): ?>
							<p class="about__description">
								<?= $description ?>
							</p>
						<?php endif; ?>
						<?php if ($button):
							$link_btn = $button['url'];
							$label_btn = $button['title'] ?? '#';
							?>
									<a href="<?= $link_btn ?>" class="about__button new-btn--primary"> <?= $label_btn ?></a>
						<?php endif; ?>
					</div>
					<div class="hero">
						<?php if ($photo): ?>
							<div class="hero__image">
								<img class="image" src="<?= $photo ?>" alt="<?php echo esc_html($title); ?>">
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="statistic">
					<div class="statistic__wrapper">
						<?php if ($statistics):
							foreach ($statistics as $statistic):
								$int_statistic = $statistic['statistic_integer'] ?? null;
								$text = $statistic['statistic_text'] ?? null;
								$element = $statistic['statistic_icon_element'] ?? null;
								?>
								<div class="statistic__int">
									<?php if ($statistic['statistic_text']): ?>
										<?= $statistic['statistic_integer']; ?>
									<?php endif; ?>
									<?php if ($statistic['statistic_text']): ?>
										<p class="statistic__text">
											<?= $statistic['statistic_text']; ?>
										</p>
									<?php endif; ?>
									<?php if ($statistic['statistic_icon_element']): ?>
										<span class="statistic__element">
										<img class="element-item" src="<?= $statistic['statistic_icon_element']; ?>"
											 alt="statistic-icon"
										</span>
									<?php endif; ?>
								</div>
							<?php
							endforeach;
						endif; ?>
					</div>
				</div>
			</div>
		</div
	</section>

<?php endif;
