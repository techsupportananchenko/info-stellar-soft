<?php
/**
 * Block Name: What We Do
 *
 * This is the template that displays What We Do Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$alt_title = get_the_title();
	$title = get_field('title') ?? false;
	$description = get_field('description') ?? false;
	$counter_bg = get_field('counter_background')
		? 'background-image : url(' . get_field('counter_background') . ');' : 'background : #efefec;';
	$counter = get_field('counter'); //Repeater.
	$dark_theme_logos = get_field('dark_theme_logos');// Reteater.
	$light_theme_logos = get_field('light_theme_logos'); // Repeater.
	?>
	<section class="what-section">
		<div class="what-section__container">
			<div class="what-block">
				<div class="what-block__wrap">
					<div class="what-block__bg1">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/what-section/bg1.png"
							 alt="<?php echo esc_html($alt_title) ?>">
					</div>
					<div class="what-block__bg2">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/what-section/bg2.png"
							 alt="<?php echo esc_html($alt_title) ?>">
					</div>
					<?php if ($title || $description) : ?>
						<div class="what-block__head">
							<div class="section-head">
								<?php if ($title) : ?>
									<div class="section-head__title">
										<h2 class=""><?php echo wp_kses_post($title) ?></h2>
									</div>
								<?php endif; ?>
								<?php if ($description) : ?>
									<div class="section-head__text">
										<?php echo apply_filters('the_content', $description) ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($counter) : ?>
						<div style="<?php echo esc_html($counter_bg) ?>" class="what-block__counter">
							<?php foreach ($counter as $item) :
								$val = $item['value'] ?? false;
								$text = $item['text'] ?? false;
								$symbol = $item['symbol'] ?? false;
								?>
								<?php if ($val && $text) : ?>
								<div data-watch class="what-block__count">
									<div class="what-block__count-item">
										<div data-count-int="<?php echo intval($val); ?>" data-digits-counter
											 data-digits-counter-speed="3500"
											 class="what-block__count-title">
											<?php echo wp_kses_post($val) ?>
										</div>
										<?php if ($symbol): ?>
											<span
												class="what-block__count-symbol what-block__count-title"> <?= $symbol ?></span>
										<?php endif; ?>
									</div>
									<span class="what-block__count-text"><?php echo wp_kses_post($text) ?></span>
								</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<div class="what-block__images">
						<?php if ($dark_theme_logos) : ?>
							<?php foreach ($dark_theme_logos as $dark_theme_logo) :
								$dark_logo = $dark_theme_logo['logo'] ?? false;
								$cls = $dark_theme_logo['class'] ?? false;
								$is_have_link = $dark_theme_logo['add_link_to_badges'] ? $dark_theme_logo['bagdes_url'] : '#';
								?>
								<?php if ($dark_logo) : ?>
								<a
									target="_blank"
									href="<?php echo esc_url($is_have_link) ?>"
									class="what-block__image what-block__image--dark what-block__image--<?php echo $cls ?>">
									<?php echo wp_get_attachment_image($dark_logo['id'], 'full', false, array('alt' => $alt_title)) ?>
								</a>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<?php if ($light_theme_logos) : ?>
							<?php foreach ($light_theme_logos as $light_theme_logo) :
								$light_logo = $light_theme_logo['logo'] ?? false;
								$cls = $light_theme_logo['class'] ?? false;
								$is_have_link = $light_theme_logo['add_link_to_badges'] ? $light_theme_logo['bagdes_url'] : '#';
								?>
								<?php if ($light_logo) : ?>
								<a
									target="_blank"
									href="<?php echo esc_url($is_have_link) ?>"
									class="what-block__image what-block__image--light what-block__image--<?php echo $cls ?>">
									<?php echo wp_get_attachment_image($light_logo['id'], 'full', false, array('alt' => $alt_title)) ?>
								</a>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
