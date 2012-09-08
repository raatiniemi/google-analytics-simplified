=== Google Analytics simplified ===
Contributors: raatiniemi
Tags: google, analytics
Requires at least: 3.1
Tested up to: 3.4.2
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Google Analytics simplified is a simple WordPress plugin for adding Google Analytics tracking to a WordPress based site.

== Description ==

Google Analytics simplified is a simple WordPress plugin for adding Google Analytics tracking to a WordPress based site.

When the Google Analytics property ID has been entered on the plugin option page (located under Settings), a snippet for Google Analytics will be added to the `wp_footer`-hook in WordPress.

If your theme do not utilizes the `wp_footer`-hook the plugin will not work.

The plugin will add the site URL to the snippet, this way no other sites will be tracked.

It also support preview-mode. Which means that when you're previewing a post, the snippet will not be displayed and your page views will not be tracked.

The main repository for Google Analytics simplified is hosted over at [GitHub](https://github.com/raatiniemi/google-analytics-simplified/). Feel free to submit pull requests, or requests features or bugs in the issue tracker.

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