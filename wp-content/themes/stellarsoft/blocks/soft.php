<?php
/**
 * Block Name: Soft
 *
 * This is the template that displays Soft Section
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$alt_title = get_the_title();
	$title_first = get_field( 'title_first_part' ) ?? false;
	$title_second = get_field( 'title_second_part' ) ?? false;
	$content = get_field( 'content' ) ?? false;
	$button = get_field( 'button' ) ?? false;
	?>
	<?php if ( $title_first || $content ) : ?>
	<section class="soft-section">
		<div class="soft-section__container">
			<div class="soft">
				<div class="soft__wrap">
					<?php if ( $title_first || $title_second ) : ?>
						<div class="soft__title">
							<h2><?php echo wp_kses_post( $title_first ) ?>
								<br class="phone-none"> <?php echo wp_kses_post( $title_second ) ?></h2>
						</div>
					<?php endif; ?>
					<?php if ( $content ) : ?>
						<div class="soft__text">
							<?php echo apply_filters( 'the_content', $content ) ?>
						</div>
					<?php endif; ?>
					<?php if ( $button ) :
						$button_target = $button['target'] ? $button['target'] : '_self'; ?>
						<div class="soft__btn">
							<a class="soft__btn--btn new-btn new-btn--primary" target="<?php echo esc_attr( $button_target ); ?>" href="<?php echo $button['url'] ?>"><?php echo $button['title'] ?></a>
						</div>
					<?php endif; ?>
					<div class="soft__bg soft__bg--1">
						<img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/soft-section/1.png" alt="<?php echo esc_html($alt_title); ?>">
					</div>
					<div class="soft__bg soft__bg--2">
						<img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/soft-section/2.png" alt="<?php echo esc_html($alt_title); ?>">
					</div>
					<div class="soft__bg soft__bg--3">
						<img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/soft-section/3.png" alt="<?php echo esc_html($alt_title); ?>">
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php endif; ?>


