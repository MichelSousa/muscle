(function (jQuery) {
    jQuery.fn.simpleSlider = function (params) {
        params = jQuery.extend({
            width: jQuery(this).width(),
            height: jQuery(this).height(),
            styleNav: true,
            navColor: "#555555",
            direction: "left",
            speed: 300,
            interval: 2000,
            navigation: true
        }, params);
        
        if(params.navigation == false)
            params.styleNav = false;

        // add some css
        jQuery(this).css({
            "position": "relative",
            "overflow": "hidden",
        });
        // create slider
        jQuery(this).html('<div style="position:absolute;" id="slides-container">' + jQuery(this).html() + '</div>');
        var count = jQuery(this).find('.slide').length;

        // this div
        var thisDiv = jQuery(this).attr("id");

        // check direction
        if (params.direction === "up") {
            var slidesWidth = params.width;
            var slidesHeigh = count * params.height;
        } else {
            var slidesWidth = count * params.width;
            var slidesHeigh = params.height;
        }


        jQuery(this).find('#slides-container').css({
            'width': slidesWidth,
            'height': slidesHeigh
        });

        
        if(params.navigation == true){
            // create navs
            jQuery(this).append('<div id="navigation"><span class="slider-nav prev"> > </span> <span class="slider-nav next"><</span></div>');

            // some css to navigation
            jQuery(this).find("#navigation").css({
                "position": "absolute",
                "top": "46%",
                "width": "100%",
            });
        }

        // some styles to slider items
        jQuery(this).find(".slide").each(function () {
            jQuery(this).css({
                "width": params.width,
                "height": params.height,
                "display": "block-inline",
                "float": "left",
            });
        });

        // if stylenav is true then add some styles
        if (params.styleNav == true) {

            jQuery(this).find(".slider-nav").each(function () {
                jQuery(this).css({
                    "background-color":  params.navColor,
                    "cursor": "pointer",
                    "color": "#FFFFFF",
                    "cursor": "pointer",
                    "font-family": "arial",
                    "font-size": "14px",
                    "font-weight": "bold",
                    "padding": "10px 15px",
                    "text-transform": "uppercase",
                    "position": "absolute",
                    "display": "block",
                });
            });

            jQuery(this).find(".prev").css("right", "0");
        };


        // some properties
        var pix = 0;

        // bind events
        if(params.navigation == true){
            jQuery(this).find(".prev").on("click", function () {

                if (params.direction !== "up") {

                    if (pix === slidesWidth || pix === (slidesWidth - params.width)) {
                        return;
                    }

                    pix = pix + params.width;

                        // slide left
                        slideLeft(pix);

                    } else {

                        // sldie up
                        if (pix === slidesHeigh || pix === (slidesHeigh - params.height)) {
                            return;
                        }

                        pix = pix + params.height;

                        // slide left
                        slideUp(pix);

                    }
                });

            jQuery(this).find(".next").on("click", function () {
                if (pix === 0) {
                    return;
                }

                if (params.direction !== "up") {

                    pix = pix - params.width;
                        // slide left
                        slideLeft(pix);

                    } else {

                        pix = pix - params.height;

                        // slide left
                        slideUp(pix);

                    }

                });
        }
        else{
            setInterval(function(){
                if (params.direction !== "up") {

                    if (pix === slidesWidth || pix === (slidesWidth - params.width)) {
                        pix = 0; //resets the slider when it reaches the last element
                        slideLeft(pix);
                        return;
                    }

                    pix = pix + params.width;

                        // slide left
                        slideLeft(pix);

                    } else {

                        // sldie up
                        if (pix === slidesHeigh || pix === (slidesHeigh - params.height)) {
                            pix = 0; //resets the slider when it reaches the last element
                            slideUp(pix);
                            return;
                        }

                        pix = pix + params.height;

                        // slide left
                        slideUp(pix);

                    }
            }, params.interval);
        }

        // function to do sliding left/right

        function slideLeft(pixels) {
            jQuery("#"+thisDiv+" #slides-container").animate({
                "left": '-' + pixels + 'px'
            }, params.speed);
        }

        // function to do sliding up/down
        function slideUp(pixels) {
            jQuery("#"+thisDiv+" #slides-container").animate({
                "top": '-' + pixels + 'px'
            }, params.speed);
        }

        // allow jQuery chaining
        return this;
    };

})(jQuery);
