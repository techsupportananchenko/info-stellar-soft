<?php

/**
 * Single Vacancy post template.
 */
get_header();
$post_id = get_the_ID();
$title = get_the_title();
$description = apply_filters('the_excerpt', get_the_excerpt());
$image = get_the_post_thumbnail($post_id, 'full');

?>


	<section class="case-intro-section">
		<div class="intro-decor__container">
			<div class="intro-decor intro-decor--case"></div>
		</div>
		<div class="case-intro-section__wrap">
			<div
				class="case-intro-section__container">
				<?php if ($image) : ?>
					<div class="case-intro-section__background-full">
						<?php echo $image; ?>
						<div class="case-intro-section__overlay"></div>
					</div>
				<?php endif; ?>
				<div class="case-intro">
					<div class="case-intro__head">
						<div class="case-intro__info">
							<?php if (function_exists('yoast_breadcrumb')) {
								yoast_breadcrumb('<div class="breadcrumbs" id="breadcrumbs">', '</div>');
							} ?>
						</div>
						<a href="<?php echo get_home_url() ?>" class="case-intro__close"></a>
					</div>
					<div class="case-intro__wrap">
						<div class="case-intro__body">
							<?php if ($title) : ?>
								<div class="case-intro__title">
									<h1><?php echo wp_kses_post($title) ?></h1>
								</div>
							<?php endif; ?>
							<?php if ($description) : ?>
								<div class="case-intro__text">
									<?php echo apply_filters('the_content', $description) ?>
								</div>
							<?php endif; ?>
							<div class="case-intro__btn">
								<a class="new-btn new-btn--primary"
								   href="#contact-vacancy">
									<?php echo __('Apply for the Job', 'stellarsoft') ?>
								</a>
							</div>
						</div>

						<div class="case-intro__img lg-hidden">
							<?php echo get_the_post_thumbnail() ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="single-vacancy">
		<div class="single-vacancy__container">
			<div class="single-vacancy__wrapper">
				<div class="single-vacancy__content">
					<?php
					if (get_field('vacancy')):
						$vacancy = get_field('vacancy') ?? false;
						$vacancy_title = $vacancy ['vacancy_name'] ?? false;
						$vacancy_description = $vacancy ['vacancy_about'] ?? false;
						$vacancy_location = $vacancy ['vacancy_location'] ?? false;
						$post_tags = get_the_terms($post_id, 'post_tag');
						?>
						<div class="single-vacancy__position">
							<?php if ($vacancy_title) : ?>
								<h3 class="single-vacancy__position-title">
									<?php echo $vacancy_title; ?>
								</h3>
							<?php endif ?>
							<?php if ($vacancy_location) : ?>
								<p class="single-vacancy__position-location">
									<?php echo $vacancy_location; ?>
								</p>
							<?php endif ?>
							<?php if ($vacancy_description) : ?>
								<p class="single-vacancy__position-description">
									<?php echo $vacancy_description; ?>
								</p>
							<?php endif ?>
							<?php if (!is_wp_error($post_tags) && !empty($post_tags)) : ?>
								<div class="single-vacancy__position-tags">
									<?php foreach ($post_tags as $tag) : ?>
										<div class="single-vacancy__position-tag">
											<?php echo $tag->name; ?>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php if (have_posts()): ?>
						<div class="single-vacancy__content-text post-content">
							<?php while (have_posts()):
								the_post();
								add_filter('the_content', 'stellarsoft_block_content_filter');
								the_content();
							endwhile;
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
		//Widget vacancy area.
		get_template_part('template-parts/widget', 'vacancy');
		?>
	</section>


<?php get_footer();
