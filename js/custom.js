// banner-section height
jQuery(window).on("orientationchange",function(){
   var headr_h='125';
     var height_window = jQuery(window).height();
     var heights= height_window -headr_h;
    jQuery(".mainBanner").css('height', heights);
});
jQuery( window ).resize(function() {
     var headr_h='125';
     var height_window = jQuery(window).height();
     var heights= height_window -headr_h;
    jQuery(".mainBanner").css('height', heights);
	});
jQuery(function(){
	
     var headr_h='125';
     var height_window = jQuery(window).height();
     var heights= height_window -headr_h;
    jQuery(".mainBanner").css('height', heights);
	
});
$(document).ready(function($) {
	if($(window).width() < 767){
  		  $(".scroll").click(function(event){ // When a link with the .scroll class is clicked
            event.preventDefault(); // Prevent the default action from occurring
            $('html,body').animate({scrollTop:$(this.hash).offset().top}, 2000, 'easeInOutExpo'); // Animate the scroll to this link's href value
												
});
}
else{
	$(".scroll").click(function(event){ // When a link with the .scroll class is clicked
            event.preventDefault(); // Prevent the default action from occurring
            $('html,body').animate({scrollTop:$(this.hash).offset().top-90}, 2000, 'easeInOutExpo'); // Animate the scroll to this link's href value
												
});
}
});

/*back to top */
$(document).ready(function(){
	$(".back_top").hide();
	$(function () {
		$(window).scroll(function(){
		if ($(window).scrollTop()>50){
		$(".back_top").fadeIn(1500);
		}
		else
		{
		$(".back_top").fadeOut(1500);
		}
		});
		
		$(".back_top").click(function(){
		$('body,html').animate({scrollTop:0},500);
		return false;
		});
		});
		
});

$(document).ready(function($) {
  		
var $window = $(window);
var nav = $('#section11');
var banner_height = $('#section11').height()
$window.scroll(function(){
    if ($window.scrollTop() >= banner_height) {
       nav.addClass('fixed-header animated fadeInUp');
    }
    else {
       nav.removeClass('fixed-header animated fadeInUp');
    }
});
});
		

		
		
		



