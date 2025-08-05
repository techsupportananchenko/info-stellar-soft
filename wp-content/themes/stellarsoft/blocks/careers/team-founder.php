<?php
/**
 * Block Name : Team Co-Founder.
 * Careers page.
 * This is the template that displays Team Co-Founder.
 */
if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
$title = get_field('team_founder_title');
$description = get_field('team_founder_description');
?>
<section class="team-founder-section">
	<div class="team-founder-section__container">
		<div class="section-head">
			<?php if (!empty($title)): ?>
				<h2 class="section-head__title">
					<?= $title ?>
				</h2>
			<?php endif; ?>
			<?php if (!empty($description)): ?>
				<p class="section-head__text">
					<?= $description ?>
				</p>
			<?php endif; ?>
		</div>
		<div class="founders">
			<div class="founders__row">
				<?php if (have_rows('co_founders')): ?>
					<?php while (have_rows('co_founders')) :
						the_row();
						$name = get_sub_field('name') ?? null;
						$position = get_sub_field('position') ?? null;
						$photo = get_sub_field('photo_co_founder') ? wp_get_attachment_image_url(get_sub_field('photo_co_founder'), 'full') : null;
						$linkedin_link = get_sub_field('linkedin_link')['url'] ?? '#';
						$telegram_link = get_sub_field('telegram_link')['url'] ?? '#';
						?>
						<div class="founders__col">
							<div class="founder">
								<div class="founder__wrap">
									<?php if ($photo): ?>
										<div class="founder__img">
											<img src="<?= $photo ?>"
												 alt="<?php echo esc_html($name); ?>">
										</div>
									<?php endif; ?>
									<?php if ($name): ?>
										<div class="founder__name">
											<span><?= $name ?></span>
										</div>
									<?php endif; ?>
									<?php if ($position): ?>
										<div class="founder__info">
											<p> <?= $position ?></p>
										</div>
									<?php endif; ?>
									<div class="team-socials">
										<?php if (!empty($linkedin_link)): ?>
											<a href="<?= $linkedin_link ?>" class="team-social">
												<img
													src="/wp-content/themes/stellarsoft/assets/images/team/team-founder/linkedin.svg"
													alt="LinkedIn">
											</a>
										<?php endif; ?>
										<?php if (!empty($telegram_link)): ?>
											<a href="<?= $telegram_link ?>" class="team-social">
												<img
													src="/wp-content/themes/stellarsoft/assets/images/team/team-founder/telegram.svg"
													alt="Telegram">
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<section>
		<?php endif; ?>
