<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Home Word
 */
session_start();
$_SESSION['cat'] = $_GET['cat'];
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<script type="text/javascript" src="//use.typekit.net/gco3kee.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="full-section top-header">
			<div class="wrap group">
				<a href = "#" class="toggle-nav">
					<span aria-hidden="true" data-icon="&#x6d;"></span>
					<span class="assistive-text">Mobile Navigation</span>
				</a>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src ="<?php bloginfo('template_directory'); ?>/_i/homeword-logo.png"></a>
				<div class="header-content">
					<ul class="social ">
						<li>
							<a href = "#">
								<span aria-hidden="true" data-icon="&#x66;"></span>
								<span class="assistive-text">Facebook</span>
							</a>
						</li>
						<li>
							<a href = "#">
								<span aria-hidden="true" data-icon="&#x74;"></span>
								<span class="assistive-text">Twitter</span>
							</a>
						</li>
						<li>
							<a href = "#">
								<span aria-hidden="true" data-icon="&#x70;"></span>
								<span class="assistive-text">Pinterest</span>
							</a>
						</li>
						<li>
							<a href = "#">
								<span aria-hidden="true" data-icon="&#x69;"></span>
								<span class="assistive-text">Instagram</span>
							</a>
						</li>
					</ul>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<nav id="site-navigation" class="full-section main-navigation" role="navigation">
			<div class="wrap group">
				<ul class="top-nav">
					<li class="with-sub family-nav">
						<a href = "#">
							for Families
							<span aria-hidden="true" data-icon="&#x75;"></span>
						</a>
						<?php wp_nav_menu( array( 'theme_location' => 'families', 'menu_class' => 'subnav', 'container' => false) ); ?>
					</li><!--
					--><li class="with-sub church-nav">
						<a href = "#">
							for Church Leaders
							<span aria-hidden="true" data-icon="&#x75;"></span>
						</a>
						<?php wp_nav_menu( array( 'theme_location' => 'church', 'menu_class' => 'subnav', 'container' => false) ); ?>
					</li><!--
					--><li>
						<a href = "#">Store</a>
					</li><!--
					--><li>
						<a href = "#">About</a>
					</li>
				</ul>
				<?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				<a href = "#" class="btn">Donate</a>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrap">
