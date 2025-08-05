<?php
/**
 * Template for displaying posts Blog information block.
 */

$post_id = get_the_ID();
//Get the posts tags for filter.
$post_terms = get_the_terms($post_id, 'post_tag');
$post_title = get_the_title();
$post_excerpt = get_the_excerpt();
$post_content = get_the_content();
$post_image = get_post_thumbnail_id($post_id);
$post_date = get_the_date('F j, Y', $post_id);
$post_link = get_permalink($post_id) ?? '#';
$word_count = str_word_count(strip_tags($post_content));
$time_read_content = ceil($word_count / 225) . ' min read';
?>
<div class="blog-information-cards__col">
	<a href="<?= $post_link; ?>" class="blog-information-card">
		<div class="blog-information-card__wrap">
			<div class="blog-information-card__img">
				<?php echo wp_get_attachment_image($post_image, 'full', false, array('alt' => $post_title)); ?>
			</div>
			<div class="blog-information-card__body">
				<?php if (!empty($post_terms) && is_array($post_terms)): ?>
					<div class="blog-information-card__links">
						<?php foreach ($post_terms as $post_term): ?>
							<?php
							$post_term_name = $post_term->name;
							if (!empty($post_term_name)):
								?>
								<div class="blog-information-card__link">
									<?= esc_html($post_term_name); ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if (!empty($post_title)): ?>
					<div class="blog-information-card__title">
						<p><?= $post_title ?></p>
					</div>
				<?php endif; ?>
				<?php if (!empty($post_excerpt)): ?>
					<div class="blog-information-card__text">
						<p><?= $post_excerpt ?></p>
					</div>
				<?php endif; ?>
			</div>
			<div class="blog-information-card__bottom">
				<?php if (!empty($post_date)): ?>
					<div class="blog-information-card__date">
						<span class="date"><?= $post_date ?></span>
						<span class="divider"></span>
						<span class="time-read"><?php echo $time_read_content; ?></span>
					</div>
				<?php endif; ?>
				<div class="blog-information-card__btn">
					<div class="new-btn new-btn--tertiary">
						<svg width="12" height="12" viewBox="0 0 12 12"
							 fill="none"
							 xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z"
								fill="#E3E3E3"/>
						</svg>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>
