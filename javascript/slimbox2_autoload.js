//pack for final release
jQuery(document).ready(function($) {
	if(slimbox2_options['mobile'] || !/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)){
		slimbox_CSS();
		load_slimbox();
	}
});
	function slimbox_CSS() {
	jQuery(function($) {
		$("#lbOverlay").css("background-color",slimbox2_options['overlayColor']);

		if(slimbox2_options['LTR']=="RTL") {
			$("#lbPrevLink").addClass("next");
			$("#lbNextLink").addClass("prev");
			$(".next").attr("id", "lbNextLink");
			$(".prev").attr("id", "lbPrevLink");
		}

		$("#lbPrevLink").hover(
			function () {
				$(this).css("background-image","url("+slimbox2_options["prev"]+")");
			},
			function () {
				$(this).css("background-image","");
			}
		);
		$("#lbNextLink").hover(
			function () {
				$(this).css("background-image","url("+slimbox2_options["next"]+")");
			},
			function () {
				$(this).css("background-image","");
			}
		);
		$("#lbCloseLink").css("background","transparent url("+slimbox2_options["close"]+") no-repeat center");
	})};

	function load_slimbox() {
	jQuery(function($) {
		var options = {
					loop: slimbox2_options['loop'],
					overlayOpacity: slimbox2_options['overlayOpacity'],
					overlayFadeDuration: parseInt(slimbox2_options['overlayFadeDuration']),
					resizeDuration: parseInt(slimbox2_options['resizeDuration']),
					resizeEasing: slimbox2_options['resizeEasing'],
					initialWidth: parseInt(slimbox2_options['initialWidth']),
					initialHeight: parseInt(slimbox2_options['initialHeight']),
					imageFadeDuration: parseInt(slimbox2_options['imageFadeDuration']),
					captionAnimationDuration: parseInt(slimbox2_options['captionAnimationDuration']),
					counterText: slimbox2_options['counterText'],
					closeKeys: slimbox2_options['closeKeys'].split(',').map(Number),
					previousKeys: slimbox2_options['previousKeys'].split(',').map(Number),
					nextKeys: slimbox2_options['nextKeys'].split(',').map(Number) 
				}

		if(slimbox2_options['autoload']) {
			$("a[href]").filter(function() {
					return /\.(jpeg|bmp|jpg|png|gif)(\?[\d\w=&]*)?$/i.test(this.href);
				}).unbind("click").slimbox(options, function(el) {
			var caption = (slimbox2_options['caption1']=='a-title')?el.title:(slimbox2_options['caption1']=='img-alt')?el.firstChild.alt:(slimbox2_options['caption1']=='img-title')?:'' ||
			(slimbox2_options['caption2']=='a-title')?el.title:(slimbox2_options['caption2']=='img-alt')?el.firstChild.alt:(slimbox2_options['caption2']=='img-title')?:'' ||
			(slimbox2_options['caption3']=='a-title')?el.title:(slimbox2_options['caption3']=='img-alt')?el.firstChild.alt:(slimbox2_options['caption3']=='img-title')?:'' ||
			(slimbox2_options['caption4']=='a-title')?el.title:(slimbox2_options['caption4']=='img-alt')?el.firstChild.alt:(slimbox2_options['caption4']=='img-title')?:'' || ''
						return [el.href, (slimbox2_options['url'])?'<a href="' + el.href + '">'+caption+'</a>':+caption];
					}, function(el) {
						return (this == el) || ($(this).parents("div.post, div#page")[0] && ($(this).parents("div.post, div#page")[0] == $(el).parents("div.post, div#page")[0]));
				});
		} else {
			$("a[rel^='lightbox']").unbind("click").slimbox(options, function(el) {
			var caption = (slimbox2_options['caption1']=='a-title')?el.title:(slimbox2_options['caption1']=='img-alt')?el.firstChild.alt:(slimbox2_options['caption1']=='img-title')?:'' ||
			(slimbox2_options['caption2']=='a-title')?el.title:(slimbox2_options['caption2']=='img-alt')?el.firstChild.alt:(slimbox2_options['caption2']=='img-title')?:'' ||
			(slimbox2_options['caption3']=='a-title')?el.title:(slimbox2_options['caption3']=='img-alt')?el.firstChild.alt:(slimbox2_options['caption3']=='img-title')?:'' ||
			(slimbox2_options['caption4']=='a-title')?el.title:(slimbox2_options['caption4']=='img-alt')?el.firstChild.alt:(slimbox2_options['caption4']=='img-title')?:'' || '')
						return [el.href, (slimbox2_options['url'])?'<a href="' + el.href + '">'+caption+'</a>'+caption];
					}, function(el) {
				return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
			});
		}
		if(slimbox2_options['picasaweb']) {
			$("a[href^='http://picasaweb.google.'] > img:first-child[src]").parent().unbind("click").slimbox(options, function(el) {
				return [el.firstChild.src.replace(/\/s\d+(?:\-c)?\/([^\/]+)$/, "/s640/$2"),
					(el.title || el.firstChild.alt) + '<br /><a href="' + el.href + '">Picasa Web Albums page</a>'];
			});
		}
		if(slimbox2_options['flickr']) {
			$("a[href^='http://www.flickr.com/photos/'] > img:first-child[src]").parent().unbind("click").slimbox(options, function(el) {
				return [el.firstChild.src.replace(/_[mts]\.(\w+)$/, ".$1"),
					(el.title || el.firstChild.alt) + '<br /><a href="' + el.href + '">Flickr page</a>'];
			});
		}
	})};
