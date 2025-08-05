<?php
/**
 * Block Name: Indent
 *
 * This is the template that displays Indent Section
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$alt_title = get_the_title();
	$title = get_field( 'title' ) ?? false;
	$description = get_field( 'description' ) ?? false;
	$icon = get_field( 'icon' ) ?? false;
	$button = get_field( 'button' ) ?? false;
	$content = get_field( 'content' ) ?? false;
	$image = get_field( 'image' ) ?? false;
	?>
	<section class="build-section">
		<div class="build-section__container">
			<div class="section-head">
				<?php if ( $title ) : ?>
					<div class="section-head__title">
						<h2><?php echo wp_kses_post( $title ) ?></h2>
					</div>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<div class="section-head__text">
						<?php echo apply_filters( 'the_content', $description ) ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="build">
				<div class="build__body">
					<div class="build__wrap">
						<?php if ( $icon ) : ?>
							<div class="build__icon">
								<?php echo display_svg( $icon ) ?>
							</div>
						<?php endif; ?>
						<?php if ( $content ) : ?>
							<div class="build__text">
								<?php echo apply_filters( 'the_content', $content ) ?>
							</div>
						<?php endif; ?>
						<?php if ( $button ) :
							$button_target = $button['target'] ? $button['target'] : '_self'; ?>
							<div class="build__btn">
								<a class="new-btn new-btn--primary" target="<?php echo esc_attr( $button_target ); ?>" href="<?php echo $button['url'] ?>"><?php echo $button['title'] ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( $image ) : ?>
					<div class="build__img">
						<?php echo wp_get_attachment_image( $image['id'], 'medium-large', false, array('alt' => $alt_title) ) ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>


