function isAppleDevice(){
    return (
        (navigator.userAgent.toLowerCase().indexOf("ipad") > -1) ||
        (navigator.userAgent.toLowerCase().indexOf("iphone") > -1) ||
        (navigator.userAgent.toLowerCase().indexOf("ipod") > -1)
    );
}

jQuery(document).ready(function ($) {
	var previousScroll = 0;
	var headerOrgOffset = 57;

	var topOri = parseInt($('header.navbar').css('top'));
	var topHide = - 57 - topOri;

	$(window).scroll(function () {
		
		if(!isAppleDevice()){
			var currentScroll = $(this).scrollTop();
			if (currentScroll > headerOrgOffset) {
				if (currentScroll > previousScroll) {

					if(parseInt($('header.navbar').css('top')) == topOri)
					$('header.navbar').css('top', topOri + 'px').animate({'top': topHide + 'px'}, 500);

				} else {

					if(parseInt($('header.navbar').css('top')) == topHide)
					$('header.navbar').stop(true, true).css('top', topHide + 'px').animate({'top': topOri +'px'}, 500);

				}
			} 
			previousScroll = currentScroll;
		}

	});
});
