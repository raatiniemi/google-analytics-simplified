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
		register_setting( 'google-analytics-simplified', 'ga-domain-name' );
		register_setting( 'google-analytics-simplified', 'ga-property-id' );
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
			'Google Analytics',
			'Google Analytics',
			'manage_options',
			'google-analytics-simplified',
			function() {
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
		add_option( 'ga-domain-name', null );
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
		delete_option( 'ga-domain-name' );
		delete_option( 'ga-property-id' );
	} );
}
// End of file: google-analytics.php
// Location: google-analytics.php