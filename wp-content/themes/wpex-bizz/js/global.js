jQuery( function($) {
	
	$(document).ready(function(){
		
		// Main menu superfish
		$('ul.sf-menu').superfish({
			delay: 200,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			cssArrows: false,
			disableHI: true
		});
		
		// Mobile Menu
		$('#navigation-toggle').sidr({
			name: 'sidr-main',
			source: '#sidr-close, #site-navigation, #mobile-search',
			side: 'left',
			renaming: true,
			displace: false
		});
		$(".sidr-class-toggle-sidr-close").click( function() {
			$.sidr('close', 'sidr-main');
			return false;
		});

		//Prettyphoto - for desktops only
		if ($(window).width() > 767) {
		
			// PrettyPhoto Without gallery
			$(".wpex-lightbox").prettyPhoto({
				show_title: false,
				social_tools: false,
				slideshow: false,
				autoplay_slideshow: false,
				wmode: 'opaque'
			});
		
			//PrettyPhoto With Gallery
			$("a[rel^='wpexLightboxGallery']").prettyPhoto({
				show_title: false,
				social_tools: false,
				autoplay_slideshow: false,
				overlay_gallery: true,
				wmode: 'opaque'
				
			});
		
		}
		
	}); // End doc ready

	$(window).load(function(){
		// Homepage FlexSlider
		$('#homepage-slider').flexslider({
			animation: 'fade',
			slideshow: true,
			smoothHeight: true,
			controlNav: false,
			directionNav: true,
			prevText: '<span class="fa fa-caret-left"></span>',
			nextText: '<span class="fa fa-caret-right"></span>',
			controlsContainer: ".flexslider-container"
		});
		// Post FlexSlider
		$('div.post-slider').flexslider({
			animation: 'fade',
			slideshow: true,
			smoothHeight: true,
			controlNav: false,
			directionNav: true,
			prevText: '<span class="fa fa-caret-left"></span>',
			nextText: '<span class="fa fa-caret-right"></span>',
			controlsContainer: ".flexslider-container"
		});
		
	}); // End on window load
	
});