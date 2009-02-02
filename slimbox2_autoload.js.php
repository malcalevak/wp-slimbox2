<?php
require('../../../wp-blog-header.php');
if (!defined( 'WP_CONTENT_URL')) {define('WP_CONTENT_URL',get_option('siteurl').'/wp-content');}
if (!defined('WP_PLUGIN_URL')) {define('WP_PLUGIN_URL',WP_CONTENT_URL.'/plugins');}
load_plugin_textdomain ('wp-slimbox2', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)) . '/languages', dirname(plugin_basename(__FILE__)) . '/languages');

if ( extension_loaded('zlib') and !ini_get('zlib.output_compression') and ini_get('output_handler') != 'ob_gzhandler' and ((version_compare(phpversion(), '5.0', '>=') and ob_get_length() == false) or ob_get_length() === false) ) {
	ob_start('ob_gzhandler');
}
header("Cache-Control: public");
header("Pragma: cache");
header("Expires: ".gmdate("D, d M Y H:i:s", time() + 60*60*24*365)." GMT");// cache for one year
header("Last-Modified: ".gmdate("D, d M Y H:i:s", filemtime($_SERVER['SCRIPT_FILENAME']))." GMT");
header('Content-Type: text/javascript; charset: UTF-8');

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
		return /\.(jpg|png|gif)(\?[\d\w=&]*)?$/i.test(this.href);
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
$("#lbPrevLink").hover(
	function () {
		$(this).css("background-image","url(\''.WP_PLUGIN_URL.'/wp-slimbox2/images/'.__('default/prevlabel.gif', 'wp-slimbox2').'\')");
	},
	function () {
		$(this).css("background-image","");
	}
);
$("#lbNextLink").hover(
	function () {
		$(this).css("background-image","url(\''.WP_PLUGIN_URL.'/wp-slimbox2/images/'.__('default/nextlabel.gif', 'wp-slimbox2').'\')");
	},
	function () {
		$(this).css("background-image","");
	}
);';
if(__('LTR', 'wp-slimbox2') == 'RTL') echo '
$("#lbPrevLink").addClass("next");
$("#lbNextLink").addClass("prev");
$(".next").attr("id", "lbNextLink");
$(".prev").attr("id", "lbPrevLink");
';
echo '$("#lbCloseLink").css("background","transparent url(\''.WP_PLUGIN_URL.'/wp-slimbox2/images/'.__('default/closelabel.gif', 'wp-slimbox2').'\') no-repeat center");
'.$autoLoad;
if(get_option('wp_slimbox_picasaweb') == 'on') echo '
$("a[href^=\'http://picasaweb.google.\'] > img:first-child[src]").parent().slimbox({}, function(el) {
	return [el.firstChild.src.replace(/\/s\d+(?:\-c)?\/([^\/]+)$/, "/s640/$2"),
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