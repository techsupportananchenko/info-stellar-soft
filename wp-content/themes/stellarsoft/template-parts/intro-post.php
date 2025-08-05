<?php
/**
 * Post blog banner.
 * This banner copy of main banner on other pages.
 */
$post_id = get_the_ID();
$post_image_id = $args['post_image'] ?? null;
$post_excerpt = $args['post_excerpt'] ?? null;
$post_title = $args['post_title'] ?? null;
$post_breadcrumbs = $args['post_breadcrumbs'] ?? null;
$button = $args['post_button'] ?? null;
$button_link = $args['post_button']['link'] ?? null;
$button_text = $args['post_button']['text'] ?? null;
$css_class_banner = $args['css_class_banner'] ?? '';
?>

<section class="blog-intro-section <?= $css_class_banner ?>">
	<div class="blog-intro__container">
		<div class="intro-decor__container">
			<div class="intro-decor"></div>
		</div>
		<div class="blog-intro-section__wrap">
			<?php if ($post_image_id) :
				?>
				<div class="blog-intro-section__bg">
					<?php echo wp_get_attachment_image($post_image_id, 'full', false, array('alt' => get_the_title())); ?>
				</div>
			<?php endif; ?>
			<div class="blog-intro-section__decor blog-intro-section__decor--primary">
				<img src="/wp-content/themes/stellarsoft/assets/images/blog/blog-intro/1.svg" alt="decor">
			</div>
			<div class="blog-intro-section__decor blog-intro-section__decor--secondary">
				<img src="/wp-content/themes/stellarsoft/assets/images/blog/blog-intro/2.svg" alt="decor">
			</div>
			<div class="blog-intro-section__decor blog-intro-section__decor--tertiary">
				<img src="/wp-content/themes/stellarsoft/assets/images/blog/blog-intro/3.svg" alt="decor">
			</div>
			<div class="blog-intro-section__container">
				<div class="blog-intro">
					<?php if ($post_breadcrumbs) : ?>
						<div class="case-intro__head case-intro__head--absolute">
							<div class="case-intro__info case-intro__info--blak">
								<?= $post_breadcrumbs ?>
							</div>
							<a href="<?php echo home_url(); ?>" class="case-intro__close">
							</a>
						</div>
					<?php endif; ?>
					<div class="blog-intro__body">
						<?php if ($post_title): ?>
							<div class="blog-intro__title">
								<h1><?= $post_title ?></h1>
							</div>
						<?php endif; ?>
						<?php if ($post_excerpt): ?>
							<div class="case-intro__text">
								<p><?= $post_excerpt; ?></p>
							</div>
						<?php endif; ?>
						<?php if ($button): ?>
							<div class="blog-intro__btn">
								<a href="<?= $button_link; ?>" class="new-btn new-btn--primary">
									<?= $button_text; ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
