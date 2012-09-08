<?php
// +---------------------------------------------------------------------------+
// | This file is a part of the Google Analytics simplified WordPress plugin.  |
// | Copyright (c) 2012, Tobias Raatiniemi <me@thedeveloperblog.net>.          |
// +---------------------------------------------------------------------------+
namespace TheDeveloperBlog\WordPress\GoogleAnalyticsSimplified
{
// +---------------------------------------------------------------------------+
// | Namespace use-directives.                                                 |
// +---------------------------------------------------------------------------+

	/**
	 * Register the Google Analytics specific option fields.
	 *
	 * @return void
	 *
	 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
	 *
	 * @since 0.0.1
	 */
	add_action( 'admin_init', function() {
		register_setting(
			'google-analytics-simplified',
			'ga-property-id',
			function( $value ) {
				// The value can be empty, which will just remove the
				// snippet from the wp_footer hook.
				if( empty( $value ) == true ) {
					$value = null;

				// Check if the given value matches the excepted format of
				// a Google Analytics property ID, i.e. UA-XXXXXXX-X.
				} elseif( preg_match( '/^(UA-([0-9]+)-([0-9]{1}))$/i', $value ) == false ) {
					// Set up a new WordPress settings error with an
					// explaining text to the user.
					add_settings_error(
						'ga-property-id',
						'invalid-ga-property-id',
						__( 'The Google Analytics property ID do not match '.
						'the excepted format.', 'google-analytics-simplified' )
					);

					// Reset the value of the field to null, we don't want
					// rogue property ID on live websites.
					$value = null;
				}

				// Apply the functionality filter and return the value.
				return apply_filters( 'validate-ga-property-id', $value );
			}
		);
	} );

	/**
	 * Register and render the options page.
	 *
	 * @return void
	 *
	 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
	 *
	 * @since 0.0.1
	 */
	add_action( 'admin_menu', function() {
		add_options_page(
			'Google Analytics simplified',
			'Google Analytics',
			'manage_options',
			'google-analytics-simplified',
			function() {
				// Include the options template.
				require( __DIR__ . '/template/options.php' );
			}
		);
	} );

	/**
	 * Adds the Google Analytics code to the theme footer.
	 *
	 * @return void
	 *
	 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
	 *
	 * @since 0.0.1
	 */
	add_action( 'wp_footer', function() {
		// We need to check that the current request is not a preview request,
		// since we'd rather not track post those.
		if( ! is_preview() ) {
			// Include the code template.
			require( __DIR__ . '/template/code.php' );
		}
	} );
}
// End of file: functionality.php
// Location: functionality.php