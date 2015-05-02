var matched, browser;
// Use of jQuery.browser is frowned upon.
// More details: http://api.jquery.com/jQuery.browser
// jQuery.uaMatch maintained for back-compat
jQuery.uaMatch = function (ua) {
    ua = ua.toLowerCase();
    var match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
        /(webkit)[ \/]([\w.]+)/.exec(ua) ||
        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
        /(msie) ([\w.]+)/.exec(ua) ||
        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) ||
        [];

    return {
        browser: match[1] || "",
        version: match[2] || "0"
    };
};

matched = jQuery.uaMatch(navigator.userAgent);
browser = {};
if (matched.browser) {
    browser[matched.browser] = true;
    browser.version = matched.version;
}
// Chrome is Webkit, but Webkit is also Safari.
if (browser.chrome) {
    browser.webkit = true;
} else if (browser.webkit) {
    browser.safari = true;
}
jQuery.browser = browser;

/* Back to Top */
jQuery(document).ready(function($) {
	if ($('.back-to-top').length == 0) {
		$('body').append('<a href="#" class="back-to-top"><i class="fa fa-long-arrow-up"></i></a>');
	}
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
	
    /* Bootstrap Dropdown Hover Support */
    $('.sitenav > ul > li.dropdown').hover(function () {
        if ($.browser.msie && (parseInt($.browser.version, 10) === 8 || parseInt($.browser.version, 10) === 7)) {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
            $(this).addClass("click");
            return;
        }
        var width = Math.max($(window).innerWidth(), window.innerWidth);
        if (width > 979) {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
            $(this).addClass("click");
        }
    }, function () {
        if ($.browser.msie && (parseInt($.browser.version, 10) === 8 || parseInt($.browser.version, 10) === 7)) {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
			$(this).removeClass("click");
            return;
        }
        var width = Math.max($(window).innerWidth(), window.innerWidth);
        if (width > 979) {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
			$(this).removeClass("click");
        }
    });

	var $element = $('#boxed-area');
	$('.sitenav li.dropdown a').click(function () {		
		if ($(this).parent().hasClass("click")) {
		
			if(!$element.data('pagemaker').settings.hasChanged) {
				window.location.href = $(this).attr("href");
				return;
			}
			
			$('#modalLeaveConfirm').modal();
			var gotourl = $(this).attr("href");
			$('#btnConfirm').click(function(){
				window.location = gotourl;
			});	
			e.preventDefault();	

		} else {
			$(this).parent().addClass("click");
		}
	});
	
});