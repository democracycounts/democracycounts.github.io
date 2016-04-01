// Custom Js

!function ($) {

  $(function(){

    var $window = $(window);  

    // side bar
    /*setTimeout(function () {
      $('.bs-docs-sidenav').affix({
        offset: {
          top: function () { return $window.width() <= 980 ? 290 : 210 }
        , bottom: 270
        }
      })
    }, 100)*/

    // make code pretty
    window.prettyPrint && prettyPrint();
	
	
	/*$('ul.nav > li > a').on('click',function(){
		$('ul.nav > li').children('ul').stop(true,true).slideUp(100);
		$(this).siblings('ul').stop(true,true).slideDown(0);
	});*/
	
	$('ul.nav > li').hover(function(){
		$(this).children('ul').stop(true,true).slideDown();		
	},function(){
		$(this).children('ul').stop(true,true).slideUp();	
	});
	
	$('ul.nav > li ul > li').on('click',function(){
		$('ul.nav li > ul > li').children('ul').stop(true,true).slideUp(100);
		$(this).children('ul').stop(true,true).slideDown(0);
	});
	
	$('.btn-navbar').on('click',function(){
		$('.nav-collapse').stop(true,true).toggleClass('open');	
	});
	
	$('ul.nav li a').on('click',function(){
		var target = $(this).attr('href')
		var distance = $(target).offset().top;
		$('html, body').animate({scrollTop:distance-45}, 700);
	});
	


  });

}(window.jQuery);

