<?php
/**
 * Block Name: Consultation
 *
 * This is the template that displays Consultation Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$form = get_field('form') ?? false;
	$title_form = get_field('title_main') ?? false;
	$title = get_field('title') ?? false;
	$phone = get_field('phone') ?? false;
	$email = get_field('email') ?? false;
	$form_id = get_field('form_id') ?? 'contact';
	?>
	<section class="consultation-section vacancy-consultation-section" id="<?php echo $form_id; ?>">
		<div class="consultation-section__container">
			<div class="consultation">
				<div class="consultation__wrap">
					<div class="consultation__form">
						<div class="consultation-form consultation-form--wp">
							<?php if ($title_form) : ?>
								<div class="consultation__title">
									<h3><?php echo $title_form; ?></h3>
								</div>
							<?php endif; ?>
							<?php if ($form): ?>
								<?php echo apply_filters('the_content', $form) ?>
							<?php endif; ?>
						</div>
						<div class="consultation__contacts">
							<div class="consultation__title">
								<?php if ($title) : ?>
									<h3>
										<?php echo($title) ?>
									</h3>
								<?php endif; ?>
								<?php
								$steps = get_field('steps_text');
								if ($steps) : ?>
									<div class="consultation__steps">
										<ul class="consultation__steps-list">
											<?php foreach ($steps as $step_count => $step) : ?>
												<li class="consultation__steps-list-item">
													<div class="consultation__steps-list-count">
														<span class="count-number">
														<span>
															<?php echo $step_count + 1; ?>
														</span>
														</span>
													</div>
													<?php echo $step['step']; ?>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>
							<div class="consultation__info">
								<?php if ($phone) : ?>
									<a href="tel:<?php echo it_phone_cleaner($phone) ?>"
									   class="consultation__link"><?php echo $phone ?></a>
								<?php endif; ?>
								<?php if ($email) : ?>
									<div class="flex-column">
										<div class="consultation__email">
											<a href="mailto:<?php echo antispambot(sanitize_email($email)) ?>"
											   class="consultation__link"><?php echo esc_html($email) ?></a>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
