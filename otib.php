<?php
/*
Plugin Name: Wij Techniek Functions Plugin
Description: Site specifieke functies
Version: 0.1
License: GPL
Author: Johan van der Wijk
Author URI: vanderwijk.nl
*/

// Custom post types
add_action( 'init', 'register_taxonomy_download_categories' );

function register_taxonomy_download_categories() {

    $labels = array( 
        'name' => _x( 'Categories', 'category' ),
        'singular_name' => _x( 'Category', 'category' ),
        'search_items' => _x( 'Search Categories', 'category' ),
        'popular_items' => _x( 'Popular Categories', 'category' ),
        'all_items' => _x( 'All Categories', 'category' ),
        'parent_item' => _x( 'Parent Category', 'category' ),
        'parent_item_colon' => _x( 'Parent Category:', 'category' ),
        'edit_item' => _x( 'Edit Category', 'category' ),
        'update_item' => _x( 'Update Category', 'category' ),
        'add_new_item' => _x( 'Add New Category', 'category' ),
        'new_item_name' => _x( 'New Category Name', 'category' ),
        'separate_items_with_commas' => _x( 'Separate categories with commas', 'category' ),
        'add_or_remove_items' => _x( 'Add or remove categories', 'category' ),
        'choose_from_most_used' => _x( 'Choose from the most used categories', 'category' ),
        'menu_name' => _x( 'Categories', 'category' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'download_categories', array('download'), $args );
}

// Custom post type voor downloads

add_action( 'init', 'register_cpt_download' );

function register_cpt_download() {
	$labels = array( 
		'name' => _x( 'Downloads', 'download' ),
		'singular_name' => _x( 'Download', 'download' ),
		'add_new' => _x( 'Add New', 'download' ),
		'add_new_item' => _x( 'Add New Download', 'download' ),
		'edit_item' => _x( 'Edit Download', 'download' ),
		'new_item' => _x( 'New Download', 'download' ),
		'view_item' => _x( 'View Download', 'download' ),
		'search_items' => _x( 'Search Downloads', 'download' ),
		'not_found' => _x( 'No downloads found', 'download' ),
		'not_found_in_trash' => _x( 'No downloads found in Trash', 'download' ),
		'parent_item_colon' => _x( 'Parent Download:', 'download' ),
		'menu_name' => _x( 'Downloads', 'download' ),
	);
	
	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Downloads van rapporten',
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'menu_order' ),
		'taxonomies' => array( 'download_categories' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,	  
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'register_meta_box_cb' => 'download_information_metabox'
	);

register_post_type( 'download', $args );
}


// Add the Download Information Meta Box
function download_information_metabox() {
	add_meta_box('download-information', 'Download Information', 'download_information', 'download', 'normal', 'default');
}
function download_information() {
	global $post;
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="download_meta_noncename" id="download_meta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// Get the data if its already been entered
	$download_url = get_post_meta($post->ID, 'download_url', true);

	// Echo out the field
	echo '<p>';
	echo '<label for="download_url">Info URL (Include http://)</label><br />';
	echo '<input type="text" name="download_url" id="download_url" value="' . $download_url  . '" class="widefat" />';
	echo '</p>';

	// Get the data if its already been entered
	$themanummer_url = get_post_meta($post->ID, 'themanummer_url', true);

	// Echo out the field
	echo '<p>';
	echo '<label for="themanummer_url">Themanummer URL (Include http://)</label><br />';
	echo '<input type="text" name="themanummer_url" id="themanummer_url" value="' . $themanummer_url  . '" class="widefat" />';
	echo '</p>';
}

// Save the Metabox Data
function save_download_information($post_id, $post) {

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['download_meta_noncename'], plugin_basename(__FILE__) )) {
		return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

		// OK, we're authenticated: we need to find and save the data
		// We'll put it into an array to make it easier to loop though.
	
		$download_meta['download_url'] = $_POST['download_url'];
		
		$download_meta['themanummer_url'] = $_POST['themanummer_url'];
	
		// Add values of $download_meta as custom fields

		foreach ($download_meta as $key => $value) { // Cycle through the $download_meta array!
			if( $post->post_type == 'revision' ) return; // Don't store custom data twice
			$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
			if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
					update_post_meta($post->ID, $key, $value);
			} else { // If the custom field doesn't have a value
					add_post_meta($post->ID, $key, $value);
			}
			if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
		}
}

//add_action('save_post', 'save_download_information', 1, 2); // save the custom fields



// Add the Title Toggle Meta Box
function title_toggle_metabox() {
	add_meta_box('title-toggle', 'Display title', 'title_toggle', 'page', 'normal', 'default');
}
function title_toggle() {
	global $post;
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="title_toggle_meta_noncename" id="title_toggle_meta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// Get the data if its already been entered
	$show_title = get_post_meta($post->ID, 'show_title', true);

	// Echo out the field
	echo '<p>';
	echo '<label for="show_title">Display the page title?</label><br />';
	echo '<input type="text" name="show_title" id="show_title" value="' . $show_title  . '" class="widefat" />';
	echo '</p>';
}

// Save the Metabox Data
function save_title_toggle($post_id, $post) {

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['title_toggle_meta_noncename'], plugin_basename(__FILE__) )) {
		return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

		// OK, we're authenticated: we need to find and save the data
		// We'll put it into an array to make it easier to loop though.
	
		$title_toggle_meta['show_title'] = $_POST['show_title'];
	
		// Add values of $title_toggle_meta as custom fields

		foreach ($title_toggle_meta as $key => $value) { // Cycle through the $title_toggle_meta array!
			if( $post->post_type == 'revision' ) return; // Don't store custom data twice
			$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
			if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
					update_post_meta($post->ID, $key, $value);
			} else { // If the custom field doesn't have a value
					add_post_meta($post->ID, $key, $value);
			}
			if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
		}
}

//add_action('save_post', 'save_title_toggle', 1, 2); // save the custom fields


// Add slug to body class
function add_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_body_class' );
?>