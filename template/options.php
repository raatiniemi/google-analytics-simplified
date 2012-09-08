<?php
// +---------------------------------------------------------------------------+
// | This file is a part of the Google Analytics simplified WordPress plugin.  |
// | Copyright (c) 2012, Tobias Raatiniemi <me@thedeveloperblog.net>.          |
// +---------------------------------------------------------------------------+
?>
<div class="wrap">
	<h2>Google Analytics simplified</h2>
	<form method="post" action="options.php">
		<?php wp_nonce_field( 'update-options' ); ?>
		<?php settings_fields( 'google-analytics-simplified' ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="ga-property-id"><?php _e( 'Google Analytics ID:', 'google-analytics-simplified' ); ?></label>
				</th>
				<td>
					<input type="text" id="ga-property-id" name="ga-property-id" value="<?php echo get_option( 'ga-property-id' ); ?>" class="regular-text" />
					<p class="description"><?php _e( 'The ID for the Google Analytics property. Can be found on the Google Analytics account list, i.e. <strong>the UA-XXXXXXX-X formatted code</strong>.', 'google-analytics-simplified' ); ?></p>
				</td>
			</tr>
		</table>
		<input type="hidden" name="action" value="update" />
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
		</p>
	</form>
</div>
<?php
// End of file: options.php
// Location: template/options.php ?>