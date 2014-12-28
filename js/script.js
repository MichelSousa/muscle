jQuery(document).ready(function() {
	efeitos.init();
	muscle.init();	
});

var efeitos = {

	doing :false,

	init: function() {
		efeitos.scrolls();
		efeitos.sliderLP();
		//efeitos.associeSe();
		efeitos.clicklisteners();
		efeitos.menuRs();
		efeitos.loginBox();
		

		if (jQuery("#me").val() == "clubes") {
			efeitos.notLpListeners();
			efeitos.notLpInit();
		}
		if (jQuery("#me").val() == "equipes") {
			efeitos.equipe();
		}
		if(jQuery("#me").val() == "blog") {
			if (detectFF()) {
				jQuery("iframe[id^='oauth2relay']").css({"display": "none"});
			}
		}
	},

	scrolls: function() {
		jQuery('section#app').waypoint(function() {
			jQuery('.msg-app').each(function(i) {
	            jQuery(this).one().delay((i/8)*600).fadeIn(600);
	        });
		}, { offset: '50%' });
		jQuery('.clubes-content.active').waypoint(function() {
			jQuery("#" + jQuery(this).attr('id') + " .wrapper-featured").each(function(i) {
				jQuery(this).one().delay((i/8)*600).fadeIn(600);
			});
		}, { offset: '50%' });
	},

	sliderLP: function() {
		jQuery(".slides").slidesjs({
    		pagination: {
      			active: true,
        	    effect: "slide"
			},
       	    callback: {
				complete: function(number) {
					jQuery('.produto-nome').animate({'top': '118px'});
				}
			}
      	});
	},

	clicklisteners: function() {
		jQuery('.prevslider').on('click', function(event) {
			event.preventDefault();
			jQuery('.produto-nome').animate({'top': '0'}, function() {
				jQuery('.slidesjs-previous').trigger('click');
			});
		});

		jQuery('.nextslider').on('click', function(event) {
			event.preventDefault();
			jQuery('.produto-nome').animate({'top': '0'}, function() {
				jQuery('.slidesjs-next').trigger('click');
			});
		});

		jQuery('.submenu-clubes a').on('click', function(event) {
			event.preventDefault();
			jQuery('.clubes-content:not(#' + jQuery(this).attr('data-name') + ')').slideUp(600);
			jQuery('.clubes-content.active .wrapper-featured').fadeOut(200);
			jQuery('.clubes-content.active').slideUp(600, function(){
				jQuery(this).removeClass('active')
			});
			jQuery('.clubes-content#' + jQuery(this).attr('data-name')).slideDown(600).addClass('active');
			jQuery('.submenu-clubes a.active').removeClass('active');
			jQuery(this).addClass('active');
			jQuery("#" + jQuery(this).attr('data-name') + " .wrapper-featured").each(function(i) {
				jQuery(this).one().delay((i/8)*600).fadeIn(600);
			});
		});
		// efeito apenas na landing page
		if (parametros.pagename== 'home') {
			jQuery(window).on('scroll', function() {
				if (jQuery(window).scrollTop() >= 500) {
					jQuery("#menu").css({
						'position': 'fixed',
						'background-color': 'rgba(0, 0, 0, 0.498039)',
					});
					jQuery('#menu-left-wrapper img').css({
						'padding-top': '10px',
						'margin-bottom': '10px'
					});
					jQuery('#menu-top').css({
						'margin-top': '22px'
					});
					jQuery("#menu-top-mobile").css({
						'top': jQuery("#menu").height()
					});
				} else if (jQuery(window).scrollTop() == 0) {
					jQuery("#menu").css({
						'position': 'absolute',
						'background-color': 'transparent'
					});
					jQuery("#menu-left-wrapper img").css({
						'padding-top': '30px',
						'padding-bottom': '0'
					});
					jQuery("#menu-top").css({
						'margin-top': '40px'
					});
					jQuery("#menu-top-mobile").css({
						'top': jQuery("#menu").height()
					});
				}
			});
		}

		jQuery("#trigger-mobile-menu").on('click', function(){
			jQuery("#menu-top-mobile").slideToggle()
		});

		jQuery('.mapaclick').on('click', function(event){
			event.preventDefault();
		});
	}, 

	notLpListeners: function() {
		jQuery('img[usemap]').rwdImageMaps();
		jQuery('.wrapper-mapa area').on('click', function(){
			switch(jQuery(this).attr('id')) {
				case 'reboucas': {
					//sede reboucas -25.4535378, -49.2755421
					efeitos.maps(-25.4535378, -49.2755421);
					efeitos.wrapperslider('reboucas');
					jQuery(".slider-reboucas .slides").slidesjs({
    					pagination: {
      						active: true,
        				    effect: "slide"
					    }
      				});
					break;
				}
				case 'juveve': {
					//sede juveve -25.4070236, -49.2121961
					efeitos.maps(-25.4070236, -49.2121961);
					efeitos.wrapperslider('juveve');
					jQuery(".slider-juveve .slides").slidesjs({
    					pagination: {
      						active: true,
        				    effect: "slide"
					    }
      				});
					break;
				}
				case 'champagnat': {
					//sede champagnat -25.4353084, -49.3047141
					efeitos.maps(-25.4353084, -49.3047141);
					efeitos.wrapperslider('champagnat');
					jQuery(".slider-champagnat .slides").slidesjs({
    					pagination: {
      						active: true,
						    effect: "slide"
					    }
      				});
					break;
				}
				case 'portao': {
					//sede portao -25.4712944, -49.2916947
					efeitos.maps(-25.4712944, -49.2916947);
					efeitos.wrapperslider('portao');
					jQuery(".slider-portao .slides").slidesjs({
    					pagination: {
							active: true,
							effect: "slide"
					    }
      				});
					break;
				}
				case 'novomundo': {
					//sede novo mundo -25.4887984, -49.2933154
					efeitos.maps(-25.4887984, -49.2933154);
					efeitos.wrapperslider('novomundo');
					break;
				}
				default: {
					break;
				}
			}
		});
	},

	maps: function(lat, lng) {
		var mapOptions = {
			center: new google.maps.LatLng(lat, lng),
			zoom: 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			disableDefaultUI: true
		};
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		var marker = new google.maps.Marker({
			map: map,
			position: map.getCenter()
		});
	},

	wrapperslider: function(ids)	{
		jQuery('.sliderwrapper').slideUp(600);
		jQuery('.slider-' + ids).slideDown(600, function() {
			jQuery(".slide, .slidesjs-container").animate({"height":jQuery(this).height() + 20 + "px"});
		});
		jQuery(".slidesjs-next, .slidejs-previous").empty().append('<span></span>');
	},

	notLpInit: function() {
		jQuery(".slider-portao .slides").slidesjs({
    		pagination: {
				active: true,
				effect: "slide"
			}
      	});
      	jQuery(".sliderwrapper:not(.slider-portao)").removeClass('active');
      	var height = jQuery('.slide').height();
      	jQuery(".slide, .slidesjs-container").animate({"height": height + 60 + "px"});
      	jQuery(".slidesjs-next, .slidejs-previous").empty().append('<span></span>');
      	efeitos.maps(-25.4712944, -49.2916947);
	},

	equipe: function() {
		jQuery('.red-button').on('click', function(event) {
			event.preventDefault();
			var id = jQuery(this).attr('id');
			jQuery('html, body').animate({scrollTop:jQuery('.' + jQuery('.red-button.active').attr('id')).offset().top - 50}, '500', 'swing', function() {
				jQuery('.wrapper-professores.' + jQuery('.red-button.active').attr('id') + ' .nome-clube').fadeOut(600);
				jQuery('.wrapper-professores.' + jQuery('.red-button.active').attr('id') + ' .wrapper-bio-professor').each(function(i) {
					jQuery(this).one().delay((i/8)*600).fadeOut(600);
				});
				jQuery('.wrapper-professores.' + jQuery('.red-button.active').attr('id') + ' .wrapper-adiquira').fadeOut(600, function() {
					jQuery('.wrapper-professores.' + id + ' .nome-clube').css({'display': 'none'});
					jQuery('.wrapper-professores.' + id + ' .wrapper-bio-professor').each(function(i) {
						jQuery(this).css({'display': 'none'});
					});
					jQuery('.wrapper-professores.' + id + ' .wrapper-adiquira').css({'display': 'none'});
					jQuery('.wrapper-professores.' + jQuery('.red-button.active').attr('id')).removeClass('active');

					jQuery('.wrapper-professores.' + id).slideDown(600, function(){
						jQuery('.wrapper-professores.' + id + ' .nome-clube').fadeIn(600);
			 			jQuery('.wrapper-professores.' + id + ' .wrapper-bio-professor').each(function(i) {
			 				jQuery(this).one().delay((i/8)*600).fadeIn(600);
			 			});
			 			jQuery('.wrapper-professores.' + id + ' .wrapper-adiquira').fadeIn(600);
					}).addClass('active');
				});
				jQuery('.red-button').removeClass('active');
				jQuery("#" + id).addClass('active');
			});
		});
	},
	associeSe: function() {
		var up = jQuery("#title").parent().height();
		var down = jQuery("footer").height();
		jQuery(window).on("scroll", function() {
			if(jQuery(window).scrollTop() > up) {
				if (jQuery('.greenform').position().top > jQuery(window).scrollTop()) {
					jQuery('.wrapper-conhece').css({'margin-top': (jQuery(window).scrollTop()) + "px"});
				}
			} else if (jQuery(window).scrollTop() == 0) {
				jQuery('.wrapper-conhece').css({'margin-top': 0 + "px"});
			}
		});
	},
	menuRs:function(){
		// acao do menu dropdown do site
		jQuery(".user-action").on(
			'mouseover',function(){
				if(!efeitos.doing)
				{
					jQuery("#user-box").slideToggle({
						'duration':300,
						'easing':'swing',
						'queue':true,
						'start':function(){efeitos.doing=true;},
						'done':function(){efeitos.doing=false;}
						

					});
				}
			}
		);
		jQuery("#user-box").on(
			"mouseleave",function(){
				if(!efeitos.doing)
				{
					jQuery(this).slideToggle({
						'duration':300,
						'easing':'swing',
						'queue':true,
						'start':function(){efeitos.doing=true;},
						'done':function(){efeitos.doing=false;}
						
					});
				}
			}
		)
	},
	loginBox:function()
	{
		jQuery(".user-login-action").on(
			'click',function(e){
				e.preventDefault();
				if(!efeitos.doing)
				{
					jQuery("#user-login-box").slideToggle({
						'duration':300,
						'easing':'swing',
						'queue':true,
						'start':function(){efeitos.doing=true;},
						'done':function(){efeitos.doing=false;}
					});
				}
			}
		);
		jQuery("span.close").on(
			"click",function(){
				if(!efeitos.doing)
				{
					jQuery("#user-login-box").slideToggle({
						'duration':300,
						'easing':'swing',
						'queue':true,
						'start':function(){efeitos.doing=true;},
						'done':function(){efeitos.doing=false;}
						
					});
				}
			}
		);

		// efetua o login
		jQuery("#login-action").on(
			'click',function(e)
			{
				jQuery('#msg-login').show().text(ajax_login_object.loadingmessage);
		        jQuery.ajax({
		            type: 'POST',
		            dataType: 'json',
		            url: ajax_login_object.ajaxurl,
		            data: { 
		                'action': 'ajaxlogin', 
		                'username': jQuery('form#form-login #username').val(), 
		                'password': jQuery('form#form-login #password').val(), 
		                'security': jQuery('form#form-login #security').val() },
		            success: function(data){
		                jQuery('form#form-login #msg-login').text(data.message);
		                if (data.loggedin == true){
		                    document.location.href = ajax_login_object.redirecturl;
		                }
		            }
		        });
		        e.preventDefault();
			}
		);
	}

}

function between(x, min, max) {
	return x >= min && x <= max;
}

jQuery.fn.scrollBottom = function() { 
  return jQuery(document).height() - this.scrollTop() - this.height(); 
};

function detectFF() {
    var ua = window.navigator.userAgent;
    var firefox = ua.indexOf('Firefox ');
    var gecko = ua.indexOf('Gecko/');

    if (firefox > 0) {
    	return parseInt(ua.substring(firefox + 5, ua.indexOf('.', firefox)), 10);
    }

	if (gecko > 0) {
	    var rv = ua.indexOf('rv:');
	    return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
	}

	return false;
}

function detectIE() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
    	return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

	if (trident > 0) {
	    var rv = ua.indexOf('rv:');
	    return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
	}

	return false;
}

// rede social

var muscle = {
	init: function() {
		switch(jQuery("#me").val()) {
			case 'usr-1': {
				break;
			}
			case 'usr-2': {
				break;
			}
			case 'members': {
				this.selectpickr();
				this.listeners();
				break;
			}
		}
	},
	selectpickr: function() {
		jQuery('.selectpicker').selectpicker();
	},
	listeners: function() {
		jQuery("select#amigos.selectpicker").on('change', function(event) {
			
			jQuery('#recipients').val(jQuery("select#amigos.selectpicker option:selected").attr('data-id'));

			jQuery('.sendmsg .left img:not(.loading)').css({
				'opacity':'0'
			});

			if (jQuery("select#amigos.selectpicker option:selected").attr('data-id') == 0) {
				setTimeout(function() {
					jQuery('.sendmsg .left img:not(.loading)').attr('src', 'img/avatar-1.png').css({
						'opacity':'1'
					});
					jQuery("textarea").empty().trigger('focus');
				}, 500);
			} else {
				setTimeout(function() {
					jQuery.ajax({
						url: ajaxurl ,
						type: 'POST',
						data: {
							user_id: jQuery('#recipients').val(),
							action : 'buscar_avatar'
						},
						dataType: 'json'
					}).success(function(msg){

						jQuery('.sendmsg .left img:not(.loading)').attr('src', msg.avatar).css({
							'opacity':'1'
						});
						jQuery("#leftname").val(msg.nome);
						jQuery("#leftavatar").val(msg.avatar);
						jQuery("#sender span.nome").html(msg.nome);
						jQuery("textarea").val('').trigger('focus');
						
					});
				}, 500);
			}
		});

		// loading das mensagens particulares da rede social
		if(jQuery("#buddypress .mensagens")){
			jQuery(window).on('scroll', function() {
				if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height())  //chegou ao rodapé do site
				{
					if(jQuery(".middle-mensagens .hide")){
						
						jQuery("#loading-msg").removeClass("hide");
						var cont= 0;
						jQuery(".middle-mensagens .visuallyhidden").delay(800).each(
							function(){
								if(cont<3)
								{
									cont++;
									var box = jQuery(this);
									if (jQuery(this).hasClass('hidden')) {   
									    jQuery(this).removeClass('hidden');
									    setTimeout(function () {
									      box.removeClass('visuallyhidden');
									    }, 100);
									} else {									    
									    jQuery(this).addClass('visuallyhidden');									    
									    jQuery(this).one('transitionend', function(e) {
									      jQuery(this).addClass('hidden');

									    });									    
									}
														
								}
								else
								{									
									
									return false;
								}
							}
						);
						jQuery("#loading-msg").addClass("hide");
					}
					else{
						return false;
					}

				}
			});
		}

		jQuery(".box").matchHeight();

		jQuery(document).on('click', '.answer', function(event){
			event.preventDefault();
			var parent = jQuery(this).attr('data-id');
			jQuery("body").animate({scrollTop:0}, '500', 'swing', function() { 
				var dataID = jQuery("#" + parent).attr('data-amigo-id');
				var amigo = jQuery("select.selectpicker").find("[data-id='" + dataID + "']").val();
				var nomeAmigo = jQuery("#" + parent).attr('data-amigo');
				var thread_id = jQuery("#" + parent).attr('data-thread-id');
				jQuery("#recipients").val(dataID);
				jQuery("select.selectpicker").val(amigo);
				jQuery("select#amigos.selectpicker").trigger('change');
				jQuery(".filter-option").text(nomeAmigo);
				jQuery('textarea').val('').trigger('focus');
				jQuery("#acao").val("send_reply_message");
				jQuery("#thread_id").val(thread_id);
			});
		});
		
		
		jQuery('.send').on('click', function(event){
			event.preventDefault();
			if (validateForm() && !jQuery(this).hasClass('disabled')) {
				jQuery('textarea').attr('disabled', true);
				jQuery('.send').addClass('disabled');
				jQuery("#loading-send").css({
					'opacity': '1'
				});

				postData =              {sender_id: jQuery("#sender_id").val(),
				
										recipients: jQuery("#recipients").val(),
										content : jQuery("#message").val(),						
										action : jQuery("#acao").val(),
										thread_id:jQuery("#thread_id").val()
				};

				if(jQuery("#single")){
					postData.single=true;
				}

                


				jQuery.ajax({
					url:'http://visolutions.com.br/preview/muscleprime/wp-content/themes/muscleprime/php/sender_menssage.php',
					type: 'POST',
					data: postData
					
				})

			   
				
				.fail(function() {
					alert("error");
				})

				.success(function(resposta) {
					
					console.log(resposta);
					
					var id = generateID();
					var nome = jQuery("select#amigos.selectpicker").val();
					var dataID = jQuery("select#amigos.selectpicker option:selected").attr('data-id');
					var meuavatar = jQuery("#rightavatar").val();
					var meunome = jQuery("#rightname").val();
					var avatardele = jQuery("#leftavatar").val();
					var nomedele = jQuery("#leftname").val();
					var msg = jQuery("textarea").val();
					var status = jQuery("input[type=radio]:checked").val();
					var statusname = jQuery("input[type=radio]:checked").next().next().text();		
					
					// verificando quem solicitou a ação e retornando a div com a mensagem de maneira padronizada
					
					/*
					setInterval(function(){

                	      
								jQuery.ajax({
									url:'http://visolutions.com.br/preview/muscleprime/wp-content/themes/muscleprime/php/sender_menssage.php',
									type: 'POST',
									data: {enviar:"atualizar"},
									
								})
									.success(function( msg ) {
									    jQuery(".top-mensagens h1").html(msg)
									});


                     },200)
                       */

					
					if(resposta.single){						
					   
					   //jQuery(str).insertAfter('.sendmsg');
						
					}
					else
					{
						jQuery("#data").html(resposta);

						//jQuery('<div id="' + id + '" data-amigo="' + nome + '" data-id="' + dataID +'" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade msg incoming-msg"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding"><center><img src="' + meuavatar + '" alt="" class="responsive-img"></center></div><span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">'+ meunome + '</span></div><div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble msg lefty"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding"><div class="span">'+ msg + '</div></div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding radio"><img src="img/' + status + '.png" alt="" title="' + statusname + '"></div><a class="close">✕</a></div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bottom"><div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 no-padding conversation pull-left"><a href="#" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding conversation-link">Conversa Completa</a>	</div><div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right"><a href="#" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding answer" data-id="' + id + '">Responder</a></div></div></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding"><center><img src="' + avatardele + '" alt=""></center></div><span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">'+ nomedele + '</span></div></div>').insertAfter('.sendmsg');
					}
					

					jQuery('.sendmsg').animate({
						marginBottom: jQuery('#' + id).height(),
					}, 800, function() {
						jQuery('#' + id).css({
							'position':'relative',
							'margin-left':'0',
							'left':'0'
						});
						jQuery('.sendmsg').css({
							'margin-bottom': '0'
						});
						jQuery('#' + id).animate({
							'opacity': 1
						}, 800);
						jQuery("#loading-send").css({
							'opacity': '0'
						});
					});
					jQuery('textarea').attr('disabled', false);
					jQuery('.send').removeClass('disabled');
					jQuery('textarea').val('').trigger('focus');
					
				});
				
			} else {
				//nada
			}
		});
		jQuery('textarea').on('keydown', function(event){
			jQuery(this).removeClass('errorinput').attr('placeholder', 'Selecione um amigo e então escreva uma mensagem para ele!');
			if ((event.keyCode == 10 || event.keyCode == 13) && event.ctrlKey) {
				jQuery(".send").trigger('click');
			}
		});

		// envia um pedido de amizade
		jQuery(".friend-actions").on("click","a",function()
			{
				var fid = jQuery(this).attr('id');
				fid = fid.split('-');
				fid = fid[1];			

				action = (jQuery(this).attr('rel')=="add"?"add_as_friend":"remove_as_friend");

				jQuery.ajax({
					url: ajaxurl,
					type: 'POST',
					data: {
						'friend_id': fid,						
						'action' : action
					},
					dataType:"json"
				})
			}
		);


		// // recarrega a lista de membros
		// jQuery('.buttons-wrapper a').on( 'click', function(event) {	
		// 	if ( jQuery(this).hasClass('no-ajax') )
		// 		return;
		// 	event.preventDefault();
			
		// 	jQuery(this).parent().find("a").removeClass("selected");
		// 	jQuery(this).addClass("selected");

		// 	var css_id = jQuery(this).attr('id').split( '-' );
		// 	var object = css_id[0];

		// 	if ( 'activity' == object )
		// 		return false;
		// 	var scope = css_id[1];
		// 	var filter = jQuery("#" + object + "-order-select select").val();			
		// 	var search_terms = jQuery("#" + object + "_search").val();	
		// 	bp_filter_request( object, filter, scope, 'div.list-friends', search_terms, 1, jq.cookie('bp-' + object + '-extras') );

		// 	return false;	
			
		// });

		// pesquisa quando troco o filtro de ordem
		jQuery('#members-friends').on( 'change', function(event) {	
			
			//busco qual acção estou , antes de filtrar( meus amigos ou todos pos amigos)
			var obj = jQuery(".buttons-wrapper").find("a.selected");			

			var css_id = jQuery(obj).attr('id').split( '-' );
			var object = css_id[0];

			if ( 'activity' == object )
				return false;
			var scope = css_id[1];
			var filter = jQuery("#" + object + "-order-select select").val();			
			var search_terms = jQuery("#" + object + "_search").val();	
			bp_filter_request( object, filter, scope, 'div.list-friends', search_terms, 1, jq.cookie('bp-' + object + '-extras') );

			return false;	
			
		});

		//pesquisa no submit do form de pesquisa

		jQuery('#search-friends').on( 'submit', function(event) {	
			event.preventDefault();

			//busco qual acção estou , antes de filtrar( meus amigos ou todos pos amigos)
			var obj = jQuery(".buttons-wrapper").find("a.selected");			

			var css_id = jQuery(obj).attr('id').split( '-' );
			var object = css_id[0];

			if ( 'activity' == object )
				return false;
			var scope = css_id[1];
			var filter = jQuery("#" + object + "-order-select select").val();			
			var search_terms = jQuery("#" + object + "_search").val();	
			bp_filter_request( object, filter, scope, 'div.list-friends', search_terms, 1, jq.cookie('bp-' + object + '-extras') );

			return false;	
			
		});
	}	
}
function validateForm() {
	if ((jQuery("select#amigos.selectpicker option:selected").attr('data-id') == 0)) {
		jQuery('textarea').val('').attr('placeholder', 'Selecione um amigo para enviar a mensagem').addClass('errorinput');
		return false;
	} else if (jQuery('.bubble.msg textarea').val().length == 0) { 
		jQuery('textarea').val('').attr('placeholder', 'A mensagem não pode ficar vazia :(').addClass('errorinput');
		return false;
	} else {
		return true;
	}
}
function generateID() { 
	d = new Date();
	return date = "id-" + d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear() + "-" + d.getHours() + "-" + d.getMinutes() + "-" + d.getSeconds()  + "-" + d.getMilliseconds();
}