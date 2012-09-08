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
 * Version: 0.0.3
 */
// Hook up the initialization function, do some startup work. E.g. load the
// plugin translations.
add_action( 'plugins_loaded', 'ga_simplified_initialize' );

// Since the plugin code is wrapped with namespaces and uses anonymous
// functions, we need to check that the running PHP version is 5.3.0 or above.
//
// Otherwise, we'll trigger a fatal parsing error that will require access to
// the FTP to resolve, i.e. plugin removal.
if( version_compare( PHP_VERSION, '5.3.0', '>=' ) === true ) {
	// Include the plugin registration and the actual functionality.
	require( dirname( __FILE__ ) . '/registration.php' );
	require( dirname( __FILE__ ) . '/functionality.php' );
} else {
	add_action( 'admin_notices', 'ga_simplified_render_php_version_error' );
}

/**
 * Do some plugin initialization.
 *
 * @return void
 *
 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
 *
 * @since 0.0.2
 */
function ga_simplified_initialize()
{
	// Load the translation files, i.e. the files located within the
	// "languages"-directory.
	load_plugin_textdomain(
		'google-analytics-simplified',
		false,
		basename( dirname( __FILE__ ) ) . '/languages'
	);
}

/**
 * Render the error message for the PHP version.
 *
 * @return void.
 *
 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
 *
 * @since 0.0.2
 */
function ga_simplified_render_php_version_error()
{
	printf(
		'<div class="error"><p>%s</p></div>',
		__( 'The Google Analytics simplified plugin requires that your server is '.
			'running PHP version 5.3.0 or above.', 'google-analytics-simplified' )
	);
}
// End of file: google-analytics-simplified.php
// Location: google-analytics-simplified.php