<?php
/**
 * Single Author page.
 */


get_header();
?>


<?php
$author_id = get_the_author_meta('ID');
$author_name = get_the_author_meta('display_name');
$author_first_name = get_the_author_meta('first_name');
$author_last_name = get_the_author_meta('last_name');
$author_description = get_the_author_meta('description');
$author_breadcrumbs = (function_exists('yoast_breadcrumb') ?
	yoast_breadcrumb('<div class="blog-intro-section__breadcrumbs breadcrumbs">', '</div>', false) : null);
$author_avatar = get_avatar($author_id, 220);
$author_linkedin = get_the_author_meta('display_linkedin');
$author_telegram = get_the_author_meta('display_telegram', $author_id);
$author_position = get_the_author_meta('position');
$author_bg_image = get_the_author_meta('background_image_intro') ?
	wp_get_attachment_image_url(get_the_author_meta('background_image_intro'), 'full', false, array('class' => 'author-page__bg-image')) : '';
?>

	<section class="blog-intro-section author-page">
		<div class="intro-decor__container">
			<div class="intro-decor"></div>
		</div>
		<div class="author-page__wrapper">
			<div class="blog-intro-section__container">
				<div <?php echo(!$author_bg_image ? 'style="background:#DDD6D0"' : ''); ?> class="author-page__bg">
					<img src="<?php echo $author_bg_image; ?>" alt="<?php echo $author_first_name; ?>">
				</div>
				<div class="blog-intro">
					<?php if ($author_breadcrumbs) : ?>
						<div class="case-intro__head case-intro__head--absolute">
							<div class="case-intro__info">
								<?= $author_breadcrumbs ?>
							</div>
							<a href="<?php echo home_url(); ?>" class="case-intro__close">
							</a>
						</div>
					<?php endif; ?>
					<div class="blog-intro__body author-content">
						<?php if ($author_avatar): ?>
							<div class="author-content__avatar avatar-desktop">
								<?= $author_avatar ?>
							</div>
						<?php endif; ?>
						<div class="author-content__about">
							<div class="author-content__about-info">
								<?php if ($author_avatar): ?>
									<div class="author-content__avatar avatar-mobile">
										<?= $author_avatar ?>
									</div>
								<?php endif; ?>
								<div class="author-content__about-info-wrap">
									<?php if ($author_name): ?>
										<div class="author-content__about-name">
											<h1><?= $author_name ?></h1>
										</div>
									<?php endif; ?>
									<?php if ($author_position): ?>
										<div class="author-content__about-position">
											<p><?= $author_position; ?></p>
										</div>
									<?php endif; ?>
								</div>

							</div>
							<?php if ($author_description): ?>
								<div class="author-content__about-description">
									<p><?= $author_description; ?></p>
								</div>
							<?php endif; ?>
							<div class="author-content__about-socials">
								<p>
									<?php echo __('Follow ' . $author_first_name . ': ', 'stellarsoft'); ?>
								</p>
								<div class="author-content__socials-items">
									<?php if ($author_linkedin): ?>
										<a href="<?php echo $author_linkedin ?>" target="_blank"
										   class="linkedin"></a>
									<?php endif; ?>
									<?php if ($author_telegram): ?>
										<a href="<?php echo $author_telegram ?>" target="_blank"
										   class="telegram"></a>
									<?php endif; ?>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="author-page__posts">
		<div class="author-page__container">
			<?php
			add_filter('add_title_to_blog_information', function () use ($author_name) {
				return '<h2 class="author-page__title">' . __('Latest posts by ' . $author_name . ' ', 'stellar-soft') . '</h2>';
			});
			get_template_part('template-parts/widget', 'author'); ?>
		</div>
	</section>

<?php get_footer();

