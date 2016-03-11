$(document).ready(function(){
    $('a.scroll').click( function(){ 
	    var scroll_el = $(this).attr('href'); 
        if ($(scroll_el).length != 0) { 
	        $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500); 
        }
	    return false; 
    });
});