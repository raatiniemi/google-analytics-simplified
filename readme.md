# [Google Analytics simplified](https://github.com/raatiniemi/google-analytics-simplified/)

Google Analytics simplified is a WordPress plugin that for adding the Google Analytics tracking code to a WordPress based site.

Once the property ID have been entered on the option page (located under Settings), the tracking snippet will be added to the `wp_footer`-hook in WordPress.

It supports the preview-mode in WordPress. This means that, when you're previewing a post/page, the views won't be tracked.

## Manual installation

1. Download the plugin.
1. Extract and upload the folder to your `/wp-content/plugins/` directory.
1. Activate the plugin from the administration panel.
1. Go to Settings -> Google Analytics.
1. Enter your Google Analytics property ID in the field and Save changes.

## System requirements

* PHP +5.3.
* WordPress +3.0 (+3.1 is recommended).