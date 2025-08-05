<?php
/**
 * Block Name: FAQ
 *
 * This is the template that displays FAQ Section
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$title = get_field( 'title' ) ?? false;
	$faq = get_field( 'faq' ); // Repeater.
	?>
	<section class="questions-section">
		<div class="questions-section__container">
			<div class="questions">
				<?php if ( $title ) : ?>
					<div class="questions__title">
						<h2><?php echo wp_kses_post( $title ) ?></h2>
					</div>
				<?php endif; ?>
				<?php if ( $faq ) : ?>
					<div data-spollers data-one-spoller class="questions-spollers">
						<?php foreach ( $faq as $item ) :
							$question = $item['question'] ?? false;
							$answer = $item['answer'] ?? false;
							?>
							<?php if ( $question && $answer ) : ?>
							<details class="questions-spollers__item">
								<summary class="questions-spollers__title">
									<h3><?php echo wp_kses_post( $question ) ?></h3>
								</summary>
								<div class="questions-spollers__body">
									<?php echo apply_filters( 'the_content', $answer ) ?>
								</div>
							</details>
						<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>


