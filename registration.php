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
// End of file: registration.php
// Location: registration.php