<h1>The Spectrum: Experience Theme Support Options</h1>
<?php settings_errors() ?>

<div class="ts-generalCntr">
	<form action="options.php" method="post" class="ts-general-form">
		<?php settings_fields( 'ts-theme-support-group' ) ?>
		<?php do_settings_sections( 'ts_exp_options' ) ?>
		<?php submit_button() ?>
	</form>
</div>