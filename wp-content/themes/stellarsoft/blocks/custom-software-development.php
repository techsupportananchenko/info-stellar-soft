<?php
/**
 * Block Name: Custom Software Development
 *
 * This is the template that displays Custom Software Development
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title') ?? false;
	$description = get_field('description') ?? false;
	$content = get_field('content'); // Repeater.
	?>
	<section class="custom-software-development">
		<div class="custom-software-development__container">
			<div class="section-head">
				<?php if ($title) : ?>
					<div class="section-head__title">
						<h2><?php echo $title ?></h2>
					</div>
				<?php endif; ?>
				<?php if ($description) : ?>
					<div class="section-head__text">
						<?php echo apply_filters('the_content', $description) ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($content) :
				$i = 0;
				?>
				<div class="custom-software-development-slider">
					<div class="custom-software-development-slider__wrapper swiper-wrapper ">
						<?php foreach ($content as $index => $item) :
							$i++;
							$title = $item['title_content'] ?? false;
							$sub_title = $item['sub_title'] ?? false;
							$thumbnail = $item['image_bg'] ?? false;
							$label_text = $item['label'] ?? false;
							$label_color = $item['label_color'];
							$active = $i == 1 ? 'active' : '';
							?>
							<div data-slide-index="<?php echo $index ?>"
								 class="works-slide swiper-slide <?php echo $active; ?>">
								<div class="works-slide__wrap">
									<?php if ($thumbnail) : ?>
										<div class="works-slide__img">
											<img src="<?php echo $thumbnail ?>" alt="<?php echo strtolower($title); ?>">
										</div>
									<?php endif; ?>
									<div class="works-slide__content">
										<?php if ($title) : ?>
											<div class="works-slide__head">
												<h3 class="works-slide__title"><?php echo wp_kses_post($title) ?></h3>
											</div>
										<?php endif; ?>
										<?php if ($sub_title) : ?>
											<div class="works-slide__body">
												<div class="works-slide__text">
													<?php echo $sub_title ?>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<?php if ($label_text) : ?>
									<div class="works-slide__label"
										 style="background-color:<?php echo $label_color ?> ;">
										<?php echo $label_text ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="custom-software-development__navigation slider-nav">
						<div class="slider-nav">
							<button type="button" class="slider-nav__btn slider-nav__btn--prev js-cases-prev">
								<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.70711 9.29289L7.41421 10L6 11.4142L5.29289 10.7071L6.70711 9.29289ZM2 6L1.29289 6.70711L0.585787 6L1.29289 5.29289L2 6ZM5.29289 1.29289L6 0.585786L7.41421 2L6.70711 2.70711L5.29289 1.29289ZM5.29289 10.7071L1.29289 6.70711L2.70711 5.29289L6.70711 9.29289L5.29289 10.7071ZM1.29289 5.29289L5.29289 1.29289L6.70711 2.70711L2.70711 6.70711L1.29289 5.29289ZM2 5L15 5V7L2 7V5Z"/>
								</svg>
							</button>
							<div class="custom-software-development__pagination slider-nav__pagination js-cases-pagination"></div>
							<button type="button" class="slider-nav__btn slider-nav__btn--next js-cases-next">
								<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path
										d="M8.29289 9.29289L7.58579 10L9 11.4142L9.70711 10.7071L8.29289 9.29289ZM13 6L13.7071 6.70711L14.4142 6L13.7071 5.29289L13 6ZM9.70711 1.29289L9 0.585786L7.58579 2L8.29289 2.70711L9.70711 1.29289ZM9.70711 10.7071L13.7071 6.70711L12.2929 5.29289L8.29289 9.29289L9.70711 10.7071ZM13.7071 5.29289L9.70711 1.29289L8.29289 2.70711L12.2929 6.70711L13.7071 5.29289ZM13 5L0 5L0 7L13 7V5Z"/>
								</svg>
							</button>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>


