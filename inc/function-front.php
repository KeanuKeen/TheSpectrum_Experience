<?php

/*

@package TheSpectrum_Experience

===================
     THEME PAGE
===================

*/ 

function ts_theme_setup(){

	add_theme_support( 'menus' );
	register_nav_menu( 'primary', 'Primary Site Navigation' );

}

add_action( 'init', 'ts_theme_setup' );