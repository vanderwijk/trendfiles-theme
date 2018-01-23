<?php
// Links shortcode
function list_links_handler( $args, $content=null, $code="" ) {
	wp_list_bookmarks( $args );
}
add_shortcode( 'list-links', 'list_links_handler' );

// Obfusticate email addresses
function hide_email_shortcode( $atts , $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}
	return '<a href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
}
add_shortcode( 'mailto', 'hide_email_shortcode' );

// Col end shortcode
function column_end( $atts ) {
	return '</div></div><div class="col one-third"><div class="block">';
}
add_shortcode( 'kolom_einde', 'column_end' );

// Slider start shortcode
function slider_start( $atts ) {
	return '<div class="royalSlider rsDefault"><div class="rsContent">';
}
add_shortcode( 'slider_start', 'slider_start' );

// Slider end shortcode
function slider_end( $atts ) {
	return '</div></div>';
}
add_shortcode( 'slider_eind', 'slider_end' );

// Slide end shortcode
function slide_end( $atts ) {
	return '</div><div class="rsContent">';
}
add_shortcode( 'slide_einde', 'slide_end' );

// Hide Comments from admin menu
function trendfiles_remove_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'trendfiles_remove_menus' );

// Custom menus
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'top' => 'Top Menu',
			'primary' => 'Primary Menu'
		)
	);
}

// Register widget areas
if ( function_exists( 'register_sidebar' )) {
	register_sidebar(array(
		'name'=> 'Home Intro',
		'id' => 'home-intro',
		'before_widget' => '<div class="col one-third"><div id="%1$s" class="block %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="header"><h2>',
		'after_title' => '</h2></div>',
	));
	register_sidebar(array(
		'name'=> 'Right Sidebar',
		'id' => 'right-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));
	register_sidebar(array(
		'name'=> 'Left Sidebar',
		'id' => 'left-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));
}

// Include scripts
function include_scripts_styles () {

	if ( !is_admin() ) {

		wp_enqueue_script( 'jquery' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		wp_register_style( 'royalslider', get_template_directory_uri() . '/js/royalslider/royalslider.css' );
		wp_register_style( 'royalslider-default', get_template_directory_uri() . '/js/royalslider/skins/default/rs-default.css' );

		wp_register_style( 'magnific-popup', get_template_directory_uri() . '/js/magnific-popup/magnific-popup.css' );
		wp_register_style( 'jquery-ui-smoothness', '//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css' );
		wp_register_style( 'jquery-ui-slider-pips', get_template_directory_uri() . '/js/slider-pips/jquery-ui-slider-pips.css' );

		wp_register_style( 'tooltipster', get_template_directory_uri() . '/js/tooltipster/css/tooltipster.bundle.min.css' );

		wp_register_script( 'royalslider', get_template_directory_uri() . '/js/royalslider/jquery.royalslider.min.js', array( 'jquery' ), '9.5.4', true );
		wp_register_script( 'royalslider-config', get_template_directory_uri() . '/js/royalslider/royalslider.js', array( 'royalslider' ), '1.0', true );

		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), '2.7.1' );
		wp_register_script( 'matchheight', get_template_directory_uri() . '/js/jquery.matchheight.min.js', array( 'jquery' ), '0.5.1', true );
		wp_register_script( 'initialise', get_template_directory_uri() . '/js/initialise.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'magnific-popup', get_template_directory_uri() . '/js/magnific-popup/jquery.magnific-popup.min.js', array( 'jquery' ), '0.9.9', true );
		wp_register_script( 'magnific-popup-config', get_template_directory_uri() . '/js/magnific-popup/magnific-popup.js', array( 'magnific-popup' ), '1.0', true );
		wp_register_script( 'map', get_template_directory_uri() . '/js/map.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'map-draaitabel', get_template_directory_uri() . '/js/map-draaitabel.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'jquery-ui', '//code.jquery.com/ui/1.10.4/jquery-ui.js', array( 'jquery' ), '1.10.4', true );
		wp_register_script( 'jquery-ui-slider-pips', get_template_directory_uri() . '/js/slider-pips/jquery-ui-slider-pips.min.js', array( 'jquery-ui' ), '1.5.5', true );
		wp_register_script( 'svg-js', '//cdnjs.cloudflare.com/ajax/libs/svg.js/2.5.1/svg.min.js', array(), '2.5.1', true );

		wp_register_script( 'prognoses-wervingsbehoefte-stap-1', get_template_directory_uri() . '/js/prognoses-wervingsbehoefte-stap-1.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'prognoses-wervingsbehoefte-stap-2', get_template_directory_uri() . '/js/prognoses-wervingsbehoefte-stap-2.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'prognoses-wervingsbehoefte-stap-3', get_template_directory_uri() . '/js/prognoses-wervingsbehoefte-stap-3.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'draaitabel-bedrijven', get_template_directory_uri() . '/js/draaitabel-bedrijven.js', array( 'jquery' ), '1.1', true );
		wp_register_script( 'draaitabel-leerlingen', get_template_directory_uri() . '/js/draaitabel-leerlingen.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'draaitabel-werknemers', get_template_directory_uri() . '/js/draaitabel-werknemers.js', array( 'jquery' ), '1.2', true );
		wp_register_script( 'draaitabel-beroepspraktijkvorming', get_template_directory_uri() . '/js/draaitabel-beroepspraktijkvorming.js', array( 'jquery' ), '1.0', true );

		wp_register_script( 'tooltipster-js', get_template_directory_uri() . '/js/tooltipster/js/tooltipster.bundle.min.js', array( 'jquery' ), '4.0.0', true );
		wp_register_script( 'tooltipster-js-svg', get_template_directory_uri() . '/js/tooltipster/js/plugins/tooltipster/SVG/tooltipster-SVG.js', array( 'jquery' ), '4.0.0', true );

		if ( is_front_page() ) {
			wp_enqueue_style( 'royalslider-default' );
			wp_enqueue_style( 'royalslider' );

			wp_enqueue_script( 'royalslider' );
			wp_enqueue_script( 'royalslider-config' );

			wp_enqueue_script( 'map' );
		}

		if ( is_single() || is_page() ) {
			wp_enqueue_script( 'magnific-popup' );
			wp_enqueue_script( 'magnific-popup-config' );
			wp_enqueue_style( 'magnific-popup' );
		}

		if ( is_page( 'kerngegevens' ) ) {
			wp_enqueue_script( 'map' );
		}

		if ( is_page( array( 'stap-1', 'stap-2', 'stap-3' ))) {
			wp_enqueue_style( 'tooltipster' );
			wp_enqueue_script( 'tooltipster-js' );
			wp_enqueue_script( 'tooltipster-js-svg' );
			wp_enqueue_script( 'svg-js' );
		}

		if ( is_page('stap-1')) {
			wp_enqueue_script( 'prognoses-wervingsbehoefte-stap-1' );
		}
		if ( is_page('stap-2')) {
			wp_enqueue_script( 'prognoses-wervingsbehoefte-stap-2' );
		}
		if ( is_page('stap-3')) {
			wp_enqueue_script( 'prognoses-wervingsbehoefte-stap-3' );
		}

		if ( is_page( 'draaitabel' ) ) {
			wp_enqueue_script( 'map-draaitabel' );
			wp_enqueue_style( 'jquery-ui-smoothness' );
			wp_enqueue_style( 'jquery-ui-slider-pips' );

			wp_enqueue_script( 'jquery-ui' );
			wp_enqueue_script( 'jquery-ui-slider-pips' );
		}

		if ( is_page( 1517 ) ) {
			wp_enqueue_script( 'draaitabel-bedrijven' );
		}

		if ( is_page( 1521 ) ) {
			wp_enqueue_script( 'draaitabel-leerlingen' );
		}

		if ( is_page( 1519 ) ) {
			wp_enqueue_script( 'draaitabel-werknemers' );
		}

		if ( is_page( 1699 ) ) {
			wp_enqueue_script( 'draaitabel-beroepspraktijkvorming' );
		}

		wp_enqueue_style( 'font-droid-sans', '//fonts.googleapis.com/css?family=Droid+Sans:700,400', array(), null, 'screen' );
		wp_enqueue_style( 'font-roboto', '//fonts.googleapis.com/css?family=Roboto:700,400,300', array(), null, 'screen' );
		wp_enqueue_style( 'dashicons', get_stylesheet_uri(), array( 'dashicons' ), '1.0' );
		wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0' );
		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/style-responsive.css' );

		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'matchheight' );
		wp_enqueue_script( 'initialise' );

	}

}
add_action( 'wp_enqueue_scripts', 'include_scripts_styles' );

// Post formats
add_theme_support( 'post-formats', array( 'video', 'quote', 'aside', 'image', 'link' ) );

// Featured images
add_image_size( 'thumb', 400, 9999 );
add_image_size( 'thumb-video', 400, 225 );
add_image_size( 'thumb-article', 400, 150 );
add_image_size( 'thumb-aside', 120, 120 );
add_image_size( 'download-cover', 160, 9999 );

// Add parent menu item class
function add_menu_parent_class($items) {
	$categories = get_the_category();
	$category_id = @$categories[0]->slug;
	foreach ($items as $item) {
		if (hasSub($item->ID, $items)) {
			$item->classes[] = 'menu-parent-item ' . $category_id; // all elements of field "classes" of a menu item get join together and render to class attribute of <li> element in HTML
		}
	}
	return $items;
}
function hasSub($menu_item_id, $items) {
	foreach ($items as $item) {
		if ($item->menu_item_parent && $item->menu_item_parent==$menu_item_id) {
			return true;
		}
	}
	return false;
}
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );

// Max content width for embeds
if ( ! isset( $content_width ) ) $content_width = 840;

// Remove Yoast SEO plugin comments from html source
function ad_ob_start() {
	ob_start( 'ad_filter_wp_head_output' );
}
function ad_ob_end_flush() {
	ob_end_flush();
}
function ad_filter_wp_head_output( $output ) {
	if ( defined( 'WPSEO_VERSION' ) ) {
		$output = str_ireplace( '<!-- This site is optimized with the Yoast SEO plugin v' . WPSEO_VERSION . ' - https://yoast.com/wordpress/plugins/seo/ -->', '', $output );
		$output = str_ireplace( '<!-- / Yoast SEO plugin. -->', '', $output );
	}
	if ( defined( 'GOOGLE_ANALYTICATOR_VERSION' ) ) {
		$output = str_ireplace( '<!-- Google Analytics Tracking by Google Analyticator ' . GOOGLE_ANALYTICATOR_VERSION . ': http://www.videousermanuals.com/google-analyticator/ -->', '', $output );
	}
	return $output;
}
add_action( 'get_header', 'ad_ob_start' );
add_action( 'wp_head', 'ad_ob_end_flush', 100 );


// Add video container for embedded video's
function wrap_embed_with_div( $html, $url, $attr ) {
	   return '<div class="responsive-video-wrapper">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'wrap_embed_with_div', 10, 3 );