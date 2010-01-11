//accomodate infinite scroll...clear and reset slimbox function
jQuery(function($) {
	$.post("wp-admin/admin-ajax.php",{ action: 'get_slimbox_options',_ajax_nonce: 'wp_slimbox2'},load_slimbox, "json");
	function load_slimbox(wp_slimbox_options) {
		$("#lbOverlay").css("background-color",String(wp_slimbox_options[0]['overlayColor']));
		
		var options = {
					loop: (wp_slimbox_options[0]['loop'] == 'on')?'true':'false',
					overlayOpacity: wp_slimbox_options[0]['overlayOpacity'],
					overlayFadeDuration: wp_slimbox_options[0]['overlayFadeDuration'],
					resizeDuration: wp_slimbox_options[0]['resizeDuration'],
					resizeEasing: wp_slimbox_options[0]['resizeEasing'],
					initialWidth: wp_slimbox_options[0]['initialWidth'],
					initialHeight: wp_slimbox_options[0]['initialHeight'],
					imageFadeDuration: wp_slimbox_options[0]['imageFadeDuration'],
					captionAnimationDuration: wp_slimbox_options[0]['captionAnimationDuration'],
					counterText: wp_slimbox_options[0]['counterText'],
					closeKeys: wp_slimbox_options[0]['closeKeys'],
					previousKeys: wp_slimbox_options[0]['previousKeys'],
					nextKeys: wp_slimbox_options[0]['nextKeys'],
				}
		$("#lbPrevLink").hover(
			function () {
				$(this).css("background-image","url("+wp_slimbox_options[1][0]+")");
			},
			function () {
				$(this).css("background-image","");
			}
		);
		$("#lbNextLink").hover(
			function () {
				$(this).css("background-image","url("+wp_slimbox_options[1][1]+")");
			},
			function () {
				$(this).css("background-image","");
			}
		);
		$("#lbCloseLink").css("background","transparent url("+wp_slimbox_options[1][2]+") no-repeat center");

		if(wp_slimbox_options[1][3]=="RTL") {
			$("#lbPrevLink").addClass("next");
			$("#lbNextLink").addClass("prev");
			$(".next").attr("id", "lbNextLink");
			$(".prev").attr("id", "lbPrevLink");
		}

		if(wp_slimbox_options[0]['autoload']=="on") {
			$("a[href]").filter(function() {
					return /\.(jpeg|bmp|jpg|png|gif)(\?[\d\w=&]*)?$/i.test(this.href);
				}).slimbox(options, null, function(el) {
					return (this == el) || ($(this).parents("div.post, div#page")[0] && ($(this).parents("div.post, div#page")[0] == $(el).parents("div.post, div#page")[0]));
				});
		} else {
			$("a[rel^='lightbox']").slimbox(options, null, function(el) {
				return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
			});
		}
		if(wp_slimbox_options[0]['picasaweb']=="on") {
			$("a[href^='http://picasaweb.google.'] > img:first-child[src]").parent().slimbox(options, function(el) {
				return [el.firstChild.src.replace(/\/s\d+(?:\-c)?\/([^\/]+)$/, "/s640/$2"),
					(el.title || el.firstChild.alt) + '<br /><a href="' + el.href + '">Picasa Web Albums page</a>'];
			});
		}
		if(wp_slimbox_options[0]['flickr']=="on") {
			$("a[href^='http://www.flickr.com/photos/'] > img:first-child[src]").parent().slimbox(options, function(el) {
				return [el.firstChild.src.replace(/_[mts]\.(\w+)$/, ".$1"),
					(el.title || el.firstChild.alt) + '<br /><a href="' + el.href + '">Flickr page</a>'];
			});
		}
	}
});