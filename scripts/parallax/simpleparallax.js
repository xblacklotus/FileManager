function parallaxScroll() {
	scrollPos = $(this).scrollTop();
	$('.header-parallax').css({
		'background-position' : '50% ' + (-scrollPos/4)+"px"
	});
	$('.header-content > div').css({
		'opacity': 1 - (scrollPos / 250)
	});
}
$(document).ready(function(){
	$(window).scroll(function() {
		parallaxScroll();
	});
});
