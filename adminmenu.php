<?php
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
add_option('wp_slimbox_counterText', 'Image {x} of {y}');
add_option('wp_slimbox_closeKeys', '27, 88, 67');
add_option('wp_slimbox_previousKeys', '37, 80');
add_option('wp_slimbox_nextKeys', '39, 78');
add_option('wp_slimbox_picasaweb', 'false');
add_option('wp_slimbox_flickr', 'false');
add_option('wp_slimbox_maintenance', 'false');
?>