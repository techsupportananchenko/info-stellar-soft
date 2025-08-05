<?php
/**
 * Single post loop.
 * For blog page.
 */
$post_id = get_the_ID();
$post_content = get_the_content();
$word_count = str_word_count(strip_tags($post_content));
$time_read_content = ceil($word_count / 225) . ' minutes read';
$post_url = get_permalink() ?? '#';
$post_title = get_the_title();
$post_image = get_field('image_banner', $post_id) ? wp_get_attachment_image(get_field('image_banner', $post_id),
	'full', false, array('alt' => $post_title)) : get_the_post_thumbnail($post_id, 'full');

$post_image_id = get_post_thumbnail_id($post_id);
$post_excerpt = get_the_excerpt();
$post_author = get_the_author();
$post_date = get_the_date();
$post_tags = get_the_terms($post_id, 'post_tag');
$post_breadcrumbs = (function_exists('yoast_breadcrumb') ? yoast_breadcrumb('<div class="blog-intro-section__breadcrumbs breadcrumbs">', '</div>', false) : null);
$author_id = get_the_author_meta('ID');
$co_authors = get_field('add_co_authors', $post_id);
$button = null;
$post_url_share = urlencode(get_permalink());
$post_title_share = urlencode(get_the_title());
$add_counters_side_titles = get_field('add_counter_titles_to_sidebar', $post_id) ? 'true' : 'false';

//Arguments for banner.
$args = [
	'css_class' => 'single-post-banner',
	'post_title' => $post_title,
	'post_image' => $post_image,
	'post_breadcrumbs' => $post_breadcrumbs,
];

//Intro banner section.
get_template_part('template-parts/case-intro-post', '', $args);
?>

<section class="single-post">
	<div class="single-post__container">
		<div class="single-post__wrap">
			<div class="single-post__sub-titles sub-titles">
				<div id="single-post-titles-nav" class="sub-titles__wrapper">
					<?php if ($time_read_content) : ?>
						<p class="sub-titles__title">
							<?php echo $time_read_content; ?>
						</p>
					<?php endif; ?>
					<div class="sub-titles__progress-bar">
						<div class="sub-titles__progress-fill">
							<span style="width: 5%" class="sub-titles__progress-status">
							</span>
						</div>
					</div>
					<ul data-counter-titles="<?php echo $add_counters_side_titles; ?>" class="sub-titles__list">
					</ul>
				</div>
			</div>
			<div class="single-post__article">
				<div class="single-post__content post-content">
					<div class="post-content__information">
						<?php if (!empty($post_date)): ?>
							<div class="post-content__date">
								<p>
									Last Updated | <?= $post_date ?>
								</p>
							</div>
						<?php endif; ?>
						<?php if (!empty($post_tags) && !is_wp_error($post_tags)): ?>
							<div class="post-content__category">
								<?php foreach ($post_tags as $tag):
									if ($tag->name):?>
										<div class="post-content__category-name blog-information-card__link">
											<?= $tag->name ?>
										</div>
									<?php endif;
								endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="single-post__social single-post__social--mobile">
							<div class="single-post__social-links">
								<a class="link-item"
								   href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_url_share ?>&title=<?= $post_title_share ?>"
								   target="_blank" rel="noopener noreferrer">
								</a>

								<a class="link-item"
								   href="https://twitter.com/intent/tweet?text=<?= $post_title_share ?>&url=<?= $post_url_share ?>&via=MySite"
								   target="_blank" rel="noopener noreferrer">
								</a>

								<a class="link-item"
								   href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_url_share ?>"
								   target="_blank" rel="noopener noreferrer">
								</a>

								<a class="link-item copy-link-post" href="<?php echo $post_url; ?>"
								   target="_blank" rel="noopener noreferrer">
								</a>
							</div>
						</div>
					</div>
					<?php if (!empty($post_excerpt)): ?>
						<div class="post-content__about">
							<?= $post_excerpt ?>
						</div>
					<?php endif; ?>
					<?php if (!empty($post_author)):
						get_template_part('template-parts/loop', 'author', $args = ['author_id' => $author_id, 'co_authors' => $co_authors]);
					endif; ?>
					<?php if (!empty($post_content)): ?>
						<div class="post-content__content">
							<?php
							add_filter('the_content', 'stellarsoft_block_content_filter');
							the_content();
							?>
						</div>

					<?php endif; ?>
				</div>
				<?php get_template_part('/template-parts/rating', ''); ?>
			</div>
			<div class="single-post__social single-post__social--desktop">
				<div class="single-post__social-links">
					<a class="link-item"
					   href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post_url_share ?>&title=<?= $post_title_share ?>"
					   target="_blank" rel="noopener noreferrer">
					</a>

					<a class="link-item"
					   href="https://twitter.com/intent/tweet?text=<?= $post_title_share ?>&url=<?= $post_url_share ?>&via=MySite"
					   target="_blank" rel="noopener noreferrer">
					</a>

					<a class="link-item"
					   href="https://www.facebook.com/sharer/sharer.php?u=<?= $post_url_share ?>"
					   target="_blank" rel="noopener noreferrer">
					</a>

					<a class="link-item copy-link-post" href="<?php echo $post_url; ?>"
					   target="_blank" rel="noopener noreferrer">
					</a>
				</div>
			</div>
		</div>
	</div>
	<div id="copy-post"
		 style="display:none;
		 position:fixed;
		 bottom:20px;
		 text-align: center;
		 left:50%;
		 transform:translate(-50%, -100%);;
		 background:#333;
		 color:#fff;
		 padding:10px 20px;
		 border-radius:5px;
		 z-index:9999;
		 transition: transform 0.4s ease;
	">

		Post link copied to clipboard
	</div>
</section>






