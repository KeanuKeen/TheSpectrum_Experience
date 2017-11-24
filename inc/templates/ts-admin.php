<h1>The Spectrum: Experience Sidebar Options</h1>
<?php settings_errors() ?>
<?php 

	$picture = esc_attr( get_option( 'profile_picture' ) );
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr( get_option( 'user_description' ) );

?>

<div class="ts-generalCntr">
	<div class="ts-sidebar-preview">
		<div class="ts-sidebar">
			<div class="ts-user-photo-cntr">
				<div class="ts-user-photo">
					<img src="<?php print $picture; ?>" id="profile-picture-preview" />
				</div>
			</div>
			<div class="ts-username"><h1><?php print $fullName ?></h1></div>
			<div class="ts-description"><h3><?php print $description ?></h3></div>
			<div class="ts-socialIcons"></div>
		</div>
	</div>
	<form action="options.php" method="post" class="ts-general-form">
		<?php settings_fields( 'ts-sidebar-group' ) ?>
		<?php do_settings_sections( 'ts_exp' ) ?>
		<?php submit_button('Save Changes','primary','btnSubmit') ?>
	</form>
</div>