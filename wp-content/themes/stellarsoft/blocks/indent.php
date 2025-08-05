<?php
/**
 * Block Name: Indent
 *
 * This is the template that displays Indent Section
 */

if ( isset( $block['data']['preview_image_help'] ) ) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :?>
	<div class="section-indent"></div>
<?php endif; ?>


