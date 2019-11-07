jQuery(function($) {
	var windowWidth;
	$( window ).on('load resize', function() {
		windowWidth = window.innerWidth;
	});

	var scroll = $(window).scrollTop();

	var header = $( '.header' );

	if ( header.length > 0 ) {
		var startPos = 0;

		$( window ).on('load scroll', function(){
			if ( windowWidth > 782 ) {
				scroll = window.scrollY;
				if ( scroll > startPos ) {
					$( '.header' ).removeClass( 'is-show' );
				} else {
					$( '.header' ).addClass( 'is-show' );
				}
				startPos = scroll;
			}

			if ( scroll < 50 ) {
				header.addClass( 'is-top' );
			} else {
				header.removeClass( 'is-top' );
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

	var tickets = $( '.js-fadein' );
	if ( tickets.length > 0 ) {
		$( window ).on('load scroll', function(){
			var win_scroll = tickets.offset().top;
			if ( windowWidth > 782 ) {
				// PCの処理
				tickets.addClass( 'is-inview' );
			} else {
				// SPの処理
				if ( scroll >= $( window ).height() ) {
					tickets.addClass( 'is-inview' );
					if ( win_scroll >= $( '.footer-hashtag' ).offset().top ) {
						tickets.removeClass( 'is-inview' );
					}
				} else {
					tickets.removeClass( 'is-inview' );
				}
			}
		});
	}

	var nav_toggle = $( '.header-nav-toggle' );
	if ( nav_toggle.length > 0 ) {

		if ( nav_toggle.css( 'display' ) === 'block' ) {
			var reset_pos = 0;
			nav_toggle.stop().on('click', function(){
				nav_toggle.toggleClass( 'is-show' );

				if ( nav_toggle.hasClass( 'is-show' ) ) {
					var scrolled = $( window ).scrollTop();
					$( 'body' ).css({ 'top' : -scrolled }).addClass( 'is-nav-show' );

					openMenu();
				} else {
					reset_pos = parseInt( $( 'body' ).css( 'top' ), 10 );
					$( 'body, html' ).animate({ scrollTop : -1*reset_pos }, 1, 'linear' );
					$( 'body' ).removeClass( 'is-nav-show' ).removeAttr( 'style' );

					closeMenu();
				}
			});
		}

		$( '.header-nav a' ).on('click', function(){
			reset_pos = $( 'body' ).css( 'top' );
			$( 'body' ).removeClass( 'is-nav-show' ).removeAttr( 'style' );
			nav_toggle.removeClass( 'is-show' );

			closeMenu();

			return true;
		});
	}

	function openMenu() {
		$( '.circle' ).addClass( 'expand' );

		$( '.header-nav-toggle' ).addClass( 'open' );
		$( '.nav-01, .nav-02, .nav-03' ).addClass( 'collapse' );
		$( '.menu li' ).addClass( 'animate' );

		setTimeout(function(){
			$( '.nav-02' ).hide();
			$( '.nav-01' ).addClass( 'rotate30' );
			$( '.nav-03' ).addClass( 'rotate150' );
		}, 70);
		setTimeout(function(){
			$( '.nav-01' ).addClass( 'rotate45' );
			$( '.nav-03' ).addClass( 'rotate135' );
		}, 120);
	}

	function closeMenu() {
		$( '.header-nav-toggle' ).removeClass( 'open' );
		$( '.nav-01' ).removeClass( 'rotate45' ).addClass( 'rotate30' );
		$( '.nav-03' ).removeClass( 'rotate135' ).addClass( 'rotate150' );
		$( '.circle' ).removeClass( 'expand' );
		$( '.menu li' ).removeClass( 'animate' );

		setTimeout(function(){
			$( '.nav-01' ).removeClass( 'rotate30' );
			$( '.nav-03' ).removeClass( 'rotate150' );
		}, 50);
		setTimeout(function(){
			$( '.nav-02' ).show();
			$( '.nav-01, .nav-02, .nav-03' ).removeClass( 'collapse' );
		}, 70);
	}

	var scroller = $( 'a[href^="#"]' );
	if ( scroller.length > 0 ) {
		var diff = 0;
		scroller.on('click', function(){
			if ( $( window ).width() < 793 ) {
				diff = 60;
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

	// topでスピーカーを開く 12月ローンチではコメントアウト
	// var top_speakers = $( '.top-speakers' );
	// var url_hash = location.hash;
	// if ( top_speakers.length > 0 ) {
	// 	var top_speaker_diff = 94;
	// 	if ( $( window ).width() < 793 ) {
	// 		top_speaker_diff = 59;
	// 	}
	//
	// 	if ( url_hash.length > 0 ) {
	// 		$( window ).on('load', function(){
	// 			var top_speaker_pos = $( url_hash ).offset().top - top_speaker_diff;
	// 			$( 'body, html' ).animate({ scrollTop : top_speaker_diff }, 1, 'swing' ).promise().done(function(){
	// 				$( url_hash ).trigger( 'click' );
	// 				$( 'body' ).css({ 'top' : -top_speaker_pos });
	// 			});
	// 		});
	// 	}
	// }
	// topでスピーカーを開く 12月ローンチではコメントアウト ここまで

	var speakers = $( '.speakers-content' );
	var url_hash = location.hash;
	if ( speakers.length > 0 ) {
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
