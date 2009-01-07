=== WP-Slimbox2 Plugin ===
Contributors: malcalevak
Donate link: http://transientmonkey.com/wp-slimbox2
Tags: slimbox, slimbox2, lightbox, jQuery, picture, photo, image, overlay, display, lightbox2
Requires at least: 2.5
Tested up to: 2.7
Stable Tag: 0.9.2.1

An WordPress implementation of the Slimbox2 javascript.

== Description ==

A WordPress implementation of the stellar Slimbox2 script by Christophe Beyls (an enhanced clone of the Lightbox script) which utilizes the jQuery library to create an impressive image overlay with slide-out effects.

Almost, if not all, options are configurable from the administration panel. For more on the settings and what they do check out the <a href="http://www.digitalia.be/software/slimbox2/" title="Slimbox 2, the ultimate lightweight Lightbox clone for jQuery">Slimbox2</a> page.

Planned Features:<br />
1. Option to control which pages to load the script on.<br />
2. Option for Flickr and picasaweb integration.<br />
3. Easier to use settings management.<br />

Recently Added Features:<br />
1. Option to automatically apply to all images on a page. - v0.9.1<br />
2. Option to change the overlay color. - v0.9.2<br />
3. Emergency bug fix - v0.9.2.1

== Installation ==

After you've downloaded and extracted the files:

1. Upload the complete `WP-Slimbox2` folder to the `/wp-content/plugins/` directory<br />
2. Activate the plugin through the 'Plugins' menu in WordPress<br />
3. Visit the "WP-Slimbox2" page in your WordPress options menu to configure any advanced settings.<br />
5. Manually (or in the future choose to automatically) add the `rel="lightbox"` attribute to any link tag to activate the lightbox or `rel="lightbox-imagesetname"` for an image set, using the title attribute to store a caption.<br />

== Frequently Asked Questions ==

= Why do I need WordPress 2.5+? =

The Javascript requires jQuery 1.2+ which wasn't included in WordPress until 2.5. If you're using something to override the included jQuery with a newer version (a feature I may add at a later date) it should be compatible from 2.1+ since I believe that was when wp_enqueue_script() was implemented.<br />

= Why can't the plugin do X, Y or Z? =

Either the Javascript doesn't support it, or I haven't gotten around to adding it.<br />

= Why should I use this plugin? =

You want Lightbox or Slimbox effects using the jQuery library, and don't want any sort of "ad".<br />
You want complete control over all the javascript settings from the admin page.<br />

== Screenshots ==

1. Administration interface in WordPress 2.7
2. Overlay effect.

== History ==

Version 0.9 Beta: Intial release - Jan-05-2008<br />
Version 0.9.1 Beta: Addition of option to enable automatically applying to all image links (png,jpg,gif) - Jan-06-2008<br />
Version 0.9.2 Beta: Addition of option to change the overlay color - Jan-07-2008<br />


= Credits =

Thanks to the following for help with the development of this plugin:<br />

* <a href="http://www.digitalia.be/software/slimbox2">Christophe Beyls</a> - Creator of the Slimbox2 Javascript<br />
* <a href="http://gsgd.co.uk/sandbox/jquery/easing/">George McGinley Smith</a> - Creator of the jQuery Easing Plugin Javascript<br />
* <a href="http://pixopoint.com">Ryan Hellyer</a> - For spurring my interest in WordPress plugins by welcoming my assistance on his <a href="http://pixopoint.com/multi-level-navigation/">Multi-level Navigation plugin</a><br />
