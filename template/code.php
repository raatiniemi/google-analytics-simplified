<?php
// +---------------------------------------------------------------------------+
// | This file is a part of the Google Analytics simplified WordPress plugin.  |
// | Copyright (c) 2012, Tobias Raatiniemi <me@thedeveloperblog.net>.          |
// +---------------------------------------------------------------------------+
// +---------------------------------------------------------------------------+
// | Retrieve the value for the ga-* specific settings.                        |
// +---------------------------------------------------------------------------+
	$domain = get_option( 'ga-domain-name', null );
	$property_id = get_option( 'ga-property-id', null );
?>
<?php if( $property_id !== null ) : ?>
<script>
	var _gaq=[
		<?=($domain !== null ? "['_setDomainName', '{$domain}']," : null); ?>
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