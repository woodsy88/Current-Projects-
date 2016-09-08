$(document).ready(function(e) {
	$('.group1').colorbox({
		'rel' : 'gallery',
		'maxWidth' : '90%',
		'transition' : 'fade',
		'opacity' : 0.5,
		'slideshow' : true,
		'slideshowSpeed' : 3000,
		'current' : 'arrangement {current} of {total}'
	});
});