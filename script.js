jQuery(document).ready(function() {


    var accItem = document.getElementsByClassName('accordionItem');
    var accHD = document.getElementsByClassName('accordionItemHeading');
    for (i = 0; i < accHD.length; i++) {
        accHD[i].addEventListener('click', toggleItem, false);
    }
    function toggleItem() { 
        var itemClass = this.parentNode.className;
        for (i = 0; i < accItem.length; i++) {
            accItem[i].className = 'accordionItem close';
        }
        if (itemClass == 'accordionItem close') {
            this.parentNode.className = 'accordionItem open';
        }
    }

  
         /*jQuery('.frm_checkbox label').click(function() {
        console.log("checkbox label");
            let checkbox = jQuery(this).prev('input[type="checkbox"]');
             let spanElement = jQuery(this).find('span'); // Find the span inside label

             checkbox.prop('checked', !checkbox.prop('checked'));

        // Toggle the "checked" class on the span
        spanElement.toggleClass("checked");
        });*/
   



    jQuery("input[type='radio'], input[type='checkbox']").uniform();
    jQuery('select').selectBox({
        mobile: true,
        menuSpeed: 'normal',
        keepInViewport: false
    });

    jQuery('.feature-insights').on('scroll',function() {
            console.log('you have scrolled to the h1!');
    });

    jQuery('.play_btn').on('click', function(e) {
         e.preventDefault();
         jQuery('body').addClass('pull_right');
         jQuery('.overlay_main_sec').addClass('active');
    
     });
    jQuery('.popup-youtube').on('click', function(e) {
         e.preventDefault();
         jQuery('body').addClass('pull_right');
         jQuery('.overlay_main_sec').addClass('active');
    
     });
    jQuery('.connect_close').on('click', function() {
         jQuery('body').removeClass('pull_right');
         jQuery('.overlay_main_sec').removeClass('active');
         jQuery('#formid video').remove();
         location.reload(); 
    });


    /* Fixed Header*/
    if (jQuery(window).width() >= 320) {
        jQuery(window).on("scroll", function() {
            var scroll = jQuery(this).scrollTop();
            if (scroll >= 5) {
                jQuery("#main-header").addClass("fixed-header");
            } else {
                jQuery("#main-header").removeClass("fixed-header");
            }
        });
    }
    /* End */
    if (jQuery(window).width() >= 1024) {
        if (jQuery(".template-single-main").length > 0) {
            jQuery(window).on("scroll", function() {
                var scroll = jQuery(this).scrollTop() + 92;
                var height = jQuery(".hero_banner_section").outerHeight(true);
                var scrollMore = jQuery(".template-single-main").outerHeight(true);
                var totalScroll = height + scrollMore - 327;

                if (scroll >= height & scroll <= totalScroll) {
                    jQuery(".template-single-main").addClass("active");
                    jQuery(".template-single-main").removeClass("hidden");
                }
                else if(scroll >= totalScroll){
                    jQuery(".template-single-main").addClass("hidden");
                }
                else{
                    jQuery(".template-single-main").removeClass("active");
                }
            });
        }
    }

    jQuery('.positions-slider').slick({
        autoplay: false,
        speed: 1000,
        dots: false,
        infinite: false,
        slidesToScroll: 1,
        variableWidth: true,
        arrows: false,
        draggable: true,
        touchThreshold:400,
        swipeToSlide: true,
    });

    jQuery('.def-slider-wrap').slick({
        autoplay: true,
        speed: 1000,
        dots: true,
        slidesToShow: 1,
        arrows: true,
        infinite: true,
        draggable: true,
        touchThreshold: 200,
        swipeToSlide: true,
        responsive: [{

            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                arrows: false,
                centerMode: true,
                centerPadding: '8px',
            }
        }, ]
    });

    jQuery('.toggle-head').click(function() {
        jQuery(this).parent().toggleClass('close').find('.search-filter').slideToggle('500');
    });

    jQuery('.drophead').on('click', function(e) {
        e.preventDefault();

        // Add the correct active class
        if (jQuery(this).closest('.buckets').hasClass('active')) {
            // Remove active classes
            jQuery('.buckets').removeClass('active');
        } else {
            // Remove active classes
            jQuery('.buckets').removeClass('active');

            // Add the active class
            jQuery(this).closest('.buckets').addClass('active');
        }

        // Show the content
        var jQuerycontent = jQuery(this).next();
        jQuerycontent.slideToggle(300);
        jQuery('.buckets .bucket-cnt').not(jQuerycontent).slideUp('slow');
    });

    if (jQuery(window).width() <= 1023) {
        jQuery(".toggle_button").on("click", function(event) {
            event.preventDefault();
            jQuery(this).toggleClass("active");
            jQuery(".mobile_menu").toggleClass("navOpen");
        });
        jQuery("ul.main_menu > li.menu-item-has-children > a").on("click", function(event) {
            event.preventDefault();
            jQuery('ul.main_menu > li.menu-item-has-children > a').not(jQuery(this)).removeClass('active');
            jQuery(this).toggleClass("active");

            jQuery(this).parents('.main_menu').siblings().find('li.menu-item-has-children').children("ul.sub-menu").hide('900');

            jQuery(this).siblings('ul.sub-menu').slideToggle('900');


            var topParent = jQuery(this).parents('ul.main_menu > li').attr('id');
            var topChildParent = jQuery(this).parent('li').attr('id');

            jQuery('ul.main_menu ul.sub-menu').each(function() {
                if (jQuery(this).parents('ul.main_menu > li').attr('id') !== topParent) {
                    jQuery(this).slideUp('700');
                } else {
                    if (jQuery(this).find('li.menu-item-has-children').length) {
                        getChild(jQuery(this).find('li.menu-item-has-children'), topChildParent);
                    }
                }
            });
        });

        function getChild(obj, topChildParent) {
            obj.each(function() {
                if (jQuery(this).attr('id') !== topChildParent) {
                    jQuery(this).find('ul.sub-menu').slideUp('700');
                }
            });
        }
    }

    jQuery('a[href*="#"]:not([href="#"])').click(function() {
      var target = jQuery(this.hash);
        jQuery('html,body').stop().animate({
          scrollTop: target.offset().top - 90
        },1500,'linear');   
    });    
    if (location.hash){
        var id = jQuery(location.hash);
    }
    if (location.hash){
        jQuery('html,body').animate({scrollTop: id.offset().top -90}, 1500,'linear')
    };
    




});

if (jQuery(window).width() >= 1024) {
    function sticky_relocatecarrer() {
        var window_ttop = jQuery(window).scrollTop();
        var sanchor = jQuery('#sticky-anchor');
        var sstop = jQuery('#sticky-stop');
        var div_top = "";
        var div_stop = "";
        if (sanchor.length) {
            div_top = sanchor.offset().top - 150;
        }
        if (sstop.length) {
            div_stop = sstop.offset().top - 392;
        }
        if (window_ttop > div_top && window_ttop < div_stop) {
            jQuery('.sticky-right').addClass('stick');
        } else {
            jQuery('.sticky-right').removeClass('stick');
        }
        if (window_ttop > div_stop) {
            jQuery('.sticky-right').addClass('stick-fixed');
        } else {
            jQuery('.sticky-right').removeClass('stick-fixed');
        }
    }

    jQuery(function() {
        jQuery(window).scroll(sticky_relocatecarrer);
        sticky_relocatecarrer();
    });

    jQuery( ".accordion" ).accordion({
        active: false,
        collapsible: true,
        heightStyle: "content"
    });
}

