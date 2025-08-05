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
	$btn_action = get_field('button_action') ?? false;
	$contact_form = get_field('form_pop_up') ?? false;
	?>
	<section class="claim-your-free-cro-plan">
		<div class="claim-your-free-cro-plan__container">
			<div style="background-image:url('<?php echo esc_html($bg_image); ?>') "
				 class="claim-your-free-cro-plan__wrapper">
				<div class="claim-your-free-cro-plan__content">
					<?php if ($title) : ?>
						<h2 class="claim-your-free-cro-plan__title">
							<?php echo $title; ?>
						</h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="claim-your-free-cro-plan__desc">
							<?php echo $description; ?>
						</div>
					<?php endif; ?>
					<?php if ($btn_action) : ?>
						<div class="claim-your-free-cro-plan__button">
							<button type="button" data-popup="#<?php echo $block_id; ?>"
									class="claim-your-free-cro-plan__button-item btn-primary new-btn new-btn--primary">
								<?php echo $btn_action ?>
							</button>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if ($contact_form) : ?>
			<div id="<?php echo $block_id; ?>" class="claim-your-free-cro-plan__pop-up" aria-hidden="true">
				<div class="claim-your-free-cro-plan__pop-up-content popup__content">
					<div class="claim-your-free-cro-plan__pop-up-form">
						<button class="claim-your-free-cro-plan__pop-up-close pop-up__close" data-close="#<?php echo $block_id; ?>"
								type="button">
						</button>
						<div class="claim-your-free-cro-plan__contact-form consultation">
							<div class="consultation-form--wp">
								<?php echo $contact_form; ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>


