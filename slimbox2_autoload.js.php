<?php
require('../../../wp-blog-header.php');
require('gziphead.php');

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
	}).slimbox('.$options.', null, function(el) {
		return (this == el) || ($(this).parents("div.post, div#page")[0] && ($(this).parents("div.post, div#page")[0] == $(el).parents("div.post, div#page")[0]));
	});';
else
$autoLoad = '$("a[rel^=\'lightbox\']").slimbox('.$options.', null, function(el) {
		return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
	});
';
echo '
jQuery(function($) {
$("#lbOverlay").css("background-color","'.get_option('wp_slimbox_overlayColor').'");
'.$autoLoad;
if(get_option('wp_slimbox_picasaweb') == 'on') echo '
$("a[href^=\'http://picasaweb.google.\'] > img:first-child[src]").parent().slimbox({}, function(el) {
	return [el.firstChild.src.replace(/\/s\d+(-c)?\/([^\/]+)$/, "/s640/$2"),
		(el.title || el.firstChild.alt) + \'<br /><a href="\' + el.href + \'">Picasa Web Albums page</a>\'];
});
';
if(get_option('wp_slimbox_flickr') == 'on') echo '
$("a[href^=\'http://www.flickr.com/photos/\'] > img:first-child[src]").parent().slimbox({}, function(el) {
	return [el.firstChild.src.replace(/_[mts]\.(\w+)$/, ".$1"),
		(el.title || el.firstChild.alt) + \'<br /><a href="\' + el.href + \'">Flickr page</a>\'];
});
';
echo'
});';
?>