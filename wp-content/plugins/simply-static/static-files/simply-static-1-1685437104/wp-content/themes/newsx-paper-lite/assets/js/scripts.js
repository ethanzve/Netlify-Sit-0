(function ($) {
	"use strict";


    //document ready function
    jQuery(document).ready(function($){
		$(".news-update").ticker();
		$(".news-update").removeClass('news-noload');
		$('body').on("click", function() {
			$(".slicknav_nav").removeClass('mhide');
		  });

		 $("#newsx-paper-lite-menu").newsxPaperAccessibleDropDown();

        }); // end document ready
		
    	

    	    $.fn.newsxPaperAccessibleDropDown = function () {
			    var el = $(this);

			    /* Make dropdown menus keyboard accessible */

			    $("a", el).focus(function() {
			        $(this).parents("li").addClass("hover");
			    }).blur(function() {
			        $(this).parents("li").removeClass("hover");
			    });
			}

}(jQuery));	