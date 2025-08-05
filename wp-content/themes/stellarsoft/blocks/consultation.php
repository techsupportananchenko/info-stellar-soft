<?php
/**
 * Block Name: Consultation
 *
 * This is the template that displays Consultation Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title') ?? false;
	$form = get_field('form') ?? false;
	$address = get_field('address') ?? false;
	$map_link = get_field('map_link') ?? false;
	$map_img = get_field('map_image') ?? false;
	$map_point = get_field('map_point') ?? false;
	$phone = get_field('phone') ?? false;
	$email = get_field('email') ?? false;
	$description = get_field('description') ?? false;
	?>
	<section class="consultation-section" id="contact">
		<div class="consultation-section__container">
			<div class="consultation">
				<div class="consultation__wrap">
					<div class="consultation__form">
						<div class="consultation-form consultation-form--wp">
							<?php if ($title): ?>
								<div class="consultation__title">
									<h3><?php echo $title; ?></h3>
								</div>
							<?php endif; ?>
							<?php if ($form) : ?>
								<?php echo apply_filters('the_content', $form) ?>
							<?php endif; ?>
						</div>
						<div class="consultation__contacts">
							<div class="consultation__adress">
								<?php if ($address) : ?>
									<div class="consultation__icon">
										<img
											src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/consultation-section/mark.svg"
											alt="<?php echo esc_html($title); ?>" loading="lazy">
									</div>
									<p class="consultation__text"><?php echo wp_kses_post($address) ?></p>
								<?php endif; ?>
							</div>
							<?php if ($map_img) : ?>
								<div class="consultation__map">
									<?php echo wp_get_attachment_image($map_img['id'], 'medium-large', false, array('alt' => $title)) ?>
									<?php if ($map_point) : ?>
										<div class="consultation__map-point">
											<?php echo wp_get_attachment_image($map_point['id'], 'full', false, array('alt' => $title)) ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<div class="consultation__info">
								<?php if ($phone) : ?>
									<a href="tel:<?php echo it_phone_cleaner($phone) ?>"
									   class="consultation__link"><?php echo $phone ?></a>
								<?php endif; ?>
								<div class="flex-column">
									<div class="consultation__email">
										<a href="mailto:<?php echo antispambot(sanitize_email($email)) ?>"
										   class="consultation__link"><?php echo esc_html($email) ?></a>
									</div>
									<?php if ($description) : ?>
										<p class="small-text consultation__info-text"><?php echo wp_kses_post($description) ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
