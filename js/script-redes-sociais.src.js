jQuery(document).ready(function(){
    redesSociais.starting();
    redesSociais.botoes();
    redesSociais.enviar();
    redesSociais.mask();
    redesSociais.ajaxes();
});

var redesSociais = {
    starting: function() {
        jQuery('.social-icon').each(function(i) {
            jQuery(this).delay((i/8)*600).fadeIn(600);
        });
    },

    botoes: function() {
        [].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
            new ProgressButton( bttn, {
                callback : function( instance ) {
                    var progress = 0,
                    interval = setInterval( function() {
                        progress = Math.min( progress + Math.random() * 0.3, 1 );
                        instance._setProgress( progress );
                        if( progress === 1 ) {
                            instance._stop(1);
                            clearInterval( interval );
                        }
                    }, 200 );
                }
            } );
        } );
    },

    enviar: function() {
        jQuery(".social-link").on('click', function(){
        	jQuery(".social-link:not(.active)").css({"-webkit-filter":"blur(0px)", "-moz-filter":"blur(0px)", "filter":"blur(0px)", "-ms-filter":"blur(0px)", "-o-filter":"blur(0px)"});
            jQuery('.inputwrapper').slideUp(400);
            jQuery('.social-link').removeClass('active');
            jQuery('.social-link span').removeClass('before');
            jQuery("#" + jQuery(this).attr('id') + "wrapper").delay(400).slideDown(400);
            id = "#" + jQuery(this).attr('id');
            setTimeout(function() {
                jQuery(id + " span").addClass('before');
            }, 400);
            jQuery(this).addClass('active');
            jQuery(".social-link:not(.active)").css({"-webkit-filter":"blur(1px)", "-moz-filter":"blur(1px)", "filter":"blur(1px)", "-ms-filter":"blur(1px)", "-o-filter":"blur(1px)"});
        });
    },

    mask: function() {
        jQuery("#facebookinput").mask("http://facebook.com/AAAAAAAAAAAAAAAAAAAAAAAA");
        jQuery("#twitterinput").mask("http://twitter.com/AAAAAAAAAAAAAAAAAAAAAAAA");
        jQuery("#youtubeinput").mask("https://www.youtube.com/user/AAAAAAAAAAAAAAAAAAAAAAAA");
        jQuery("#instagraminput").mask("https://www.instagram.com/AAAAAAAAAAAAAAAAAAAAAAAA");
        jQuery("#flickrinput").mask("http://www.flickr.com/photos/AAAAAAAAAAAAAAAAAAAAAAAA");
        jQuery("#googleplusinput").mask("http://plus.google.com/+AAAAAAAAAAAAAAAAAAAAAAAA");
        jQuery("#pinterestinput").mask("http://pinterest.com/AAAAAAAAAAAAAAAAAAAAAAAA");
    },

    ajaxes: function() {
        jQuery('.send').on('click',function() {
            if (!jQuery(this).prev().prev().val() == '') {
                jQuery.ajax({
                     url: jQuery("#formtarget").val() + '/inc/visolutions/vi-plugin/redes-sociais/db-access.php',
                     type: 'POST',
                     data: {
                        funcao: 'form',
                        functions: 'add',
                        val: jQuery(this).prev().prev().val(),
                        social: jQuery(this).prev().prev().attr('data-form')
                     }
                 });
                jQuery("#" + jQuery(this).prev().prev().attr('data-form')).addClass('exists');
                jQuery("#" + jQuery(this).prev().attr('data-form') + "remove").animate({opacity: 1}).css({'cursor':'pointer'});
            }
        });
        jQuery('.remove-social').on('click', function() {
            id = jQuery(this).attr('id');
            if (!jQuery(this).prev().val() == '') {
                jQuery.ajax({
                     url: jQuery("#formtarget").val() + '/inc/visolutions/vi-plugin/redes-sociais/db-access.php',
                     type: 'POST',
                     data: {
                        funcao: 'form',
                        functions: 'add',
                        val: '',
                        social: jQuery(this).attr('data-form')
                     }
                 })
                .done(function() {
                    jQuery("#" + id).prev().val('');
                    jQuery("#" + id).css({background: "green", 'cursor':'pointer'}).html('&#10003;');
                    jQuery("#" + jQuery("#" + id).attr('data-form')).removeClass('exists');
                    setTimeout(function() {
                        jQuery("#" + id).css({background: "red", 'cursor':'default', opacity: "0"}).html('x');
                    }, 1000);
                });
            }
        });
    jQuery('#social-wrapper').children().on('click', function(e) {
    		if (jQuery(this).children().attr('id') == undefined) {
				jQuery('.inputwrapper').slideUp(400);
	            jQuery('.social-link').removeClass('active');
	            jQuery('.social-link span').removeClass('before');
	            jQuery(".social-link:not(.active)").css({"-webkit-filter":"blur(0px)", "-moz-filter":"blur(0px)", "filter":"blur(0px)", "-ms-filter":"blur(0px)", "-o-filter":"blur(0px)"});
    		} else if (jQuery(this).children().children().attr('id') ==
    					"facebook"||
    					"googleplus"||
    					"twitter"||
    					"youtube"||
    					"pinterest"||
    					"flickr"||
    					"tumblr"||
    					"instagram"||
    					"linkedin"||
    					"facebooksend"||
    					"facebookremove"||
    					"facebookinput"||
    					"googleplussend"||
    					"googleplusremove"||
    					"googleplusinput"||
    					"twittersend"||
    					"twitterremove"||
    					"twittersend"||
    					"youtubesend"||
    					"youtuberemove"||
    					"youtubeinput"||
    					"pinterestinput"||
    					"pinterestremove"||
    					"pinterestsend"||
    					"flickrremove"||
    					"flickrsend"||
    					"flickrremove"||
    					"tumblrremove"||
    					"tumblrsend"||
    					"tumblrinput"||
    					"instagramsend"||
    					"instagramremove"||
    					"instagraminput"||
    					"linkedinremove"||
    					"linkedinsend"||
    					"linkedinremove"
    		) {
            	//nothing
            }
            e.stopPropagation();
    });
	jQuery('#social-wrapper').on('click', function(){
		jQuery('.inputwrapper').slideUp(400);
	    jQuery('.social-link').removeClass('active');
		jQuery('.social-link span').removeClass('before');
		jQuery(".social-link:not(.active)").css({"-webkit-filter":"blur(0px)", "-moz-filter":"blur(0px)", "filter":"blur(0px)", "-ms-filter":"blur(0px)", "-o-filter":"blur(0px)"});
	});
	jQuery(window).keypress(function(e) {
	if (jQuery(".social-input").is(":focus")) {
	    if(e.which == 13) {
	        jQuery(jQuery(this).attr('id') + "input").next().next().trigger('click');
	    }
	}
});

}
}
