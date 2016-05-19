jQuery(document).ready(function() {

/* Banner class */

	jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');
	
	jQuery('ul#storefront li:nth-child(even)').addClass('rpanel') .after('<div class="clear"></div>');

/* Navigation */
	jQuery('#subnav ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   {opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	

// Slider
 jQuery('#proslide').bxSlider();
	
 jQuery('.largeprev').jqzoom({  zoomType: 'innerzoom'  });  
	
});

