//LOADER
jQuery(window).on("load", function () {
   "use strict";
   jQuery(".loader").fadeOut(800);

});

$(document).ready(function(){
	var rtl = false;
    if($("html").attr("lang") == 'ar'){
         rtl = true;
    }


    /*open menu*/
    $(".hamburger").click(function(){
        $("body,html").addClass('menu-toggle');
        $(".hamburger").addClass('active');
    });
    $(".m-overlay").click(function(){
        $("body,html").removeClass('menu-toggle');
        $(".hamburger").removeClass('active');
    });
    /*header-fixed*/
    $(window).scroll(function(){
            
        if ($(window).scrollTop() >= 200) {
            $('#header').addClass('fixed-header');
        }
        else {
            $('#header').removeClass('fixed-header');
        }
              
    });

    $('.menu_xs a').on('click', function () {
        
        $('html, body').animate({
           
            scrollTop: $('#' + $(this).data('value')).offset().top
           
        }, 1000);
        
        $('body,html').removeClass('menu-toggle');
        
        $('.hamburger').removeClass('active');
        
    });
	$('#services_slide').owlCarousel({
            loop:true,
            margin:0,
            rtl:rtl,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                520:{
                    items:2,
                },
                767:{
                    items:3,
                    stagePadding: 0,
                },
                991:{
                    items:2,
                    stagePadding: 0,
                },
                1200:{
                    items:2,
                    stagePadding: 50,
                },
                
                1400:{
                    items:2,
                    stagePadding: 50,
                }

            },
            dots:true,
            nav:true,
            navText:['<i class="fal fa-long-arrow-right"></i>',
            '<i class="fal fa-long-arrow-left"></i>'],
            autoplay:false
    });


        var owl1 = $('#services_slide');
        owl1.owlCarousel();
        // Go to the next item
        $('.control_right').mouseover(function() {
            owl1.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.control_left').mouseover(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owl1.trigger('prev.owl.carousel', [300]);
        })

        


    $('#team_slider').owlCarousel({
            loop:true,
            margin:25,
            rtl:rtl,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                500:{
                    items:2,
                },
                600:{
                    items:3,
                },
                767:{
                    items:3,
                },
                991:{
                    items:4,
                }

            },
            dots:true,
            nav:true,
            navText:['<i class="fal fa-angle-right"></i>',
            '<i class="fal fa-angle-left"></i>'],
            autoplay:false
    });
    var owl4 = $('#team_slider');
        owl4.owlCarousel();
        // Go to the next item
        $('.control_right').mouseover(function() {
            owl4.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.control_left').mouseover(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owl4.trigger('prev.owl.carousel', [300]);
        })
    $('#clints_slider').owlCarousel({
            loop:true,
            margin:25,
            rtl:rtl,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                400:{
                    items:2,
                },
                600:{
                    items:3,
                },
                767:{
                    items:3,
                },
                991:{
                    items:4,
                }

            },
            dots:true,
            nav:true,
            navText:['<i class="fal fa-angle-right"></i>',
            '<i class="fal fa-angle-left"></i>'],
            autoplay:false
    });
    var owl3 = $('#clints_slider');
        owl3.owlCarousel();
        // Go to the next item
        $('.control_right').mouseover(function() {
            owl3.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.control_left').mouseover(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owl3.trigger('prev.owl.carousel', [300]);
        })

    $('#news_slider').owlCarousel({
            loop:true,
            
            rtl:rtl,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    margin:5,
                },
                520:{
                    items:2,
                    margin:5,
                },
                767:{
                    items:2,
                    stagePadding: 0,
                    margin:20,
                },
                991:{
                    items:2,
                    stagePadding: 0,
                    margin:20,
                },
                1200:{
                    items:3,
                    stagePadding: 0,
                    margin:20,
                }

            },
            dots:true,
            nav:true,
            navText:['<i class="fas fa-arrow-right"></i>',
            '<i class="fas fa-arrow-left"></i>'],
            autoplay:false
    });

    var owl2 = $('#news_slider');
        owl2.owlCarousel();
        // Go to the next item
        $('.control_right').mouseover(function() {
            owl2.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.control_left').mouseover(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owl2.trigger('prev.owl.carousel', [300]);
        })



    $("#rev_single").show().revolution({
      sliderType: "hero",
      jsFileLocation: "js/revolution",
      sliderLayout: "fullscreen",
      scrollbarDrag: "true",
      dottedOverlay: "none",
      delay: 9000,
      navigation: {},
      responsiveLevels: [1240, 1024, 778, 300],
      visibilityLevels: [1240, 1024, 778, 300],
      gridwidth: [1170, 1024, 778, 300],
      gridheight: [750, 700, 960, 720],
      lazyType: "none",
      parallax: {
         type: "scroll",
         origo: "slidercenter",
         speed: 400,
         levels: [10, 15, 20, 25, 30, 35, 40, -10, -15, -20, -25, -30, -35, -40, -45, 55]
      },
      shadow: 0,
      spinner: "off",
      autoHeight: "off",
      fullScreenAutoWidth: "off",
      fullScreenAlignForce: "off",
      fullScreenOffsetContainer: "",
      disableProgressBar: "on",
      hideThumbsOnMobile: "off",
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      debugMode: false,
      fallbacks: {
         simplifyAll: "off",
         disableFocusListener: false
      }
   });
})


if ( $('.et_pb_scroll_top').length ) {
    $(window).scroll(function(){
        if ($(this).scrollTop() > 800) {
            $('.et_pb_scroll_top').show().removeClass( 'et-hidden' ).addClass( 'et-visible' );
        } else {
            $('.et_pb_scroll_top').removeClass( 'et-visible' ).addClass( 'et-hidden' );
        }
    });

    //Click event to scroll to top
    $('.et_pb_scroll_top').click(function(){
        $('html, body').animate({scrollTop : 0},800);
    });
}





