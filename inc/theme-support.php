<?php

/*

@package TheSpectrum_Experience

===================
     ADMIN PAGE
===================

*/ 

$options = get_option('post_formats');
//$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
if (!empty( $options )){
	foreach ( $options as $option => $value ) {
		$output[] = $option; 
	}
}

if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output ); // Array of post-formats to support
}

$header = get_option('custom_header');
if( @$header == 1){
	add_theme_support( 'custom-header' );
}

$background = get_option('custom_background');
if( @$background == 1){
	add_theme_support( 'custom-background' );
}

