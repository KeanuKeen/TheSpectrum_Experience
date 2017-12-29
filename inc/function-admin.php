<?php

/*

@package TheSpectrum_Experience

===================
     ADMIN PAGE
===================

*/ 

// <Admin variables>

// </Admin variables>

function ts_init_admin_page(){

	// Init theme admin page
	add_menu_page('The Spectrum Theme Sidebar Settings', 'The Spectrum', 'manage_options', 'ts_exp', 'ts_create_admin_page', get_template_directory_uri().'/img/svg/TSCustom.svg' , 110); 

	// Init theme admin submenu page
	add_submenu_page( 'ts_exp', 'TS Sidebar Settings', 'Sidebar', 'manage_options', 'ts_exp', 'ts_create_admin_page' );
	add_submenu_page( 'ts_exp', 'TS Theme Support Options', 'Theme', 'manage_options', 'ts_exp_options', 'ts_create_options_page' );
	add_submenu_page( 'ts_exp', 'TS Contact Form', 'Contact Form', 'manage_options', 'ts_exp_contact', 'ts_create_contact_page' );
	add_submenu_page( 'ts_exp', 'TS Look & Feel', 'Look & Feel', 'manage_options', 'ts_exp_css', 'ts_create_css_page' );

	// Activate custom settings on admin page init
	add_action( 'admin_init', 'ts_custom_settings');

}


add_action('admin_menu', 'ts_init_admin_page');


// Template admin pages functions

function ts_create_admin_page(){ require_once( get_template_directory().'/inc/templates/ts-admin.php' ); }

function ts_create_css_page(){ echo '<h1> The Spectrum Look & Feel </h1>'; }

function ts_create_options_page(){ require_once( get_template_directory().'/inc/templates/ts-theme-support.php' ); }

function ts_create_contact_page(){ require_once( get_template_directory().'/inc/templates/ts-contact-form.php' ); }


// Init custom fields functions

function ts_custom_settings(){

	// Sidebar Options Group
	register_setting( 'ts-sidebar-group', 'profile_picture' );
	register_setting( 'ts-sidebar-group', 'first_name');
	register_setting( 'ts-sidebar-group', 'last_name');
	register_setting( 'ts-sidebar-group', 'user_description');
	register_setting( 'ts-sidebar-group', 'twitter_handler', 'ts_sanitize_twitter_handler');
	register_setting( 'ts-sidebar-group', 'facebook_handler');

	add_settings_section( 'ts-sidebar-options', 'Sidebar Options', 'ts_sidebar_options', 'ts_exp' );

	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'ts_sidebar_profile_picture', 'ts_exp', 'ts-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'ts_sidebar_name', 'ts_exp', 'ts-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'ts_sidebar_description', 'ts_exp', 'ts-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'ts_sidebar_twitter', 'ts_exp', 'ts-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'ts_sidebar_facebook', 'ts_exp', 'ts-sidebar-options'); 


	// Theme Support Options Group
	register_setting( 'ts-theme-support-group', 'post_formats' );
	register_setting( 'ts-theme-support-group', 'custom_header' );
	register_setting( 'ts-theme-support-group', 'custom_background' );

	add_settings_section( 'ts-theme-support-options', 'Theme Options', 'ts_theme_support_options', 'ts_exp_options' );

	add_settings_field( 'support-post-formats', 'Post Formats', 'ts_posts_formats', 'ts_exp_options', 'ts-theme-support-options' );
	add_settings_field( 'support-custom-header', 'Custom Header', 'ts_custom_header', 'ts_exp_options', 'ts-theme-support-options' );
	add_settings_field( 'support-custom-background', 'Custom Background', 'ts_custom_background', 'ts_exp_options', 'ts-theme-support-options' );

	// Contact Form Options
	register_setting( 'ts-contact-group', 'contact_activate' );

	add_settings_section( 'ts-contact-options', 'Contact Form', 'ts_contact_options', 'ts_exp_contact' );

	add_settings_field( 'contact-activate-form', 'Activate Contact Form', 'ts_contact_activate_form', 'ts_exp_contact', 'ts-contact-options' );






}


// init Settings section

function ts_sidebar_options(){ echo 'Customize your Sidebar information'; }

function ts_theme_support_options(){ echo 'Toggle specific Theme Support Options'; } 

function ts_contact_options(){ echo 'Toggle Contact Options'; } 

 
// init Sidebar Field Options

function ts_sidebar_profile_picture(){

	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<input type="button" class="button button-secondary" class="upload-profile" id="upload-button" value="Upload Profile Picture" />';
		echo '<input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" class="upload-profile" id="upload-button" value="Replace" />';
		echo '<input type="hidden" id="profile-picture" name="profile_picture" value="' .$picture. '" />';

		echo '<input type="button" class="button button-secondary" class="remove-profile" id="remove-button" value="Remove" />';
		echo '<input type="hidden" id="remove-profile-picture" name="remove_profile_picture" value="' .$picture. '" />';
	}
	

}

function ts_sidebar_name(){

	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" placeholder="First Name" value="' .$firstName. '" />';
	echo '<input type="text" name="last_name" placeholder="Last Name" value="' .$lastName. '" />'; 

}

function ts_sidebar_description(){

	$userDescription = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" placeholder="description" value="' .$userDescription. '" /><p class="description">Can you think of funny thoughts about us?</p>';

}

function ts_sidebar_twitter(){

	$twitterHandler = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" placeholder="Twitter handler" value="' .$twitterHandler. '" /><p class="description">You can type-in your twitter username without the @ character</p>';

}

function ts_sidebar_facebook(){

	$facebookHandler = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" placeholder="Facebook handler" value="' .$facebookHandler. '" />';

}


function ts_custom_header(){
	$options = get_option( 'custom_header' );
	// Version 1
	$checked = ''; 
	if( !empty($options) ){
		$checked = ( $options == 1 ? 'checked' : '' ); // Check if format exists in options, if it is, set to checked, otherwise it's empty
	}
	
	echo'<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'/>Activate the Custom Header</label>';
}

function ts_custom_background(){
	$options = get_option( 'custom_background' );
	// Version 2
	$checked = ( @$options == 1 ? 'checked' : '' ); // Check if format exists in options, if it is, set to checked, otherwise it's empty

	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'/>Activate the Custom Background</label>';
}

function ts_contact_activate_form(){
	$options = get_option( 'contact_activate' );
	// Version 2
	$checked = ( @$options == 1 ? 'checked' : '' ); // Check if format exists in options, if it is, set to checked, otherwise it's empty

	echo '<label><input type="checkbox" id="contact_activate" name="contact_activate" value="1" '.$checked.'/></label>';
}

// init Theme Support Options

function ts_posts_formats(){ 

	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ) {
		$checked = ( isset( $options[$format] ) == 1 ? 'checked' : '' ); // Check if format exists in options, if it is, set to checked, otherwise it's empty
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'/>'.$format.'</label><br>';
	}
	echo $output;

}

// Sanitization settings

function ts_sanitize_twitter_handler( $input ){

	$sanitizedOutput = sanitize_text_field( $input ); // strips all whitespace, invalid UTF-8, etc..
	$sanitizedOutput = str_replace('@', '', $sanitizedOutput); // replace '@' with an empty character
	return $sanitizedOutput;
}

