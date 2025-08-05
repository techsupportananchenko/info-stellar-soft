<?php
$text = ($args['text'] ?? false);
$is_isset_cookie_status = isset($_COOKIE['cookie_status']);
$is_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') || $_SERVER['SERVER_PORT'] === '443';
?>

<?php if($is_https):?>
<div id="cookie-banner" class="cookie-banner">
	<div class="cookie-banner__container">
		<div class="cookie-banner__wrapper">
			<div class="cookie-banner__text">
				<?php echo $text; ?>
			</div>
			<div class="cookie-banner__buttons">
				<button id="cookie-decline" class="cookie-banner__decline new-btn new-btn--fourth">
					<?php echo __('Decline'); ?>
				</button>
				<button id="cookie-accept" class="cookie-banner__accept new-btn new-btn--primary">
					<?php echo __('Accept All'); ?>
				</button>
			</div>
		</div>
	</div>
</div>
<?php endif;?>

