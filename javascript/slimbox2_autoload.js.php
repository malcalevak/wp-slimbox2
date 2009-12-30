<?php
require_once("../../../../wp-load.php");
if (!defined( 'WP_CONTENT_URL')) {define('WP_CONTENT_URL',get_option('siteurl').'/wp-content');}
if (!defined('WP_PLUGIN_URL')) {define('WP_PLUGIN_URL',WP_CONTENT_URL.'/plugins');}
load_plugin_textdomain ('wp-slimbox2', WP_PLUGIN_URL.'/wp-slimbox2/languages', '/wp-slimbox2/languages');
$options = new WPlize('wp_slimbox');
if ( extension_loaded('zlib') and !ini_get('zlib.output_compression') and ini_get('output_handler') != 'ob_gzhandler' and ((version_compare(phpversion(), '5.0', '>=') and ob_get_length() == false) or ob_get_length() === false) ) {
	ob_start('ob_gzhandler');
}
header("Cache-Control: public");
header("Pragma: cache");
header("Expires: ".gmdate("D, d M Y H:i:s", time() + 60*60*24*365)." GMT");// cache for one year
header("Last-Modified: ".gmdate("D, d M Y H:i:s", filemtime($_SERVER['SCRIPT_FILENAME']))." GMT");
header('Content-Type: text/javascript; charset='.$options->get_option('blog_charset').'');

if ($options->get_option('autoload') == 'on') 
$autoLoad = '$("a[href]").filter(function() {
		return /\.(jpeg|bmp|jpg|png|gif)(\?[\d\w=&]*)?$/i.test(this.href);
	}).slimbox(options, null, function(el) {
		return (this == el) || ($(this).parents("div.post, div#page")[0] && ($(this).parents("div.post, div#page")[0] == $(el).parents("div.post, div#page")[0]));
	});';
else
$autoLoad = '$("a[rel^=\'lightbox\']").slimbox(options, null, function(el) {
		return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
	});
';
echo '
jQuery(function($) {
var options = {
			loop: '.(($options->get_option('loop') == 'on')?'true':'false').',
			overlayOpacity: '.$options->get_option('overlayOpacity').',
			overlayFadeDuration: '.$options->get_option('overlayFadeDuration').',
			resizeDuration: '.$options->get_option('resizeDuration').',
			resizeEasing: "'.$options->get_option('resizeEasing').'",
			initialWidth: '.$options->get_option('initialWidth').',
			initialHeight: '.$options->get_option('initialHeight').',
			imageFadeDuration: '.$options->get_option('imageFadeDuration').',
			captionAnimationDuration: '.$options->get_option('captionAnimationDuration').',
			counterText: "'.$options->get_option('counterText').'",
			closeKeys: ['.$options->get_option('closeKeys').'],
			previousKeys: ['.$options->get_option('previousKeys').'],
			nextKeys: ['.$options->get_option('nextKeys').']
		}
$("#lbOverlay").css("background-color","'.$options->get_option('overlayColor').'");
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
echo '
$("#lbCloseLink").css("background","transparent url(\''.WP_PLUGIN_URL.'/wp-slimbox2/images/'.__('default/closelabel.gif', 'wp-slimbox2').'\') no-repeat center");
'.$autoLoad;
if($options->get_option('picasaweb') == 'on') echo '
$("a[href^=\'http://picasaweb.google.\'] > img:first-child[src]").parent().slimbox(options, function(el) {
	return [el.firstChild.src.replace(/\/s\d+(?:\-c)?\/([^\/]+)$/, "/s640/$2"),
		(el.title || el.firstChild.alt) + \'<br /><a href="\' + el.href + \'">Picasa Web Albums page</a>\'];
});
';
if($options->get_option('flickr') == 'on') echo '
$("a[href^=\'http://www.flickr.com/photos/\'] > img:first-child[src]").parent().slimbox(options, function(el) {
	return [el.firstChild.src.replace(/_[mts]\.(\w+)$/, ".$1"),
		(el.title || el.firstChild.alt) + \'<br /><a href="\' + el.href + \'">Flickr page</a>\'];
});
';
echo'
});';
?>