<?php

// Register Custom Post Type
function register_teams_cpt() {

	$labels = array(
		'name'                  => _x( 'Екип', 'Post Type General Name', 'softuni' ),
		'singular_name'         => _x( 'Екип', 'Post Type Singular Name', 'softuni' ),
		'menu_name'             => __( 'Екип', 'softuni' ),
		'name_admin_bar'        => __( 'Екип', 'softuni' ),
		'archives'              => __( 'Екип - Архив', 'softuni' ),
		'attributes'            => __( 'Item Attributes', 'softuni' ),
		'parent_item_colon'     => __( 'Parent Item:', 'softuni' ),
		'all_items'             => __( 'Всички Екип', 'softuni' ),
		'add_new_item'          => __( 'Нова Екип', 'softuni' ),
		'add_new'               => __( 'Нова Екип', 'softuni' ),
		'new_item'              => __( 'Нова Екип', 'softuni' ),
		'edit_item'             => __( 'Редактирай Екип', 'softuni' ),
		'update_item'           => __( 'Update Item', 'softuni' ),
		'view_item'             => __( 'Виж Екипта', 'softuni' ),
		'view_items'            => __( 'Виж Екипта', 'softuni' ),
		'search_items'          => __( 'Search Item', 'softuni' ),
		'not_found'             => __( 'Not found', 'softuni' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'softuni' ),
		'featured_image'        => __( 'Featured Image', 'softuni' ),
		'set_featured_image'    => __( 'Set featured image', 'softuni' ),
		'remove_featured_image' => __( 'Remove featured image', 'softuni' ),
		'use_featured_image'    => __( 'Use as featured image', 'softuni' ),
		'insert_into_item'      => __( 'Insert into item', 'softuni' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'softuni' ),
		'items_list'            => __( 'Items list', 'softuni' ),
		'items_list_navigation' => __( 'Items list navigation', 'softuni' ),
		'filter_items_list'     => __( 'Filter items list', 'softuni' ),
	);
	$rewrite = array(
		'slug'                  => 'team',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Екип', 'softuni' ),
		'description'           => __( 'Усклуги', 'softuni' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical'          => true,
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
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'cpt_teamss', $args );

}
add_action( 'init', 'register_teams_cpt', 0 );