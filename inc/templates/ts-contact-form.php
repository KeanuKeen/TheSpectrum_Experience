<h1>The Spectrum: Experience Theme Contact Options</h1>
<?php settings_errors() ?>

<div class="ts-generalCntr">
	<form action="options.php" method="post" class="ts-general-form">
		<?php settings_fields( 'ts-contact-group' ) ?>
		<?php do_settings_sections( 'ts_exp_contact' ) ?>
		<?php submit_button() ?>
	</form>
</div>