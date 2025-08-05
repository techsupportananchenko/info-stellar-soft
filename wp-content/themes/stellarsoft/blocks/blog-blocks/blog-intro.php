<?php
/**
 * Block Name: Blog Intro.
 * Single blog page.
 * This is the template that displays Single blog page  Intro Section.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$button = get_field('button');
	$bg_image = get_field('intro_image') ?? false;
	$button_link = $button['url'] ?? '#';
	$button_text = $button['title'] ?? '';
	$label_btn = get_field('label_text');
	$content_banner = 0;
	$post_title = get_field('title') ?? false;
	$post_title_color = get_field('color_title') ?? '#fff';
	$post_title_size = get_field('title_font_size') ?? '50';
	$post_image = get_field('intro_image') ?? false;
	$post_breadcrumbs = (function_exists('yoast_breadcrumb') ? yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>', false) : false);
	$posts_tags = get_tags();
	//Disable tags buttons from hook.
	add_filter('show_tags_buttons', function () {
		return false;
	});
	?>
	<section class="intro-blog">
		<div class="intro-decor__container">
			<div class="intro-decor"></div>
		</div>
		<div class="intro-blog__container">
			<div class="intro-blog__navigation">
				<?php if ($post_breadcrumbs) : ?>
					<div class="case-intro__info">
						<?php echo $post_breadcrumbs; ?>
					</div>
				<?php endif; ?>
				<a href="<?php echo home_url(); ?>" class="case-intro__close"></a>
			</div>
			<div class="intro-blog__wrapper">
				<div class="intro-blog__content">
					<div class="intro-blog__title case-intro__title">
						<h1>
							<?php echo $post_title; ?>
						</h1>
					</div>
					<?php if ($bg_image): ?>
						<div style='background-image: url("<?php echo $bg_image; ?>")' class="intro-blog__bg-image">
						</div>
					<?php endif; ?>
					<?php if ($posts_tags && !is_wp_error($posts_tags)): ?>
						<div class="intro-blog__tags">
							<div class="blog-information">
								<div class="blog-main-button" id="mainButton">All articles</div>
								<div class="blog-information-navigations" id="hiddenBlock">
									<div class="blog-information-navigations__row">
										<?php if (!empty($posts_tags) && is_array($posts_tags)) :
											//Get all tags from posts.
											foreach ($posts_tags as $post_tag) :
												$tag_name = $post_tag->name;
												$tag_slug = $post_tag->slug;
												$tag_term_id = $post_tag->term_id;
												if (!empty($tag_name) && isset($tag_term_id)):
													?>
													<div class="blog-information-navigations__col">
														<a data-blog-information-slug="<?= $tag_slug; ?>"
														   data-blog-information-title="<?= $tag_term_id; ?>" href="#"
														   class="blog-information-navigation__link js-block-button button-active">
															<?= $tag_name; ?>
														</a>
													</div>
												<?php
												endif;
											endforeach;
										endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div class="intro-blog__search">
						<div class="intro-blog__search-wrapper">

							<input id="search-input-item" class="intro-blog__search-input search-input-component"
								   type="text"
								   placeholder=""
							>
							<label class="intro-blog__search-label" for="search-input-item">
								Search by name, author, article
							</label>
						</div>
						<button type="button" id="search-btn" class="intro-blog__search-btn new-btn new-btn--primary">
							Search
						</button>
					</div>
				</div>
			</div>

		</div>
	</section>
<?php endif; ?>
