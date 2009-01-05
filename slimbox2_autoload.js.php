<?php
require('../../../wp-blog-header.php');
header('Content-type: text/javascript');

if (get_option('wp_slimbox_loop') == 'on') $loop = 'true';
else $loop = 'false';

echo '
jQuery(function($) {
	$("a[rel^=\'lightbox\']").slimbox({
			loop: '.$loop.',
			overlayOpacity: '.get_option('wp_slimbox_overlayOpacity').',
			overlayFadeDuration: '.get_option('wp_slimbox_overlayFadeDuration').',
			resizeDuration: '.get_option('wp_slimbox_resizeDuration').',
			resizeEasing: "'.get_option('wp_slimbox_resizeEasing').'",
			initialWidth: '.get_option('wp_slimbox_initialWidth').',
			initialHeight: '.get_option('wp_slimbox_initialHeight').',
			imageFadeDuration: '.get_option('wp_slimbox_imageFadeDuration').',
			captionAnimationDuration: '.get_option('wp_slimbox_captionAnimationDuration').',
			counterText: "'.get_option('wp_slimbox_counterText').'",
			closeKeys: ['.get_option('wp_slimbox_closeKeys').'],
			previousKeys: ['.get_option('wp_slimbox_previousKeys').'],
			nextKeys: ['.get_option('wp_slimbox_nextKeys').']
		}, null, function(el) {
		return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
	});
});
';
?>