(function($) {
    'use strict';

     // Mean Menu JS
     jQuery('.mean-menu').meanmenu({
        meanScreenWidth: "991"
    });

    // Navbar Area
    $(window).on('scroll', function() {
        if ($(this).scrollTop() >150){
            $('.navbar-area').addClass("sticky-nav");
        }
        else{
            $('.navbar-area').removeClass("sticky-nav");
        }
    });

    // Sidebar Modal JS
	$(".burger-menu").on('click',  function() {
		$('.sidebar-modal').toggleClass('active');
	});
	$(".sidebar-modal-close-btn").on('click',  function() {
		$('.sidebar-modal').removeClass('active');
    });

    // Others Option For Responsive JS
	$(".side-nav-responsive .dot-menu").on("click", function(){
		$(".side-nav-responsive .container .container").toggleClass("active");
    });

    // Slider Area
    $('.slider-area').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        nav: true,
        dots: false,
        thumbs: true,
		thumbsPrerendered: true,
        autoplay: true,
        autoplayHoverPause: true,
        navText: [
            "<i class='flaticon-left-arrow-2'></i>",
            "<i class='flaticon-chevron'></i>"
        ],
    })

    // Banner Slider
    $('.banner-slider').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        nav: true,
        dots: false,
        thumbs: true,
		thumbsPrerendered: true,
        autoplay: true,
        autoplayHoverPause: true,
        navText: [
            "<i class='flaticon-left-arrow-2'></i>",
            "<i class='flaticon-chevron'></i>"
        ],
    })

    // Banner Slider Two
    $('.banner-slider-two').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        navText: [
            "<i class='flaticon-left-arrow-1'></i>",
            "<i class='flaticon-right-arrow'></i>"
        ],
    })

    // Testimonials Slider
    $('.testimonials-slider').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        navText: [
            "<i class='flaticon-left-arrow-1'></i>",
            "<i class='flaticon-right-arrow'></i>"
        ],
    })

    // Service Slider
    $('.service-slider').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        navText: [
            "<i class='flaticon-left-arrow-1'></i>",
            "<i class='flaticon-right-arrow'></i>"
        ],
    })

    // Popup Video
    $('.popup-btn').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    // Search Botton
    $('.close-btn').on('click',function() {
        $('.search-overlay').fadeOut();
        $('.search-btn-2').show();
        $('.close-btn').removeClass('active');
    });
    $('.search-btn-2').on('click',function() {
        $(this).hide();
        $('.search-overlay').fadeIn();
        $('.close-btn').addClass('active');
    });

    // Tabs Single Page
    $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
    $('.tab ul.tabs li a').on('click', function (g) {
        var tab = $(this).closest('.tab'),
        index = $(this).closest('li').index();
        tab.find('ul.tabs > li').removeClass('current');
        $(this).closest('li').addClass('current');
        tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
        tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
        g.preventDefault();
    });

    // FAQ Accordion JS
	$('.accordion').find('.accordion-title').on('click', function(){
		// Adds Active Class
		$(this).toggleClass('active');
		// Expand or Collapse This Panel
		$(this).next().slideToggle('fast');
		// Hide The Other Panels
		$('.accordion-content').not($(this).next()).slideUp('fast');
		// Removes Active Class From Other Titles
		$('.accordion-title').not($(this)).removeClass('active');
    });

    // Input Plus & Minus Number JS
    $('.form-input-counter').each(function() {
        var spinner = jQuery(this),
        input = spinner.find('input[type="text"]'),
        btnUp = spinner.find('.plus-btn'),
        btnDown = spinner.find('.minus-btn'),
        min = input.attr('min'),
        max = input.attr('max');

        btnUp.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });

    // Input Plus & Minus Number JS
    $('.input-counter').each(function() {
        var spinner = jQuery(this),
        input = spinner.find('input[type="text"]'),
        btnUp = spinner.find('.plus-btn'),
        btnDown = spinner.find('.minus-btn'),
        min = input.attr('min'),
        max = input.attr('max');

        btnUp.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue -1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });

    // Nice Select JS
    $('select').niceSelect();

    // Count Time JS
	function makeTimer() {
		var endTime = new Date("september 30, 2022 17:00:00 PDT");
		var endTime = (Date.parse(endTime)) / 1000;
		var now = new Date();
		var now = (Date.parse(now) / 1000);
		var timeLeft = endTime - now;
		var days = Math.floor(timeLeft / 86400);
		var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
		var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
		var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
		if (hours < "10") { hours = "0" + hours; }
		if (minutes < "10") { minutes = "0" + minutes; }
		if (seconds < "10") { seconds = "0" + seconds; }
		$("#days").html(days + "<span>Days</span>");
		$("#hours").html(hours + "<span>Hours</span>");
		$("#minutes").html(minutes + "<span>Minutes</span>");
		$("#seconds").html(seconds + "<span>Seconds</span>");
	}
    setInterval(function() { makeTimer(); }, 300);

     // Subscribe form
     $(".newsletter-form").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // Handle The Invalid Form...
            formErrorSub();
            submitMSGSub(false, "Please enter your email correctly");
        } else {
            // Everything Looks Good!
            event.preventDefault();
        }
    });
    function callbackFunction (resp) {
        if (resp.result === "success") {
            formSuccessSub();
        }
        else {
            formErrorSub();
        }
    }
    function formSuccessSub(){
        $(".newsletter-form")[0].reset();
        submitMSGSub(true, "Thank you for subscribing!");
        setTimeout(function() {
            $("#validator-newsletter").addClass('hide');
        }, 4000)
    }
    function formErrorSub(){
        $(".newsletter-form").addClass("animated shake");
        setTimeout(function() {
            $(".newsletter-form").removeClass("animated shake");
        }, 1000)
    }
    function submitMSGSub(valid, msg){
        if(valid){
            var msgClasses = "validation-success";
        } else {
            var msgClasses = "validation-danger";
        }
        $("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
    }

    // Back To Top Js
    $('body').append('<div id="toTop" class="top-btn"><i class="fa-solid fa-chevron-up"></i></div>');
    $(window).on('scroll',function () {
        if ($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').on('click',function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    // Preloader JS
    jQuery(window).on('load',function(){
        jQuery(".preloader").fadeOut(500);
    });


})(jQuery);


