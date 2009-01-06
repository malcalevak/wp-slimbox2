<?php
if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) {exit();}
delete_option('wp_slimbox_autoload');
delete_option('wp_slimbox_loop');
delete_option('wp_slimbox_overlayOpacity');
delete_option('wp_slimbox_overlayFadeDuration');
delete_option('wp_slimbox_resizeDuration');
delete_option('wp_slimbox_resizeEasing');
delete_option('wp_slimbox_initialWidth');
delete_option('wp_slimbox_initialHeight');
delete_option('wp_slimbox_imageFadeDuration');
delete_option('wp_slimbox_captionAnimationDuration');
delete_option('wp_slimbox_counterText');
delete_option('wp_slimbox_closeKeys');
delete_option('wp_slimbox_previousKeys');
delete_option('wp_slimbox_nextKeys');
?>
