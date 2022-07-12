$(document).ready(function() {
    // Smooth Scroll To Elements
    $('.navbar li a.scroll').click(function(e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top - 80
        }, 1000);

    });

    // Add Active Class On Navbar Link and remove from siblings

    $('.navbar li a').click(function() {
        $('.navbar a').removeClass('active');
        $(this).addClass('active');
    });

    $(window).scroll(function() {

        //Sync Navbar Links With Sections

        $('.block').each(function() {
            if ($(window).scrollTop() > $(this).offset().top - 81) {
                //console.log($(this).attr('id'));
                var blockID = $(this).attr('id');
                $('.navbar a').removeClass('active');
                $('.navbar li a[data-scroll = "' + blockID + '"]').addClass('active');
            }
        });

        //////////////////////////////////////

        // Scroll-to-top button

        var scrollToTop = $('.scroll-to-top');
        if ($(window).scrollTop() > 1100) {
            if (scrollToTop.is(':hidden')) {
                scrollToTop.fadeIn(400);
            }
        } else {
            scrollToTop.fadeOut(400);
        }
    });

    ///////// SCROLL TOP BUTTUN ///////

    var scrollButton = $("#scroll-top");
    $(window).scroll(function() {
        //  console.log($(this).scrollTop());
        if ($(this).scrollTop() >= 800) {

            scrollButton.show();

        } else {
            scrollButton.hide();
        }

    });

    scrollButton.click(function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500);
    });



    //////////////////////////////////////
    ////////////////////// Add Active Class On nav Link of tab and remove from others

    $('.services .nav-tabs .nav-link').click(function() {
        $(this).addClass('active');
        $('.services .nav-tabs .nav-link').removeClass('active');

    });
     ///////////////////// Radio Buttuns

    $('.priceOfferForm .projectTime .radioLabel').click(function() {
        $('.priceOfferForm .projectTime .radioLabel').removeClass('selectedLabel');
        $(this).addClass('selectedLabel');

    });


        // Radio Buttuns

    $('.priceOfferForm .projectStart .radioLabel').click(function() {
        $('.priceOfferForm .projectStart .radioLabel').removeClass('selectedLabel');
        $(this).addClass('selectedLabel');

    });




    /////////// Navbar Scroll Styling//////////////////////////

    var myNavbar = $('.mainNavbar .bg-dark');

    $(window).scroll(function() {
        if ($(window).scrollTop() <= 80) {
            myNavbar.removeClass('navbar-scroll');

        } else {
            myNavbar.addClass('navbar-scroll');
        }
    });

    ////// use dropdown s list FLAGS ///////////
    $(".mobileNumber .dropdown-menu li").click(function() {
        var selText = $(this).find('.flag-icon');
        $(this).parents('.btn-group').find('.dropdown-toggle').html(selText);
    });

    ////// Home Quick Communication ///////
    $(".call-us").click(function() {

        $(".call-form").css({
            left: 0
        });

    });

    $(".call-form img").click(function() {

        $(".call-form").css({
            left: -348
        });

    });
    ////// use dropdown s list FLAGS ///////////
    $(".mobileNumber .dropdown-menu li").click(function() {
        var selText = $(this).find('.flag-icon');
        $(this).parents('.btn-group').find('.dropdown-toggle').html(selText);
    });
    ////// services-carousel Owl Carousel ///////////

    $('.services-carousel .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        smartSpeed: 600,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: true,
                dots: false
            }
        }
    });
    //////////////////////////////////////

    ////// partners Owl Carousel ///////////
    $('.partners .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        smartSpeed: 600,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: false,
                loop: true,
                dots: false
            }
        }
    });
    //////////////////////////////////////

    ////// clients Owl Carousel ///////////
    $('.footer .clients .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        smartSpeed: 600,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: true,
                dots: false
            }
        }
    });
    $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
    $(".owl-next").html('<i class="fa fa-chevron-right"></i>');
    //////////////////PricePfferForm////////////////////

    $('.projectType .btn-danger').click(function() {
        $('.projectType .btn-danger').siblings().removeClass('detect');
        $(this).addClass('detect');
    });

    $('.fromWhere .btn-danger').click(function() {
        $('.fromWhere .btn-danger').siblings().removeClass('detect');
        $(this).addClass('detect');
    });

    $('.chooseTime .btn-danger').click(function() {
        $('.chooseTime .btn-danger').siblings().removeClass('detect');
        $(this).addClass('detect');
    });



    $('#datepicker').datepicker({});
    $('#datepicker2').datepicker({});

    $('#datetimepicker3').datetimepicker({
        pickDate: false
    });

    ////// use dropdown s list FLAGS ///////////
    $(".clientType .dropdown-menu li").click(function() {
        var selText = $(this).find('i');
        $(this).parents('.btn-group').find('.dropdown-toggle').html(selText);
    });

    //////// JQuery Form ///////////

    $('.home .call-form .form-input').focus(function() {
        $(this).parents('.home .call-form .form-group').addClass('focused');
    });

    $('.home .call-form .form-input').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.home .call-form .form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });

    /////////////////////////////////////////////
    var input = document.querySelector("#phone");
    window.intlTelInput(input);

    var input = document.querySelector("#phone2");
    window.intlTelInput(input);

    /////////////////////// SLIDER RANGE ////////////////////////////

    $("#slider-range").slider({
        range: true,
        orientation: "horizontal",
        min: 0,
        max: 10000,
        values: [0, 10000],
        step: 100,

        slide: function(event, ui) {
            if (ui.values[0] == ui.values[1]) {
                return false;
            }

            $("#min_price").val(ui.values[0]);
            $("#max_price").val(ui.values[1]);
        }
    });

    $("#min_price").val($("#slider-range").slider("values", 0));
    $("#max_price").val($("#slider-range").slider("values", 1));


// Select Menu
 $("#clientSelect").selectmenu();
});