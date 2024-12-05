<?php

// Register Custom Post Type
function register_services_cpt() {

	$labels = array(
		'name'                  => _x( 'Услуги', 'Post Type General Name', 'softuni' ),
		'singular_name'         => _x( 'Услуга', 'Post Type Singular Name', 'softuni' ),
		'menu_name'             => __( 'Услуги', 'softuni' ),
		'name_admin_bar'        => __( 'Услуги', 'softuni' ),
		'archives'              => __( 'Услуги - Архив', 'softuni' ),
		'attributes'            => __( 'Item Attributes', 'softuni' ),
		'all_items'             => __( 'Всички услуги', 'softuni' ),
		'add_new_item'          => __( 'Нова услуга', 'softuni' ),
		'add_new'               => __( 'Нова услуга', 'softuni' ),
		'new_item'              => __( 'Нова услуга', 'softuni' ),
		'edit_item'             => __( 'Редактирай услуга', 'softuni' ),
		'update_item'           => __( 'Обнови услуга', 'softuni' ),
		'view_item'             => __( 'Виж услугата', 'softuni' ),
		'search_items'          => __( 'Търси услуга', 'softuni' ),
		'not_found'             => __( 'Няма намерени услуги', 'softuni' ),
		'not_found_in_trash'    => __( 'Няма намерени услуги в кошчето', 'softuni' ),
		'featured_image'        => __( 'Изображение', 'softuni' ),
		'set_featured_image'    => __( 'Задай изображение', 'softuni' ),
		'remove_featured_image' => __( 'Премахни изображение', 'softuni' ),
		'use_featured_image'    => __( 'Използвай като изображение', 'softuni' ),
	);
	$rewrite = array(
		'slug'                  => 'service',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Услуга', 'softuni' ),
		'description'           => __( 'Услуги', 'softuni' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_rest'          => true, // Enable Gutenberg
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
		'has_archive'           => true, 
	);
	register_post_type( 'cpt_services', $args );

}
add_action( 'init', 'register_services_cpt', 0 );

// Добавяне на мета полета
function softuni_register_meta_boxes() {
	add_meta_box(
		'service_details',
		__( 'Детайли за услугата', 'softuni' ),
		'softuni_service_meta_box_callback',
		'cpt_services',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'softuni_register_meta_boxes' );

function softuni_service_meta_box_callback( $post ) {
    wp_nonce_field( 'softuni_save_meta_box_data', 'softuni_meta_box_nonce' );

    $service_type = get_post_meta( $post->ID, '_service_type', true );
    $start_price = get_post_meta( $post->ID, '_start_price', true );
    $service_icon = get_post_meta( $post->ID, '_service_icon', true );

    // тип услуга
    echo '<label for="service_type">' . __( 'Тип услуга', 'softuni' ) . '</label>';
    echo '<select id="service_type" name="service_type">';
    echo '<option value="ИТ услуга" ' . selected( $service_type, 'ИТ услуга', false ) . '>ИТ услуга</option>';
    echo '<option value="Уеб сайт" ' . selected( $service_type, 'Уеб сайт', false ) . '>Уеб сайт</option>';
    echo '<option value="Маркетинг" ' . selected( $service_type, 'Маркетинг', false ) . '>Маркетинг</option>';
    echo '</select>';

    // цена
    echo '<p>';
    echo '<label for="start_price">' . __( 'Стартова цена', 'softuni' ) . '</label>';
    echo '<input type="text" id="start_price" name="start_price" value="' . esc_attr( $start_price ) . '" />';
    echo '</p>';

    // избор на иконз
    echo '<p>';
    echo '<label for="service_icon">' . __( 'Икона (Font Awesome)', 'softuni' ) . '</label>';
    echo '<select id="service_icon" name="service_icon">';
    $icons = [
        'fa fa-code' => 'Code',
        'fa fa-file-code' => 'File Code',
        'fa fa-external-link-alt' => 'External Link',
        'fa fa-user-secret' => 'User Secret',
        'fa fa-envelope-open' => 'Envelope Open',
        'fa fa-laptop' => 'Laptop',
        'fab fa-facebook' => 'Facebook',
    ];
    foreach ( $icons as $class => $label ) {
        echo '<option value="' . esc_attr( $class ) . '" ' . selected( $service_icon, $class, false ) . '>' . esc_html( $label ) . '</option>';
    }
    echo '</select>';
    echo '</p>';
}


function softuni_save_meta_box_data( $post_id ) {
	if ( ! isset( $_POST['softuni_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['softuni_meta_box_nonce'], 'softuni_save_meta_box_data' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['service_type'] ) ) {
		update_post_meta( $post_id, '_service_type', sanitize_text_field( $_POST['service_type'] ) );
	}

	if ( isset( $_POST['start_price'] ) ) {
		update_post_meta( $post_id, '_start_price', sanitize_text_field( $_POST['start_price'] ) );
	}

	if ( isset( $_POST['service_icon'] ) ) {
		update_post_meta( $post_id, '_service_icon', sanitize_text_field( $_POST['service_icon'] ) );
	}
}
add_action( 'save_post', 'softuni_save_meta_box_data' );
