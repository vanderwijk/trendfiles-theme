<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--
Website development by VanderWijk Consultancy - http://vanderwijk.nl
-->
<meta charset='<?php bloginfo( 'charset' ); ?>' />
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />
<meta name='application-name' content='OTIB Trendfiles' />
<meta name='apple-mobile-web-app-title' content='OTIB Trendfiles' />
<title><?php wp_title(); ?></title>
<link rel='icon' type='image/x-icon' href='<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico' />
<link rel='apple-touch-icon' sizes='144x144' href='<?php echo get_stylesheet_directory_uri(); ?>/img/touch-icon-ipad-retina.png' />
<link rel='profile' href='http://gmpg.org/xfn/11' />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TH2WQG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TH2WQG');</script>
<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
<div class="wrapper hfeed">
	<header class="header" role="banner">
		<div class="row">
			<div class="col">
				<div class="block">
					<a href="<?php echo home_url(); ?>" class="logo-trendfiles" rel="home">
						OTIB Trendfiles
					</a>
					<a href="http://www.otib.nl/" title="Opleidings- en ontwikkelingsfonds voor het Technisch InstallatieBedrijf." class="logo-otib" rel="external">
						OTIB
					</a>
					<div class="utilities">
						<?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => '' ) ); ?>
						<form method="get" action="<?php echo get_option('home'); ?>/" class="search">
							<input type="text" name="s" placeholder="Zoeken">
							<input type="submit" value="&#xf179;">
						</form>
					</div>
				</div>
			</div>
		</div>
	</header>
	<nav class="navigation" role="navigation">
		<h3 class="menu-toggle"><?php _e( 'Menu', 'trendfiles' ); ?></h3>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
	</nav>