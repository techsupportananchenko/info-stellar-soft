<?php
/**
 * Single service post page.
 */
?>

<?php

get_header(); ?>

<?php
$post_id = get_the_ID();
$case_btn_text = get_field('case_button_text', $post_id);
$case_btn_link = get_field('case_button_link', $post_id) ?? '#contact';
$title = get_the_title();
$excerpt = apply_filters('the_excerpt', get_the_excerpt());
$image_post = get_field('image_inner_post', $post_id) ? wp_get_attachment_url(get_field('image_inner_post', $post_id))
	: get_the_post_thumbnail_url($post_id, 'full');
$bg_color_intro = get_field('intro_section_color', $post_id);
$client_feedback = get_field('client_feedback_about', $post_id);
$technologies_used = get_field('technologies', $post_id) ?? false;
$services_used = get_field('services', $post_id) ?? false;
$industries = get_field('industries', $post_id) ?? false;
$location = get_field('location', $post_id) ?? false;
$numbber_of_team_members = get_field('number_of_team_members', $post_id) ?? false;
$link_to_case = get_field('link_to_case_project', $post_id) ?? false;
$css_class_team_experts = add_filter('add_team_experts_class', function ($classes) {
	return 'team-experts-section-single-case';
});
$post_breadcrumbs = (function_exists('yoast_breadcrumb') ? yoast_breadcrumb('<div class="case-intro__info breadcrumbs ">', '</div>', false) : null);

?>


	<section class="case-intro-section single-case-intro-section">
		<div class="intro-decor__container">
			<div class="intro-decor intro-decor--case"></div>
		</div>
		<div class="case-intro-section__wrap">
			<div class="case-intro-section__container">
				<div style="background-color: <?= $bg_color_intro ?>" class="case-intro-section__background-full"></div>
				<div class="case-intro">
					<div class="case-intro__head">
						<?php echo $post_breadcrumbs; ?>
					</div>
					<div class="case-intro__wrap">
						<div class="case-intro__body">
							<?php if ($title): ?>
								<div class="case-intro__title">
									<h1><?= $title ?></h1>
								</div>
							<?php endif; ?>
							<?php if ($excerpt): ?>
								<div class="case-intro__text">
									<p><?= $excerpt ?></p>
								</div>
							<?php endif; ?>
							<?php if ($case_btn_text): ?>
								<div class="case-intro__btn">
									<a target="_self" href="<?php echo $case_btn_link; ?>" class="new-btn new-btn--primary">
										<?php echo $case_btn_text ?>
									</a>
								</div>
							<?php else: ?>
								<div class="case-intro__btn">
									<button class="new-btn new-btn--primary">
										Get started with Stellar Soft
									</button>
								</div>
							<?php endif; ?>
						</div>
						<?php if ($image_post): ?>
							<div class="case-intro__img">
								<img src="<?= $image_post ?>" alt="img">
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="case-section single-case-section">
		<div class="case-section__container">
			<div class="case-section__wrap">
				<div class="case-navigation">
					<div class="case-navigation__wrap">
						<div class="case-navigation__gradient">
							<div class="case-navigation__body">
								<div class="case-navigation__subtitle">CLIENT</div>
								<?php if (isset($client_feedback['name_client'])):
									$client_name = $client_feedback['name_client'];
									?>
									<div class="case-navigation__title"><?= $client_name ?></div>
								<?php endif; ?>
								<?php if (isset($client_feedback['about'])):
									$client_feedback = $client_feedback['about'];
									?>
									<div class="case-navigation__text">
										<p><?= $client_feedback ?></p>
									</div>
								<?php endif; ?>
								<div class="case-navigation__location">
									<div class="case-navigation__location-blok">
										<?php if ($industries): ?>
											<div class="case-navigation__location-title">
												<span>Industries</span>
											</div>
											<?php foreach ($industries as $industry): ?>
												<?php if (isset($industry['industry']) && $industry['industry']):
													$id = $industry['industry'];
													$industry_name = get_the_title($id) ?? false;
													$industry_link = get_the_permalink($id) ?? false;
													$is_hide_link = $industry['hide_industry_link'];
													?>
													<div class="case-navigation__location-text">
														<?php if (!$is_hide_link): ?>
															<a href="<?= $industry_link; ?>"><?= $industry_name ?></a>
														<?php else: ?>
															<span><?= $industry_name ?></span>
														<?php endif; ?>
													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
									<div class="case-navigation__location-blok">
										<?php if ($location): ?>
											<div class="case-navigation__location-title">
												<span>Location</span>
											</div>
											<div class="case-navigation__location-text">
												<span><?= $location ?></span>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<?php
								if ($technologies_used): ?>
									<div class="case-navigation__subtitle">TECHNOLOGIES USED</div>
									<div class="case-navigation__buttons">
										<?php foreach ($technologies_used as $technology): ?>
											<?php if (isset($technology['technology']) && $technology['technology']):
												//Name of technology.
												$technology_name = get_the_title($technology['technology']) ?? false;
												//Link to technology.
												$technology_link = get_the_permalink($technology['technology']) ?? false;
												$is_hide_link = $technology['hide_technology_link'];
												?>
												<?php if (!$is_hide_link): ?>
												<a class="case-navigation__button" href="<?= $technology_link; ?>"
												   class="case-navigation__button"><?= $technology_name ?></a>
											<?php else: ?>
												<button class="case-navigation__button"><?= $technology_name ?></button>
											<?php endif; ?>
											<?php endif ?>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								<?php if ($services_used): ?>
									<div class="case-navigation__subtitle">SERVICES USED</div>
									<div class="case-navigation__services">
										<?php foreach ($services_used as $service): ?>
											<?php if (isset($service['service']) && $service['service']):
												$service_name = get_the_title($service['service']) ?? false;
												$service_link = get_the_permalink($service['service']) ?? '#';
												$is_hide_service_link = get_the_permalink($service['hide_service_link']) ?? false;
												?>
												<?php if ($service_name): ?>
												<div class="case-navigation__service">
													<?php if (!$is_hide_service_link): ?>
														<p><?= $service_name ?></p>
													<?php else: ?>
														<a href="<?= $service_link; ?>"><?= $service_name ?></a>
													<?php endif; ?>
												</div>
											<?php endif; ?>
											<?php endif; ?>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								<?php if ($numbber_of_team_members):
									?>
									<div class="case-navigation__subtitle">NUMBER OF TEAM MEMBERS</div>
									<div class="case-navigation__services">
										<div class="case-navigation__service">
											<p><?= $numbber_of_team_members ?></p>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="case-navigation__bottom">
							<?php if ($link_to_case):
								?>
								<a target="_blank" href="<?= $link_to_case ?>" class=case-navigation__link">
									<p>
										<?= $link_to_case ?>
									</p>
								</a>
								<a href="<?= $link_to_case ?>" class="new-btn new-btn--tertiary case-navigation__btn">
									<svg width="26" height="26" viewBox="0 0 26 26" fill="none"
										 xmlns="http://www.w3.org/2000/svg">
										<path
											d="M18.2769 11.7929V14.2071H20.2769V11.7929H18.2769ZM19.2769 6.13605H20.2769V5.13605H19.2769V6.13605ZM13.62 5.13605L11.2058 5.13605V7.13605H13.62V5.13605ZM20.2769 11.7929V6.13605H18.2769V11.7929H20.2769ZM19.2769 5.13605H13.62V7.13605H19.2769V5.13605ZM18.5698 5.42895L5.13477 18.864L6.54898 20.2782L19.984 6.84316L18.5698 5.42895Z"
											fill="#272727"/>
									</svg>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php if (have_posts()): ?>
					<div class="case-content post-content">
						<div class="case-content__wrap">
							<div class="case-content__body">
								<?php while (have_posts()):
									the_post();
									add_filter('the_content', 'stellarsoft_block_content_filter');
									the_content();
								endwhile;
								?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php
			//Widget contact us.
			get_template_part('template-parts/widget', 'case-post');
			?>
		</div>
	</section>


<?php get_footer();
