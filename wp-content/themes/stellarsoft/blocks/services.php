<?php
/**
 * Block Name: Services
 *
 * This is the template that displays Services Section
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field( 'title' ) ?? false;
	$description = get_field( 'description' ) ?? false;
	$services = get_field( 'services' ); // Relationship.
	?>
	<section class="services-section" id="services">
		<div class="services-section__container">
			<div class="section-head">
				<?php if ( $title ) :
					$title_target = $title['target'] ? $title['target'] : '_self'; ?>
					<div class="section-head__title">
						<a class="section-head__link" target="<?php echo esc_attr( $title_target ); ?>" href="<?php echo $title['url'] ?>">
							<h2><?php echo $title['title'] ?></h2>
							<div class="new-btn new-btn--tertiary section-head__btn">
								<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z" fill="#E3E3E3"/>
								</svg>
							</div>
						</a>
					</div>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<div class="section-head__text">
						<?php echo apply_filters( 'the_content', $description ) ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( $services ) :
				$i = 0;
				?>
				<div class="services-wrap">
					<div class="services-wrap__row">
						<?php foreach ( $services as $post ) :
							$i ++;
							// Setup this post for WP functions (variable must be named $post).
							setup_postdata( $post );
							$title     = get_the_title( $post->ID );
							$post_link = get_the_permalink( $post->ID );
							$excerpt   = get_the_excerpt( $post->ID ) ?? false;
							?>
							<div class="services-wrap__col services-wrap__col--item<?php echo $i ?>">
								<a href="<?php echo esc_url( $post_link ) ?>" class="services">
									<div class="services__wrap">
										<div class="services__content">
											<?php if ( $title ) : ?>
												<h3>
													<?php echo wp_kses_post( $title ) ?>
												</h3>
											<?php endif; ?>
											<?php if ( $excerpt ) : ?>
												<p class="services__text">
													<?php echo wp_kses_post( $excerpt ) ?>
												</p>
											<?php endif; ?>

										</div>

										<div class="services__btn">

                                <span class="new-btn new-btn--tertiary new-btn--tertiary--small">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z" fill="#E3E3E3"/>
                                    </svg>
                                </span>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; ?>

		</div>
	</section>
<?php endif; ?>
