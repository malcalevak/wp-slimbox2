<?php
$page = add_options_page('WP-Slimbox2 Options', 'WP-Slimbox2', 8, 'slimbox2options', 'slimbox_options');
add_action( "admin_print_scripts-$page", 'slimbox_adminhead' );
add_action( "admin_print_styles-$page", 'slimbox_admin_styles' );

global $options;

if(get_option('wp_slimbox_autoload')) {//if we're using a really old version of the plugin, transfer the settings, then delete them
	$options->init_option(array(
		'autoload'   => get_option('wp_slimbox_autoload'),
		'loop' => get_option('wp_slimbox_loop'),
		'overlayOpacity'   => get_option('wp_slimbox_overlayOpacity'),
		'overlayColor' => get_option('wp_slimbox_overlayColor'),
		'overlayFadeDuration'   => get_option('wp_slimbox_overlayFadeDuration'),
		'resizeDuration' => get_option('wp_slimbox_resizeDuration'),
		'resizeEasing'   => get_option('wp_slimbox_resizeEasing'),
		'initialWidth' => get_option('wp_slimbox_initialWidth'),
		'initialHeight'   => get_option('wp_slimbox_initialHeight'),
		'imageFadeDuration' => get_option('wp_slimbox_imageFadeDuration'),
		'captionAnimationDuration'   => get_option('wp_slimbox_captionAnimationDuration'),
		'caption1' => 'a-title',
		'caption2' => 'img-alt',
		'caption3' => 'img-title',
		'caption4' => 'None',
		'url' => 'on',
		'counterText' => get_option('wp_slimbox_counterText'),
		'closeKeys'   => get_option('wp_slimbox_closeKeys'),
		'previousKeys' => get_option('wp_slimbox_previousKeys'),
		'nextKeys'   =>  get_option('wp_slimbox_nextKeys'),
		'picasaweb' => get_option('wp_slimbox_picasaweb'),
		'flickr'   => get_option('wp_slimbox_flickr'),
		'mobile' => 'off',
		'maintenance' => get_option('wp_slimbox_maintenance'),
		'cache'   => get_option('wp_slimbox_cache')
	));
	delete_option('wp_slimbox_autoload');
	delete_option('wp_slimbox_loop');
	delete_option('wp_slimbox_overlayOpacity');
	delete_option('wp_slimbox_overlayColor');
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
	delete_option('wp_slimbox_picasaweb');
	delete_option('wp_slimbox_flickr');
	delete_option('wp_slimbox_maintenance');
	delete_option('wp_slimbox_cache');
} else if (!$options->get_option('autoload')){
	$options->init_option(array(
		'autoload'   => 'off',
		'loop' => 'off',
		'overlayOpacity'   => '0.8',
		'overlayColor' => '#000000',
		'overlayFadeDuration'   => '400',
		'resizeDuration' => '400',
		'resizeEasing'   => 'swing',
		'initialWidth' => '250',
		'initialHeight'   => '250',
		'imageFadeDuration' => '400',
		'captionAnimationDuration'   => '400',
		'caption1' => 'a-title',
		'caption2' => 'img-alt',
		'caption3' => 'img-title',
		'caption4' => 'None',
		'url' => 'on',
		'counterText' => __('Image {x} of {y}', 'wp-slimbox2'),
		'closeKeys'   => __('27,88,67', 'wp-slimbox2'),
		'previousKeys' => __('37,80', 'wp-slimbox2'),
		'nextKeys'   =>  __('39,78', 'wp-slimbox2'),
		'picasaweb' => 'off',
		'flickr'   => 'off',
		'maintenance' => 'off',
		'mobile' => 'off',
		'cache'   => time()
	));
}
if (!$options->get_option('caption1')){
	$options->init_option(array(
		'caption1' => 'a-title',
		'caption2' => 'img-alt',
		'caption3' => 'img-title',
		'caption4' => 'None',
		'url' => 'on',
		'mobile' => 'off'
	));
}
?>