(function($) {

var aMenuClicked = false;
var aSearchClicked = false;
if(swipeDeactivated != true) var swipeDeactivated = false;


$(document).ready(function () {
	//Fixed element
	var bd = $('#b, .social');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 245) {
            bd.addClass("float");
        } else {
            bd.removeClass("float");
        }
    });
	
	//Carousel
	$(function($){
	  $('#carousel').elastislide();
	});
	
	//Filtre
	$(function(){
	  $('#grid').mixitup();
	});
	
	// Tabs
	//When page loads...
	$('.tabs-wrapper').each(function() {
		$(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(this).find(".tab_content:first").show(); //Show first tab content
	});
	
	//On Click Event
	$("ul.tabs li").click(function(e) {
		$(this).parents('.tabs-wrapper').find("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(this).parents('.tabs-wrapper').find(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(this).parents('.tabs-wrapper').find(activeTab).fadeIn(); //Fade in the active ID content
		
		e.preventDefault();
	});
	
	$("ul.tabs li a").click(function(e) {
		e.preventDefault();
	})
	
	
	
	if(!swipeDeactivated)
	{
		jQuery("body").swipe({
		  swipeLeft:function(event, direction, distance, duration, fingerCount) {
			jQuery('#content-wrapper').removeClass('moved');
			aMenuClicked = false;
		  },
		  swipeRight:function(event, direction, distance, duration, fingerCount) {
			jQuery('#content-wrapper').addClass('moved');
			aMenuClicked = true;
		  },
		  excludedElements:jQuery.fn.swipe.defaults.excludedElements+", .slides, .toggle"
		});
	}
	
	if("ontouchstart" in document.documentElement)
	{	
		jQuery('#a-menu').bind('touchstart touchon', function(event){
					if(aMenuClicked)
					{
						jQuery('#respmenu').removeClass('activeState');
						jQuery('#content-wrapper').removeClass('moved');
						aMenuClicked = false;
					}
					else
					{
						jQuery('#respmenu').addClass('activeState');
						jQuery('#content-wrapper').addClass('moved');
						aMenuClicked = true;
					}
			});
			
			jQuery('#a-search, #a-close').bind('touchstart touchon', function(event){
					if(aSearchClicked)
					{
						jQuery('#respsearch').removeClass('moved');
						aSearchClicked = false;
					}
					else
					{
						jQuery('#respsearch').addClass('moved');
						aSearchClicked = true;
					}
			});
			
		}
		else
		{
			
			jQuery('#a-menu').bind('click', function(event){
					if(aMenuClicked)
					{
						jQuery('#respmenu').removeClass('activeState');
						jQuery('#content-wrapper').removeClass('moved');
						aMenuClicked = false;
					}
					else
					{
						jQuery('#respmenu').addClass('activeState');
						jQuery('#content-wrapper').addClass('moved');
						aMenuClicked = true;
					}
			});
			
			jQuery('#a-search, #a-close').bind('click', function(event){
					if(aSearchClicked)
					{
						jQuery('#respsearch').removeClass('moved');
						aSearchClicked = false;
					}
					else
					{
						jQuery('#respsearch').addClass('moved');
						aSearchClicked = true;
					}
			});
			
	}
	

	jQuery("#header_menu li.item").mouseenter(function(){
			jQuery(this).find('.subnav').fadeIn({ duration: 300, easing: 'easeInOutQuad'}) 	
		}).mouseleave(function(){
			jQuery(this).animate({delay:1},50, function() {
				jQuery(this).find('.subnav').fadeOut({ delay:500, duration: 300, easing: 'easeOutQuad'}) 	
			});
	});
	
	
});
})(jQuery);
/**
$(function() {
$("#respmenu").mmenu({
   position          : "left",
   slidingSubmenus   : true,
   counters          : {
      add                  : true,
      count                : true
   },
   searchfield       : {
      add                  : true,
      search               : true,
      placeholder          : "Recherche",
      noResults            : "Pas de résultats.",
      showLinksOnly        : true
   },
   onClick           : {
      close                : true,
      delayPageload        : true,
      blockUI              : true
   },
   configuration     : {
      hardwareAcceleration : true,
      preventTabbing       : true,
      selectedClass        : "Selected",
      pageNodetype         : "div",
      menuNodetype         : "nav",
      slideDuration        : 500
   }
});});

**/




	
	
	
	

