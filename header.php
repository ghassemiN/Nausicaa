<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="text-center site-title">
			<h1>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h1>
			<div class="description"><?php bloginfo( 'description' ); ?></div>
		</div>

		<div class="title-bar" data-responsive-toggle="site-navigation">
			<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">menu</a>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="menu-centered main-menu">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
			<div class="head-search hide-for-small-only">
				<?php do_action( 'foundationpress_before_searchform' ); ?>
				<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
					<?php do_action( 'foundationpress_searchform_top' ); ?>
					<div class="input-group">
						<input type="text" class="input-group-field" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>">
						<?php do_action( 'foundationpress_searchform_before_search_button' ); ?>
						<div class="input-group-button">
							<button  type="submit" id="searchsubmit" class="button search-button">
								<i class="fa fa-search fa-4" aria-hidden="true"></i>
							</button>
							
						</div>

					</div>
					<?php do_action( 'foundationpress_searchform_after_search_button' ); ?>
				</form>
				<?php do_action( 'foundationpress_after_searchform' ); ?>
			</div>

		</nav>

	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
