<?php
function wp_slimbox_initialize_variables() {
	if(get_option('wp_slimbox_autoload')!=false) {//if it's an old version of the plugin, transfer the variables and delete the old
		$options = array(
			'autoload'   => get_option('wp_slimbox_autoload','on'),
			'overlayOpacity'   => get_option('wp_slimbox_overlayOpacity','0.8'),
			'overlayColor' => get_option('wp_slimbox_overlayColor','#000000'),
			'overlayFadeDuration'   => get_option('wp_slimbox_overlayFadeDuration','400'),
			'resizeDuration' => get_option('wp_slimbox_resizeDuration','400'),
			'resizeEasing'   => get_option('wp_slimbox_resizeEasing','swing'),
			'initialWidth' => get_option('wp_slimbox_initialWidth','250'),
			'initialHeight'   => get_option('wp_slimbox_initialHeight','250'),
			'imageFadeDuration' => get_option('wp_slimbox_imageFadeDuration','400'),
			'captionAnimationDuration'   => get_option('wp_slimbox_captionAnimationDuration','400'),
			'caption' => array('a-title','img-alt','img-title','href'),
			'url' => 'on',
			'selector' => 'div.entry-content, div.gallery, div.entry, div.post, div#page, body',
			'counterText' => get_option('wp_slimbox_counterText',__('Image {x} of {y}', 'wp-slimbox2')),
			'closeKeys'   => get_option('wp_slimbox_closeKeys',__('27,88,67', 'wp-slimbox2')),
			'previousKeys' => get_option('wp_slimbox_previousKeys',__('37,80', 'wp-slimbox2')),
			'nextKeys'   =>  get_option('wp_slimbox_nextKeys',__('39,78', 'wp-slimbox2'))
		);
		if(get_option('wp_slimbox_loop')=='on') $options['wp_slimbox_loop'] == 'on';
		if(get_option('wp_slimbox_picasaweb')=='on') $options['wp_slimbox_picasaweb'] == 'on';
		if(get_option('wp_slimbox_flickr')=='on') $options['wp_slimbox_flickr'] == 'on';
		if(get_option('wp_slimbox_maintenance')=='on') $options['wp_slimbox_maintenance'] == 'on';
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
	} else {
		$options = array(
			'autoload'   => 'on',
			'overlayOpacity'   => '0.8',
			'overlayColor' => '#000000',
			'overlayFadeDuration'   => '400',
			'resizeDuration' => '400',
			'resizeEasing'   => 'swing',
			'initialWidth' => '250',
			'initialHeight'   => '250',
			'imageFadeDuration' => '400',
			'captionAnimationDuration'   => '400',
			'caption' => array('a-title','img-alt','img-title','href'),
			'url' => 'on',
			'selector' => 'div.entry-content, div.gallery, div.entry, div.post, div#page, body',
			'counterText' => __('Image {x} of {y}', 'wp-slimbox2'),
			'closeKeys'   => __('27,88,67', 'wp-slimbox2'),
			'previousKeys' => __('37,80', 'wp-slimbox2'),
			'nextKeys'   =>  __('39,78', 'wp-slimbox2')
		);
	}
	return $options;
}
?>