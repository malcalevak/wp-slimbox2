<?php
load_plugin_textdomain ('wp-slimbox2', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)) . '/languages', dirname(plugin_basename(__FILE__)) . '/languages');
$page = add_options_page('WP-Slimbox2 Options', 'WP-Slimbox2', 8, 'slimbox2options', 'slimbox_options');
add_option('wp_slimbox_autoload', 'false');
add_option('wp_slimbox_loop', 'false');
add_option('wp_slimbox_overlayOpacity', '0.8');
add_option('wp_slimbox_overlayColor', '#000000');
add_option('wp_slimbox_overlayFadeDuration', '400');
add_option('wp_slimbox_resizeDuration', '400');
add_option('wp_slimbox_resizeEasing', 'swing');
add_option('wp_slimbox_initialWidth', '250');
add_option('wp_slimbox_initialHeight', '250');
add_option('wp_slimbox_imageFadeDuration', '400');
add_option('wp_slimbox_captionAnimationDuration', '400');
add_option('wp_slimbox_counterText', __('Image {x} of {y}', 'wp-slimbox2'));
add_option('wp_slimbox_closeKeys', __('27, 88, 67', 'wp-slimbox2'));
add_option('wp_slimbox_previousKeys', __('37, 80', 'wp-slimbox2'));
add_option('wp_slimbox_nextKeys', __('39, 78', 'wp-slimbox2'));
add_option('wp_slimbox_picasaweb', 'false');
add_option('wp_slimbox_flickr', 'false');
add_option('wp_slimbox_maintenance', 'false');
add_option('wp_slimbox_cache', time());
?>