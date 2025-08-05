<?php
/**
 * Case intro banner component.
 * Used in single post banner intro blocks.
 */
?>

<?php
$image = $args['post_image'] ?? false;
$title = $args['post_title'] ?? false;
$breadcrumbs = $args['post_breadcrumbs'] ?? false;
$description = $args['post_description'] ?? false;
$button_text = $args['post_button']['text'] ?? false;
$button_link = $args['post_button']['link'] ?? false;
$background_overlay = $args['post_overlay_color'] ?? 'none';
$css_class = $args['css_class'] ?? '';

?>
<section class="case-intro-section <?php echo esc_attr($css_class) ?>">
	<div class="intro-decor__container">
		<div class="intro-decor intro-decor--case"></div>
	</div>

	<div class="case-intro-section__wrap">
		<div
			class="case-intro-section__container">
			<?php if ($image) : ?>
				<div class="case-intro-section__background-full">
					<?php echo $image; ?>
					<div style="background: <?php echo $background_overlay; ?>"
						 class="case-intro-section__overlay"></div>
				</div>
			<?php endif; ?>
			<div class="case-intro">
				<div class="case-intro__head">
					<?php if ($breadcrumbs) : ?>
						<div class="case-intro__info">
							<?php echo $breadcrumbs; ?>
						</div>
					<?php endif; ?>
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
						<?php if ($button_text) : ?>
							<div class="case-intro__btn">
								<a class="new-btn new-btn--primary"
								   href="<?php echo $button_link ?>" target="_self">
									<?php echo $button_text ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
					<?php if ($image) : ?>
						<div class="case-intro__img lg-hidden">
							<?php echo $image; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
