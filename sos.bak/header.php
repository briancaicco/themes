<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sos-knowledge-base
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="hfeed site" id="page">

		<section id="menu-0">

			<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content','understrap' ); ?></a>


			<!-- ******************* The Navbar Area ******************* -->
			<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

				<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
					'understrap' ); ?></a>

					<nav class="navbar navbar-dropdown navbar-toggleable-lg navbar-toggler-right navbar-fixed-top bg-color navbar-inverse ">

						<?php if ( 'container' == $container ) : ?>
							<div class="container ">
							<?php endif; ?>

							<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<!--  site title has branding in the menu -->
							<div class="navbar-brand">

								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-logo">

									<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/download-1-copy-207x128.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

								</a>

								<a class="navbar-caption" href="<?php echo esc_url( home_url( '/' ) ); ?>">

									<?php bloginfo( 'name' ); ?>

								</a>

							</div> <!-- .navbar-brand -->

							<!-- The WordPress Menu goes here -->
							<?php wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container_class' => 'collapse navbar-collapse',
									'container_id'    => 'navbarNavDropdown',
									'menu_class'      => 'navbar-nav ml-auto nav-dropdown collapse navbar-inverse nav navbar-toggleable-sm',
									'fallback_cb'     => '',
									'menu_id'         => 'exCollapsingNavbar',
									'walker'          => new WP_Bootstrap_Navwalker(),
								)
								); ?>
								<?php if ( 'container' == $container ) : ?>
								</div><!-- .container -->
							<?php endif; ?>

						</nav><!-- .site-navigation -->

					</div><!-- .wrapper-navbar end -->


				</section><!-- #menu-0 end -->
