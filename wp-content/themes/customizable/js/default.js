// JavaScript Document
jQuery(document).ready(function() {
/* Mobile */
	jQuery("#menu-trigger").on("click", function(){
		jQuery(".customize-menu").slideToggle();
	});
	
	// iPad
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if (isiPad) jQuery('.linkedin-menu ul').addClass('no-transition');   
		
	jQuery(function () {

      // Slideshow 4
      jQuery("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500
		   });

    });
		var owl = jQuery("#owl-demo");
	 
	owl.owlCarousel({
			itemsCustom : [
			  [0, 1],
			  [450, 2],
			  [600, 2],
			  [700, 2],
			  [1000, 4],
			  [1200, 4],
			  [1400, 4],
			  [1600, 4]
			],
			itemsMobile : true,
			navigation : false,
			autoHeight : false,
	});	
	   
});          
