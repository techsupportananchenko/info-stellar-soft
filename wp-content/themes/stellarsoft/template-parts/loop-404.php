<?php get_header(); ?>

<?php
// get acf fields for 404 page
$pages = get_field('pages', 'option') ?? false;
$page_404 = $pages['404_page'] ?? false;
$image = $page_404['image'] ?? false;
$title = $page_404['title'] ?? false;
$subtitle = $page_404['subtitle'] ?? false;
$button = $page_404['button'] ?? false;

?>
<?php if ($page_404) : ?>
	<section class="page404-section">
		<div class="page404__container">
			<div class="page404-wrapper">
				<div class="page404-content">
					<?php if ($image) : ?>
						<figure class="page404__image">
							<?php echo wp_get_attachment_image($image, ['480','330'], false, array('alt' => $title)); ?>
						</figure>
					<?php endif; ?>
					<?php if ($title) : ?>
						<h1 class="page404__title"><?php echo $title; ?></h1>
					<?php endif; ?>
					<?php if ($subtitle) : ?>
						<p class="page404__subtitle"><?php echo $subtitle; ?></p>
					<?php endif; ?>
					<?php if ($button) : ?>
						<a href="<?php echo $button['url']; ?>"
						   class="page404__button new-btn--primary"><?php echo $button['title']; ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php get_footer();
