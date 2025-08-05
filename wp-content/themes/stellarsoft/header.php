<?php

/**
 * The header
 *
 * @package Stellarsoft
 */

if (!isset($_SESSION['theme'])) {
	$_SESSION['theme'] = 'theme-dark';
}
$theme_class = $_SESSION['theme'];
?>
<!DOCTYPE html>
<html class="<?php echo esc_attr($theme_class); ?>" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php wp_head(); ?>
	<link rel="apple-touch-icon" sizes="180x180"
		  href="/wp-content/themes/stellarsoft/assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32"
		  href="/wp-content/themes/stellarsoft/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16"
		  href="/wp-content/themes/stellarsoft/assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/wp-content/themes/stellarsoft/assets/images/favicon/site.webmanifest">
	<link rel="mask-icon" href="/wp-content/themes/stellarsoft/assets/images/favicon/safari-pinned-tab.svg"
		  color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<script src="https://analytics.ahrefs.com/analytics.js" data-key="kmBKyIP2LZe+B2CSpeRKKQ" defer="true"></script>


</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header" id="header">
	<?php
	$header_logo = get_field('header_logo', 'option') ?? false;
	$header_button = get_field('header_button', 'option') ?? false;
	$header_mobile_socials = get_field('socials', 'option'); // Repeater.
	?>
	<div class="header__container">
		<div class="header__wrap">
			<div class="header__about">
				<a href="<?php echo get_home_url(); ?>" class="header__company">
					<?php if ($header_logo) : ?>
						<div class="header__logo">
							<?php echo display_svg($header_logo) ?>
						</div>
					<?php endif; ?>
				</a>
				<div id="mobile-menu-open" class="nav__open">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="nav">
					<div class="nav__menu">
						<div class="nav__menu-button-mobile button--close">
							<button id="mobile-menu-close" class="button-item">
								<a class="case-intro__close"></a>
							</button>
						</div>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-primary',
								'container' => 'nav',
								'container_class' => 'menu',
								'menu_class' => 'menu__list',
								'add_li_class' => 'list__item',
								'walker' => new Stellar_Soft_Mega_Menu()
							)
						);
						?>
						<?php if ($header_mobile_socials) : ?>
							<div class="nav__menu-footer">
								<div class="nav__menu-socs">
									<?php foreach ($header_mobile_socials as $item) :
										$link = $item['link'] ?? false;
										$icon = $item['icon'] ?? false;
										?>
										<?php if ($link) :
										$link_target = $link['target'] ? $link['target'] : '_blank'; ?>
										<a class="nav__menu-soc" target="<?php echo esc_attr($link_target); ?>"
										   href="<?php echo $link['url'] ?>">
											<?php if ($icon) : ?>
												<?php echo display_svg($icon) ?>
											<?php endif; ?>
										</a>
									<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="header__buttons">
				<!--				<button id="bth-theme-switch" type="button" class="headed__theme-button theme-btn js-theme-btn">-->
				<!--						<span class="theme-btn__wrap">-->
				<!--							<span class="theme-btn__btn ">-->
				<!--								<div class="theme-btn__icon theme-btn__icon theme-btn__icon--light">-->
				<!--								</div>-->
				<!--								<div class="theme-btn__icon theme-btn__icon theme-btn__icon--dark">-->
				<!--								</div>-->
				<!--							</span>-->
				<!--						</span>-->
				<!--				</button>-->

				<?php if ($header_button) :
					$header_button_target = $header_button['target'] ? $header_button['target'] : '_self'; ?>
					<div class="header__btn tablet">
						<a type="button" class="new-btn new-btn--primary"
						   target="<?php echo esc_attr($header_button_target); ?>"
						   href="<?php echo $header_button['url'] ?>"><?php echo $header_button['title'] ?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>
<div class="wrapper" data-barba="wrapper">
	<div data-barba="container" data-barba-namespace="<?php echo get_post_field('post_name', get_post()); ?>"
		 class="spa-container">
