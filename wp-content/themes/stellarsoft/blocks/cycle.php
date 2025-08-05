<?php
/**
 * Block Name: Cycle
 *
 * This is the template that displays Cycle Section
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field( 'title' ) ?? false;
	$description = get_field( 'description' ) ?? false;
	$tabs = get_field( 'cycle_tabs' ); // Repeater.
	?>
	<section class="cycle-section">
		<div class="cycle-section__container">
			<?php if ( $title || $description ) : ?>
				<div class="section-head">
					<?php if ( $title ) : ?>
						<div class="section-head__title">
							<h2><?php echo wp_kses_post( $title ) ?></h2>
						</div>
					<?php endif; ?>
					<?php if ( $description ) : ?>
						<div class="section-head__text">
							<?php echo apply_filters( 'the_content', $description ) ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ( $tabs ) :
				$number = 0;
				$i = 0;
				?>
				<div class="cycle-section__slider">
					<div class="cycle-slider js-cycle-slider">
						<div class="swiper-wrapper">
							<?php foreach ( $tabs as $tab ) :
								$number ++;
								$title   = $tab['title'] ?? false;
								$content = $tab['content'] ?? false;
								?>
								<?php if ( $title || $content ) : ?>
								<div class="swiper-slide">
									<div class="cycle-card">
										<div class="cycle-card__wrap">
											<div class="cycle-card__number">
												<span>0<?php echo $number ?>/</span>
											</div>
											<?php if ( $title ) : ?>
												<div class="cycle-card__title">
													<p>
														<?php echo wp_kses_post( $title ) ?>
													</p>
												</div>
											<?php endif; ?>
											<?php if ( $content ) : ?>
												<div class="cycle-card__text">
													<?php echo apply_filters( 'the_content', $content ) ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>
						<div class="cycle-pagination js-cycle-pagination">
							<?php foreach ( $tabs as $tab ) :
								$i ++;
								$first_item = $i == 1 ? 'active current' : '';
								$title      = $tab['title'] ?? false;
								?>
								<?php if ( $title ) : ?>
								<div class="cycle-pagination__item <?php echo $first_item ?>">
									<div class="cycle-pagination__point"></div>
									<div class="cycle-pagination__text"><?php echo wp_kses_post( $title ) ?></div>
								</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>


