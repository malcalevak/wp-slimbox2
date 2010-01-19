=== WP-Slimbox2 Plugin ===
Contributors: malcalevak
Donate link: http://transientmonkey.com/wp-slimbox2
Tags: slimbox, slimbox2, lightbox, jQuery, picture, photo, image, overlay, display, lightbox2
Requires at least: 2.6
Tested up to: 2.9.1
Stable Tag: 1.0

An WordPress implementation of the Slimbox2 javascript.

== Description ==

A WordPress implementation of the stellar Slimbox2 script by Christophe Beyls (an enhanced clone of the Lightbox script) which utilizes the jQuery library to create an impressive image overlay with slide-out effects.

Almost, if not all, options are configurable from the administration panel. For more on the settings and what they do check out the <a href="http://www.digitalia.be/software/slimbox2/" title="Slimbox 2, the ultimate lightweight Lightbox clone for jQuery">Slimbox2</a> page.

Support forums are generously hosted by Ryan Hellyer of PixoPoint, <a href="http://pixopoint.com/forum/index.php?board=6.0">here</a>.

Planned Features:<br />
1. Additional gallery integration without requiring 'rel="lightbox"'.<br />
2. Option to control which pages to load the script on.<br />
3. Expanded and easier to use settings management.<br />

Recent Changes in v1.0:<br />
1.  Addition of options to select caption source, render the caption as a hyperlink to the image, control autoload grouping element, and disable the effect on mobile phones.<br />
2.  Initialization is now encapsulated within a function (usable in Infinite Scroll plugin, etc)<br />
3.  All Javascript is now static, no more dynamic files.<br />
4.  All Javascript and CSS compressed using YUI Compressor.<br />

== Installation ==

After you've downloaded and extracted the files:

1. Upload the complete `WP-Slimbox2` folder to the `/wp-content/plugins/` directory<br />
2. Activate the plugin through the 'Plugins' menu in WordPress<br />
3. Visit the "WP-Slimbox2" page in your WordPress options menu to configure any advanced settings.<br />
5. Manually add the `rel="lightbox"` attribute to any link tag to activate the lightbox or `rel="lightbox-imagesetname"` for an image set, using the title attribute to store a caption. Alternatively you may use the autoload option to automatically prepare links to images and additionally enable picasaweb and flickr integration to easily utilize their albums.<br />

== Frequently Asked Questions ==

= Does Slimbox2 support the lightbox effect on pages and videos? =

No. As stated in the script creators FAQ, Slimbox was designed to display images only, to be simple and to have the smallest code. <br />

= What kind of grouping does autoload utilize? =
Autoload has been modified to group all images in a Wordpress post if the theme places posts inside a div with class="post". If the images are instead on a page they will all be grouped together. If you want individual group sets it is recommend you instead manually insert 'rel="lightbox-groupname"' inside your hyperlinks to specify your groups.

= Why do I need WordPress 2.6+? =

The Javascript requires jQuery 1.2.6+ which wasn't included in WordPress until 2.6. If you're using something to override the included jQuery with a newer version (a feature I may add at a later date) it should be compatible from 2.1+ since I believe that was when wp_enqueue_script() was implemented.<br />

= Why can't the plugin do X, Y or Z? =

Either the Javascript doesn't support it, or I haven't gotten around to adding it.<br />

= Why isn't the plugin in my language? Could I contribute a translation?=

I only know English, but as of v.0.9.4 the plugin supports localization using PO and MO files, just like WordPress.<br />
A copy of the POT file to use in your translations can be found in the languages directory as wp-slimbox2.pot.<br />
If you're willing to provide a translation I'd be more than happy to include it. The NEXT, PREV, and Close buttons can be translated as well.<br />
If you've translated the plugin or would like to find out more please let me know by posting on our <a href="http://pixopoint.com/forum/index.php?topic=1383.0">support forums</a>.<br />

= Why should I use this plugin? =

You want Lightbox or Slimbox effects using the jQuery library, and don't want any sort of "ad".<br />
You want complete control over all the javascript settings from the admin page.<br />

= What if I have other questions that haven't been answered? =
Please try our <a href="http://pixopoint.com/forum/index.php?board=6.0">support forums</a>, and read the Slimbox creators <a href="http://code.google.com/p/slimbox/wiki/FAQ">FAQ</a>.<br />

== Screenshots ==

1. Administration interface in WordPress 2.7
2. Overlay effect.

== History ==
Version 1.0 Beta - Jan-19-2010:<br />
	Addition of options to select caption source, render the caption as a hyperlink to the image, control autoload grouping element, and disable the effect on mobile phones.<br />
	Initialization is now encapsulated within a function (usable in Infinite Scroll plugin, etc)<br />
	All Javascript is now static, no more dynamic files.<br />
	All Javascript and CSS compressed using YUI Compressor.<br />
Version 0.9.7 Beta - Apr-21-2009:<br />
	Addition of farbtastic overlay color select.
	Automatic key code recognition.
	Addition of French/Fran&ccedil;ais and Dutch/Nederlandse languages.
	Options transferred to WPlize class, less database calls.
	Flickr and Picasaweb images now properly load Slimbox settings.
	Minor typographical corrections.
Version 0.9.6 Beta - Feb-19-2009:<br />
	Added rudimentary German/Deutsch translation - thanks Laws<br />
	Tiling Next/Prev Links in Safari Fix - thanks monodistortion<br />
	Switch from wp-blog-header to wp-load, may resolve issue on certain servers that fail to properly serve dynamic JS and CSS<br />
Version 0.9.5 Beta - Feb-01-2009:<br />
	Added minor IE6 fix to prevent tiling of next and previous images in a unique scenario.<br />
	Espa&#241;ol/Spanish language typo correction.<br />
	Updated to Slimbox 2.02 (and adjusted version # accordingly, see Slimbox website for more details)<br />
	Support for RTL languages added (proper image progression and button display)<br />
	Caching/compression reenabled on javascript - cache for one year, or until version change which occurs on option update.<br />
	Support options on autoloaded image files (ie .jpg?w=400 now is properly detected)<br />
Version 0.9.4.1 Beta: Removed caching of autload script, for real this time. - v0.9.4.1 - Jan-24-2009<br />
Version 0.9.4 Beta: Localization support implemented. Currently only Espa&#241;ol/Spanish provided. See FAQ to contribute other languages. Removed caching of autload script, at least for now. - v0.9.4 - Jan-24-2009<br />
Version 0.9.3 Beta: Flickr and Picasaweb Integration, Slimbox 2.01, maintenance mode, autogrouping by post/page, compression and caching - Jan-14-2009<br />
Version 0.9.2.3 Beta: Bug fix. Autoload wasn't loading options. - v0.9.2.3 - Jan-08-2009<br />
Version 0.9.2.2 Beta: Emergency Admin for minor overlay opacity setting error - Jan-07-2009<br />
Version 0.9.2.1 Beta: Emergency JS Fix - Jan-07-2009<br />
Version 0.9.2 Beta: Addition of option to change the overlay color - Jan-07-2009<br />
Version 0.9.1 Beta: Addition of option to enable automatically applying to all image links (png,jpg,gif) - Jan-06-2009<br />
Version 0.9 Beta: Intial release - Jan-05-2008<br />

= Credits =

Thanks to the following for help with the development of this plugin:<br />

* <a href="http://www.digitalia.be/software/slimbox2">Christophe Beyls</a> - Creator of the Slimbox2 Javascript<br />
* <a href="http://gsgd.co.uk/sandbox/jquery/easing/">George McGinley Smith</a> - Creator of the jQuery Easing Plugin Javascript<br />
* <a href="http://acko.net/dev/farbtastic/">Steven Wittens</a> - Creator of the jQuery Farbtastic colorpicker Javascript<br />
* <a href="http://pixopoint.com">Ryan Hellyer</a> - For spurring my interest in WordPress plugins by welcoming my assistance on his <a href="http://pixopoint.com/multi-level-navigation/">Multi-level Navigation plugin</a> and for hosting our <a href="http://pixopoint.com/forum/index.php?board=6.0">support forums</a>.<br />
* Spi for code suggestion to autogroup items by post.<br />
* <a href="http://nv1962.net/">nv1962</a> - Suggestion to implement localization and Spanish/Espa&#241;ol and Dutch/Nederlandse translations.<br />
* Laws for German/Deutsch localization.<br />
* monodistortion  for CSS tweaks to prevent tiling of images.<br />
* Jandry for the French/Fran&ccedil;ais translation.
* Anyone else I forgot to mention who's made a suggestion or provided me with ideas.<br />
