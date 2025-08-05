<?php
/**
 * Block Name: Simple text
 *
 * This is the template that displays Simple text
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$simple_text_title = get_field( 'simple_text_title' );
	$simple_text_description = get_field( 'simple_text_description' );
	$section_class =  isset($block['className']) ? $block['className'] : '';

	?>

	<?php if ( $simple_text_description ) : ?>
		<div class="simple-text <?php echo $section_class ?>">
			<?php if ( $simple_text_title ) : ?>
				<h4 class="simple-text__title">
					<?php echo $simple_text_title; ?>
				</h4>
			<?php endif; ?>
			<div class="simple-text__description">
				<?php echo $simple_text_description; ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>