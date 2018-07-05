<?php 

function persoon_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Personen', 'Taxonomy General Name', 'trendfiles' ),
		'singular_name'              => _x( 'Persoon', 'Taxonomy Singular Name', 'trendfiles' ),
		'menu_name'                  => __( 'Personen', 'trendfiles' ),
		'all_items'                  => __( 'Alle personen', 'trendfiles' ),
		'parent_item'                => __( 'Hoofdpersoon', 'trendfiles' ),
		'parent_item_colon'          => __( 'Hoofdpersoon:', 'trendfiles' ),
		'new_item_name'              => __( 'Nieuw persoon', 'trendfiles' ),
		'add_new_item'               => __( 'Voeg nieuwe persoon toe', 'trendfiles' ),
		'edit_item'                  => __( 'Bewerk persoon', 'trendfiles' ),
		'update_item'                => __( 'Persoon bijwerken', 'trendfiles' ),
		'view_item'                  => __( 'Bekijk persoon', 'trendfiles' ),
		'separate_items_with_commas' => __( 'Scheid personen met komma\'s', 'trendfiles' ),
		'add_or_remove_items'        => __( 'Verwijder of voeg nieuwe persoon toe', 'trendfiles' ),
		'choose_from_most_used'      => __( 'Kies uit de meest gebruikte', 'trendfiles' ),
		'popular_items'              => __( 'Populaire personen', 'trendfiles' ),
		'search_items'               => __( 'Zoek personen', 'trendfiles' ),
		'not_found'                  => __( 'Niet gevonden', 'trendfiles' ),
		'no_terms'                   => __( 'Geen personen', 'trendfiles' ),
		'items_list'                 => __( 'Personenlijst', 'trendfiles' ),
		'items_list_navigation'      => __( 'Personenlijst navigatie', 'trendfiles' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true
	);
	register_taxonomy( 'persoon', array( 'post' ), $args );

}
add_action( 'init', 'persoon_taxonomy', 0 );

function onderwerp_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Onderwerpen', 'Taxonomy General Name', 'trendfiles' ),
		'singular_name'              => _x( 'Onderwerp', 'Taxonomy Singular Name', 'trendfiles' ),
		'menu_name'                  => __( 'Onderwerpen', 'trendfiles' ),
		'all_items'                  => __( 'Alle onderwerpen', 'trendfiles' ),
		'parent_item'                => __( 'Hoofdonderwerp', 'trendfiles' ),
		'parent_item_colon'          => __( 'Hoofdonderwerp:', 'trendfiles' ),
		'new_item_name'              => __( 'Nieuw onderwerp', 'trendfiles' ),
		'add_new_item'               => __( 'Voeg nieuwe onderwerp toe', 'trendfiles' ),
		'edit_item'                  => __( 'Bewerk onderwerp', 'trendfiles' ),
		'update_item'                => __( 'Onderwerp bijwerken', 'trendfiles' ),
		'view_item'                  => __( 'Bekijk onderwerp', 'trendfiles' ),
		'separate_items_with_commas' => __( 'Scheid onderwerpen met komma\'s', 'trendfiles' ),
		'add_or_remove_items'        => __( 'Verwijder of voeg nieuwe onderwerp toe', 'trendfiles' ),
		'choose_from_most_used'      => __( 'Kies uit de meest gebruikte', 'trendfiles' ),
		'popular_items'              => __( 'Populaire onderwerpen', 'trendfiles' ),
		'search_items'               => __( 'Zoek onderwerpen', 'trendfiles' ),
		'not_found'                  => __( 'Niet gevonden', 'trendfiles' ),
		'no_terms'                   => __( 'Geen onderwerpen', 'trendfiles' ),
		'items_list'                 => __( 'Onderwerpenlijst', 'trendfiles' ),
		'items_list_navigation'      => __( 'Onderwerpenlijst navigatie', 'trendfiles' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true
	);
	register_taxonomy( 'onderwerp', array( 'post' ), $args );

}
add_action( 'init', 'onderwerp_taxonomy', 0 );