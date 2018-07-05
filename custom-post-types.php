<?php

// Register Custom Post Type
function register_cpt_quote() {

	$labels = array(
		'name'                  => _x( 'Quotes', 'Post Type General Name', 'trendfiles' ),
		'singular_name'         => _x( 'Quote', 'Post Type Singular Name', 'trendfiles' ),
		'menu_name'             => __( 'Quotes', 'trendfiles' ),
		'name_admin_bar'        => __( 'Quote', 'trendfiles' ),
		'archives'              => __( 'Quote Archives', 'trendfiles' ),
		'attributes'            => __( 'Quote Attributes', 'trendfiles' ),
		'parent_item_colon'     => __( 'Parent Quote:', 'trendfiles' ),
		'all_items'             => __( 'All Quotes', 'trendfiles' ),
		'add_new_item'          => __( 'Add New Quote', 'trendfiles' ),
		'add_new'               => __( 'Add New', 'trendfiles' ),
		'new_item'              => __( 'New Quote', 'trendfiles' ),
		'edit_item'             => __( 'Edit Quote', 'trendfiles' ),
		'update_item'           => __( 'Update Quote', 'trendfiles' ),
		'view_item'             => __( 'View Quote', 'trendfiles' ),
		'view_items'            => __( 'View Quotes', 'trendfiles' ),
		'search_items'          => __( 'Search Quote', 'trendfiles' ),
		'not_found'             => __( 'Not found', 'trendfiles' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'trendfiles' ),
		'featured_image'        => __( 'Featured Image', 'trendfiles' ),
		'set_featured_image'    => __( 'Set featured image', 'trendfiles' ),
		'remove_featured_image' => __( 'Remove featured image', 'trendfiles' ),
		'use_featured_image'    => __( 'Use as featured image', 'trendfiles' ),
		'insert_into_item'      => __( 'Insert into quote', 'trendfiles' ),
		'uploaded_to_this_item' => __( 'Uploaded to this quote', 'trendfiles' ),
		'items_list'            => __( 'Quotes list', 'trendfiles' ),
		'items_list_navigation' => __( 'Quotes list navigation', 'trendfiles' ),
		'filter_items_list'     => __( 'Filter quotes list', 'trendfiles' ),
	);
	$args = array(
		'label'                 => __( 'Quote', 'trendfiles' ),
		'description'           => __( 'Quotes uit videos', 'trendfiles' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'custom-fields' ),
		'taxonomies'            => array( 'persoon', 'onderwerp' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'quote', $args );

}
add_action( 'init', 'register_cpt_quote', 0 );