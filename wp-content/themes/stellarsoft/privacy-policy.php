<?php
/*
Template Name: Privacy Policy and Terms & Conditions.
*/
get_header();
?>

<section class="policy">
	<div class="policy__container">
		<div class="policy__wrapper">
			<?php if (have_posts()):
				while (have_posts()):
					the_post();
					the_content();
				endwhile;
			endif; ?>
		</div>
	</div>
</section>

<?php
get_footer(); ?>
