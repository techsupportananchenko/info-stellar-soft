<?php

/**
 * Block Name: Blog single review.
 * Single blog post page.
 * This is the template that displays Single blog post review block.
 */
if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	?>
	<section class="post-content__reviews case-review">
		<div class="reviews__wrap">
			<?php
			$name = get_field('name');
			$position = get_field('position');
			$icons = get_field('icon') ?? false;
			$comment = get_field('comment');
			$tech_title = get_field('technology_title');
			$tech_icon = get_field('technology_icon') ?? false;
			$link_to = get_field('link_to') ?? false;
			?>
			<div class="review-slide__content">
				<div class="review-slide__head">
					<div class="review-slide__img">
						<?php if ($icons) : ?>
							<?php foreach ($icons as $icon) :
								$icon = $icon['icon'] ?? false;
								?>
								<div class="review-slide__icon">
									<?php echo display_svg($icon) ?>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<?php if ($name) : ?>
						<div class="review-slide__autor">
							<h3 class="review-slide__autor-name"><?php echo wp_kses_post($name) ?></h3>
							<?php if ($position) : ?>
								<p class="review-slide__autor-post"><?php echo wp_kses_post($position) ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="review-slide__body">
					<?php if ($comment) : ?>
						<div class="review-slide__text">
							<?php echo apply_filters('the_content', $comment) ?>
						</div>
					<?php endif; ?>

					<?php if ($link_to) : ?>
						<a href="<?php echo $link_to ?>" class="review-slide__link"><?php echo __('Learn more about the project','stellar-soft');?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
