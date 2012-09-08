# [Google Analytics simplified](https://github.com/raatiniemi/google-analytics-simplified/)

Google Analytics simplified is a simple WordPress plugin for adding Google Analytics tracking to a WordPress based site.

When the Google Analytics property ID has been entered on the plugin option page (located under Settings), a snippet for Google Analytics will be added to the `wp_footer`-hook in WordPress.

If your theme do not utilizes the `wp_footer`-hook the plugin will not work.

The plugin will add the site URL to the snippet, this way no other sites will be tracked.

It also support preview-mode. Which means that when you're previewing a post, the snippet will not be displayed and your page views will not be tracked.

## System requirements

* PHP +5.3.
* WordPress +3.1.