<?php
/**
 * Block Name: Intro
 *
 * This is the template that displays Intro Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$alt_title = get_the_title();
	$title = get_field('title') ?? false;
	$description = get_field('description') ?? false;
	$background_image = get_field('background_image') ?? false;
	$partners_title = get_field('partners_title') ?? false;
	$button = get_field('button') ?? false;
	$partners = get_field('partners'); //Repeater.

	?>
	<section class="intro-section">
		<div class="intro-section__container">
			<div class="intro-wrap">
				<div class="intro-wrap__row">
					<div class="intro-wrap__col">
						<div class="intro">
							<?php if ($title) : ?>
								<h1 class="main-title intro__title"><?= wp_kses_post($title) ?></h1>
							<?php endif; ?>
							<?php if ($description) : ?>
								<div
									class="base-text intro__text"><?php echo apply_filters('the_content', $description) ?></div>
							<?php endif; ?>

							<?php if ($button = get_field('button')) :
								$button_target = $button['target'] ? $button['target'] : '_self'; ?>
								<a type="button" class="new-btn new-btn--primary intro__btn"
								   target="<?php echo esc_attr($button_target); ?>"
								   href="<?php echo $button['url'] ?>"><?php echo $button['title'] ?></a>

							<?php endif; ?>
							<?php if ($partners_title) : ?>
								<div class="intro__companys-title intro__companys-title--tablet">
									<span><?php echo wp_kses_post($partners_title) ?></span>
								</div>
							<?php endif; ?>
							<?php if ($partners): ?>
								<div class="intro__companys">
									<?php foreach ($partners as $item):
										$partners_item = $item['partners_item'] ?>
										<?php if ($partners_item) : ?>
										<div class="intro__company intro__company">
											<?php echo wp_get_attachment_image($partners_item['id'], 'medium', false, array('alt' => $alt_title)) ?>                                    </div>
									<?php endif; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<img
								src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/intro-section/star1.svg"
								alt="" class="intro__star1">
							<img
								src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/intro-section/star2.svg"
								alt="" class="intro__star2">
							<img
								src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/intro-section/star3.svg"
								alt="" class="intro__star3 desktop">
						</div>
					</div>
					<?php if ($background_image) : ?>
						<div class="intro-wrap__col is-tablet">
							<div class="intro-img">
								<img src="<?php echo wp_get_attachment_image_url($background_image['id'], 'large'); ?>" alt="<?php echo esc_html($alt_title); ?>">
							</div>
						</div>
					<?php endif; ?>
					<div class="intro-wrap__col intro-wrap__col--tablet">
						<?php if ($partners_title) : ?>
							<div class="intro__companys-title big-text">
								<span><?php echo wp_kses_post($partners_title) ?></span>
							</div>
						<?php endif; ?>
						<?php if ($partners) : ?>
							<div class="intro__companys intro__companys--tablet">
								<?php foreach ($partners as $item)  :
									$partners_item = $item['partners_item'] ?>
									<?php if ($partners_item) : ?>
									<div class="intro__company intro__company">
										<?php echo wp_get_attachment_image($partners_item['id'], 'medium', false, array('alt' => $alt_title)) ?>
									</div>
								<?php endif; ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>
