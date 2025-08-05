<?php
/**
 * Block Name: Service Intro
 *
 * This is the template that displays Service Intro Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$label = get_field('label_text') ?? false;
	$button = get_field('button') ?? false;
	$title = get_field('title') ?? false;
	$alt_title = strtolower($title);
	$description = get_field('description') ?? false;
	$full_width_background = get_field('full_width_background') ?? false;
	$awards = get_field('awards') ?? false;
	?>
	<section class="case-intro-section intro-with-form">
		<div class="intro-decor__container">
			<div class="intro-decor intro-decor--case"></div>
		</div>
		<div class="case-intro-section__wrap">
			<div
				class="case-intro-section__container <?php echo (!empty($background_color)) ? $background_color : ''; ?>">
				<?php if ($full_width_background) : ?>
					<div class="case-intro-section__background-full">
						<?php echo wp_get_attachment_image($full_width_background['id'], 'full', false, array('alt' => $alt_title)) ?>
						<div class="case-intro-section__overlay"></div>
					</div>
				<?php endif; ?>
				<div class="case-intro">
					<div class="case-intro__head">
						<div class="case-intro__info">
							<?php if (function_exists('yoast_breadcrumb')) {
								yoast_breadcrumb('<div class="breadcrumbs" id="breadcrumbs">', '</div>');
							} ?>
						</div>
						<a href="<?php echo get_home_url() ?>" class="case-intro__close"></a>
					</div>
					<div class="case-intro__wrap">
						<div class="case-intro__body">
							<div class="case-intro__content">
								<?php if ($title) : ?>
									<div class="case-intro__title">
										<h1><?php echo wp_kses_post($title) ?></h1>
									</div>
								<?php endif; ?>
								<?php if ($description) : ?>
									<div class="case-intro__text">
										<?php echo apply_filters('the_content', $description) ?>
									</div>
								<?php endif; ?>
								<?php if ($awards) : ?>
									<div class="case-intro__awards">
										<?php foreach ($awards as $award) :
											$award_icon = $award['award'] ?? false;
											$award_link = $award['award_link'] ?? '#';
											?>
											<?php if ($award_icon): ?>
											<a target="_blank" href="<?php echo $award_link; ?>"
											   class="case-intro__award">
												<img src="<?php echo $award_icon; ?>" alt="award">
											</a>
										<?php endif; ?>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="case-intro__form consultation">
								<div class="consultation-form consultation-form--wp">
									<h3>
										<?php echo __('Let`s discuss your project', 'stellarsoft'); ?>
									</h3>
									<?php echo do_shortcode('[contact-form-7 id="56a46c6" title="Contact Form | Intro With Form"]'); ?>
								</div>
							</div>
						</div>
						<?php if ($full_width_background) : ?>
							<div class="case-intro__img lg-hidden">
								<?php echo wp_get_attachment_image($full_width_background['id'], 'large', false, array('alt' => $alt_title)) ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>


