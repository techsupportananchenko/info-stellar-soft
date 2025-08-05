<?php
/**
 * Block Name: Blog
 *
 * This is the template that displays Blog Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title') ?? false;
	$description = get_field('description') ?? false;
	$featured_posts = get_field('featured_posts'); //Relationship.
	$remove_featured_post = get_field('remove_featured_post');
	$post_per_page = $remove_featured_post == true ? 4 : 3;
	?>
	<section class="blog-section">
		<div class="blog-section__container">
			<div class="section-head">
				<?php if ($title) :
					$title_target = $title['target'] ? $title['target'] : '_self'; ?>
					<div class="section-head__title">
						<a class="section-head__link" target="<?php echo esc_attr($title_target); ?>"
						   href="<?php echo $title['url'] ?>">

							<h2><?php echo $title['title'] ?></h2>
							<div class="new-btn new-btn--tertiary section-head__btn">
								<svg width="12" height="12" viewBox="0 0 12 12" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path
										d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z"
										fill="#E3E3E3"/>
								</svg>
							</div>
						</a>
					</div>

				<?php endif; ?>
				<?php if ($description) : ?>
					<div class="section-head__text">
						<?php echo apply_filters('the_content', $description) ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($featured_posts) :
				$i = 0;
				?>
				<div class="blog-block">
					<div class="blog-block__slider">
						<div class="js-blog-slider">
							<div class="blog-block__wrapper swiper-wrapper">
								<?php foreach ($featured_posts as $post) :
									$title = get_the_title($post->ID) ?? false;
									$post_link = get_the_permalink($post->ID) ?? false;
									$thumbnail = get_the_post_thumbnail($post->ID) ?? false;
									$label_color = get_field('label_color', $post->ID) ?? false;
									$excerpt = get_the_excerpt($post->ID) ?? false;
									$date = get_the_date('', $post->ID);
									?>
									<div class="blog-block__slide blog-block__slide--big swiper-slide">
										<a href="<?php echo esc_url($post_link) ?>" class="blog-card">
											<div class="blog-card__wrap blog-card__wrap--big">
												<div class="blog-card__img blog-card__img--big">
													<?php if ($thumbnail) : ?>
														<?php echo $thumbnail ?>
													<?php endif; ?>
												</div>
												<div class="blog-card__body blog-card__body--big">
													<div class="blog-card__title blog-card__title--big">
														<?php if ($title) : ?>
															<p><?php echo wp_kses_post($title) ?></p>
														<?php endif; ?>
													</div>
													<div class="blog-card__text blog-card__text--big">
														<?php if ($excerpt && $i == 1) : ?>
															<p><?php echo wp_kses_post($excerpt) ?></p>
														<?php else: ?>
															<p><?php echo wp_trim_words($excerpt, 12) ?></p>
														<?php endif; ?>
													</div>
													<div class="blog-card__bottom">
														<div class="blog-card__date blog-card__date--big">
															<p><?php echo $date ?></p>
														</div>
														<div class="blog-card__btn blog-card__btn--big">
                                                <span class="new-btn new-btn--tertiary">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
														 xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z"
															fill="#E3E3E3"/>
                                                    </svg>
                                                </span>
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>

								<?php endforeach; ?>
								<?php
								$args = array(
									'post_type' => 'post',
									'order' => 'DESC', // ASC, DESC
									'orderby' => 'date', // none, ID, author, title, name, date, modified, parent, rand, comment_count, menu_order, meta_value, meta_value_num, title menu_order, post__in
									'posts_per_page' => $post_per_page,

								);
								?>

								<?php $the_query = new WP_Query($args); ?>

								<?php if ($the_query->have_posts()) : ?>

									<!-- the loop -->
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<?php
										$title = get_the_title(get_the_ID()) ?? false;
										$post_link = get_the_permalink(get_the_ID()) ?? false;
										$thumbnail = get_the_post_thumbnail(get_the_ID()) ?? false;
										$label_color = get_field('label_color', get_the_ID()) ?? false;
										$excerpt = get_the_excerpt(get_the_ID()) ?? false;
										$date = get_the_date();
										$show_post = get_field('show_in_blog_section', get_the_ID());
										?>
										<?php if ($show_post !== true) : ?>
											<div class="blog-block__slide swiper-slide">
												<a href="<?php echo esc_url($post_link) ?>" class="blog-card">
													<div class="blog-card__wrap blog-card__wrap">
														<div class="blog-card__img blog-card__img">
															<?php if ($thumbnail) : ?>
																<?php echo $thumbnail ?>
															<?php endif; ?>
														</div>
														<div class="blog-card__body blog-card__body">
															<div class="blog-card__title blog-card__title">
																<?php if ($title) : ?>
																	<p><?php echo wp_kses_post($title) ?></p>
																<?php endif; ?>
															</div>
															<div class="blog-card__text blog-card__text">
																<?php if ($excerpt && $i == 1) : ?>
																	<p><?php echo wp_kses_post($excerpt) ?></p>
																<?php else: ?>
																	<p><?php echo wp_trim_words($excerpt, 12) ?></p>
																<?php endif; ?>
															</div>
															<div class="blog-card__bottom">
																<div class="blog-card__date blog-card__date">
																	<p><?php echo $date ?></p>
																</div>
																<div class="blog-card__btn blog-card__btn">
                                                <span class="new-btn new-btn--tertiary">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
														 xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z"
															fill="#E3E3E3"/>
                                                    </svg>
                                                </span>
																</div>
															</div>
														</div>
													</div>
												</a>
											</div>

										<?php endif; ?>

									<?php endwhile; ?>
									<!-- end of the loop -->
									<?php wp_reset_postdata(); ?>

								<?php endif; ?>

							</div>
							<div class="slider-nav">
								<button type="button" class="slider-nav__btn slider-nav__btn--prev js-blog-prev">
									<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
										 xmlns="http://www.w3.org/2000/svg">
										<path
											d="M6.70711 9.29289L7.41421 10L6 11.4142L5.29289 10.7071L6.70711 9.29289ZM2 6L1.29289 6.70711L0.585787 6L1.29289 5.29289L2 6ZM5.29289 1.29289L6 0.585786L7.41421 2L6.70711 2.70711L5.29289 1.29289ZM5.29289 10.7071L1.29289 6.70711L2.70711 5.29289L6.70711 9.29289L5.29289 10.7071ZM1.29289 5.29289L5.29289 1.29289L6.70711 2.70711L2.70711 6.70711L1.29289 5.29289ZM2 5L15 5V7L2 7V5Z"/>
									</svg>
								</button>
								<div class="slider-nav__pagination js-blog-pagination"></div>
								<button type="button" class="slider-nav__btn slider-nav__btn--next js-blog-next">
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
			<?php endif; ?>
		</div>
	</section>
	<?php
	// Reset the global post object so that the rest of the page works correctly.
	wp_reset_postdata();
	?>
<?php endif; ?>


