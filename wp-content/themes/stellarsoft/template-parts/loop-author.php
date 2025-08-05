<?php

/**
 * Displaying item with info about author.
 */


$author_id = $args['author_id'] ?? [];
$co_authors = is_array($args['co_authors'] ?? null) ? $args['co_authors'] : [];
$authors = array_merge($co_authors, [$author_id]);
$css_class = $args['css_class'] ?? '';
$is_show_excerpt = $args['show_excerpt'] ?? false;;
$is_have_co_authors = count($authors) > 1 ? 'co-authors' : 'single-author';
?>
<?php if ($authors): ?>
	<div class="author <?php echo $css_class ?>">
		<div class="author__wrapper author__wrapper--<?php echo $is_have_co_authors; ?>">
			<?php foreach ($authors as $author_id):
				$author_name = get_the_author_meta('display_name', $author_id);
				$author_about = get_the_author_meta('description', $author_id);
				$author_url = get_author_posts_url($author_id);
				$author_link = get_author_posts_url($author_id);
				$author_avatar = get_avatar($author_id);
				$author_linkedin = get_the_author_meta('display_linkedin');
				$author_telegram = get_the_author_meta('display_telegram', $author_id);
				?>
				<div class="author__content">
					<?php if (!empty($author_avatar)): ?>
						<div class="author__avatar">
							<a href="<?= $author_link ?>">
								<?= $author_avatar ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="author__info">
						<?php
						if (!empty($author_name)): ?>
							<p class="author__name">
								<a href="<?= $author_link ?>"><?= $author_name ?></a>
							</p>
						<?php endif; ?>
						<?php if (!empty($author_about)): ?>
							<p class="author__bio">
								<a href="<?= $author_link ?>">
									<?= $author_about ?>
								</a>
							</p>
						<?php endif; ?>
						<?php if (!empty($author_linkedin) || !empty($author_telegram)): ?>
							<div class="author__links">
								<?php if (!empty($author_linkedin)): ?>
									<a class="link link--linkedin" href="<?= $author_linkedin; ?>"></a>
								<?php endif; ?>
								<?php if (!empty($author_telegram)): ?>
									<a class="link link--telegram" href="<?= $author_telegram; ?>"></a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($is_show_excerpt): ?>
				<div class="author__about">
					<?= $author_about ?>
				</div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
