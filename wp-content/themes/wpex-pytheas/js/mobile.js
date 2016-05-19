(function($) {
	"use strict";
	$(document).ready(function(){
		var taxToggle = $( 'ul.tax-archives-filter li' );
		var taxDropdown = $(this).children('ul');
		taxToggle.click( function(e) {
			taxDropdown.fadeToggle();
			 e.stopPropagation();
		});
	});
})(jQuery);