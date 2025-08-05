<?php

/**
 * The footer
 *
 * @package Stellarsoft
 */

?>
<?php get_sidebar(); ?>
</div>
</div>
<?php if (!is_single('service')) : ?>
	<footer class="footer">
		<?php
		$footer_newsletter = get_field('enable_footer_form', 'option') ?? false;
		$newsletter_form = get_field('footer_form', 'option') ?? false;
		$footer_form_title = get_field('footer_form_title', 'option') ?? false;
		$footer_socials = get_field('socials', 'option'); // Repeater.
		$copyright = get_field('copyright', 'option') ?? false;
		$awards_title = get_field('awards_title', 'option') ?? false;
		$awards = get_field('awards_items', 'option') ?? false;
		$terms_and_conditions = get_field('terms_and_conditions', 'option') ?? false;
		$privacy_policy = get_field('privacy_policy', 'option') ?? false;
		?>

		<div class="footer__container">
			<div class="footer__wrap">
				<div class="footer-inner__container">
					<div class="footer__awards">
						<?php if ($awards_title) : ?>
							<p class="footer__awards-title">
								<?php echo $awards_title ?>
							</p>
							<?php if ($awards): ?>
								<div class="footer__awards-items">
									<?php foreach ($awards as $award) :
										$image = $award['award'] ?? false;
										$link = $award['link'] ?? '#';
										?>
										<?php if ($image) : ?>
										<a target="_blank" href="<?php echo $link; ?>" class="footer__award">
											<img src="<?php echo $image ?>" alt="footer-award"
												 class="footer__award-icon">
										</a>
									<?php endif ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="footer__top">
						<div class="footer-links">
							<div class="footer-links__row">
								<?php if ($footer_newsletter): ?>
									<div class="footer__wrapper">
										<?php if ($footer_form_title) : ?>
											<h2 class="footer__title"><?php echo wp_kses_post($footer_form_title) ?></h2>
										<?php endif; ?>
										<?php if ($newsletter_form) : ?>
											<?php echo apply_filters('the_content', $newsletter_form) ?>
										<?php endif; ?>
										<?php if ($pp_description) : ?>
											<p class="footer-form__descr <?php if (!$footer_newsletter): ?>hidden<?php endif; ?>"><?php echo wp_kses_post($pp_description) ?>
												<?php if ($pp_link) :
													$pp_link_target = $pp_link['target'] ? $pp_link['target'] : '_self'; ?>
													<a class="footer-form__link"
													   target="<?php echo esc_attr($pp_link_target); ?>"
													   href="<?php echo $pp_link['url'] ?>"><?php echo $pp_link['title'] ?></a>
												<?php endif; ?>
											</p>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if ($footer_socials && !$footer_newsletter) : ?>
									<div class="footer__wrapper footer__wrapper__socials">
										<div class="footer__soc is-widescreen-lg">
											<?php foreach ($footer_socials as $footer_social) :
												$link = $footer_social['link'] ?? false;
												$icon = $footer_social['icon'] ?? false;
												?>
												<?php if ($link) :
												$link_target = $link['target'] ? $link['target'] : '_blank'; ?>
												<a class="footer__icon" target="<?php echo esc_attr($link_target); ?>"
												   href="<?php echo $link['url'] ?>">
													<?php if ($icon) : ?>
														<?php echo display_svg($icon) ?>
													<?php endif; ?>
												</a>
											<?php endif; ?>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endif; ?>


								<?php if (is_active_sidebar('sidebar-footer')) : ?>
									<?php dynamic_sidebar('sidebar-footer'); ?>
								<?php endif; ?>
							</div>
							<?php if ($footer_socials) : ?>
								<div class="footer__soc is-widescreen-lg-none WP">
									<?php foreach ($footer_socials as $footer_social) :
										$link = $footer_social['link'] ?? false;
										$icon = $footer_social['icon'] ?? false;
										?>
										<?php if ($link) :
										$link_target = $link['target'] ? $link['target'] : '_blank'; ?>
										<a class="footer__icon" target="<?php echo esc_attr($link_target); ?>"
										   href="<?php echo $link['url'] ?>">
											<?php if ($icon) : ?>
												<?php echo display_svg($icon) ?>
											<?php endif; ?>
										</a>
									<?php endif; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php if ($copyright) : ?>
						<div class="footer__bottom">
							<?php if ($terms_and_conditions || $privacy_policy) :
								$pp_link = $terms_and_conditions['url'] ?? '#';
								$pp_text = $terms_and_conditions['title'] ?? '';
								$tc_link = $privacy_policy['url'] ?? '#';
								$tc_text = $privacy_policy['title'] ?? '';
								?>
								<p class="footer__bottom-terms-and-conditions">
									<a target="_blank" href="<?php echo $pp_link ?>"><?php echo $pp_text ?></a>
									<span class="footer__bottom-divider">|</span>
									<a target="_blank" href="<?php echo $tc_link ?>"><?php echo $tc_text ?></a>
								</p>
							<?php endif; ?>
							<p class="footer__bottom-text">
								<span class="footer__bottom-copy">&#169;</span>
								<?php echo wp_kses_post($copyright) ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer>
	<?php get_template_part('template-parts/cookie', 'banner', ['text' => get_field('cookie_baner_text', 'option')]); ?>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>
