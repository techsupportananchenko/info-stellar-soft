<?php
/**
 * Block Name: Cases
 *
 * This is the template for displaying Cases posts from Cases post type.
 * @look preview image in register this block.
 */

if (isset($block['data']['preview_image_help'])) : ?>
	<img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
	$posts_per_page = 6;
	$total_posts = wp_count_posts('case')->publish;
	$paged = 1;
	$cases = get_posts(['post_type' => 'case', 'posts_per_page' => $posts_per_page]);
	$total_pages = ceil($total_posts / $posts_per_page);


	?>
	<section class="cases">
		<div class="cases__container">
			<div class="cases__wrapper">
				<?php if (!empty($cases)):
					$all_tag = get_term_by('slug', 'all', 'post_tag');
					$tags_cases = get_terms([
						'post_type' => 'case',
						'taxonomy' => 'post_tag',
						'hide_empty' => true,
						'exclude' => $all_tag->term_id ?? [],
					]);
					?>
					<div class="labels">
						<?php if (!is_wp_error($tags_cases) && $tags_cases): ?>
							<button id="cases-dropdown-btn" class="labels__button labels__button-mobile-show-all">
								<?= __('Explore All', 'stellarsoft') ?>
							</button>
							<div id="cases-dropdown" class="labels__content">
								<?php foreach ($tags_cases as $i => $tag) : ?>
									<?php if ($i == 0): ?>
										<button data-case-tag-id="<?= esc_html('all') ?>" class="labels__button active">
											<?= __('Explore All', 'stellarsoft') ?>
										</button>
									<?php endif; ?>
									<button data-case-tag-id="<?= $tag->term_id; ?>" class="labels__button">
										<?= $tag->name; ?>
									</button>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
					<div data-case-posts-id="all" id="cases-content" class="cases__content">
						<?php foreach ($cases as $case):
							$case_id = $case->ID;
							$title = $case->post_title;
							$excerpt = $case->post_excerpt;
							$image = get_the_post_thumbnail_url($case_id, 'full');
							$tag = get_field('tags', $case_id);
							$technologies = get_field('technologies', $case_id) ? array_column(get_field('technologies', $case_id), 'technology') : false;
							$link = get_permalink($case_id);
							?>
							<div class="case">
								<div class="case__wrapper">
									<?php if ($image): ?>
										<div class="case__image">
											<img src="<?php echo $image; ?>" alt="case-img">
										</div>
									<?php endif; ?>
									<div class="case__about">
										<h2 class="case__title">
											<a href="<?php echo $link ?>">
												<?php echo $title; ?>
											</a>
										</h2>
										<?php if ($excerpt): ?>
											<h3 class="case__excerpt">
												<?php echo(strlen($excerpt) >= 155 ? mb_substr($excerpt, 0, 155) . '...' : $excerpt) ?>
											</h3>
										<?php endif; ?>
										<?php if ($technologies):
											$first_half = array_slice($technologies, 0, 3);
											$second_half = array_slice($technologies, 3);
											$more_technologies = (count($technologies) > 3) ? '+' . count($second_half) : null;
											?>
											<div class="case__technologies">
												<?php foreach ($first_half as $id):
													$icon = get_field('technology_icon', $id) ?? false;
													?>
													<?php if ($icon): ?>
													<div class="technology">
														<?php echo wp_get_attachment_image($icon['id'], 'full', 'false', ['class' => 'technology-img', 'alt' => $title]) ?>
													</div>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php if ($more_technologies): ?>
													<div class="technology technology--others">
														<?php echo $more_technologies; ?>
													</div>
												<?php endif; ?>
											</div>
										<?php endif; ?>
										<div class="case__link">
											<a class="link new-btn new-btn--primary" href="<?php echo $link; ?>">View
												Details</a>
										</div>
										<div class="case__tags">
											<?php
											$tags = get_the_tags($case_id);
											if (!is_wp_error($tags) && $tags):
												foreach ($tags as $tag):
													?>
													<span class="case__tag">
														<?php echo $tag->name; ?>
													</span>
												<?php endforeach;
											endif; ?>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="pagination">
						<div class="pagination__container">
							<div class="pagination__wrapper">
								<?php
								$is_have_next = ($total_pages > 1) ? '' : 'disabled';
								?>
								<button id="case-prev-page" class="pagination__btn pagination__btn-prev disabled">
									<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
										 xmlns="http://www.w3.org/2000/svg">
										<path
											d="M6.70711 9.29289L7.41421 10L6 11.4142L5.29289 10.7071L6.70711 9.29289ZM2 6L1.29289 6.70711L0.585787 6L1.29289 5.29289L2 6ZM5.29289 1.29289L6 0.585786L7.41421 2L6.70711 2.70711L5.29289 1.29289ZM5.29289 10.7071L1.29289 6.70711L2.70711 5.29289L6.70711 9.29289L5.29289 10.7071ZM1.29289 5.29289L5.29289 1.29289L6.70711 2.70711L2.70711 6.70711L1.29289 5.29289ZM2 5L15 5V7L2 7V5Z"/>
									</svg>
								</button>
								<div id="case-pagination-bar" class="pagination__numbering">
									<?php if ($total_pages >= 1) : ?>
										<?php for ($i = 1; $i <= $total_pages; $i++) : ?>
											<span
												class="pagination__count <?php echo ($i === $paged) ? 'active' : ''; ?>"
												data-page="<?php echo $i; ?>">
											<?php echo $i; ?>
											</span>
										<?php endfor; ?>
									<?php endif; ?>
								</div>
								<button id="case-next-page"
										class="pagination__btn pagination__btn-next <?= $is_have_next; ?>">
									<svg width="15" height="12" viewBox="0 0 15 12" fill="none"
										 xmlns="http://www.w3.org/2000/svg">
										<path
											d="M8.29289 9.29289L7.58579 10L9 11.4142L9.70711 10.7071L8.29289 9.29289ZM13 6L13.7071 6.70711L14.4142 6L13.7071 5.29289L13 6ZM9.70711 1.29289L9 0.585786L7.58579 2L8.29289 2.70711L9.70711 1.29289ZM9.70711 10.7071L13.7071 6.70711L12.2929 5.29289L8.29289 9.29289L9.70711 10.7071ZM13.7071 5.29289L9.70711 1.29289L8.29289 2.70711L12.2929 6.70711L13.7071 5.29289ZM13 5L0 5L0 7L13 7V5Z"/>
									</svg>
								</button>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

<?php endif; ?>


