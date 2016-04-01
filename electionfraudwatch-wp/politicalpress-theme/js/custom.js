jQuery(document).ready(function() {
    "use strict";

    var $ = jQuery;

    /*-----------------------------------------------------------------------------------*/
    /* Cross Browser
     /*-----------------------------------------------------------------------------------*/
    $('.widget.events ul li:last-child, .widget .tabbed .widget-list li:last-child').css('border-bottom', 'none');
    $('.widget .tabbed .tabs li:last-child, .tabs-nav li:last-child').css('border-right', '1px solid #E2E2E9');
    $('.sidebar .widget ul li ul li:first-child').css('border-top', '1px solid #DEDEDE');
    $('.sidebar .widget ul li ul li:last-child').css('border-bottom', 'none');



    /*-----------------------------------------------------------------------------------*/
    /* Header Widget
     /*-----------------------------------------------------------------------------------*/
    $('.header-widget .wp-email-capture-label.wp-email-capture-name-label').hide().next('input').attr({
        placeholder:"Your Name"
    });
    $('.header-widget .wp-email-capture-label.wp-email-capture-email-label').hide().next('input').attr({
        placeholder:"Email Address"
    });

    $('.wp-email-capture-label.wp-email-capture-name-label, .wp-email-capture-label.wp-email-capture-email-label').next('input').addClass('required');
    $('.wp-email-capture-label.wp-email-capture-email-label').next('input').addClass('email');

    $('#wp_email_capture form').validate();


    if ( $.browser.msie ) {
        var ie_version = $.browser.version === '8.0' || $.browser.version === '9.0';
        if(ie_version){
            $('.header-widget .wp-email-capture-label.wp-email-capture-name-label').show();
            $('.header-widget .wp-email-capture-label.wp-email-capture-email-label').show();
        }
    }

    $('.wp-email-capture-widget').siblings('p').hide();


    /*-----------------------------------------------------------------------------------*/
    /* Search Widget
     /*-----------------------------------------------------------------------------------*/
    $('.searchform .screen-reader-text').hide().next('input').attr({
        placeholder:"type here to search"
    });


    /*-----------------------------------------------------------------------------------*/
    /*	Tags Cloud
     /*-----------------------------------------------------------------------------------*/
    $('.tagcloud').addClass('clearfix');
    $('.tagcloud a').removeAttr('style');


    /*-----------------------------------------------------------------------------------*/
    /*	Flex Slider
     /*-----------------------------------------------------------------------------------*/
    if(jQuery().flexslider)
    {
        var param = {
            animation: "fade",
            slideshowSpeed: 7000,
            animationSpeed:	1500,
            directionNav: true,
            controlNav: true,
            keyboardNav: true
        };

        // Flex Slider for Homepage
        $('.home-flexslider.variation-1 .flexslider  , .home-flexslider.variation-3  .flexslider').flexslider(param);

        param = { animation: "slide" };
        // Flex Slider Gallery Post
        $('.home-flexslider.variation-2  .flexslider, .listing-slider').flexslider(param);
    }


    /*-----------------------------------------------------------------------------------*/
    /* Swipe Box
    /*-----------------------------------------------------------------------------------*/
    if(jQuery().swipebox)
    {
        $('.swipebox').swipebox();
    }

    /*-----------------------------------------------------------------------------------*/
    /* jCarousel Box
    /*-----------------------------------------------------------------------------------*/
    if(jQuery().jcarousel)
    {
        $('#per-slide-template').jcarousel();
    }



    /*-----------------------------------------------------------------------------------*/
    /*	Notification Hide Function
     /*-----------------------------------------------------------------------------------*/
    $(".icon-remove").click(function() {
        $(this).parent().fadeOut(300);
    });




    /*-----------------------------------------------------------------------------------*/
    /*	Accordion
     /*-----------------------------------------------------------------------------------*/
    $(function() {
        $('.accordion dt').click(function(){
            $(this).siblings('dt').removeClass('current');
            $(this).addClass('current').next('dd').slideDown(500).siblings('dd').slideUp(500);
        });
    });



    /*-----------------------------------------------------------------------------------*/
    /*	Toggle
     /*-----------------------------------------------------------------------------------*/
    $(function() {
        $('dl.toggle dt').click(function(){
            if($(this).hasClass('current')){
                $(this).removeClass('current').next('dd').slideUp(500);
            }
            else{
                $(this).addClass('current').next('dd').slideDown(500);
            }
        });
    });


    /*-----------------------------------------------------------------------------------*/
    /* Tabs
     /*-----------------------------------------------------------------------------------*/
    $(function(){

        var $tabsNav    = $('.tabs-nav'),
            $tabsNavLis = $tabsNav.children('li');

        $tabsNav.each(function(){
            var $this = $(this);
            $this.next().children('.tab-content').stop(true,true).hide()
                .first().show();
            $this.children('li').first().addClass('active').stop(true,true).show();
        });

        $tabsNavLis.on('click', function(e) {
            var $this = $(this);
            $this.siblings().removeClass('active').end()
                .addClass('active');
            var idx = $this.parent().children().index($this);
            $this.parent().next().children('.tab-content').stop(true,true).hide().eq(idx).fadeIn();
            e.preventDefault();
        });

    });



    /*-----------------------------------------------------------------------------------*/
    /*	Tabs Widget
     /*-----------------------------------------------------------------------------------*/
    $('.tabbed .tabs li:first-child').addClass('current');
    $('.tabbed .block:first').addClass('current');

    $('.tabbed .tabs li').click(function(){
        var $this   = $(this);
        var tabNumber = $this.index();

        /* remove current class from other tabs and assign to this one */
        $this.siblings('li').removeClass('current');
        $this.addClass('current');

        /* remove current class from current block and assign to related one */
        $this.parent('ul').siblings('.block').removeClass('current');
        $this.closest('.tabbed').children('.block:eq('+ tabNumber +')').addClass('current');
    });


    /*-----------------------------------------------------------------------------------*/
    /*	Gallery Hover Effect
     /*-----------------------------------------------------------------------------------*/
    $(".gallery-item figure").hover(
        function () {
            var container_width= $(this).width(),
                container_height= $(this).height();
            $(this).find('.media_container').stop(true, true).css({
                opacity: 0.8,
                width: container_width,
                height:container_height
            });

            $(this).find('a').stop(true, true).animate({
                opacity: 1,
                top: "50%"
            });
        },
        function () {
            $(this).find('.media_container').stop(true,true).css({
                opacity: 0,
                width: 0,
                height:0
            });
            $(this).find('a').stop(true, true).animate({
                opacity: 0,
                top: "45%"
            });
        }
    );


    /*-----------------------------------------------------------------------------------*/
    /*	Isotope
     /*-----------------------------------------------------------------------------------*/
    var gallery_item    = $('.isotope'),
        filterLinks     = $('#filter-by a');

    function isotope() {
        gallery_item.isotope({
            animationEngine : 'best-available'
        })
        filterLinks.click(function(e){
            var selector = $(this).attr('data-filter');
            gallery_item.isotope({
                filter : '.' + selector,
                itemSelector : '.isotope-item'
            });

            filterLinks.removeClass('active');
            $('#filter-by li').removeClass('current-cat');
            $(this).addClass('active');
            e.preventDefault();
        });
    };

    if( jQuery().isotope )
    {
        $(window).load(function () {
            isotope();
        });
        $(window).resize(function(){
            isotope();
        });
    }



    /*----------------------------------------------------------------------------------*/
    /* Contact Form AJAX validation and submission
     /* Validation Plugin : http://bassistance.de/jquery-plugins/jquery-plugin-validation/
     /* Form Ajax Plugin : http://www.malsup.com/jquery/form/
     /*---------------------------------------------------------------------------------- */
    if(jQuery().validate && jQuery().ajaxSubmit)
    {
        // Contact Form Handling
        var contact_options = {
            target: '#message-sent',
            beforeSubmit: function(){
                $('#contact-loader').fadeIn('fast');
                $('#message-sent').fadeOut('fast');
            },
            success: function(){
                $('#contact-loader').fadeOut('fast');
                $('#message-sent').fadeIn('fast');
                $('#contact-form .contact-form').resetForm();
            }
        };

        $('#contact-form .contact-form').validate({
            errorLabelContainer: $("div.error-container"),
            submitHandler: function(form) {
                $(form).ajaxSubmit(contact_options);
            }
        });

    }


    /*-----------------------------------------------------------------------------------*/
    /*	Responsive Nav
     /*-----------------------------------------------------------------------------------*/
    var navigation = responsiveNav("#nav");

});
