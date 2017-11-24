<?php

/*

@package TheSpectrum_Experience

==================================
     THEME CUSTOM POST TYPES
==================================

*/ 

$contact = get_option('contact_activate');
if( @$contact == 1){
	add_theme_support( 'custom-post-type' );
}
