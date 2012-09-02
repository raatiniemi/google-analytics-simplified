<?php
// +---------------------------------------------------------------------------+
// | This file is a part of the Google Analytics simplified WordPress plugin.  |
// | Copyright (c) 2012, Tobias Raatiniemi <me@thedeveloperblog.net>.          |
// +---------------------------------------------------------------------------+
/**
 * Plugin Name: Google Analytics simplified
 * Plugin URI: https://github.com/raatiniemi/google-analytics-simplified
 *
 * Description: Simple WordPress plugin for working with Google Analytics.
 *
 * Author: Tobias Raatiniemi
 * Author URI: http://www.thedeveloperblog.net
 *
 * Version: 0.0.1
 */
namespace TheDeveloperBlog\WordPress\GoogleAnalyticsSimplified
{
	/**
	 * Register the Google Analytics specific option fields.
	 *
	 * @return void
	 *
	 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
	 *
	 * @since 0.0.1
	 *
	 * @todo Add the sanitize callback functions for the setting items.
	 */
	add_action( 'admin_init', function() {
		register_setting(
			'google-analytics-simplified',
			'ga-property-id',
			function( $value ) {
				// Check if the given value matches the excepted format of
				// a Google Analytics property ID, i.e. UA-XXXXXXX-X.
				if( preg_match( '/^(UA-([0-9]+)-([0-9]{1}))$/i', $value ) == false ) {
					// It would appear that the given code did not match
					// the format. Set up a new WordPress settings error
					// with an explaining text to the user.
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
			__( 'Google Analytics simplified', 'google-analytics-simplified' ),
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

	/**
	 * Add the default options, run on plugin activation.
	 *
	 * @return void
	 *
	 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
	 *
	 * @since 0.0.1
	 */
	register_activation_hook( __FILE__, function() {
		// Add a default value to the Google Analytics property ID. This value
		// will be checked on the code template, i.e. if it is null, we won't
		// print the snippet.
		add_option( 'ga-property-id', null );
	} );

	/**
	 * Deletes the options, run on plugin deactivation.
	 *
	 * @return void
	 *
	 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
	 *
	 * @since 0.0.1
	 */
	register_deactivation_hook( __FILE__, function() {
		// When the plugin is deactivated, we need to remove our options from
		// the database. It's not very polite to clutter up someones database!
		delete_option( 'ga-property-id' );
	} );
}
// End of file: google-analytics.php
// Location: google-analytics.php