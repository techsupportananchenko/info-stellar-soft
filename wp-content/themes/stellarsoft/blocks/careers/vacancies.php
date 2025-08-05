<?php
/**
 * Block Name : Vacancies.
 * Careers page.
 * This is the template that displays Vacancies block.
 */
if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('vacancy_title');
	$description = get_field('vacancy_description');
	$is_have_vacancies = get_field('showing_vacancies');
	$vacancies = get_field('vacancies');
	$post_tags = [];
	?>
	<section class="vacancies">
		<div class="vacancies__container">
			<div class="vacancies__about">
				<?php if (!empty($title)): ?>
					<h2 class="vacancies__title">
						<?= $title ?>
					</h2>
				<?php endif; ?>
				<?php if (!empty($description)): ?>
					<p class="vacancies__description">
						<?= $description ?>
					</p>
				<?php endif; ?>
			</div>
			<div class="vacancies__wrapper">
				<?php if (!$is_have_vacancies): ?>
					<div class="vacancies-empty">
						<div class="vacancies-empty__wrapper">
							<h3 class="vacancies-empty__title">
								<?= __('Currently, there are no open positions', 'stellarsoft') ?>
							</h3>
							<p class="vacancies-empty__text">
								<?= __('Thank you for your interest in joining our team! At the moment, we don’t have any open vacancies. Please check back later or reach out to us for future opportunities', 'stellarsoft') ?>
							</p>
							<button class="vacancies-empty__button new-btn--primary">
								<a href="#contact"
								   class="vacancies-empty__link"><?= __('Contact Us', 'stellarsoft') ?></a>
							</button>
						</div>
					</div>
				<?php endif; ?>
				<?php
				if ($vacancies && $is_have_vacancies):
					?>
					<div class="vacancies-technologies">
						<?php
						$all_tags = [];
						foreach ($vacancies as $vacancy) {
							$post_id = $vacancy->ID;
							$tags = wp_get_post_terms($post_id, 'post_tag');
							if (!empty($tags) && !is_wp_error($tags)) {
								foreach ($tags as $tag) {
									$all_tags[$tag->term_id] = $tag->name;
								}
							}
						}
						foreach ($all_tags as $term_id => $tag_name): ?>
							<div data-vacancy-id="<?= $term_id ?>" class="vacancies-technologies__name">
								<?= $tag_name; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if ($vacancies): ?>
					<div class="vacancies__items">
						<?php foreach ($vacancies as $vacancy):
							$vacancy_id = $vacancy->ID;
							$name_vacancy = get_the_title($vacancy_id);
							$description_vacancy = get_the_excerpt($vacancy_id);
							$vacancy_link = get_post_permalink($vacancy_id);
							$vacancy_tech_stack = get_the_terms($vacancy_id, 'post_tag');
							?>
							<div class="vacancy">
								<a href="<?= $vacancy_link ?>" class="vacancy__details">
									<?php if ($name_vacancy): ?>
										<h3 class="vacancy__name">
											<?= $name_vacancy ?>
										</h3>
									<?php endif; ?>
									<?php if ($description_vacancy): ?>
										<p class="vacancy__about">
											<?= $description_vacancy ?>
										</p>
									<?php endif; ?>
								</a>
								<?php if (!is_wp_error($vacancy_tech_stack) && $vacancy_tech_stack): ?>
									<div class="vacancy__technologies">
										<?php foreach ($vacancy_tech_stack as $tech_stack): ?>
											<span data-vacancy-tech-id="<?= $tech_stack->term_id ?>" class="technologies__item">
												<?= $tech_stack->name; ?>
											</span>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								<button class="vacancy__btn new-btn new-btn--tertiary new-btn--tertiary--small">
									<a href="<?= $vacancy_link ?>"></a>
								</button>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

<?php endif; ?>
