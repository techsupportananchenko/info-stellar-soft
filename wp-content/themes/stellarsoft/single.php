<?php
/**
 * Single post template render content.
 */
if (!defined('ABSPATH')) exit;

get_header(); ?>
	<div id="site-content" class="content">
		<?php
		if (have_posts()):
			while (have_posts()): the_post();
				//Template for loop.
				get_template_part('template-parts/loop', 'single');
			endwhile;
		endif;

		//Widget area with secondary content.
		get_template_part('template-parts/widget', 'post');
		?>
	</div>
<?php
get_footer();
