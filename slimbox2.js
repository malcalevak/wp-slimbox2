/*
	Slimbox v2.0 - The ultimate lightweight Lightbox clone for jQuery
	(c) 2007-2008 Christophe Beyls <http://www.digitalia.be>
	MIT-style license.
*/
(function(v){var D=v(window),t,g,E=-1,w,C,u,x,K,r,n=!window.XMLHttpRequest,e=window.opera&&v.boxModel&&(v.browser.version>=9.3),m=document.documentElement,l={},s=new Image(),I=new Image(),G,a,h,p,H,d,F,c,z,J;v(function(){v("body").append(v([G=v('<div id="lbOverlay" />')[0],a=v('<div id="lbCenter" />')[0],F=v('<div id="lbBottomContainer" />')[0]]).css("display","none"));h=v('<div id="lbImage" />').appendTo(a).append(p=v('<div style="position: relative;" />').append([H=v('<a id="lbPrevLink" href="#" />').click(A)[0],d=v('<a id="lbNextLink" href="#" />').click(f)[0]])[0])[0];c=v('<div id="lbBottom" />').appendTo(F).append([v('<a id="lbCloseLink" href="#" />').add(G).click(B)[0],z=v('<div id="lbCaption" />')[0],J=v('<div id="lbNumber" />')[0],v('<div style="clear: both;" />')[0]])[0]});v.slimbox=function(N,M,L){t=v.extend({loop:false,overlayOpacity:0.8,overlayFadeDuration:400,resizeDuration:400,resizeEasing:"swing",initialWidth:250,initialHeight:250,imageFadeDuration:400,captionAnimationDuration:400,counterText:"Image {x} of {y}",closeKeys:[27,88,67],previousKeys:[37,80],nextKeys:[39,78]},L);if(typeof N=="string"){N=[[N,M]];M=0}x=D.scrollTop()+((e?m.clientHeight:D.height())/2);K=t.initialWidth;r=t.initialHeight;v(a).css({top:Math.max(0,x-(r/2)),width:K,height:r,marginLeft:-K/2}).show();u=n||(G.currentStyle&&(G.currentStyle.position!="fixed"));if(u){G.style.position="absolute"}v(G).css("opacity",t.overlayOpacity).fadeIn(t.overlayFadeDuration);y();k(1);g=N;t.loop=t.loop&&(g.length>1);return b(M)};v.fn.slimbox=function(L,O,N){O=O||function(P){return[P.href,P.title]};N=N||function(){return true};var M=this;return M.unbind("click").click(function(){var R=this,T=0,S,P=0,Q;S=v.grep(M,function(V,U){return N.call(R,V,U)});for(Q=S.length;P<Q;++P){if(S[P]==R){T=P}S[P]=O(S[P],P)}return v.slimbox(S,T,L)})};function y(){var M=D.scrollLeft(),L=e?m.clientWidth:D.width();v([a,F]).css("left",M+(L/2));if(u){v(G).css({left:M,top:D.scrollTop(),width:L,height:D.height()})}}function k(L){v("object").add(n?"select":"embed").each(function(N,O){if(L){v.data(O,"slimbox",O.style.visibility)}O.style.visibility=L?"hidden":v.data(O,"slimbox")});var M=L?"bind":"unbind";D[M]("scroll resize",y);v(document)[M]("keydown",o)}function o(N){var M=N.keyCode,L=v.inArray;return(L(M,t.closeKeys)>=0)?B():(L(M,t.nextKeys)>=0)?f():(L(M,t.previousKeys)>=0)?A():false}function A(){return b(w)}function f(){return b(C)}function b(L){if(L>=0){E=L;w=(E||(t.loop?g.length:0))-1;C=((E+1)%g.length)||(t.loop?0:-1);q();a.className="lbLoading";l=new Image();l.onload=j;l.src=g[E][0]}return false}function j(){a.className="";v(h).css({backgroundImage:"url("+l.src+")",visibility:"hidden",display:""});v(p).width(l.width);v([p,H,d]).height(l.height);v(z).html(g[E][1]||"");v(J).html((((g.length>1)&&t.counterText)||"").replace(/{x}/,E+1).replace(/{y}/,g.length));if(w>=0){s.src=g[w][0]}if(C>=0){I.src=g[C][0]}K=h.offsetWidth;r=h.offsetHeight;var L=Math.max(0,x-(r/2));if(a.offsetHeight!=r){v(a).animate({height:r,top:L},t.resizeDuration,t.resizeEasing)}if(a.offsetWidth!=K){v(a).animate({width:K,marginLeft:-K/2},t.resizeDuration,t.resizeEasing)}v(a).queue(function(){v(F).css({width:K,top:L+r,marginLeft:-K/2,visibility:"hidden",display:""});v(h).css({display:"none",visibility:"",opacity:""}).fadeIn(t.imageFadeDuration,i)})}function i(){if(w>=0){v(H).show()}if(C>=0){v(d).show()}v(c).css("marginTop",-c.offsetHeight).animate({marginTop:0},t.captionAnimationDuration);F.style.visibility=""}function q(){l.onload=null;l.src=s.src=I.src="";v([a,h,c]).stop(true);v([H,d,h,F]).hide()}function B(){if(E>=0){q();E=w=C=-1;v(a).hide();v(G).stop().fadeOut(t.overlayFadeDuration,k)}return false}})(jQuery);