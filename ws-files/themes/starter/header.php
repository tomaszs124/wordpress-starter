<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="logo">
			<a href="<?= get_home_url(); ?>">
				<img src="<?= get_stylesheet_directory_uri() . '/img/logo.svg' ?>" alt="">
			</a>
		</div>
		<nav class="header__nav">
			<div class="wrapper">
				<div class="nav__top nav__top--border">
					<a class="logo" href="<?= get_home_url(); ?>">
						<img src="<?= get_stylesheet_directory_uri() . '/img/logo.svg' ?>" alt="">
					</a>
					<button class="nav__toggle nav__toggle--close btn-toggle btn-toggle--close">
						<span></span>
					</button>
				</div>
				<?php
					wp_nav_menu(array(
						'theme_location'    => 'main',
						'menu_class'        => 'nav',
						'depth'             => 1,
						// 'depth'             => 2,
						// 'walker' => new Header_Walker()
					));
				?>
			</div>
		</nav>
	</header>
				