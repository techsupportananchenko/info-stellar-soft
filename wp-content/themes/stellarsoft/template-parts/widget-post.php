<?php
/**
 * Single post widget area.
 */

if (is_active_sidebar('single-post')) :;
	?>

	<section class="single-post">
		<?php dynamic_sidebar('single-post'); ?>
	</section>
<?php endif; ?>
