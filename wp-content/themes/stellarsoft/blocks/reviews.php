<?php
/**
 * Block Name: Reviews
 *
 * This is the template that displays Reviews Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
$title = get_field('title') ?? false;
$description = get_field('description') ?? false;
$reviews = get_field('reviews'); // Repeater.
?>
<section class="reviews-section">
	<div class="reviews-section__container">
		<div class="section-head">
			<?php if ($title) : ?>
				<div class="section-head__title">
					<h2><?php echo wp_kses_post($title) ?></h2>
				</div>
			<?php endif; ?>
			<?php if ($description) : ?>
				<div class="section-head__text">
					<?php echo apply_filters('the_content', $description) ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if ($reviews) :
		$i = 0;
		?>
			<?php
			if (!function_exists('render_review_slide')) {
				function render_review_slide($content, $index, $screen_size = 'desktop') {
					$plain_text = wp_strip_all_tags($content);
					$screen_sizes = [
						'mobile'  => 200,
						'tablet'  => 250,
						'desktop' => 380
					];
					$max_chars = $screen_sizes[$screen_size] ?? 380;
					$is_long = strlen($plain_text) > $max_chars;

					if ($is_long) {
						$trimmed_text = substr($plain_text, 0, $max_chars) . '...';
						$output = '<p>' . esc_html($trimmed_text) . '</p>';
						$output .= '<button type="button" class="review-slide__link" data-popup="#Review-Popup-' . esc_attr($index) . '">' . __('See more', 'stellarsoft') . '</button>';
					} else {
						$output = $content;
					}

					return $output;
				}
			}

			?>
		<div class="review-slider js-review-slider">
			<div class="swiper-wrapper">
				<?php foreach ($reviews as $item) :
				$i++;
				$photo = $item['photo']['id'] ?? false;
				$name = $item['name'] ?? false;
				$position = $item['position'] ?? false;
				$icon = $item['icon'] ?? false;
				$comment = $item['comment'] ?? false;
				$tech_title = $item['technology_title'] ?? false;
				$tech_icons = $item['technology_icons'] ?? false;
				?>
				<div class="swiper-slide">
					<div class="review-slide">
						<div class="review-slide__wrap">
							<?php if ($photo) : ?>
								<div class="review-slide__avatar widescreen-lg">
									<?php echo wp_get_attachment_image($photo, 'medium-large', false, array('alt' => $name)) ?>
								</div>
							<?php endif; ?>
							<div class="review-slide__content">
								<div class="review-slide__head">
									<div class="review-slide__img">
										<?php if ($photo) : ?>
											<div class="review-slide__avatar widescreen-lg-none">
												<?php echo wp_get_attachment_image($photo, 'medium-large', false, array('alt' => $name)) ?>
											</div>
										<?php endif; ?>
										<?php if ($icon) : ?>
											<div class="review-slide__icon">
												<?php echo display_svg($icon) ?>                                                    </div>
										<?php endif; ?>
									</div>
									<?php if ($name) : ?>
										<div class="review-slide__autor">
											<h3 class="review-slide__autor-name"><?php echo wp_kses_post($name) ?></h3>
											<?php if ($position) : ?>
												<div class="review-slide__autor-post">
													<?php echo wp_kses_post($position) ?>
												</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
								<div class="review-slide__body">
									<?php if ($comment) : ?>
										<div class="review-slide__text">
											<?php
											$screen_size = $_GET['screen_size'] ?? ($_COOKIE['screen_size'] ?? 'desktop');
											echo render_review_slide($comment, $i, $screen_size);
											?>
										</div>
									<?php endif; ?>
								</div>
								<div class="review-slide__footer">
									<?php if ($tech_title) : ?>
									<p class="review-slide__technology"><?php echo wp_kses_post($tech_title) ?></p>
									<?php endif; ?>
									<div class="review-slide__technology-items">
										<?php if ($tech_icons) : ?>
											<?php foreach ($tech_icons as $tech_icon): ?>
												<div class="review-slide__technology-row">
													<div class="review-slide__technology-col">
														<div class="review-slide__technology-icon">
															<div class="review-slide__technology-img">
																<?php
																echo display_svg($tech_icon['icon']) ?>
															</div>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="slider-nav">
				<button type="button" class="slider-nav__btn slider-nav__btn--prev js-review-prev">
					<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
						 xmlns="http://www.w3.org/2000/svg">
						<path
							d="M6.70711 9.29289L7.41421 10L6 11.4142L5.29289 10.7071L6.70711 9.29289ZM2 6L1.29289 6.70711L0.585787 6L1.29289 5.29289L2 6ZM5.29289 1.29289L6 0.585786L7.41421 2L6.70711 2.70711L5.29289 1.29289ZM5.29289 10.7071L1.29289 6.70711L2.70711 5.29289L6.70711 9.29289L5.29289 10.7071ZM1.29289 5.29289L5.29289 1.29289L6.70711 2.70711L2.70711 6.70711L1.29289 5.29289ZM2 5L15 5V7L2 7V5Z"/>
					</svg>
				</button>
				<div class="slider-nav__pagination js-review-pagination"></div>
				<button type="button" class="slider-nav__btn slider-nav__btn--next js-review-next">
					<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
						 xmlns="http://www.w3.org/2000/svg">
						<path
							d="M8.29289 9.29289L7.58579 10L9 11.4142L9.70711 10.7071L8.29289 9.29289ZM13 6L13.7071 6.70711L14.4142 6L13.7071 5.29289L13 6ZM9.70711 1.29289L9 0.585786L7.58579 2L8.29289 2.70711L9.70711 1.29289ZM9.70711 10.7071L13.7071 6.70711L12.2929 5.29289L8.29289 9.29289L9.70711 10.7071ZM13.7071 5.29289L9.70711 1.29289L8.29289 2.70711L12.2929 6.70711L13.7071 5.29289ZM13 5L0 5L0 7L13 7V5Z"/>
					</svg>
				</button>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
	<?php if ($reviews) :
	$n = 0;
	?>
	<?php foreach ($reviews as $item) :
	$n++;
	$photo = $item['photo']['id'] ?? false;
	$name = $item['name'] ?? false;
	$position = $item['position'] ?? false;
	$icon = $item['icon'] ?? false;
	$comment = $item['comment'] ?? false;
	$tech_title = $item['technology_title'] ?? false;
	$tech_icons = $item['technology_icons'] ?? false;
	?>
	<div id="Review-Popup-<?php echo $n ?>" aria-hidden="true" class="review-popup-wrap">
		<div class="review-popup popup__content">
			<button type="button" class="review-popup__close js-popup-close"
					data-close="#Review-Popup-<?php echo $n ?>"></button>
			<div class="review-popup__wrap">
				<div class="review-popup__head">
					<div class="review-popup__head-wrapper">
						<?php if ($photo) : ?>
							<div class="review-popup__avatar">
								<?php echo wp_get_attachment_image($photo, 'medium-large', false, array('alt' => $name)) ?>
							</div>
						<?php endif; ?>
						<?php if ($icon) : ?>
							<div class="review-popup__icon">
								<?php echo wp_get_attachment_image($icon['id'], 'thumbnail', false, array('alt' => $name)) ?>
							</div>
						<?php endif; ?>
					</div>
					<?php if ($name) : ?>
						<div class="review-popup__autor">
							<h2 class="review-popup__autor-name"><?php echo wp_kses_post($name) ?></h2>
							<?php if ($position) : ?>
								<div class="review-popup__autor-post">
									<?php echo wp_kses_post($position) ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ($comment) : ?>
					<div class="review-popup__body">
						<div class="review-popup__autor-text">
							<?php echo apply_filters('the_content', $comment) ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($tech_icons) : ?>
					<div class="review-popup__footer">
						<p class="review-popup__technology"><?php echo $tech_title ?></p>
						<div class="review-popup__technology-row">
							<?php foreach ($tech_icons as $tech_icon) : ?>
								<div class="review-popup__technology-icon">
									<div class="review-popup__technology-img">
										<img src="<?php echo $tech_icon['icon'] ?>"
											 alt="">
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<?php endif; ?>

<?php endif; ?>

