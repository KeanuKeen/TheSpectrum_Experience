<?php

/*

@package TheSpectrum_Experience

=================================
     ADMIN ENQUEUE FUNCTIONS
=================================

*/ 

function ts_load_admin_scripts( $hook ){

	if( 'toplevel_page_ts_exp' != $hook ){ return; }
	
	wp_register_style( 'ts-admin-style', get_template_directory_uri().'/css/ts.admin.css ', array(), '1.0.0', 'all' );
	wp_register_script( 'ts-admin-script', get_template_directory_uri().'/js/ts.admin.js', array('jquery'), '1.0.0', true );

	wp_enqueue_style( 'ts-admin-style' );
	wp_enqueue_script( 'ts-admin-script' );

	wp_enqueue_media();

}

add_action( 'wp_enqueue_scripts', 'ts_load_admin_scripts' );

function ts_load_scripts(){

	if(is_page( 'home' )){
		wp_enqueue_style( 'ts-home-style', get_template_directory_uri().'/css/ts.home.css', array(), '1.0.0', 'all' );
	}
	wp_enqueue_script( 'ts-home-script', get_template_directory_uri() . '/js/ts.home.js', array('jquery'), '1.0.0', true );
	
}


add_action('wp_enqueue_scripts', 'ts_load_scripts');
