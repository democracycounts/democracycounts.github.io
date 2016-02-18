$(document).ready(function(){
	"use strict";
	
	/* ---------------------------------------------------------------------- */
	/*	Search Script
	/* ---------------------------------------------------------------------- */
	$(".search-fld").on('click',function(){
		if($(this).hasClass('minus')){        
			$(this).toggleClass("plus minus");
			$('.search-wrapper-area').fadeOut();
		}else{
			$('.search-wrapper-area').fadeIn();
			$(this).toggleClass("minus plus");
		}
	});
	
	/*
	  ==============================================================
		   Banner Bx-Slider Script Start
	  ============================================================== */
	if($('.bxslider').length){
		$('.bxslider').bxSlider();
	}  
	  
	/*
	==============================================================
	   Widget Event Galley Bx-Slider Script
	============================================================== */
	if($('.gallery_bxslider').length){
		$('.gallery_bxslider').bxSlider();
	}  

	/*
	  ==============================================================
		  Calendar Script
	  ============================================================== */
	if($('#calendar').length){
		$('#calendar').fullCalendar({
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: '2015-02-01'
				}
				
			]
		});
	}
	
	/* ---------------------------------------------------------------------- */
	/*	DL Responsive Menu
	/* ---------------------------------------------------------------------- */
	if(typeof($.fn.dlmenu) == 'function'){
		$('#kode-responsive-navigation').each(function(){
			$(this).find('.dl-submenu').each(function(){
				if( $(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#' ){
					var parent_nav = $('<li class="menu-item kode-parent-menu"></li>');
					parent_nav.append($(this).siblings('a').clone());
					
					$(this).prepend(parent_nav);
				}
			});
			$(this).dlmenu();
		});
	}
	
	/*
	  ==============================================================
		  Calendar Script
	  ============================================================== */
	if($('[data-toggle="tooltip"]').length){
    	$('[data-toggle="tooltip"]').tooltip(); 
	}
	
	/*
	  ==============================================================
		   Tab View Script Start
	  ============================================================== */
	if($('#tabs').length){
		$('#tabs').tab();
	}  
	  
	  
	/*
	  ==============================================================
		   What We Do Bx-Slider Script Start
	  ============================================================== */
	if($('#bxslider').length){
		$('#bxslider').bxSlider({
			mode: 'vertical',
			minSlides: 2,
			maxSlides: 2,
			slideMargin: 10
		});
	}
	
	/*
	  ==============================================================
		   Google Chart Script Start
	  ============================================================== */
	if($('#curve_chart').length){
		google.setOnLoadCallback(drawChart);
	}


	  
		
	/*
	  ==============================================================
		   What We Do Bx-Slider Script Start
	  ============================================================== */	  
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.kode-back-top').css('opacity','1');
				$('.kode-back-top').attr('id','show_me');
			} else {
				$('.kode-back-top').css('opacity','0');
				$('.kode-back-top').attr('id','hide_me');
			}
		});
		
		//Click event to scroll to top
		$('.kode-back-top').on('click',function(){
			$('html, body').animate({scrollTop : 0},800);
			return false;
		});

		
		
	/*
	  ==============================================================
		   Our Political Campagin Bx-Slider Script Start
	  ============================================================== */
	if($('.pol-campgn').length){
		$('.pol-campgn').bxSlider({
			mode: 'vertical',
			minSlides: 2,
			maxSlides: 2,
			slideMargin: 10
		});
	}	
		
	/*
	  ==============================================================
		   Progress Bar Script Start
	  ============================================================== */	
	if($('.serving').length){	
		jQuery('.serving').each(function(){
			jQuery(this).find('.progress-bar').animate({
				width:jQuery(this).attr('data-percent')
			},2000);
		});
	}
	
	if($('.conviction').length){
		jQuery('.conviction').each(function(){
			jQuery(this).find('.progress-bar').animate({
				width:jQuery(this).attr('data-percent')
			},2000);
		});
	}
	
	if($('.courage').length){
		jQuery('.courage').each(function(){
			jQuery(this).find('.progress-bar').animate({
				width:jQuery(this).attr('data-percent')
			},2000);
		});
	}
	
	if($('.sincerity').length){
		jQuery('.sincerity').each(function(){
			jQuery(this).find('.progress-bar').animate({
				width:jQuery(this).attr('data-percent')
			},2000);
		});
	}
		
		
	/* ==================================================================
					Number Count Up(WayPoints) Script
	  =================================================================	*/		
	if($('.counter').length){
		$('.counter').counterUp({
			delay: 10,
			time: 1000
		});
	}
		
	if($(".DateCountdown").length){
		$(".DateCountdown").TimeCircles();
	}
		
		
	/*
	  ==============================================================
		   Post Bx-Slider Script Start
	  ============================================================== */
	if($('.post_bxslider').length){
		$('.post_bxslider').bxSlider();
	}
	  
	/*
	  ==============================================================
		   Post Bx-Slider Script Start
	  ============================================================== */
	if($('.countdown').length){
		$('.countdown').downCount({ date: '08/08/2016 12:00:00', offset: +1 });
	}
	  
	  
	/*
	  ==============================================================
		   Testimonial Owl Carousel Script Start
	  ============================================================== */
	if($('#owl-demo').length){
		var owl = $("#owl-demo");
		owl.owlCarousel({	
		 autoPlay: 3000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 1],
			[700, 2],
			[1000, 2],
			[1200, 2],
			[1400, 2],
			[1600, 2]
		  ],
		  navigation : true

		});
	} 
		  
	/*
	  ==============================================================
		   Owl Carousel Script Start
	  ============================================================== */
	if($('#owl-demo2').length){
		var owl = $("#owl-demo2");
		owl.owlCarousel({	
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			itemsCustom : [
				[0, 1],
				[450, 1],
				[600, 2],
				[700, 3],
				[1000, 4],
				[1200, 4],
				[1400, 4],
				[1600, 4]
			],
			navigation : true
		});
	}	
		  
	/*
	  ==============================================================
		   Accordian Script Start
	  ============================================================== */  
	  
	  if($('.accordion').length){
		//custom animation for open/close
		$.fn.slideFadeToggle = function(speed, easing, callback) {
		  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
		};

		$('.accordion').accordion({
		  defaultOpen: 'section1',
		  cookieName: 'nav',
		  speed: 'slow',
		  animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  },
		  animateClose: function (elem, opts) { //replace the standard slideDown with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  }
		});
	}
		
		
	/*
	  ==============================================================
		   Choose US Script Start
	  ============================================================== */  
		if($('.accordion1').length){
			//custom animation for open/close
			$.fn.slideFadeToggle = function(speed, easing, callback) {
			  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
			};
	
			$('.accordion1').accordion({
			  defaultOpen: 'item1',
			  cookieName: 'nav',
			  speed: 'slow',
			  animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
				elem.next().stop(true, true).slideFadeToggle(opts.speed);
			  },
			  animateClose: function (elem, opts) { //replace the standard slideDown with custom function
				elem.next().stop(true, true).slideFadeToggle(opts.speed);
			  }
			});
		}
		
		
	/*
	  ==============================================================
		   Latest Work Owl Carousel Script Start
	  ============================================================== */
	  
	  var owl = $("#owl-demo3");
			owl.owlCarousel({	
			 autoPlay: 3000, //Set AutoPlay to 3 seconds
			  itemsCustom : [
				[0, 1],
				[450, 1],
				[600, 2],
				[700, 3],
				[1000, 3],
				[1200, 3],
				[1400, 3],
				[1600, 3]
			  ],
			  navigation : true
		 
		  });
		  
		  
	/*
	  =======================================================================
		  		 	Pretty Photo Script
	  =======================================================================
	*/
	if($("a[data-rel^='prettyPhoto']").length){
		$("a[data-rel^='prettyPhoto']").prettyPhoto();
	}
	
	/*
	  =======================================================================
		  		 	Filterable Gallery Script
	  =======================================================================
	*/
	
	jQuery(window).load(function($) {
		var filter_container = jQuery('#filterable-item-holder-1');

		filter_container.children().css('position','relative');	
		filter_container.masonry({
			singleMode: true,
			itemSelector: '.filterable-item:not(.hide)',
			animate: true,
			animationOptions:{ duration: 800, queue: false }
		});	
		jQuery(window).resize(function(){
			var temp_width =  filter_container.children().filter(':first').width()+20;
			filter_container.masonry({
				columnWidth: temp_width,
				singleMode: true,
				itemSelector: '.filterable-item:not(.hide)',
				animate: true,
				animationOptions:{ duration: 800, queue: false }
			});		
		});	
		jQuery('ul#filterable-item-filter-1 a').on('click',function(e){	

			jQuery(this).addClass("active");
			jQuery(this).parents("li").siblings().children("a").removeClass("active");
			e.preventDefault();
			
			var select_filter = jQuery(this).attr('data-value');
			
			if( select_filter == "All" || jQuery(this).parent().index() == 0 ){		
				filter_container.children().each(function(){
					if( jQuery(this).hasClass('hide') ){
						jQuery(this).removeClass('hide');
						jQuery(this).fadeIn();
					}
				});
			}else{
				filter_container.children().not('.' + select_filter).each(function(){
					if( !jQuery(this).hasClass('hide') ){
						jQuery(this).addClass('hide');
						jQuery(this).fadeOut();
					}
				});
				filter_container.children('.' + select_filter).each(function(){
					if( jQuery(this).hasClass('hide') ){
						jQuery(this).removeClass('hide');
						jQuery(this).fadeIn();
					}
				});
			}
			
			filter_container.masonry();	
			
		});
	});
	
	
	/*
	  =======================================================================
		  		 	Map Script
	  =======================================================================
	*/
	if($('#map-canvas').length){
		google.maps.event.addDomListener(window, 'load', initialize);
	}
	
	
	/*
	  =======================================================================
		  		 	Contact Form Validation Script
	  =======================================================================
	*/
	if($('#contactform').length) {

		var $form = $('#contactform'),
		$loader = '<img src="images/ajax_loading.gif" alt="Loading..." />';
		$form.append('<div class="hidden-me" id="contact_form_responce">');

		var $response = $('#contact_form_responce');
		$response.append('<p></p>');

		$form.submit(function(e){

			$response.find('p').html($loader);

			var data = {
				action: "contact_form_request",
				values: $("#contactform").serialize()
			};

			//send data to server
			$.post("inc/contact-send.php", data, function(response) {

				response = $.parseJSON(response);
				
				$(".incorrect-data").removeClass("incorrect-data");
				$response.find('img').remove();

				if(response.is_errors){

					$response.find('p').removeClass().addClass("error type-2");
					$.each(response.info,function(input_name, input_label) {

						$("[name="+input_name+"]").addClass("incorrect-data");
						$response.find('p').append('Please enter correct "'+input_label+'"!'+ '</br>');
					});

				} else {

					$response.find('p').removeClass().addClass('success type-2');

					if(response.info == 'success'){

						$response.find('p').append('Your email has been sent!');
						$form.find('input:not(input[type="submit"], button), textarea, select').val('').attr( 'checked', false );
						$response.delay(1500).hide(400);
					}

					if(response.info == 'server_fail'){
						$response.find('p').append('Server failed. Send later!');
					}
				}

				// Scroll to bottom of the form to show respond message
				var bottomPosition = $form.offset().top + $form.outerHeight() - $(window).height();

				if($(document).scrollTop() < bottomPosition) {
					$('html, body').animate({
						scrollTop : bottomPosition
					});
				}

				if(!$('#contact_form_responce').css('display') == 'block') {
					$response.show(450);
				}

			});

			e.preventDefault();

		});				

	}
	

});

/*
  =======================================================================
				Map Script
  =======================================================================
*/
function initialize() {
	
	"use strict";
	
	var MY_MAPTYPE_ID = 'custom_style';
	var map;
	var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);
	var featureOpts = [
		{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}

	];
	var mapOptions = {
		zoom: 12,
		center: brooklyn,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		zoomControl: false,
		scaleControl: false,
		scrollwheel: false,
		disableDoubleClickZoom: true,
		mapTypeId: MY_MAPTYPE_ID
	};

	map = new google.maps.Map(
		document.getElementById('map-canvas'),
		mapOptions
	);

	var styledMapOptions = {
		name: 'Custom Style'
	};

	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}

/*
  =======================================================================
				Draw Chart Script
  =======================================================================
*/
function drawChart() {
	
	"use strict";
	
	var data = google.visualization.arrayToDataTable([
	  ['Year', 'Sales'],
	  ['2004',  1000],
	  ['2005',  800],
	  ['2006',  1200],
	  ['2007',  1100],
	  ['2008',  1500],
	  ['2009',  1800],
	  ['2010',  1300],
	]);

	var options = {
		pointSize: 15,
	  title: 'Company Performance',
	  curveType: 'function',
	  legend: { position: 'bottom' },
	  pointShape: 'circle'
	};

	var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

	chart.draw(data, options);
}
