<?php
/**
 * Block Name: Technologies
 *
 * This is the template that displays Technologies Section
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :

	$title = get_field( 'title' ) ?? false;
	$description = get_field( 'description' ) ?? false;
	$all_technologies_link = get_field( 'all_technologies_link' ) ?? false;
	$technologies_tabs = get_field( 'technologies_tabs' ); // Repeater.
	?>
	<section class="technologies-section">
		<div class="technologies-section__container">
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
			<?php if ( $technologies_tabs ) :
				$i = 0;
				?>
				<div data-tabs class="technologies">
					<nav data-tabs-titles class="technologies__navigation">
						<?php foreach ( $technologies_tabs as $technologies_tab ) :
							$i ++;
							$active_tab = $i == 1 ? '_tab-active' : '';
							$category   = $technologies_tab['category'] ?? false;
							?>
							<?php if ( $category ) : ?>
							<button type="button" class="technologies__title <?php echo $active_tab ?>"><?php echo wp_kses_post( $category ) ?></button>
						<?php endif; ?>
						<?php endforeach; ?>
					</nav>
					<div data-tabs-body class="technologies__content">
						<?php foreach ( $technologies_tabs as $category_content ) :
							$category_technologies = $category_content['category_technologies']; // Repeater;
							?>
							<?php if ( $category_technologies ) : ?>
							<div class="technologies__body">
								<div class="technologie-cards">
									<div class="technologie-cards__row">
										<?php foreach ( $category_technologies as $post ) :
											setup_postdata( $post );
											$title     = get_the_title( $post->ID ) ?? false;
											$post_link = get_the_permalink( $post->ID ) ?? false;
											$icon      = get_field( 'technology_icon', $post->ID ) ?? false;
											$icon_big      = get_field( 'technology_big_icon', $post->ID ) ?? false;
											$big_icon_select = get_field('big_icon' ,  $post->ID);
											?>
											<?php if ( $title ) : ?>
											<div class="technologie-cards__col">
												<div class="technologie-card">
													<div class="technologie-card__wrap" href="<?php echo esc_url( $post_link ) ?>" target="_self">
														<?php if ( $icon_big  && $big_icon_select == true) : ?>
															<div class="technologie-card__img technologie-card__img--big">
																<img loading="lazy" src="<?php echo $icon_big['url']?>" alt="<?php echo $icon_big['title']?>">
															</div>
														<?php elseif ($icon && $big_icon_select !== true) :?>
															<div class="technologie-card__img ">
																<img loading="lazy" src="<?php echo $icon['url']?>" alt="<?php echo $icon['title']?>">
															</div>
														<?php endif; ?>
														<div class="technologie-card__text">
															<p><?php echo wp_kses_post( $title ) ?></p>
														</div>
													</div>
												</div>
											</div>
										<?php endif; ?>
										<?php endforeach; ?>
										<?php if ( $all_technologies_link ) : ?>
											<div class="technologie-cards__col">
												<div class="technologie-card">
													<a class="technologie-card__wrap" href="<?php echo esc_url( $all_technologies_link['url'] ) ?>">
														<div class="technologie-card__img">
															<img src="<?php echo get_template_directory_uri() ?>/assets/images/technologies-section/0.svg" alt="icon">
														</div>
														<div class="technologie-card__text">
															<p><?php echo $all_technologies_link['title'] ?></p>
														</div>
													</a>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>


