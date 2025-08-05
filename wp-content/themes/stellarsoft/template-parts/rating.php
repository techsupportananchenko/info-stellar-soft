<?php
/**
 * The template for displaying post rating.
 */


$post_id = get_the_ID();
$rating = new Rating();;
$rating_count = $rating->getCountRating($post_id);
$rating_average = $rating->getAverageRating($post_id);;
$is_exist_voice = $rating->isExistVoice($post_id);


?>


<div data-post-id="<?php echo esc_attr($post_id); ?>" class="rating">
	<div class="rating__container">
		<div class="rating__wrapper">
			<div class="rating__content">
				<div class="rating__title">
					<?php echo __('Rate this article', 'stellarsoft'); ?>
				</div>
				<div class="rating__grade">
					<?php for ($i = 1; $i <= 5; $i++):
						$i == $is_exist_voice ? $class = 'user-voice-exist' : $class = '';
						$is_exist_voice ? $disabled = 'disabled' : $disabled = '';
						?>
						<button <?php echo $disabled ?> class="<?php echo $class; ?>" data-grade-btn="<?php echo $i; ?>"
														type="button"><?php echo $i; ?>
						</button>
					<?php endfor; ?>
				</div>
			</div>
			<div class="rating__data">

				<div class="rating__summary">
					<div data-raiting-average="" class="rating__current">
						<?php echo $rating_average; ?>
					</div>
					<div class="rating__max">
						/5.0
					</div>
				</div>
				<span class="rating__reviews">
						based on <span data-reviews-count=""><?php echo $rating_count; ?></span> reviews
                </span>
			</div>
		</div>
	</div>
</div>
