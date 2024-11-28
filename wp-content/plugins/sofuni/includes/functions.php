<?php

/**
 *  This is a callback function to display a services title with a shortcode
 */

 function display_service_title ( $atts ) {

   $atts = shortcode_atts( array(
		'id' => 'id',
		'baz' => 'default baz'
	), $atts, 'bartag' );

    return get_the_title( $atts['id'] );
 }

 add_shortcode( 'display_service_title', 'display_service_title' );


 /**
  * Funtcion to enqueue scripts and styles
  */

 function softuni_enqueue_assets() {
   wp_enqueue_script( 
      'ajax-script',
      plugins_url( '../assets/scripts/scripts.js', __FILE__ ), 
      array( ), 
      '1.0.1');
   wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url'
   => admin_url( 'admin-ajax.php' ) ) );
   }
   add_action( 'wp_enqueue_scripts', 'softuni_enqueue_assets' );
   
   function service_item_like() {
   $id = esc_attr( $_POST['item_id'] );
   if (empty($upvote_number)) {
      $upvote_number = 0;
   }
   $upvote_number = get_post_meta( $id, 'votes', true );
   update_post_meta( $job_id, 'votes', $upvote_number + 1 );
   }
   add_action( 'wp_ajax_nopriv_service_item_like', 'service_item_like' );
   add_action( 'wp_ajax_service_item_like', 'service_item_like' );
 ?>