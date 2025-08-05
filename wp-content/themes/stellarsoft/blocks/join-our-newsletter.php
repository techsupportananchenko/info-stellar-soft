<?php
/**
 * Block Name: Claim your free CRO plan
 *
 * This is the template that displays Claim your free CRO plan
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$block_id = $block['id'] ?? false;
	$title = get_field('title') ?? false;
	$description = get_field('sub_title') ?? false;
	$bg_image = get_field('bg_image') ?? false;
	$contact_form = get_field('form_news_letter') ?? false;
	?>
	<section class="join-our-newsletter">
		<div class="join-our-newsletter__container">
			<div style="background-image:url('<?php echo esc_html($bg_image); ?>') "
				 class="join-our-newsletter__wrapper">
				<div class="join-our-newsletter__content">
					<?php if ($title) : ?>
						<h2 class="join-our-newsletter__title">
							<?php echo $title; ?>
						</h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="join-our-newsletter__desc">
							<?php echo $description; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ($contact_form) : ?>
					<div class="join-our-newsletter__form">
						<?php echo do_shortcode($contact_form); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>


