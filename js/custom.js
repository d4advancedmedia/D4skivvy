jQuery(document).ready(function($) {

// SCREEN READER FIX
	$("a.screenreader").click(function(event){var skipTo="#"+this.href.split('#')[1];$(skipTo).attr('tabindex', -1).on('blur focusout', function () {$(this).removeAttr('tabindex');}).focus();});

// MOBILE TOGGLE
	$('#mobile-nav').slideUp(0); $('#mobile-toggle').click(function() { $( "#mobile-nav" ).slideToggle(400);console.log("Mobile Toggled"); });

});