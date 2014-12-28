jQuery(document).ready(function() {
	muscle.init();
});

var muscle = {
	init: function() {
		switch(jQuery("#me").val()) {
			case 'usr-1': {
				break;
			}
			case 'usr-2': {
				break;
			}
			case 'usr-3': {
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
			//alert(jQuery("select#amigos.selectpicker").val());
			jQuery('#id-send').val(jQuery("select#amigos.selectpicker option:selected").attr('data-id'));
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
						url: 'http://localhost/muscle/php/ajax.php',
						type: 'POST',
						data: {
							id: jQuery('#id-send').val()
						}
					}).success(function(msg){
						jQuery('.sendmsg .left img:not(.loading)').attr('src', msg).css({
							'opacity':'1'
						});
						jQuery("#leftavatar").val(msg);
						jQuery("textarea").val('').trigger('focus');
					});
				}, 500);
			}
		});
		jQuery(document).on('click', '.answer', function(event){
			event.preventDefault();
			var parent = jQuery(this).attr('data-id');
			jQuery("body").animate({scrollTop:0}, '500', 'swing', function() { 
				var dataID = jQuery("#" + parent).attr('data-id');
				var amigo = jQuery("select.selectpicker").find("[data-id='" + dataID + "']").val();
				jQuery("select.selectpicker").val(amigo);
				jQuery("select#amigos.selectpicker").trigger('change');
				jQuery(".filter-option").text(amigo);
   				jQuery('textarea').val('').trigger('focus');
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
				
			
				
				jQuery.ajax({
					url: 'http://localhost/muscle/php/ajax2.php',
					type: 'POST',
					data: {
						id: jQuery("#id-send").val(),
						msg: jQuery("textarea").val(),
						status: jQuery("input[type=radio]:checked").val(),
						side: 'righty'
					}
				})
				
				.fail(function() {
					console.log("error");
				})
				
				.success(function(msgs) {
					console.log(msgs);
					var id = generateID();
					var nome = jQuery("select#amigos.selectpicker").val();
					var dataID = jQuery("select#amigos.selectpicker option:selected").attr('data-id');
					var meuavatar = jQuery("#rightavatar").val();
					var meunome = jQuery("#rightname").val();
					var avatardele = jQuery("#leftavatar").val();
					var nomedele = jQuery("#rightname").val();
					var msg = jQuery("textarea").val();
					var status = jQuery("input[type=radio]:checked").val();
					var statusname = jQuery("input[type=radio]:checked").next().next().text();;
					jQuery('<div id="' + id + '" data-amigo="' + nome + '" data-id="' + dataID + '" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade msg incoming-msg"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding"><center><img src="' + meuavatar + '" alt=""></center></div><span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">' + meunome + '</span></div><div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble msg lefty"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding"><div class="span">' + msg + '</div></div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding radio"><img src="img/' + status + '.png" alt="" title="' + statusname + '"></div><a class="close">✕</a></div><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bottom"><div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 no-padding conversation pull-left"><a href="#" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding conversation-link">Conversa Completa</a></div><div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right"><a href="#" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding answer" data-id="' + id + '">Responder</a></div></div></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding"><center><img src="' + avatardele + '" alt=""></center></div><span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">' + nomedele + '</span></div></div>').insertAfter('.sendmsg');
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