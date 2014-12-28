jQuery(document).ready(function(e){
	validacao.variaveis();
	validacao.init();
});

var validacao = {
    variaveis: function vars() {
        nome = "#nome"; //id do campo de nome
        email = "#email"; //id do campo de email
        url= "#url"; // id do campo de email
        mensagem = "#mensagem"; //id do campo de mensagem
    },

   init: function init() {
        validacao.addListener(nome, 'texto');
        validacao.addListener(email, 'email');
        validacao.addListener(url, 'texto');
        validacao.addListener(mensagem, 'mensagem');
    },

    addListener: function(id, tipo) {
        switch(tipo) {
            case 'texto': {
                jQuery(id).keyup(function(event) {
                    if (jQuery(this).val().length >= 4) { 
                        jQuery(this).removeClass('icon-error').addClass('icon-success');
                        jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', ':-)');
                    } else {
                        jQuery(this).removeClass('icon-success').addClass('icon-error');
                        jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', 'Nome inválido');
                    }
                }).focus(function(event){
                    jQuery(this).parent().addClass('hint--always');
                }).focusout(function(event){
                    jQuery(this).parent().removeClass('hint--always');
                });
                break;
            }
            case 'mensagem': {
                jQuery(id).keyup(function(event) {
                    if (jQuery(this).val().length >= 4) { 
                        jQuery(this).removeClass('icon-error').addClass('icon-success');
                        jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', ':-)');
                    } else {
                        jQuery(this).removeClass('icon-success').addClass('icon-error');
                        jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', 'Mensagem inválida');
                    }
                }).focus(function(event){
                    jQuery(this).parent().addClass('hint--always');
                }).focusout(function(event){
                    jQuery(this).parent().removeClass('hint--always');
                });
                break;
            }
            case 'email': {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                jQuery(id).keyup(function(event) {
                    if (regex.test(jQuery(this).val())) { 
                        jQuery(this).removeClass('icon-error').addClass('icon-success');
                        jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', ':-)');
                    } else {
                        jQuery(this).removeClass('icon-success').addClass('icon-error');
                        jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', 'Este não é um email válido');
                    }
                }).focus(function(event){
                    jQuery(this).parent().addClass('hint--always');
                }).focusout(function(event){
                    jQuery(this).parent().removeClass('hint--always');
                });
                break;
            }
        }
    }, 

    submits: function() {
		jQuery("#comment-submit").on('click', function(event){
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			jQuery(".comment-respond input[type=text], .comment-respond input[type=email], .comment-respond textarea").each(function(){ 
				if(jQuery(this).val() == '') {
					jQuery(this).removeClass('icon-success').addClass('icon-error');
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', 'Por favor, preencha este campo :(');
					event.preventDefault();
				} else if (regex.test(jQuery('.comment-respond input[type=email]'))) {
					jQuery('.comment-respond input[type=email]').removeClass('icon-success').addClass('icon-error');
					jQuery('.comment-respond input[type=email]').parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', 'Este não é um email válido :(');
					event.preventDefault();
				} else if (jQuery(".comment-respond textarea, .comment-respond input[type=text]").val().length <= 4) {
					jQuery(this).removeClass('icon-success').addClass('icon-error');
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', 'Este campo precisa ter pelo menos 4 caracteres ;)');
					event.preventDefault();
				} else {
					//nothing
				}
			});
		});
	}
}