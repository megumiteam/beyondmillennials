/*! npm.im/object-fit-images 3.2.4 */
var objectFitImages=function(){"use strict";function t(t,e){return"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='"+t+"' height='"+e+"'%3E%3C/svg%3E"}function e(t){if(t.srcset&&!p&&window.picturefill){var e=window.picturefill._;t[e.ns]&&t[e.ns].evaled||e.fillImg(t,{reselect:!0}),t[e.ns].curSrc||(t[e.ns].supported=!1,e.fillImg(t,{reselect:!0})),t.currentSrc=t[e.ns].curSrc||t.src}}function i(t){for(var e,i=getComputedStyle(t).fontFamily,r={};null!==(e=u.exec(i));)r[e[1]]=e[2];return r}function r(e,i,r){var n=t(i||1,r||0);b.call(e,"src")!==n&&h.call(e,"src",n)}function n(t,e){t.naturalWidth?e(t):setTimeout(n,100,t,e)}function c(t){var c=i(t),o=t[l];if(c["object-fit"]=c["object-fit"]||"fill",!o.img){if("fill"===c["object-fit"])return;if(!o.skipTest&&f&&!c["object-position"])return}if(!o.img){o.img=new Image(t.width,t.height),o.img.srcset=b.call(t,"data-ofi-srcset")||t.srcset,o.img.src=b.call(t,"data-ofi-src")||t.src,h.call(t,"data-ofi-src",t.src),t.srcset&&h.call(t,"data-ofi-srcset",t.srcset),r(t,t.naturalWidth||t.width,t.naturalHeight||t.height),t.srcset&&(t.srcset="");try{s(t)}catch(t){window.console&&console.warn("https://bit.ly/ofi-old-browser")}}e(o.img),t.style.backgroundImage='url("'+(o.img.currentSrc||o.img.src).replace(/"/g,'\\"')+'")',t.style.backgroundPosition=c["object-position"]||"center",t.style.backgroundRepeat="no-repeat",t.style.backgroundOrigin="content-box",/scale-down/.test(c["object-fit"])?n(o.img,function(){o.img.naturalWidth>t.width||o.img.naturalHeight>t.height?t.style.backgroundSize="contain":t.style.backgroundSize="auto"}):t.style.backgroundSize=c["object-fit"].replace("none","auto").replace("fill","100% 100%"),n(o.img,function(e){r(t,e.naturalWidth,e.naturalHeight)})}function s(t){var e={get:function(e){return t[l].img[e?e:"src"]},set:function(e,i){return t[l].img[i?i:"src"]=e,h.call(t,"data-ofi-"+i,e),c(t),e}};Object.defineProperty(t,"src",e),Object.defineProperty(t,"currentSrc",{get:function(){return e.get("currentSrc")}}),Object.defineProperty(t,"srcset",{get:function(){return e.get("srcset")},set:function(t){return e.set(t,"srcset")}})}function o(){function t(t,e){return t[l]&&t[l].img&&("src"===e||"srcset"===e)?t[l].img:t}d||(HTMLImageElement.prototype.getAttribute=function(e){return b.call(t(this,e),e)},HTMLImageElement.prototype.setAttribute=function(e,i){return h.call(t(this,e),e,String(i))})}function a(t,e){var i=!y&&!t;if(e=e||{},t=t||"img",d&&!e.skipTest||!m)return!1;"img"===t?t=document.getElementsByTagName("img"):"string"==typeof t?t=document.querySelectorAll(t):"length"in t||(t=[t]);for(var r=0;r<t.length;r++)t[r][l]=t[r][l]||{skipTest:e.skipTest},c(t[r]);i&&(document.body.addEventListener("load",function(t){"IMG"===t.target.tagName&&a(t.target,{skipTest:e.skipTest})},!0),y=!0,t="img"),e.watchMQ&&window.addEventListener("resize",a.bind(null,t,{skipTest:e.skipTest}))}var l="fregante:object-fit-images",u=/(object-fit|object-position)\s*:\s*([-.\w\s%]+)/g,g="undefined"==typeof Image?{style:{"object-position":1}}:new Image,f="object-fit"in g.style,d="object-position"in g.style,m="background-size"in g.style,p="string"==typeof g.currentSrc,b=g.getAttribute,h=g.setAttribute,y=!1;return a.supportsObjectFit=f,a.supportsObjectPosition=d,o(),a}();
objectFitImages( '.ofi' );

var returnMax = Math.max;
var mousewheelevent = 'onwheel' in document ? 'wheel' : 'onmousewheel' in document ? 'mousewheel' : 'DOMMouseScroll';

document.body.addEventListener(mousewheelevent, function(e) {
	e.preventDefault();
}, { passive: false });

var target = document.body,
		targetH = target.getBoundingClientRect().height,
		scrollAmount = 0;

document.body.addEventListener(mousewheelevent, function(e) {
	targetH = target.getBoundingClientRect().height;
	scrollAmount += e.deltaY * -1;
	scrollAmount = returnMax(-1 * (targetH - window.innerHeight), scrollAmount);
	scrollAmount = Math.min(0, scrollAmount);
}, { passive: false });

var y = 0;
var scrollContent = () => {
	requestAnimationFrame(scrollContent);
	scrollAmount = returnMax(-1 * (targetH - window.innerHeight), scrollAmount);
	y += (scrollAmount - y) * 0.08, -0.1 < y && (y = 0);
	var transform = 'translateY(' + y + 'px) translateZ(0)',

	style = target.style;

	style.transform = transform;
	style.webkitTransform = transform;
	style.mozTransform = transform;
	style.msTransform = transform;
};
scrollContent();

jQuery(function($) {
	var scroll = $(window).scrollTop();

	var header = $( '.header' );
	var winW = $( window ).width();
	var fixed_flag = false;

	if ( header.length > 0 ) {
		var second = 500;

		$( window ).on('load scroll', function(){
			winW = $( window ).width();
			if ( winW > 782 ) {
				second = 1800;
			}

			scroll = $(window).scrollTop();

			if ( scroll < 20 ) {
				header.addClass( 'is-top' );
			} else {
				header.removeClass( 'is-top' );
			}

			if ( scroll > 200 ) {
				if ( fixed_flag === false ) {
					header.css({ 'top' : '-100px' });
					setTimeout(function(){
						header.addClass( 'is-fixed' );
						setTimeout(function(){
							header.removeAttr( 'style' );
						}, 400);
					}, 400);
					fixed_flag = true;
				}
			} else {
				header.removeClass( 'is-fixed' );
				fixed_flag = false;
			}

			var waiting = $( '.is-wait' );
			if ( waiting.length > 0 ) {
				setTimeout(function(){
					$( '.header-logo' ).removeClass( 'is-wait' );
					$( '.header-nav' ).removeClass( 'is-wait' );
				}, 500);
				setTimeout(function(){
					$( '.header-misc' ).removeClass( 'is-wait' );
				}, second);
			}

		});

		$( window ).on('load', function(){
			var current = $( '.header-nav .current-menu-item a' );
			var stalker = $( '.nav-stalker' );

			if ( current.length > 0 && !$( 'body' ).hasClass( 'home' ) ) {
				stalker.css({
					'width' : current.width(),
					'left' : current.position().left
				});
			}

			$( '.header-nav a' ).hover(
				function(){
					stalker.css({
						'width' : $(this).width(),
						'left' : $(this).position().left
					});
				},
				function(){
					if ( current.length > 0 && !$( 'body' ).hasClass( 'home' ) ) {
						stalker.css({
							'width' : current.width(),
							'left' : current.position().left
						});
					}
					else {
						stalker.css({
							'left' : '-100px'
						});
					}
				}
			);
		});

	}

	var tickets = $( '.get-tickets' );
	if ( tickets.length > 0 ) {
		$( window ).on('load', function(){
			tickets.addClass( 'is-inview' );
		});
	}

	var nav_toggle = $( '.header-nav-toggle' );
	if ( nav_toggle.length > 0 ) {

		var drawer = $( '.drawer' );
		var nav_close = $( '.drawer-close' );

		if ( nav_toggle.css( 'display' ) === 'block' ) {
			nav_toggle.stop().on('click', function(){
				var scrolled = $( window ).scrollTop();
				$( 'body' ).css({ 'top' : -scrolled }).addClass( 'is-nav-show' );

				drawer.addClass( 'is-show' );
			});

			nav_close.on('click', function(){
				drawer.stop().removeClass( 'is-show' );

				var reset_pos = parseInt( $( 'body' ).css( 'top' ), 10 );
				$( 'body, html' ).animate({ scrollTop : -1*reset_pos }, 1, 'linear' );
				$( 'body' ).removeClass( 'is-nav-show' ).removeAttr( 'style' );

			});

		} else {
			drawer.stop().removeClass( 'is-show' );
		}

	}


	var scroller = $( 'a[href^="#"]' );
	if ( scroller.length > 0 ) {
		var diff = 0;
		scroller.on('click', function(){
			if ( $(this).hasClass( 'inpage' ) ) {
				diff = 94;
				if ( $( window ).width() < 793 ) {
					diff = 59;
				}
			}
			var speed = 400;
			var href= $(this).attr( "href" );
			var target = $( href == "#" || href == "" ? 'html' : href );
			var position = target.offset().top - diff;
			$( 'body, html' ).animate({ scrollTop : position }, speed, 'swing' );
			return false;
		});
	}


	var top_hero = $( '.top-hero-image' );
	if ( top_hero.length > 0 ) {
		$( window ).on('load', function(){
			top_hero.removeClass( 'loading' );
		});
	}


	var toppage = $( '.blocks' );
	if ( toppage.length > 0 ) {
		var blocks  = toppage.find( '.block' );
		var pagetop = $( '.scrolltop' );

		var current_url = location.pathname;

		$( window ).on('load scroll', function(){
			blocks.each(function () {
				scroll = $(window).scrollTop();
				var position_top = $(this).offset().top - $( window ).height()/2;
				var position_bottom = position_top + $(this).height();

				if ( position_top < scroll && position_bottom > scroll ) {
					var id = $(this).attr( 'id' );
					if ( id == undefined ) {
						history.replaceState( null, null, current_url );
					} else {
						history.replaceState( null, null, '#' + id );
						if ( id === 'theme' ) {
							$(this).addClass( 'is-inview' );
						}
					}
				}

				if ( pagetop.length > 0 && scroll >= $( window ).height() ) {
					pagetop.addClass( 'is-show' );
				} else {
					pagetop.removeClass( 'is-show' );
				}

			});

		});

	}


	var shrink = $( '.is-shrink' );
	if ( shrink.length > 0 ) {
		$( window ).on('load scroll', function(){
			var shrink_top;
			scroll = $(window).scrollTop();
			shrink.each( function(){
				shrink_top = $(this).offset().top - $( window ).height()/2 - 200;
				if ( shrink_top < scroll ) {
					$(this).addClass( 'is-inview' );
				}
			});
		});
	}


	var popup = $( '.popup' );
	if ( popup.length > 0 ) {
		var popup_container = $( '.popup-inner' );

		popup.each(function(){
			$(this).on('click', function(){
				var scrolled = $( window ).scrollTop();
				$( 'body' ).css({ 'top' : -scrolled }).addClass( 'is-popup' );
				var popup_clone = $(this).find( '.popup-content' ).clone();
				popup_container.append( popup_clone );
				a2a.init_all();
			});

			var popup_share = $(this).find( '.footer-shares' );
			if ( popup_share.length > 0 ) {
				popup_share.find( 'a' ).on('click', function(){
					return false;
				});
			}

		});

		if ( $( '.popup-layer' ).length > 0 ) {
			$( '.container' ).on( 'click', function( event ) {
				if ( $('.popup-layer').css('opacity') > 0.8 ) {
					if ( $( event.target ).closest( '.popup-inner' ).length === 0 ) {
						popupClose();
					}
				}
			});

			$( window ).keydown( function( event ){
				if ( event.keyCode == 27 && $('.popup-layer').css('opacity') > 0 ) {
					popupClose();
				}
			});
		}

	}
	function popupClose() {
		var reset_pos = parseInt( $( 'body' ).css( 'top' ), 10 );
		$( 'body, html' ).animate({ scrollTop : -1*reset_pos }, 1, 'linear' );

		$( 'body' ).removeClass( 'is-popup' ).removeAttr( 'style' );
		$( '.popups' ).find( '.is-show' ).removeClass( 'is-show' );
		popup_container.empty();
	}


	var buble_button = $( '.js-bubble a' );
	if ( buble_button.length > 0 ) {
		buble_button.on( 'click', function(e){
			e.preventDefault();
			var url = $(this).attr( 'href' );
			$(this).addClass( 'animate' );
			setTimeout( function(){
				location.href = url;
			}, 800 );
		});
	}

	var curtain = $( '.curtain-action' );
	if ( curtain.length > 0 ) {
		$( window ).on('load scroll', function(){
			var scrolled =  $(window).scrollTop() + $( window ).height()/2;
			curtain.each(function(){
				if( scrolled >= $(this).offset().top ) {
					$(this).addClass( 'is-inview' );
				}
			});
		});
	}


	var en_toggle = $( '.lead-en-toggle' );
	if ( en_toggle.length > 0 ) {
		en_toggle.on('click', function(){
			$(this).toggleClass( 'is-show' );
			$(this).next().slideToggle();
		});
	}


	var session_card = $( '.session-items' );
	if ( session_card.length > 0 ) {

		$( window ).on('load resize', function(){
			session_card.each(function(){
				var top = 0;
				var time = '';

				$(this).find( '.card' ).each(function(){
					time = $(this).data( 'time' );

					top = $(this).parents( '.timeline-wrapper' ).find( '.time-' + time ).position().top;
					$(this).css({ 'top' : top });
				});


			});
		});
	}

	var speakers = $( '.speakers-content' );
	if ( speakers.length > 0 ) {
		var url_hash = location.hash;

		var speaker_diff = 94;
		if ( $( window ).width() < 793 ) {
			speaker_diff = 59;
		}

		if ( url_hash.length > 0 ) {
			$( window ).on('load', function(){
				var speaker_pos = $( url_hash ).offset().top - speaker_diff;
				$( 'body, html' ).animate({ scrollTop : speaker_pos }, 1, 'swing' ).promise().done(function(){
					$( url_hash ).trigger( 'click' );
					$( 'body' ).css({ 'top' : -speaker_pos });
				});
			});
		}
	}

	if ( navigator.userAgent.match( /MSIE 10/i ) || navigator.userAgent.match( /Trident\/7\./ ) || navigator.userAgent.match( /Edge\/12\./ ) ) {
		document.addEventListener( 'mousewheel', function(e) {
				e.preventDefault();
				var wd = e.wheelDelta;
				var csp = window.pageYOffset;
				window.scrollTo(0, csp - wd);
			},
			{
				passive: false
			}
		);
	}


	var slide = $( '.swiper-container');
	if ( slide.length > 0 ) {
		var mySwiper = new Swiper ( '.swiper-container', {
			loop: true,
			spaceBetween: 25,
			speed: 10000,
			autoplay: {
				delay: 0,
			},
			disableOnInteraction: false,
			allowTouchMove: false,
			breakpoints: {
				783: {
					spaceBetween: 76
				}
			}
		});
	}

});

