<?php
require_once("../../../../wp-load.php");
if (!defined( 'WP_CONTENT_URL')) {define('WP_CONTENT_URL',get_option('siteurl').'/wp-content');}
if (!defined('WP_PLUGIN_URL')) {define('WP_PLUGIN_URL',WP_CONTENT_URL.'/plugins');}
load_plugin_textdomain ('wp-slimbox2', WP_PLUGIN_URL.'/wp-slimbox2/languages', '/wp-slimbox2/languages');
echo json_encode(array(get_option('wp_slimbox'),array(__('default/prevlabel.gif', 'wp-slimbox2'),__('default/nextlabel.gif', 'wp-slimbox2'),__('default/closelabel.gif', 'wp-slimbox2'),__('LTR', 'wp-slimbox2') == 'RTL')));
/*$options = new WPlize('wp_slimbox');
$options->get_option('autoload')
$options->get_option('loop')
$options->get_option('overlayOpacity')
$options->get_option('overlayFadeDuration')
$options->get_option('resizeDuration')
$options->get_option('resizeEasing')
$options->get_option('initialWidth')
$options->get_option('initialHeight')
$options->get_option('imageFadeDuration')
$options->get_option('captionAnimationDuration')
$options->get_option('counterText')
$options->get_option('closeKeys')
$options->get_option('previousKeys')
$options->get_option('nextKeys')
$options->get_option('overlayColor')
$options->get_option('picasaweb') == 'on'
$options->get_option('flickr')
http://www.wptavern.com/forum/plugins-hacks/1105-sending-settings-javascript-files.html
*/
?>