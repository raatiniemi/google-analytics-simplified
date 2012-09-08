=== Google Analytics simplified ===
Contributors: raatiniemi
Tags: google, analytics
Requires at least: 3.1
Tested up to: 3.4.2
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Simple WordPress plugin for working with Google Analytics.

== Description ==

Google Analytics simplified is a WordPress plugin that for adding the Google Analytics tracking code to a WordPress based site.

Once the property ID have been entered on the option page (located under Settings), the tracking snippet will be added to the `wp_footer`-hook in WordPress.

It supports the preview-mode in WordPress. This means that, when you're previewing a post/page, the views won't be tracked.

The main repository is hosted over at [GitHub](https://github.com/raatiniemi/google-analytics-simplified/). Feel free to submit pull requests or use the issue tracker to request features or report bugs.

== Installation ==

1. Download the plugin.
1. Extract and upload the folder to your `/wp-content/plugins/` directory.
1. Activate the plugin from the administration panel.
1. Go to Settings -> Google Analytics.
1. Enter your Google Analytics property ID in the field and Save changes.

== Changelog ==

= 0.0.3 =
* Added support for translation.
* Added Swedish translation.

= 0.0.2 =
* Graceful failure when server is running PHP < 5.3.0

= 0.0.1 =
* Added basic functionality.