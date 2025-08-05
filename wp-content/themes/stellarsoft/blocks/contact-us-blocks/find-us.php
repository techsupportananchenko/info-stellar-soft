<?php
/**
 * Block Name : Start with stellar soft.
 * Contact us page.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title');
	$description = get_field('description');


	?>
	<section class="find-us">
		<?php
		if (have_rows('location_block')): ?>
			<div class="find-us__container">
				<div class="find-us__about">
					<?php if (!empty($title)): ?>
						<h2 class="find-us__title">
							<?= $title ?>
						</h2>
					<?php endif; ?>
					<?php if (!empty($description)): ?>
						<p class="find-us_description">
							<?= $description ?>
						</p>
					<?php endif; ?>

				</div>

				<div class="find-us__wrapper">
					<?php while (have_rows('location_block')):
						the_row();
						$city = get_sub_field('city');
						$national_flag = get_sub_field('national_flag') ? wp_get_attachment_image_url(get_sub_field('national_flag'), 'full') : null;
						$tel = get_sub_field('tel');
						$email = get_sub_field('email');
						$address = get_sub_field('address');
						?>
						<div class="location">
							<div class="location__data">

								<div class="location__info">
									<?php if ($national_flag): ?>
										<div class="location__flag">
											<img class="flag__image" src="<?= $national_flag ?>" alt="<?php echo esc_html($city); ?>">
										</div>
									<?php endif ?>

									<?php if (!empty($city)): ?>
										<h3 class="location__city">
											<?= $city ?>
										</h3>
									<?php endif ?>

								</div>


								<?php if (!empty($address)): ?>
									<p class="location__address">
										<?= $address ?>
									</p>
								<?php endif ?>
							</div>
							<div class="location__contacts">
								<?php if (!empty($tel)): ?>
									<a href="tel:<?= $tel ?>" class="location__tel"><?= $tel ?></a>
								<?php endif; ?>
								<?php if (!empty($email)): ?>
									<a href="mailto:<?= $email ?>" class="location__email"><?= $email ?></a>
								<?php endif; ?>
							</div>
						</div>

					<?php endwhile; ?>
				</div>
			</div>
		<?php endif;
		?>
	</section>
<?php endif; ?>
