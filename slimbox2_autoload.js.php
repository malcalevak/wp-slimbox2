<?php
require('../../../wp-blog-header.php');
header('Content-type: text/javascript');

if (get_option('wp_slimbox_loop') == 'on') $loop = 'true';
else $loop = 'false';
$options = '{
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
		}';

if (get_option('wp_slimbox_autoload') == 'on') 
$autoLoad = '$("a[href]").filter(function() {
		return /\.(jpg|png|gif)$/i.test(this.href);
	}).slimbox({}, null, function(el) {
		return (this == el) || (this.parentNode && (this.parentNode == el.parentNode));
	});';
else
$autoLoad = '$("a[rel^=\'lightbox\']").slimbox('.$options.', null, function(el) {
		return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
	});
	});';
echo '
jQuery(function($) {
$("#lbOverlay").css("background-color","'.get_option('wp_slimbox_overlayColor').'");
'.$autoLoad.'
});';
?>