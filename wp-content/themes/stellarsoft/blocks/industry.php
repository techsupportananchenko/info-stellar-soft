<?php
/**
 * Block Name: Industry
 *
 * This is the template that displays Industry Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field('title') ?? false;
	$description = get_field('description') ?? false;
	$all_industries_link = get_field('all_industries_link') ?? false;
	$industries = get_field('industries'); // Relationship.
	?>
	<section class="industry-section">
		<div class="industry-section__container">
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
			<?php if ($industries) :
				$i = 0;
				?>
				<div class="industry">
					<div class="industry__wrap">
						<?php foreach ($industries as $post) :
							$i++;
							$active = $i == 1 ? 'active' : '';
							// Setup this post for WP functions (variable must be named $post).
							setup_postdata($post);
							$title = get_the_title($post->ID) ?? false;
							$thumbnail = get_the_post_thumbnail_url($post->ID) ?? false;
							$label_color = get_field('label_color', $post->ID) ?? false;
							$excerpt = get_the_excerpt($post->ID) ?? false;
							$permalink = get_the_permalink($post->ID) ?? false;
							$hide_link = get_field('hide_link_in_industry_block', $post->ID) ?? false;
							?>
							<div class="industry__block js-industry <?php echo $active ?>">
								<div class="industry__img" <?php bg($thumbnail, 'large') ?>>
									<div class="industry__tag" style="background-color: <?php echo $label_color ?>">
										<?php if ($title) : ?>
											<span><?php echo wp_kses_post($title) ?></span>
										<?php endif; ?>
									</div>
									<?php if ($permalink && !$hide_link) : ?>
										<a href="<?php echo $permalink; ?>" class="industry__link-to-post">
											  <span class="new-btn new-btn--tertiary new-btn--tertiary--small">
                               				     <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
													  xmlns="http://www.w3.org/2000/svg">
                                   			     <path
													 d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z"
													 fill="#E3E3E3"/>
                                  				  </svg>
                               				 </span>
										</a>
									<?php endif; ?>
									<?php if ($hide_link) : ?>
										<div class="industry__link-to-post">
											  <span class="new-btn new-btn--tertiary new-btn--tertiary--small">
                               				     <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
													  xmlns="http://www.w3.org/2000/svg">
                                   			     <path
													 d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z"
													 fill="#E3E3E3"/>
                                  				  </svg>
                               				 </span>
										</div>
									<?php endif; ?>
								</div>
								<div class="industry__body">
									<?php if ($title) : ?>
										<?php if ($hide_link): ?>
											<p class="industry__title">
												<?php echo wp_kses_post($title) ?>
											</p>
										<?php else: ?>
											<a href="<?php echo $permalink; ?>" class="industry__title">
												<?php echo wp_kses_post($title) ?>
											</a>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($excerpt) : ?>
										<span class="industry__descr"><?php echo wp_kses_post($excerpt) ?></span>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
						<?php if ($all_industries_link) :
							$all_industries_link_target = $all_industries_link['target'] ? $all_industries_link['target'] : '_self'; ?>
							<div class="industry__block">
								<a class="industry__link" target="<?php echo esc_attr($all_industries_link_target); ?>"
								   href="<?php echo $all_industries_link['url'] ?>">

									<span><?php echo $all_industries_link['title'] ?> <img
											src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/industry-section/down.svg"
											alt=""></span>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php
	// Reset the global post object so that the rest of the page works correctly.
	wp_reset_postdata(); ?>
<?php endif; ?>


