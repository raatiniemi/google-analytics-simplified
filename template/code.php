<?php
// +---------------------------------------------------------------------------+
// | This file is a part of the Google Analytics simplified WordPress plugin.  |
// | Copyright (c) 2012, Tobias Raatiniemi <me@thedeveloperblog.net>.          |
// +---------------------------------------------------------------------------+
	/**
	 * Retrieve and fix the website domain name.
	 *
	 * @return string Fixed domain name for the current website.
	 *
	 * @author Tobias Raatiniemi <me@thedeveloperblog.net>
	 *
	 * @since 0.0.1
	 */
	$domain = function() {
		// Remove the protocol, http or https, and the trailing slash from the
		// URL that the "get_site_url"-function returns.
		//
		// We only want to pass the domain name to Google Analytics.
		return (string) preg_replace(
			'/^(https?:\/\/)/i',
			'',
			rtrim( get_site_url(), '/' )
		);
	};
	// Retrieve the Google Analytics property ID, default to null.
	// This way we can check if we should print the snippet.
	$property_id = get_option( 'ga-property-id', null );
?>
<?php if( empty( $property_id ) == false ) : ?>
<script>
	var _gaq=[
		['_setDomainName', '<?=$domain(); ?>'],
		['_setAccount','<?=$property_id; ?>'],
		['_trackPageview']
	];
	(function(d,t){var g=d.createElement(t), s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>
<?php
// End of file: code.php
// Location: template/code.php ?>