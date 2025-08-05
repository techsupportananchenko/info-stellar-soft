<?php
/**
 * Block Name: Our values.
 * About us page.
 * This is the template that displays Our values block.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('team_and_office_title');
	$description = get_field('team_and_office_description');
	$image = get_field('team_and_office_image') ? wp_get_attachment_image_url(get_field('team_and_office_image'), 'full') : null;;
	?>
	<section class="team-and-office">
		<div class="team-and-office__container">
			<div class="team-and-office__wrapper">
				<div class="team-and-office__about">
					<?php if (!empty($title)): ?>
						<h2 class="team-and-office__title">
							<?= $title ?>
						</h2>
					<?php endif; ?>
					<?php if (!empty($description)): ?>
						<p class="team-and-office__description">
							<?= $description ?>
						</p>
					<?php endif; ?>
				</div>
				<?php if (!empty($image)): ?>
					<div class="team-and-office__image">
						<img src="<?= $image ?>" alt="<?php echo $title ?>">
					</div>
				<?php endif; ?>
			</div>
		</div>

	</section>

<?php endif;
