<?php
/**
 * Block Name : Start with stellar soft.
 * Contact us page.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title') ?? false;
	$sub_title = get_field('sub_title') ?? false;
	$description = get_field('description') ?? false;
	$name = get_field('name_hero') ?? false;
	$position_hero = get_field('position_hero') ?? false;
	$tel_hero = get_field('tel_hero') ?? false;
	$email = get_field('email') ?? false;
	$image_hero = get_field('image_hero') ? wp_get_attachment_image_url(get_field('image_hero'), 'full') : null;
	$contact_form = get_field('contact_form') ?? false;

	?>
	<section class="start-with-us">
		<div class="start-with-us__container">
			<div class="start-with-us__wrapper">
				<div class="hero">
					<?php if ($title): ?>
						<h2 class="hero__title">
							<?= $title ?>
						</h2>
					<?php endif; ?>
					<?php if ($description): ?>
						<p class="hero__description">
							<?= $description ?>
						</p>
					<?php endif; ?>
					<?php if ($sub_title): ?>
						<p class="hero__sub-title">
							<?= $sub_title ?>
						</p>
					<?php endif; ?>
					<div class="hero__content">
						<?php if ($image_hero): ?>
							<div class="hero__image">
								<img class="image" src="<?= $image_hero ?>" alt="<?php echo esc_html($title); ?>">
							</div>
						<?php endif; ?>
						<div class="hero__about">
							<?php if ($name): ?>
								<div class="hero__name">
									<?= $name ?>
								</div>
							<?php endif; ?>


							<?php if ($position_hero): ?>
								<div class="hero__position">
									<?= $position_hero ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="hero__contacts">
						<?php if ($tel_hero): ?>
							<a class="hero__tel" href="tel:<?= $tel_hero ?>"><?= $tel_hero ?></a>
						<?php endif; ?>
						<?php if ($email): ?>
							<a class="hero__email" href="mailto:<?= $email ?>"> <?= $email ?></a>
						<?php endif; ?>
					</div>
				</div>


				<?php if ($contact_form): ?>
					<div class="contact-form">
						<div class="contact-form__wrapper">
							<?= $contact_form ?>
						</div>

					</div>
				<?php endif; ?>
			</div>

		</div>

	</section>
<?php endif; ?>
