jQuery(function($) {
//json call to get php variables...
$.ajax({
  url: "/test_site/wp-content/plugins/wp-slimbox2/slimbox2_options.php",
  datatype: "json",
  success: function(html){
   alert(html);
  }
});
/*var options = {
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
);
$("#lbPrevLink").addClass("next");
$("#lbNextLink").addClass("prev");
$(".next").attr("id", "lbNextLink");
$(".prev").attr("id", "lbPrevLink");

$("#lbCloseLink").css("background","transparent url(\''.WP_PLUGIN_URL.'/wp-slimbox2/images/'.__('default/closelabel.gif', 'wp-slimbox2').'\') no-repeat center");

$("a[href]").filter(function() {
		return /\.(jpeg|bmp|jpg|png|gif)(\?[\d\w=&]*)?$/i.test(this.href);
	}).slimbox(options, null, function(el) {
		return (this == el) || ($(this).parents("div.post, div#page")[0] && ($(this).parents("div.post, div#page")[0] == $(el).parents("div.post, div#page")[0]));
	});
$("a[rel^=\'lightbox\']").slimbox(options, null, function(el) {
	return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
});

$("a[href^=\'http://picasaweb.google.\'] > img:first-child[src]").parent().slimbox(options, function(el) {
	return [el.firstChild.src.replace(/\/s\d+(?:\-c)?\/([^\/]+)$/, "/s640/$2"),
		(el.title || el.firstChild.alt) + \'<br /><a href="\' + el.href + \'">Picasa Web Albums page</a>\'];
});

$("a[href^=\'http://www.flickr.com/photos/\'] > img:first-child[src]").parent().slimbox(options, function(el) {
	return [el.firstChild.src.replace(/_[mts]\.(\w+)$/, ".$1"),
		(el.title || el.firstChild.alt) + \'<br /><a href="\' + el.href + \'">Flickr page</a>\'];
});*/
});