jQuery(document).ready(function($) {
	"use strict";
	$('.cms-product-action a.add_to_cart_button').text('Mua Ngay');
	$('a.wc-forward').text('Giỏ Hàng');
	$('.cms-new-link').text('xem Thêm');
	/* window */
	var window_width, window_height, scroll_top;
	
	/* admin bar */
	var adminbar = $('#wpadminbar');
	var adminbar_height = 0;
	
	/* header menu */
	var header = $('#cshero-header');
	var header_top = 0;
	
	/* scroll status */
	var scroll_status = '';
	//cms_page_loaded();
	$('.cms-blog-item').fitVids();
	//Cms Related Product Carousel
	cms_product_related_carousel();
	cms_set_height_portfolio_shuffle();

	$(window).removeClass('vc_row-full-height-fixer');
	/**
	 * check iframe ready to relayout masonry, which is get problem with iframe.
	 * @author LuanNguyen
	 * @since 1.0.0
	 * */
	$('iframe').load(function() {
		var checkFrame = setInterval(function(){
			if($('.cms-grid-masonry').length && $('.shuffle').length){
				$('.cms-grid-masonry').shuffle('layout');
				clearInterval(checkFrame);
			}
		}, 1000);
	});

	/**
	 * window load event.
	 * 
	 * Bind an event handler to the "load" JavaScript event.
	 * @author Fox
	 */
	$(window).load(function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/** current window width */
		window_width = $(window).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/* get admin bar height */
		adminbar_height = adminbar.length > 0 ? adminbar.outerHeight(true) : 0 ;
		
		/* get top header menu */
		header_top = adminbar_height;
		
		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		cms_mobile_menu();
		
		/* check back to top */
		if(CMSOptions.back_to_top == '1'){
			/* add html. */
			$('body .back_to_top').append('<span class="go_up"><i style="" class="icon icon-arrows-up"></i></span>');
			cms_back_to_top();
		}
		
		/* page loading. */
		cms_page_loading();
		
		/* check video size */
		cms_auto_video_width();

		/* Icon search position */
		cms_icon_search_position();

		cms_mobile_menu_trigger();

		if ( $('.wow').length ) {
		    initWow(); 
		};

		/* Bs init */
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});

		//POPOVER INITIALIZE	
		$(function () {
			$('[data-toggle="popover"]').popover()
		});
		cms_lightbox_popup();
		/* owl images carousel */
		cms_image_carousel();
		cms_progressbar_animation();

		cms_set_height_viewall();

		cms_arrow_down();
		initImgHeight();

		/* Offset shortcode nav */
		var offsetFooter = $('#main-footer').height() + $('.cms-bottom-wrapper').outerHeight() + 30;
			// DM Menu
		jQuery('.menu-w_shortcodes-container').parent().affix({
			offset: { top: 300, //top offset for header 1 for others headers it will have other value
				bottom: offsetFooter		
			}
		});
		jQuery('.menu-w_typography-container').parent().affix({
			offset: { top: 300, //top offset for header 1 for others headers it will have other value
				bottom: offsetFooter		
			}
		});
		$('.equal-height').equalHeights();
	});


	/**
	 * reload event.
	 * 
	 * Bind an event handler to the "navigate".
	 */
	window.onbeforeunload = function(){ cms_page_loading(1); }
	
	/**
	 * resize event.
	 * 
	 * Bind an event handler to the "resize" JavaScript event, or trigger that event on an element.
	 * @author Fox
	 */
	$(window).resize(function(event, ui) {

		/**
		 * check iframe ready to relayout masonry, which is get problem with iframe.
		 * @author LuanNguyen
		 * @since 1.0.0
		 * */
		$('iframe').load(function(){
			if($('.cms-grid-masonry').length && $('.shuffle').length){
				$('.cms-grid-masonry').shuffle('layout');
			}
		})

		/** current window width */
		window_width = $(event.target).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		//cms_mobile_menu();
		
		/* check video size */
		cms_auto_video_width();

		/* Icon search position */
		cms_icon_search_position();

		//cms_mobile_menu_trigger();

		cms_set_height_viewall();

		cms_arrow_down();
		initImgHeight();
		cms_set_height_portfolio_shuffle();
  		$('.equal-height').css('height','auto').equalHeights();

  		$(window).removeClass('vc_row-full-height-fixer');
	});
	
	/**
	 * scroll event.
	 * 
	 * Bind an event handler to the "scroll" JavaScript event, or trigger that event on an element.
	 * @author Fox
	 */
	var lastScrollTop = 0;
	
	$(window).scroll(function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();
		/** check scroll up or down. */
		if(scroll_top < lastScrollTop) {
			/* scroll up. */
			scroll_status = 'up';
		} else {
			/* scroll down. */
			scroll_status = 'down';
		}
		
		lastScrollTop = scroll_top;
		
		/* check sticky menu. */
		if(CMSOptions.menu_sticky == '1'){
			cms_stiky_menu();
		}
		/* check back to top */
		cms_back_to_top();
		/* Icon search position */

		cms_icon_search_position();
		$(window).removeClass('vc_row-full-height-fixer');
	});

	/**
	 * Stiky menu
	 * 
	 * Show or hide sticky menu.
	 * @author Fox
	 * @since 1.0.0
	 */
	function cms_stiky_menu() {
		if (header_top < scroll_top) {
			switch (true) {
				case (window_width > 992):
					header.addClass('header-fixed');
					break;
				case ((window_width <= 992 && window_width >= 768) && (CMSOptions.menu_sticky_tablets == '1')):
					header.addClass('header-fixed');
					break;
				case ((window_width <= 768) && (CMSOptions.menu_sticky_mobile == '1')):
					header.addClass('header-fixed');
					break;
			}
		} else {
			header.removeClass('header-fixed');
			$('body').removeClass('fixed-margin-top');
		}
	}
	
	/**
	 * Mobile menu
	 * 
	 * Show or hide mobile menu.
	 * @author Fox
	 * @since 1.0.0
	 */
	$('body').on('click', '#cshero-menu-mobile', function(){
		var navigation = $(this).parent().find('#cshero-header-navigation');
		if(!navigation.hasClass('collapse')){
			navigation.addClass('collapse in');
		} else {
			navigation.removeClass('collapse in');
		}
	});
	/* check mobile screen. */
	function cms_mobile_menu() {
		var menu = $('#cshero-header-navigation');
		
		/* active mobile menu. */
		switch (true) {
		case (window_width <= 992 && window_width >= 768):
			menu.removeClass('phones-nav').addClass('tablets-nav');
			/* */
			cms_mobile_menu_group(menu);
			break;
		case (window_width <= 768):
			menu.removeClass('tablets-nav').addClass('phones-nav');
			break;
		default:
			menu.removeClass('mobile-nav tablets-nav');
			menu.find('li').removeClass('mobile-group');
			break;
		}	
	}
	/* group sub menu. */
	function cms_mobile_menu_group(nav) {
		nav.each(function(){
			$(this).find('li').each(function(){
				if($(this).find('ul:first').length > 0){
					$(this).addClass('mobile-group');
				}
			});
		});
	}

	/* Trigger click on phone */
	function cms_mobile_menu_trigger() {
		//var primary = '#site-navigation';
	  
		$('.tablets-nav, .phones-nav').on('click','.menu-main-menu li .cs-menu-toggle', function(event) {
			event.preventDefault();
			var item = $(this).parent();

			if ($(item).hasClass('active')) {
				$(item).children('ul').slideUp(150);
				$(item).removeClass('active');
			} else {
				var li = $(this).closest('li').parent('ul, .sub-menu').children('li');

				if ($(li).is('.active')) {
					$(li).removeClass('active').children('ul').slideUp(150);
				}

				$(item).children('ul').slideDown(150);
				$(item).addClass('active');
			}
		});


		/*$(primary).find('.menu-main-menu > li > a').click(function(event) {
			if (($('body').width()  > 979) &&  (navigator.userAgent.match(/iPad|iPhone|Android/i))) {
				var link = $(this);

				if (link.parent().hasClass('open')) {
					link.parent().removeClass('open'),
					event.preventDefault();
				} else {
					event.preventDefault();
					link.parent().addClass('open')
				}
			}
		}); */
	}
	
	/**
	 * Auto width video iframe
	 * 
	 * Youtube Vimeo.
	 * @author Fox
	 */
	function cms_auto_video_width() {
		$('.entry-video iframe').each(function(){
			var v_width = $(this).width();
			
			v_width = v_width / (16/9);
			$(this).attr('height',v_width + 35);
		})
	}
	
	
	/**
	 * Parallax.
	 * 
	 * @author Fox
	 * @since 1.0.0
	 */
	var cms_parallax = $('.cms_parallax');
	if(cms_parallax.length > 0 && CMSOptions.paralax == '1'){
		cms_parallax.each(function() {
			"use strict";
			var speed = $(this).attr('data-speed');
			
			speed = (speed != undefined && speed != '') ? speed : 0.4 ;
			
			$(this).parallax("50%", speed);
		});
	}
	
	/**
	 * Page Loading.
	 */
	function cms_page_loading($load) {
		switch ($load) {
		case 1:
			$('#cms-loadding').css('display','block')
			break;
		default:
			$('#cms-loadding').css('display','none')
			break;
		}
	}
	
	/**
	 * Post Like.
	 * 
	 * @author Fox
	 * @since 1.0.0
	 */
	$('.entry-like').on('click', function (event) {
		/* get post id. */
		var bt_like = $(this);
		
		var post_id = bt_like.attr('data-id');
		
		if(post_id != undefined && post_id != '') {
			/* add like. */
			$.post(ajaxurl, {
				'action' : 'cms_post_like',
				'id' : post_id
			}, function(response) {
				if(response != ''){
					bt_like.find('i').attr('class', 'fa fa-heart')
					bt_like.find('span').html(response);
				}
			});
		}
		event.preventDefault();
	});
	
	/**
	 * Back To Top
	 * 
	 * @author Fox
	 * @since 1.0.0
	 */
	$('body').on('click', '#back_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
    });
	
	/* Show or hide buttom  */
	function cms_back_to_top(){
		/* back to top */
        if (scroll_top < window_height) {
        	$('#back_to_top').addClass('off').removeClass('on');
        } else {
        	$('#back_to_top').removeClass('off').addClass('on');
        }
	}

	/**
	 * One page
	 * 
	 * @author Fox
	 */
	if(CMSOptions.one_page == true){
		
		$('body').on('click', '.onepage', function () {
			$('#cshero-menu-mobile').removeClass('close-open');
			$('#cshero-header-navigation').removeClass('open-menu');
			$('.cshero-menu-close').removeClass('open');
		});
		
		var one_page_options = {'filter' : '.onepage'};
		
		if(CMSOptions.one_page_speed != undefined) one_page_options.speed = parseInt(CMSOptions.one_page_speed);
		if(CMSOptions.one_page_easing != undefined) one_page_options.easing =  CMSOptions.one_page_easing;
		$('#site-navigation, .widget_nav_menu').singlePageNav(one_page_options);
	}
	
	
	/**
	 * Icon Search Position
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_icon_search_position() {          

		//if ($('.un-sticky-tablets').length != 1 || $('.un-sticky-mobile').length != 1) {
			if ( $('.cd-search-trigger').length ) {
				var height_icon_search = $('.cd-search-trigger').height(), header_height = CMSOptions.headder_height_normal;
				if (header_top < scroll_top) {
					header_height = CMSOptions.headder_height_sticky;
					$('.widget_cart_search_wrap .header').css('margin-top', (header_height - height_icon_search) / 2 ).css('visibility', 'visible');
				} else {
					header_height = CMSOptions.headder_height_normal;
					$('.widget_cart_search_wrap .header').css('margin-top', (header_height - height_icon_search) / 2 ).css('visibility', 'visible');
				}
			}	
		//}
		
	}
	
	

	//open search form
	var MqL = 1170;
	$('.cd-search-trigger').on('click', function(event) {
		event.preventDefault();
		toggleSearch();
	});

	/**
	 * Toggle Search Style
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function toggleSearch(type) {

		if($('.cd-search').hasClass('is-visible')) {
			//close search 
			$('.cd-search').removeClass('is-visible');
			$('.cd-search-trigger').removeClass('search-is-visible');
			$('.cd-overlay').removeClass('search-is-visible');
            $('.icon_cart_wrap').show();
		} else {
			//toggle search visibility
			$('.cd-search').addClass('is-visible');
			$('.cd-search-trigger').addClass('search-is-visible');
			$('.cd-overlay').addClass('search-is-visible');
            $('.icon_cart_wrap').hide();
			if($(window).width() > MqL){
                $('.cd-search').find('input[type="search"]').focus();
            }
		}
	}

	/**
	 * Init Wow
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function initWow(){
		var wow = new WOW( { mobile: false, } );
		wow.init();
	}

	/**
	 * Custom Owl Carousel
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_image_carousel() {
		if ( $('.cms-carousel-wrapper').length ) {
			$('.cms-carousel-wrapper').each(function(index, el) {

				var id_carousel = $(el).attr('id');
				var wrap = $('#' + id_carousel + ' .cms-owl-carousel');

				var image_carousel_setting = {};
					image_carousel_setting.items = wrap.attr('data-per-view');
					image_carousel_setting.rewind = true;
					image_carousel_setting.margin = 0;
					image_carousel_setting.mouseDrag = true;
					image_carousel_setting.autoplay = (wrap.attr('data-autoplay') === "true");
					image_carousel_setting.autoplaySpeed = 800;
					image_carousel_setting.dots = (wrap.attr('data-pagination') === "true");
					image_carousel_setting.loop = (wrap.attr('data-loop') === "true");
					image_carousel_setting.nav = (wrap.attr('data-nav') === "true");
			        image_carousel_setting.navText = ["<i class='icon icon-arrows-left'></i>", "<i class='icon icon-arrows-right'></i>"];
			        if (wrap.attr('data-per-view') > 4) {
			        	image_carousel_setting.responsive = {
					        1000:{
					            items:5
					        },
					        900:{
					            items:3
					        },
					        470:{
					            items:1
					        }
					    } 
			        }
			        
				//Play
				wrap.owlCarousel(image_carousel_setting);
			});
		}
	}

	/**
	 * Custom Owl Carousel
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_product_related_carousel() {
		if ($('.related-product-carousel').length) {
			$('.related-product-carousel').each(function(index, el) {

				var related_product = {};
					related_product.items = 4;
					related_product.rewind = true;
					related_product.margin = 0;
					related_product.mouseDrag = true;
					related_product.autoplay = false;
					related_product.dots = false;
					related_product.loop = false;
					related_product.nav = true;
			        related_product.navText = ["<i class='icon icon-arrows-left'></i>", "<i class='icon icon-arrows-right'></i>"];
			        related_product.responsive = {
			        	0: {
			        		items: 1
			        	},
			        	470: {
			        		items: 2
			        	},
			        	900: {
			        		items: 3
			        	},
			        	1000: {
			        		items: 4
			        	}
			        }

				//Play
				$(el).owlCarousel(related_product);
			});
		}
	}

	/**
	 * LightBox
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_lightbox_popup() {
		$('.cms-lightbox').magnificPopup({
			// delegate: 'a',
			type: 'image',
			mainClass: 'mfp-3d-unfold',
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function() {
				// just a hack that adds mfp-anim class to markup 
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				// this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			closeOnContentClick: true,
			midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});

		$('.cms-popup-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-3d-unfold',
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function() {
					// just a hack that adds mfp-anim class to markup 
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					// this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				/*titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
				}*/
			}
		});
		$('.cms-video-popup, .cms-lightbox-map').magnificPopup({
			//disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,

			fixedContentPos: false
		});
	}

	/**
	 * Add Animate for ProgressBar style 2
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_progressbar_animation() {
		$('.cms-progress-item-wrap.style2').appear(function(){  
			$('.cms-progress-item-wrap.style2').each(function(){
				$(this).find('.cms-progress-item-wrap.style2').animate({
					width:$(this).attr('data-percent')
				},2000);
			});
		});
	}

	/**
	 * Add custom class to body
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_portfolio_nopadding() {
		if ($('.cms-portfolio-no-padding').length) {
			$('body').addClass('portfolio-wrap-nopadding');
		}
	}

	/**
	 * Set height for button viewall wrap
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_set_height_viewall() {
		if ($('.cms-grid-viewall').length) {
			$('.cms-grid-viewall').each(function(index, el) {
				var el_inner_heihgt = $(el).find('.cms-button').outerHeight();
				$(el).css('height', el_inner_heihgt);
			});
		}
	}

	/**
	 * Set height for portfolio shuffle item
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_set_height_portfolio_shuffle() {
		$('.cms-port-shuffle-wrap').imagesLoaded(function(){
			if ($('.cms-port-shuffle-wrap').length) {
				var el_height = $('.cms-port-shuffle-wrap').find('.cms-shuffle-item1').height();

				$('.cms-port-shuffle-wrap .cms-portfolio-item').each(function(index, el) {
					//Set height each item
					$(el).css('height', el_height);
				});
			}
		})

	}

	/**
	 * Add placeholder for search in FAQ page
	 * 
	 * @author DuongTung
	 * @since 1.0.0
	 */
	function cms_add_placeholder_search() {
		if ($('.search-in-faq').length) {
			$('.search-in-faq input').each(function(i, el) {
				el.placeholder('Search our Help Center');
			});
		}
	}

	/**
	 * Arrow down
	 * 
	 * @author Duong Tung
	 * @since 1.0.0
	 */
	function cms_arrow_down() {
		var adminbar_height=0;
			if(adminbar.length == 1){
				adminbar_height=parseInt(adminbar.height());
			}
		$('.arrow-in-home a').on('click', function(e) {
			var id_scroll = $(this).attr('href');
			var sticky_height = $('.header-fixed').height();
			var adminbar=$('body').find('#wpadminbar');
			var header_height = CMSOptions.headder_height_sticky;

			e.preventDefault();	
			$("html, body").animate({ scrollTop: $(id_scroll).offset().top - header_height - adminbar_height }, 800);
		});
	}

	/**
	 * Page loaded
	 * 
	 * @author Duong Tung
	 * @since 1.0.0
	 */
	function cms_page_loaded() {
		$("body").imagesLoaded(function() {
			$("#loader3").fadeOut();
			$("#loader-overflow").delay(200).fadeOut(700);
		});
	}

	/**
	 * Add height  .js-height-fullscr 
	 * 
	 * @author Trieu Tu
	 * @since 1.0.0
	 */
	function initImgHeight(){
		!function(e){
			var adminbar=$('body').find('#wpadminbar');
			var adminbar_height=0;
			if(adminbar.length == 1){
				adminbar_height=parseInt(adminbar.height());
			}
			e(".js-height-fullscr").height(e(window).height()-adminbar_height);
			if(e(".js-height-fullscr").hasClass('cms-padding-middle') == true){
				var item_h= e(' .cms-padding-middle .container').outerHeight();
				var padding= (e(window).height() - item_h-adminbar_height)/2;
				e(".js-height-fullscr").css('padding', padding+'px 0');
			}
			
		}(jQuery)
	}

	/**
	 * Edit the count on the categories widget
	 * @author LuanNguyen
     * @since 1.0.0
     * @param element parent
	 * */

    $.fn.extend({
        cmsReplaceCount: function(is_woo){
            this.each(function(){
            	if (is_woo == true) {
            		$(this).find('span.count').each(function(){
	                    var count = '<small>' + $(this).text().replace('(','').replace(')','') + '</small>';
	                    $(this).parent().append(count).find('span.count').remove();
	                })	
            	} else {
            		$(this).addClass('cms-custom-widget')
            		$(this).find(' > ul > li').each(function() {
            			var cms_li = $(this);
            			
            			var small = $(this).html().replace('(','<small>').replace(')','</small>');
            			cms_li.html(small);
            		});
            	}
            })
        }
    });
    // replace span.count to small
    $('.product-categories').cmsReplaceCount(true);
    $('.widget_archive, .widget_categories').cmsReplaceCount(false);
	
});