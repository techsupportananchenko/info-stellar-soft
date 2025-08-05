<?php
/**
 * Block Name: Industries tabs.
 * Here post type form industries.
 * This is the template that displays Technologies Stack
 */


//Selected posts from Field ACF.
$selected_posts = get_field('industries_posts');
$industries_title = get_field('industries_title');
$industries_sub_title = get_field('industries_sub_title');
$show_link_single_industry = get_field('show_button');
?>
<?php if (!empty($selected_posts) && is_array($selected_posts)): ?>
	<section class="industries">
		<div class="industries__container">
			<div class="industries__about">
				<?php if ($industries_title): ?>
					<h2 class="industries__title">
						<?= $industries_title; ?>
					</h2>
				<?php endif; ?>
				<?php if ($industries_sub_title): ?>
					<p class="industries__sub-title">
						<?= $industries_sub_title; ?>
					</p>
				<?php endif; ?>
			</div>

			<div data-tabs class="tabs">
				<nav data-tabs-titles class="tabs__navigation">
					<?php
					$count_tab = 0;
					foreach ($selected_posts as $select_post):

						//Titles tabs.
						if ($select_post && is_object($select_post)):
							//Setup post on global WP post.
							$title_tab = esc_html($select_post->post_title);
							$id = esc_html($select_post->ID);
							//Make first tab open by default.
							$count_tab++;
							$count_tab_active = $count_tab === 1 ? '_tab-active' : '';
							?>
							<?php if ($title_tab && $count_tab > 0): ?>
							<button type="button" class="tabs__title <?= $count_tab_active; ?>">
								<?= !empty($title_tab) ? $title_tab : ''; ?>
							</button>
						<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</nav>
				<div data-tabs-body class="tabs__content">
					<?php
					foreach ($selected_posts as $select_post):
						if ($select_post && is_object($select_post)):
							$title_tab = esc_html($select_post->post_title);
							$id = esc_html($select_post->ID);
							$link = get_permalink($id);
							$image = get_the_post_thumbnail($id);
							$title_content = get_field('industry_title', $id);
							$sub_title_content = get_field('industry_sub_title', $id);
							$about_contents = get_field('industry_about', $id);
							?>
							<div class="tab__body">
								<?php if ($title_tab): ?>
									<h2 class="tab__title"><?= $title_tab; ?></h2>
								<?php endif; ?>
								<div class="tab__content">
									<div class="tab__text">
										<?php if ($title_content): ?>
											<h3 class="tab__about">
												<?= $title_content; ?>
											</h3>
										<?php endif; ?>
										<?php if ($sub_title_content): ?>
											<p class="tab__sub-title">
												<?= $sub_title_content; ?>
											</p>
										<?php endif; ?>
										<?php if ($about_contents): ?>
											<ul class="tab__list">
												<?php
												//Add to default tag p css class.
												foreach ($about_contents as $about_content): ?>
													<li>
														<?= stellarsoft_prepare_macros($about_content["industry_about_text"]); ?>
													</li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
										<?php if ($show_link_single_industry): ?>
											<div class="tab__button">
												<a class="new-btn--primary"
												   href="<?= $link; ?>">
													View Details
												</a>
											</div>
										<?php endif; ?>
									</div>
									<?php if ($image): ?>
										<div class="tab__image">
											<?= $image; ?>
										</div>
									<?php endif; ?>
								</div>

							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
