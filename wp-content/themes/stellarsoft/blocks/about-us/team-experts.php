<?php
/**
 * Block Name : Team experts.
 * About us  page.
 * This is the template that displays Team experts block.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('team_experts_title') ?? null;
	$description = get_field('team_experts_description') ?? null;
	$class = '';
	$add_class = apply_filters('add_team_experts_class', $class);
	?>

	<section class="team-experts-section <?= $add_class ?>">
		<div class="team-experts-section__container">
			<?php if ($title || $description) : ?>
				<div class="section-head">
					<div class="section-head__title">
						<h2><?= $title ?></h2>
					</div>
					<div class="section-head__text">
						<p><?= $description ?></p>
					</div>
				</div>
			<?php endif; ?>
			<div class="team-experts">
				<div class="team-experts__row">
					<?php if (have_rows('team_experts')) :
						while (have_rows('team_experts')) : the_row();
							$name = get_sub_field('name') ?? null;
							$position = get_sub_field('position') ?? null;
							$photo = get_sub_field('photo') ? wp_get_attachment_image_url(get_sub_field('photo')) : null;
							$link_telegram = get_sub_field('social_telegram') ?? false;
							$link_linkedin = get_sub_field('social_likdedin') ?? false;
							?>
							<div class="team-experts__col">
								<div class="team-expert">
									<div class="team-expert__wrap">
										<?php if ($photo) : ?>
											<div class="team-expert__img">
												<img
													src="<?= $photo ?>"
													alt="<?php echo esc_html($name) ?>">
											</div>
										<?php endif; ?>
										<div class="team-expert__body">
											<?php if ($name) : ?>
												<div class="team-expert__name">
													<p><?= $name ?></p>
												</div>
											<?php endif; ?>
											<?php if ($position) : ?>
												<div class="team-expert__info">
													<p><?= $position ?></p>
												</div>
											<?php endif; ?>
											<div class="team-socials">
												<?php if ($link_linkedin) : ?>
													<a href="<?= $link_linkedin ?>" class="team-social">
														<img
															src="/wp-content/themes/stellarsoft/assets/images/team/team-founder/linkedin.svg"
															alt="social">
													</a>
												<?php endif; ?>
												<?php if ($link_telegram): ?>
													<a href="<?= $link_telegram ?>" class="team-social">
														<img
															src="/wp-content/themes/stellarsoft/assets/images/team/team-founder/telegram.svg"
															alt="social">
													</a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
						endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif;
