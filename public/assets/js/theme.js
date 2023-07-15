(function ($) {
    'use strict';
    
    /*------------------------------------------------------
    /  01. All Carousels
    /------------------------------------------------------*/
    
    
    /*--- Hero Silder ---*/
    if($(".heroSlider01").length > 0){
       $('.heroSlider01').owlCarousel({
            autoplay: true,
            loop: true,
             margin: 0,
             animateOut: 'fadeOut', 
             animateIn: 'fadeIn', 
             active: true,
             autoplayHoverPause: false,
             nav: false,
             mouseDrag: true,
             smartSpeed: 1000,
             autoplayTimeout: 7000,
             dots: false,
             items: 1
        });
        $('.prevArrow').click(function(e){
            e.preventDefault();
            $('.heroSlider01').trigger('next.owl.carousel');
        });
        $('.nextArrow').click(function(e){
            e.preventDefault();
            $('.heroSlider01').trigger('prev.owl.carousel');
        });
    }
    if($(".heroSlider02").length > 0){
       $('.heroSlider02').owlCarousel({
             autoplay: true,
             loop: true,
             margin: 0,
             animateOut: 'fadeOut', 
             animateIn: 'fadeIn', 
             active: true,
             autoplayHoverPause: false,
             nav: false,
             mouseDrag: true,
             smartSpeed: 1000,
             autoplayTimeout: 7000,
             dots: false,
             items: 1
        });
        $('.prevArrow').click(function(e){
            e.preventDefault();
            $('.heroSlider02').trigger('next.owl.carousel');
        });
        $('.nextArrow').click(function(e){
            e.preventDefault();
            $('.heroSlider02').trigger('prev.owl.carousel');
        });
    }
    $('[data-bg-image]').each(function() {
        var $this = $(this),
            $image = $this.data('bg-image');
        $this.css('background-image', 'url(' + $image + ')');
    });
    /*--- Testimonial Silder ---*/
    if($(".testimonialSlider01").length > 0){
        $('.testimonialSlider01').owlCarousel({
             loop: false,
             margin: 0,
             responsiveClass: true,
             dots: true,
             autoplay: false,
             smartSpeed: 600,
             center: false,
             nav: false,
             items: 1
         });
    }
    if($(".testimonialSlider02").length > 0){
        $('.testimonialSlider02').owlCarousel({
             loop: false,
             margin: 24,
             responsiveClass: true,
             dots: true,
             autoplay: false,
             smartSpeed: 600,
             center: false,
             nav: false,
             items: 2,
             responsive:{
                 0:{
                    items: 1
                 },
                 991:{
                    items: 2
                 }
             }
         });
    }
    /*-- Service Slider --*/
    if($(".serviceSlider").length > 0){
        $(".serviceSlider").owlCarousel({
            margin: 24,
            loop: true,
            nav: true,
            navText: ['<i class="flaticon-right-arrow-angle"></i>', '<i class="flaticon-right-arrow-angle"></i>'],
            dots: false,
            items: 4,
            responsiveClass:true,
            responsive:{
                0:{
                    items: 1
                },
                576:{
                    items: 2
                },
                991:{
                    items: 3
                },
                1200:{
                    items: 4
                }
            }
        });
    }
   /*-- Country Slider --*/
   if($(".countrySlider").length > 0){
        $(".countrySlider").owlCarousel({
            margin: 24,
            autoplay: true,
            smartSpeed: 500,
            loop: true,
            nav: true,
            navText: ['<i class="flaticon-right-arrow-angle"></i>', '<i class="flaticon-right-arrow-angle"></i>'],
            dots: false,
            items: 4,
            responsiveClass:true,
            responsive:{
                0:{
                    items: 1
                },
                576:{
                    items: 2
                },
                991:{
                    items: 3
                },
                1200:{
                    items: 3
                }
            }
        });
    }
   /*-- Coaching Slider --*/
   if($(".coachingSlider").length > 0){
        $(".coachingSlider").owlCarousel({
            margin: 24,
            loop: true,
            nav: true,
            navText: ['<i class="flaticon-right-arrow-angle"></i>', '<i class="flaticon-right-arrow-angle"></i>'],
            dots: false,
            items: 3,
            responsiveClass:true,
            responsive:{
                0:{
                    items: 1
                },
                576:{
                    items: 2
                },
                991:{
                    items: 3
                },
            }
        });
    }

    /*--------------------------------------------------------
    / 02. All PopUP
    /--------------------------------------------------------*/
    $('.popup_video').lightcase({
        transition: 'elastic',
        showSequenceInfo: false,
        slideshow: false,
        swipe: true,
        showTitle: false,
        showCaption: false,
        controls: true
    });
    $('.popup_img').lightcase({
        transition: 'elastic',
        showSequenceInfo: false,
        slideshow: true,
        swipe: true,
        showTitle: false,
        controls: true
    });
    
    /*--------------------------------------------------------
    / 03. Sticky Header
    /---------------------------------------------------------*/
    if($(".isSticky").length > 0){
        var header_height = $(".isSticky").height();
        $(window).on('scroll', function(){
            if($(window).scrollTop() > 300)
            {
                $('.blanks').css('height', header_height);
                $(".isSticky").addClass('fixedHeader animated slideInDown');
            }else
            {
                $('.blanks').css('height', '0');
                $(".isSticky").removeClass('fixedHeader animated slideInDown');
            }
        });
    }
    
    /*--------------------------------------------------------
    /   04. Back To Top
    /--------------------------------------------------------*/
    function backtotop() {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 50) {
                $('#backtotop').addClass('activate');
            } else {
                $('#backtotop').removeClass('activate');
            }
        });
        $('#backtotop').on('click', function () {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
    }
    backtotop();

    /*--------------------------------------------------------
    / 05. Select
    /---------------------------------------------------------*/
    if ($('.contactForm select').length > 0) {
        $('.contactForm select').niceSelect();
        $('.contactForm select').parent().addClass('select-area');
    };

    /*--------------------------------------------------------
    / 06. Strech Column
    /---------------------------------------------------------*/
    tj_stretch();
    function tj_stretch() {
        var i = $(window).width();
        $(".row .tj-stretch-element-inside-column").each(function() {
            var $this = $(this),
                row = $this.closest(".row"),
                cols = $this.closest('[class^="col-"]'),
                colsheight = $this.closest('[class^="col-"]').height(),
                rect = this.getBoundingClientRect(),
                l = row[0].getBoundingClientRect(),
                s = cols[0].getBoundingClientRect(),
                r = rect.left,
                d = i - rect.right,
                c = l.left + (parseFloat(row.css("padding-left")) || 0),
                u = i - l.right + (parseFloat(row.css("padding-right")) || 0),
                p = s.left,
                f = i - s.right,
                styles = {
                    "margin-left": 0,
                    "margin-right": 0
                };
            if (Math.round(c) === Math.round(p)) {
                var h = parseFloat($this.css("margin-left") || 0);
                styles["margin-left"] = h - r;
            }
            if (Math.round(u) === Math.round(f)) {
                var w = parseFloat($this.css("margin-right") || 0);
                styles["margin-right"] = w - d;
            }
            $this.css(styles);
        });
    }
    /*--------------------------------------------------------
    /  07. Preloader
    /---------------------------------------------------------*/
    $(window).on('load', function () {
        $('.preloader').delay(500).fadeOut('slow');
    });
    if ($('.preloader').length > 0) {
        $('.closeLoader').each(function () {
          $(this).on('click', function (e) {
            e.preventDefault();
            $('.preloader').delay(500).fadeOut('slow');
          })
        });
    };
    /*----------------------------------------------------------
    / 08. Widget Toggler
    /----------------------------------------------------------*/
    $('.popupBtn').on('click', function (e) {
        e.preventDefault();
        $('.popupSidebarSsec').toggleClass('active');
    });
    $('.popupSidebarOverlay, .widgetCloser').on('click', function () {
        $('.popupSidebarSsec').removeClass('active');
    });

    /*----------------------------------------------------------
    / 09. Search Toggler
    /----------------------------------------------------------*/
    $('.searchBtn').on('click', function (e) {
        e.preventDefault();
        $('.popupSearchSec').toggleClass('active');
    });
    $('.popupSearchOverlay, .popupClose').on('click', function () {
        $('.popupSearchSec').removeClass('active');
    });
    
    /*--------------------------------------------------------
    / 10. Accordina Toggler
    /--------------------------------------------------------*/
    $('.tmjAccordion .card-header').on('click', function () {
        var $this = $(this);
        $('.tmjAccordion .card').removeClass('active');
        if ($('.title', $this)) {
            $this.parent('.faqInner').parent('.card').addClass('active');
        } else {
            $this.parent('.faqInner').parent('.card').removeClass('active');
        }
    });
    /*--------------------------------------------------------
    / 11. Funfact Count
    /---------------------------------------------------------*/
    if($('.count-box').length){
		$('.count-box').appear(function(){
			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);
			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function() {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function() {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}
		},{accY: 0});
	}

    /*--------------------------------------------------------
    / 12. Typing Animation
    /---------------------------------------------------------*/
     var TxtType = function (el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };
    TxtType.prototype.tick = function () {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) {
            delta /= 2;
        }
        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function () {
            that.tick();
        }, delta);
    };
    window.onload = function () {
        var elements = document.getElementsByClassName('typewrite');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
    };

    /*--------------------------------------------------------
    / 13. Progress Bar Animation
    /---------------------------------------------------------*/
    if ($(".count-bar").length) {
		$(".count-bar").appear(
			function () {
					var el = $(this);
					var percent = el.data("percent");
					$(el).css("width", percent).addClass("counted");
				}, {
					accY: -50
			}
		);
	}

    /*--------------------------------------------------------
    / 14. Count Down
    /----------------------------------------------------------*/
    if ($('.commoncount').length > 0) {
        var d = $('.commoncount').attr('data-day');
        var m = $('.commoncount').attr('data-month');
        var y = $('.commoncount').attr('data-year');
        $('.commoncount').countdown({
            until: new Date(y, m - 1, d),
            format: 'DHMS'
        });
    }

    /*--------------------------------------------------------
    / 15. Mobile Menu
    /----------------------------------------------------------*/
    $('.mainMenu ul li.menu-item-has-children > a').on('click', function(e){
        e.preventDefault();
        if($(window).width() < 1366){
            $(this).siblings('.sub-menu, .megaMenu').slideToggle();
        }
    });
    $('.menuBtn').on('click', function(e){
        e.preventDefault();
        $('.mainMenu').slideToggle();
        $(this).toggleClass('active');
    });
    /*--------------------------------------------------------
    / 16. Contact Form Submission
    /----------------------------------------------------------*/
    // Check Your Eligibility Form 1
    $('form[id="eligibility_form_1"]').validate({
        rules: {
            firstName: 'required',
            conEmail: {
                required: true,
                email: true,
            },
            conPhone: 'required',
            conVisa: 'required',
        },

        messages: {
            firstName: 'Enter your full name.',
            conEmail: 'Enter a valid email.',
            conPhone: 'Enter your phone.',
            conVisa: 'Select your visa.',
        },
        submitHandler: function(form) {
            // start ajax request 
            $.ajax({
                type: "POST",
                url: "assets/mail/eligibility-form-1.php",
                data: $('#eligibility_form_1').serialize(),
                cache: false,
                success: function (data) {
                    if(data == 'Y'){
                        $("#message_sent").modal('show');
                        $('#eligibility_form_1').trigger("reset");
                    }
                    else{
                        $("#message_fail").modal('show');
                    }
                }
            });
            
        }
    }); 

    // Check Your Eligibility Form 2 (Hero Section)
    $('form[id="eligibility_form_2"]').validate({
        rules: {
            firstName: 'required',
            conEmail: {
                required: true,
                email: true,
            },
        },

        messages: {
            firstName: 'Enter your full name.',
            conEmail: 'Enter a valid email.',
        },
        submitHandler: function(form) {
            // start ajax request 
            $.ajax({
                type: "POST",
                url: "assets/mail/eligibility-form-2.php",
                data: $('#eligibility_form_2').serialize(),
                cache: false,
                success: function (data) {
                    if(data == 'Y'){
                        $("#message_sent").modal('show');
                        $('#eligibility_form_2').trigger("reset");
                    }
                    else{
                        $("#message_fail").modal('show');
                    }
                }
            });
            
        }
    }); 

    // Contact Form
    $('form[id="contact_form"]').validate({
        rules: {
            firstName: 'required',
            conEmail: {
                required: true,
                email: true,
            },
            conSubject: 'required',
        },

        messages: {
            firstName: 'Enter your full name.',
            conEmail: 'Enter a valid email.',
            conSubject: 'Enter your Subject.',
        },
        submitHandler: function(form) {
            // start ajax request 
            $.ajax({
                type: "POST",
                url: "assets/mail/contact-form.php",
                data: $('#contact_form').serialize(),
                cache: false,
                success: function (data) {
                    if(data == 'Y'){
                        $("#message_sent").modal('show');
                        $('#contact_form').trigger("reset");
                    }
                    else{
                        $("#message_fail").modal('show');
                    }
                }
            });
            
        }
    }); 


    // Partners - Accreditation Carousel
    if($(".owl-carousel").length > 0){
        $('.owl-carousel').owlCarousel({
            autoplay: true,
            loop:true,
            margin:10,
            dots:true,
            nav:false,
            responsive:{
                0:{
                    items:3
                },
                600:{
                    items:4
                },
                1000:{
                    items:9
                }
            }
        });
    }

    // Partners - Accreditation Carousel
    $('.owl-carousel1').owlCarousel({
        autoplay: true,
        loop:true,
        margin:10,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    
})(jQuery);