<?php 
function change_translate_text( $translated ) {
	$text = array(
		'Aside' => 'Interview',
	);
	$translated = str_ireplace(  array_keys($text),  $text,  $translated );
	return $translated;
}
//add_filter( 'gettext', 'change_translate_text', 20 );

// Links shortcode
function list_links_handler($args, $content=null, $code="") { 
	wp_list_bookmarks( $args );
}
add_shortcode('list-links', 'list_links_handler');

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
add_shortcode('kolom_einde', 'column_end');

// Slide end shortcode
function slide_end( $atts ) {
	return '</div><div class="rsContent">';
}
add_shortcode('slide_einde', 'slide_end');

// Hide Comments from admin menu
function remove_menus () {
global $menu;
	$restricted = array( __('Comments'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');

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

// Posts per page based on content type
function otib_custom_posts_per_page( $query ) {
	if ( is_admin() || ! $query -> is_main_query() )
		return;

	if ( is_front_page() ) {
		$query->set( 'posts_per_page', 5 );
		return;
	}
}
//add_action( 'pre_get_posts', 'otib_custom_posts_per_page', 1 );

// Register widget areas
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Home Intro',
		'id' => 'home-intro',
		'before_widget' => '<div class="col one-third"><div id="%1$s" class="block %2$s"><div class="royalSlider rsDefault"><div class="rsContent">',
		'after_widget' => '</div></div></div></div>',
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

		if ( is_front_page() ) {

			wp_register_style( 'royalslider', get_template_directory_uri() . '/js/royalslider/royalslider.css');
			wp_enqueue_style( 'royalslider' );

			wp_register_style( 'royalslider-default', get_template_directory_uri() . '/js/royalslider/skins/default/rs-default.css');
			wp_enqueue_style( 'royalslider-default' );

			wp_register_script( 'royalslider', get_template_directory_uri() . '/js/royalslider/jquery.royalslider.min.js', array('jquery'), '9.5.4', true );
			wp_enqueue_script( 'royalslider' );

			wp_register_script( 'royalslider-config', get_template_directory_uri() . '/js/royalslider/royalslider.js', array('royalslider'), '1.0', true );
			wp_enqueue_script( 'royalslider-config' );

		}

		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), '2.7.1' );
		wp_enqueue_script( 'modernizr' );

		wp_register_script( 'matchheight', get_template_directory_uri() . '/js/jquery.matchheight.min.js', array('jquery'), '0.5.1', true );
		wp_enqueue_script( 'matchheight' );

		wp_register_script( 'initialise', get_template_directory_uri() . '/js/initialise.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'initialise' );

		wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Droid+Sans:700,400%7CRoboto:700,400,300', array(), null, 'screen' );

		wp_enqueue_style( 'dashicons', get_stylesheet_uri(), array('dashicons'), '1.0' );

		wp_enqueue_style( 'style', get_stylesheet_uri() );

		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/style-responsive.css');

		if ( is_single() || is_page() ) {

			wp_register_script( 'magnific-popup', get_template_directory_uri() . '/js/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '0.9.9', true );
			wp_enqueue_script( 'magnific-popup' );

			wp_register_script( 'magnific-popup-config', get_template_directory_uri() . '/js/magnific-popup/magnific-popup.js', array('magnific-popup'), '1.0', true );
			wp_enqueue_script( 'magnific-popup-config' );

			wp_register_style( 'magnific-popup', get_template_directory_uri() . '/js/magnific-popup/magnific-popup.css');
			wp_enqueue_style( 'magnific-popup' );

			wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.1', true );
			wp_enqueue_script( 'fitvids' );

			wp_register_script( 'fitvids-config', get_template_directory_uri() . '/js/fitvids/fitvids.js', array('fitvids'), '1.0', true );
			wp_enqueue_script( 'fitvids-config' );

		}

		if ( is_page('kerngegevens') ) {

			wp_register_script( 'map', '/wp-content/themes/otib/js/map.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'map' );

			wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.1', true );
			wp_enqueue_script( 'fitvids' );

			wp_register_script( 'fitvids-config', get_template_directory_uri() . '/js/fitvids/fitvids.js', array('fitvids'), '1.0', true );
			wp_enqueue_script( 'fitvids-config' );

		}

		if ( is_page('draaitabel') ) {

			wp_register_script( 'map-draaitabel', '/wp-content/themes/otib/js/map-draaitabel.js', array('jquery'), '1.0', true );
			wp_enqueue_script( 'map-draaitabel' );
			
			wp_register_style( 'jquery-ui-smoothness', '//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css' );
			wp_enqueue_style( 'jquery-ui-smoothness' );

			wp_register_style( 'jquery-ui-slider-pips', get_template_directory_uri() . '/js/slider-pips/jquery-ui-slider-pips.css' );
			wp_enqueue_style( 'jquery-ui-slider-pips' );

			wp_enqueue_script( 'jquery' );

			wp_register_script( 'jquery-ui', '//code.jquery.com/ui/1.10.4/jquery-ui.js', array('jquery'), '1.10.4', true );
			wp_enqueue_script( 'jquery-ui' );

			wp_register_script( 'jquery-ui-slider-pips', '/wp-content/themes/otib/js/slider-pips/jquery-ui-slider-pips.min.js', array('jquery-ui'), '1.5.5', true );
			wp_enqueue_script( 'jquery-ui-slider-pips' );

		}

		if ( is_page( 1517 ) ) {
			wp_register_script( 'draaitabel-bedrijven', '/wp-content/themes/otib/js/draaitabel-bedrijven.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'draaitabel-bedrijven' );
		}

		if ( is_page( 1521 ) ) {
			wp_register_script( 'draaitabel-leerlingen', '/wp-content/themes/otib/js/draaitabel-leerlingen.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'draaitabel-leerlingen' );
		}

		if ( is_page( 1519 ) ) {
			wp_register_script( 'draaitabel-leerlingen', '/wp-content/themes/otib/js/draaitabel-werknemers.js', array( 'jquery' ), '1.1', true );
			wp_enqueue_script( 'draaitabel-leerlingen' );
		}

		if ( is_page( 1699 ) ) {
			wp_register_script( 'draaitabel-beroepspraktijkvorming', '/wp-content/themes/otib/js/draaitabel-beroepspraktijkvorming.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'draaitabel-beroepspraktijkvorming' );
		}

	}

}
add_action('wp_enqueue_scripts', 'include_scripts_styles');

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
add_filter('wp_nav_menu_objects', 'add_menu_parent_class');

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