<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package basic_bootstrap_theme_with_Webpack_and_HMR
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'basic-bootstrap-theme-with-webpack-and-hmr' ); ?></a>
	<header class="site-header" id="header">
		<div class="container">
			<div class="header-first-row">
				<div class="header-social">
					<?php if ( is_active_sidebar( 'footer_social' )){
						dynamic_sidebar( 'footer_social' );
					}?>
				</div>
				<button id="search-open" class="btn btn-search">
					<i class="fas fa-search"></i>
				</button>
			</div>
			<div class="row">
				<div class="header-brand">
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="navbar-logo" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/multinational-logo.svg" /></a>
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-bars"></i>
				</button>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-md">
			<div class="container">
				
				<div class="navbar-collapse collapse" id="navbarCollapse" style="">

					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id' => 'primary-menu',
						'menu_class' => 'navbar-nav mr-auto',
						'container' => false,
						'depth' => 2,
						'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
							'walker' => new WP_Bootstrap_Navwalker()
					) );
					?>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'menu_id' => 'secondary-menu',
						'menu_class' => 'navbar-nav',
						'container' => false,
						'depth' => 2,
						'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
							'walker' => new WP_Bootstrap_Navwalker()
					) );
					?>
					
				</div><!-- #navbarCollapse -->
			</div><!-- .container -->
		</nav>
	</header>
	
	<div id="content" class="site-content">