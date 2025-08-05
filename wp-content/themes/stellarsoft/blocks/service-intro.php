<?php
/**
 * Block Name: Service Intro
 *
 * This is the template that displays Service Intro Section
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$alt_title = get_the_title();
	$label = get_field( 'label_text' ) ?? false;
	$button = get_field( 'button' ) ?? false;
	$title = get_field( 'title' ) ?? false;
	$description = get_field( 'description' ) ?? false;
	$full_width_background = get_field( 'full_width_background' ) ?? false;
	$column_image = get_field( 'column_image' ) ?? false;
	$background_type = get_field( 'background_type' );
	$background_color = get_field('class_for_wrapper');
	?>
	<section class="case-intro-section">
		<div class="intro-decor__container">
			<div class="intro-decor intro-decor--case"></div>
		</div>
		<div class="case-intro-section__wrap">
			<div class="case-intro-section__container <?php echo  (!empty($background_color)) ? $background_color : '';?>">
				<?php if ( $full_width_background && $background_type == true ) : ?>
					<div class="case-intro-section__background-full">
						<?php echo wp_get_attachment_image( $full_width_background['id'], 'full', false, array('alt' => $alt_title) ) ?>
						<div class="case-intro-section__overlay"></div>
					</div>
				<?php endif; ?>
				<div class="case-intro">
					<div class="case-intro__head">
							<div class="case-intro__info">
								<?php if ( function_exists('yoast_breadcrumb') ) {
									yoast_breadcrumb('<div class="breadcrumbs" id="breadcrumbs">','</div>');
								} ?>
							</div>
						<a href="<?php echo get_home_url() ?>" class="case-intro__close"></a>
					</div>
					<div class="case-intro__wrap">
						<div class="case-intro__body">
							<?php if ( $title ) : ?>
								<div class="case-intro__title">
									<h1><?php echo wp_kses_post( $title ) ?></h1>
								</div>
							<?php endif; ?>
							<?php if ( $description ) : ?>
								<div class="case-intro__text">
									<?php echo apply_filters( 'the_content', $description ) ?>
								</div>
							<?php endif; ?>
							<div class="case-intro__btn">
								<?php if ( $button ) :
									$button_target = $button['target'] ? $button['target'] : '_self'; ?>
									<a class="new-btn new-btn--primary" target="<?php echo esc_attr( $button_target ); ?>" href="<?php echo $button['url'] ?>"><?php echo $button['title'] ?></a>
								<?php endif; ?>
							</div>
						</div>
						<?php if ( $column_image && $background_type !== true ) : ?>
							<div class="case-intro__img">
								<?php echo wp_get_attachment_image( $column_image['id'], 'large', false, array('alt' => $alt_title)  ) ?>
							</div>
						<?php endif; ?>
						<?php if ( $full_width_background && $background_type == true ) : ?>
							<div class="case-intro__img lg-hidden">
								<?php echo wp_get_attachment_image( $full_width_background['id'], 'large', false, array('alt' => $alt_title)  ) ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>


