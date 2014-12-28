/*
	Script funciona como validação , basta seguir uma métrica de atributos e classes nos imputs , para o funcionamento correto 
	
	Ex.:
		<fieldset>
			<p>Nome <span style="color: red;">*</span></p>					
			<input type="text" placeholder="Ana Maria" value="" class=" nome email full padding-0 required" name="nome" data-validation-err="Informe um nome válido" data-validation-ok=":-)" data-validation-msg="Informe seu nome :-)">				
		</fieldset>
		
		Atributos importantes 
		'class':
			"required"  => valida campos usando regra para não permitir campos em branco
			"email" 	=> valida campos usando regra para não permitir email inválido

		data-validation-err => Texto que aparece dentro do hint quando o campo é prenchido com valores incorretos , ou não é preenchido
		data-validation-ok	=> Texto que aparece quando o campo passa pela validação sem problemas
		data-validation-msg	=> Texto informativo com instruções para o preenchimento correto do campo

*/
jQuery(document).ready(function(){
	jQuery('input[type=text].required:not(.captcha),input[type=password].required,textarea.required').wrap('<span class="hint--bottom hint--bounce form-control padding-0" data-hint></span>');

	jQuery('input[type=text].required:not(.captcha), textarea.required,input[type=password].required').parent().each(function(){
		jQuery(this).attr('data-hint', jQuery(this).find("input[type=text]").attr("data-validation-msg"));
	});


	jQuery('input[type=text].required,textarea.required').keyup(function(event){
		if (jQuery(this).hasClass('mail')) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(regex.test(jQuery(this).val())) {
				jQuery(this).removeClass('icon-error').addClass('icon-success');
				jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', jQuery(this).attr("data-validation-ok"));
			} else {
				jQuery(this).removeClass('icon-success').addClass('icon-error');
				jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint',  jQuery(this).attr("data-validation-err"));
			}
		} else if (jQuery(this).hasClass('captcha')) {
			if ((jQuery(this).val().length >= 1)) {	
				jQuery(this).removeClass('icon-error').addClass('icon-success');
				jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint',  jQuery(this).attr("data-validation-ok"));
			} else {
				jQuery(this).removeClass('icon-success').addClass('icon-error');
				jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint',  jQuery(this).attr("data-validation-err"));
			}''
		} else {
			if ((jQuery(this).val().length >= 2)) {	
				jQuery(this).removeClass('icon-error').addClass('icon-success');
				jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', jQuery(this).attr("data-validation-ok"));
			} else {
				jQuery(this).removeClass('icon-success').addClass('icon-error');
				jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', jQuery(this).attr("data-validation-err"));
			}
		}
	}).focus(function(event){
		jQuery(this).parent().addClass('hint--always');
	}).focusout(function(event){
		jQuery(this).parent().removeClass('hint--always');
	});

	
	jQuery('input[type=password].required').keyup(function(event){
			
		if ((jQuery(this).val().length >= 2)) {	
			jQuery(this).removeClass('icon-error').addClass('icon-success');
			jQuery(this).parent().parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', jQuery(this).attr("data-validation-ok"));
		} else {
			jQuery(this).removeClass('icon-success').addClass('icon-error');
			jQuery(this).parent().parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', jQuery(this).attr("data-validation-err"));
		}
			
		}).focus(function(event){
			jQuery(this).parent().parent().addClass('hint--always');
		}).focusout(function(event){
			jQuery(this).parent().parent().removeClass('hint--always');
	});


	jQuery('form.form-avulso input[type=submit]').on('click', function(event){


		fail = false;		
		var formId = jQuery(this).closest('form').attr('id');		

		if((jQuery('#'+formId+' .nome').val().length <= 3) || (jQuery('#'+formId+' .nome').val() == jQuery('#'+formId+' .nome').attr("placeholder")) ) {
			jQuery('#'+formId+' .nome').parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery('#'+formId+' .nome').attr("data-validation-err"));
			jQuery('#'+formId+' .nome').addClass('icon-error');
			fail = true;
			event.preventDefault();
		}
	
		// valida email
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		jQuery('#'+formId+' .mail').each(
			function()
			{
				if((!regex.test(jQuery(this).val())) || (jQuery(this).val() == jQuery(this).attr("placeholder"))) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery(this).attr("data-validation-err"));
					jQuery(this).addClass('icon-error');
					fail = true;
					event.preventDefault();
				}

			}
		);
		
		// valida campo do tipo msg (igual ao nome)
		jQuery('#'+formId+' .msg').each(
			function()
			{
				if((jQuery(this).val().length <= 3) || (jQuery(this).val() == jQuery(this).attr("placeholder"))) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint',jQuery(this).attr("data-validation-err"));
					jQuery(this).addClass('icon-error');
					fail = true;
					event.preventDefault();
				}
			}
		);

		// valida campo do tipo captcha 
		jQuery('#'+formId+' .captcha').each(
			function()
			{
				if((jQuery(this).val().length == 0) || (jQuery(this).val() == jQuery(this).attr("placeholder"))) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery(this).attr("data-validation-err"));
					jQuery(this).addClass('icon-error');
					fail = true;
					event.preventDefault();
				}
			}
		);
		jQuery('#'+formId+' .ninja-forms-field.pwd').each(
			function()
			{
				if((jQuery(this).val().length < 7) || (jQuery(this).val() == jQuery(this).attr("placeholder"))) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint',jQuery(this).attr("data-validation-err"));
					jQuery(this).addClass('icon-error');
					fail = true;
					event.preventDefault();
				}
			}
		);

		if(!fail){		
			jQuery("#submit-form-ligacao").attr("disabled","disabled");
			jQuery(".forms-success-msg,forms-err-msg").remove();
			jQuery.post(templateUrl+"/ajax.php",
					jQuery(this).closest('form').serialize(),
					function(response)
					{
						response = jQuery.parseJSON(response);
						conainerMsg= document.createElement("div");
						jQuery(conainerMsg).append("<p>"+response.msg+"</p>");						
						if(response.sucesso){
							jQuery(conainerMsg).addClass("forms-success-msg");
							jQuery("#"+formId).find("input[type=text],textarea").each(
								function()
								{								
									jQuery(this).val("");
									jQuery(this).removeClass("icon-success").removeClass("icon-error");
								}
							);
						}
						else
						{
							jQuery(conainerMsg).addClass("forms-err-msg");
						}
						jQuery("#"+formId).prepend(conainerMsg);						
					}
			);
			jQuery("#submit-form-ligacao").removeAttr("disabled");
		}
	});
});


