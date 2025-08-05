<?php
/**
 * Block Name: Soft
 *
 * This is the template that displays Soft Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title') ?? false;
	$sub_title = get_field('sub_title') ?? false;
	$tailored_solutions = get_field('tailored_solutions') ?? [];
	$tailored_solutions_count = count($tailored_solutions);
	?>
	<section class="tailored-solutions">
		<div class="tailored-solutions__wrapper">
			<div class="tailored-solutions__container">
				<div class="section-head">
					<?php if ($title) : ?>
						<div class="section-head__title">
							<h2>
								<?php echo $title; ?>
							</h2>

						</div>
					<?php endif; ?>
					<?php if ($sub_title) : ?>
						<div class="section-head__text">
							<p>
								<?php echo $sub_title; ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
				<div class="tailored-solutions__content tailored-solutions-swiper">
					<div class="tailored-solutions__content-wrapper swiper-wrapper">
						<?php if ($tailored_solutions) :
							//Current index slide.
							foreach ($tailored_solutions as $index => $solution) :
								$solution_image = $solution['image'] ?? false;
								$solution_title = $solution['title'] ?? false;
								$solution_text = $solution['text'] ?? false;
								$bg_image = $solution['bg_image'] ?? false;
								?>
								<div data-current-slide-index="<?php echo $index ?>"
									 class="tailored-solutions__content-card swiper-slide">
									<?php if ($solution_image) : ?>
										<div class="tailored-solutions__content-image">
											<div class="tailored-solutions__content-image-item">
												<img src="<?php echo $solution_image ?>"
													 alt="<?php echo strtolower($solution_title) ?>">
											</div>
											<?php if ($bg_image) : ?>
												<div style="background-image: url('<?php echo $bg_image; ?>');
													background-repeat:no-repeat;background-position: center;background-size: cover"
													 class="tailored-solutions__content-bg">
												</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<div class="tailored-solutions__content-about">
										<div class="tailored-solutions__content-text">
											<?php if ($solution_title) : ?>
												<h3>
													<?php echo $solution_title ?>
												</h3>
											<?php endif; ?>
											<?php if ($solution_text) : ?>
												<p>
													<?php echo $solution_text ?>
												</p>
											<?php endif; ?>
										</div>
									</div>

								</div>

							<?php
							endforeach;
						endif; ?>
					</div>
					<div class="tailored-solutions__navigation slider-nav">
						<div class="slider-nav">
							<button
								class="tailored-solutions__navigation-prev slider-nav__btn swiper-button-disabled">
								<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.70711 9.29289L7.41421 10L6 11.4142L5.29289 10.7071L6.70711 9.29289ZM2 6L1.29289 6.70711L0.585787 6L1.29289 5.29289L2 6ZM5.29289 1.29289L6 0.585786L7.41421 2L6.70711 2.70711L5.29289 1.29289ZM5.29289 10.7071L1.29289 6.70711L2.70711 5.29289L6.70711 9.29289L5.29289 10.7071ZM1.29289 5.29289L5.29289 1.29289L6.70711 2.70711L2.70711 6.70711L1.29289 5.29289ZM2 5L15 5V7L2 7V5Z"/>
								</svg>
							</button>
							<div class="tailored-solutions__pagination slider-nav__pagination">
							</div>
							<button
								class="tailored-solutions__navigation-next slider-nav__btn">
								<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path
										d="M8.29289 9.29289L7.58579 10L9 11.4142L9.70711 10.7071L8.29289 9.29289ZM13 6L13.7071 6.70711L14.4142 6L13.7071 5.29289L13 6ZM9.70711 1.29289L9 0.585786L7.58579 2L8.29289 2.70711L9.70711 1.29289ZM9.70711 10.7071L13.7071 6.70711L12.2929 5.29289L8.29289 9.29289L9.70711 10.7071ZM13.7071 5.29289L9.70711 1.29289L8.29289 2.70711L12.2929 6.70711L13.7071 5.29289ZM13 5L0 5L0 7L13 7V5Z"/>
								</svg>
							</button>
						</div>
					</div>

				</div>

			</div>
		</div>

	</section>


<?php endif; ?>


