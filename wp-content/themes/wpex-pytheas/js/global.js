(function($) {
	"use strict";
	$(document).ready(function(){
		// Scroll back to top
		$('a[href=#top]').on('click', function() {
			$( 'html, body' ).animate({scrollTop:0}, 'normal');
			return false;
		});
		// Scroll to comments
		$('.comment-scroll a').click( function(event) {
			event.preventDefault();
			$( 'html,body' ).animate( {
				scrollTop: $( this.hash ).offset().top
				}, 'normal' );
		});
		// Responsive navbar
		var nav = $( '#site-navigation' ), button, menu;
		$('.nav-toggle').on( 'click', function() {
			$( '.nav-menu' ).toggleClass( 'toggled-on' );
			$( '.nav-toggle' ).find('.toggle-icon').toggleClass('fa-arrow-down fa-arrow-up');
		});
	});
})(jQuery);