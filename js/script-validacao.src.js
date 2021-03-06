jQuery(document).ready(function(){
	jQuery('input[type=text].ninja-forms-field:not(.captcha), textarea.ninja-forms-field').addClass('padding-0').wrap('<span class="hint--bottom hint--bounce form-control padding-0" data-hint></span>');
	jQuery('input[type=text].ninja-forms-field:not(.captcha), textarea.ninja-forms-field').parent().each(function(){
		jQuery(this).attr('data-hint', jQuery(this).parent().prev().prev().prev().find('p').html());
	});
	jQuery('input[type=text].ninja-forms-field.captcha').addClass('padding-0').wrap('<span class="hint--right hint--bounce padding-0" data-hint></span>');
	jQuery('input[type=text].ninja-forms-field.captcha').parent().each(function(){
		jQuery(this).attr('data-hint', jQuery(this).parent().prev().prev().prev().find('p').html());
	});
	jQuery('input[type=text].ninja-forms-field, textarea.ninja-forms-field').keyup(function(event){
		if (jQuery(this).hasClass('mail')) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(regex.test(jQuery(this).val())) {
				jQuery(this).removeClass('icon-error').addClass('icon-success');
				jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', jQuery(this).parent().parent().prev().prev().find('p').html());
			} else {
				jQuery(this).removeClass('icon-success').addClass('icon-error');
				jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', jQuery(this).parent().parent().prev().find('p').html());
			}
		} else if (jQuery(this).hasClass('captcha')) {
			if ((jQuery(this).val().length >= 1)) {	
				jQuery(this).removeClass('icon-error').addClass('icon-success');
				jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', jQuery(this).parent().parent().prev().prev().find('p').html());
			} else {
				jQuery(this).removeClass('icon-success').addClass('icon-error');
				jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', jQuery(this).parent().parent().prev().find('p').html());
			}
		} else {
			if ((jQuery(this).val().length >= 2)) {	
				jQuery(this).removeClass('icon-error').addClass('icon-success');
				jQuery(this).parent().removeClass('hint--error').addClass('hint--success').attr('data-hint', jQuery(this).parent().parent().prev().prev().find('p').html());
			} else {
				jQuery(this).removeClass('icon-success').addClass('icon-error');
				jQuery(this).parent().removeClass('hint--success').addClass('hint--error').attr('data-hint', jQuery(this).parent().parent().prev().find('p').html());
			}
		}
	}).focus(function(event){
		jQuery(this).parent().addClass('hint--always');
	}).focusout(function(event){
		jQuery(this).parent().removeClass('hint--always');
	});
	jQuery('input[type=submit].ninja-forms-field').on('click', function(event){
		formId = jQuery(this).closest('form').attr('id');
		

		if((jQuery('#'+formId+' .ninja-forms-field.nome').val().length <= 3) || (jQuery('#'+formId+' .ninja-forms-field.nome').val() == jQuery('#'+formId+' .ninja-forms-field.nome').parent().next().val()) ) {
			jQuery('#'+formId+' .ninja-forms-field.nome').parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery('#'+formId+' .ninja-forms-field.nome').parent().parent().prev().find('p').html());
			jQuery('#'+formId+'  .ninja-forms-field.nome').addClass('icon-error');
			event.preventDefault();
		}
		// valida campos da class = nome ( podemos utilizar esse trigger como forma de tornar o campo obrigatório )
		jQuery('#'+formId+' .ninja-forms-field.nome').each(
			function(){
				if((jQuery(this).val().length <= 3) || (jQuery(this).val() == jQuery(this).parent().next().val()) ) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery(this).parent().parent().prev().find('p').html());
					jQuery(this).addClass('icon-error');
					event.preventDefault();
				}
			}
		);

		// valida email
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		jQuery('#'+formId+' .ninja-forms-field.mail').each(
			function()
			{
				if((!regex.test(jQuery(this).val())) || (jQuery(this).val() == jQuery(this).parent().next().val())) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery(this).parent().parent().prev().find('p').html());
					jQuery(this).addClass('icon-error');
					event.preventDefault();
				}

			}
		);
		
		// valida campo do tipo msg (igual ao nome)
		jQuery('#'+formId+' .ninja-forms-field.msg').each(
			function()
			{
				if((jQuery(this).val().length <= 3) || (jQuery(this).val() == jQuery('#'+formId+' .ninja-forms-field.msg').parent().next().val())) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery(this).parent().parent().prev().find('p').html());
					jQuery(this).addClass('icon-error');
					event.preventDefault();
				}
			}
		);

		// valida campo do tipo captcha 
		jQuery('#'+formId+' .ninja-forms-field.captcha').each(
			function()
			{
				if((jQuery(this).val().length == 0) || (jQuery(this).val() == jQuery(this).parent().next().val())) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery(this).parent().parent().prev().find('p').html());
					jQuery(this).addClass('icon-error');
					event.preventDefault();
				}
			}
		);
		jQuery('#'+formId+' .ninja-forms-field.pwd').each(
			function()
			{
				if((jQuery(this).val().length < 7) || (jQuery(this).val() == jQuery(this).parent().next().val())) {
					jQuery(this).parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery(this).parent().parent().prev().find('p').html());
					jQuery(this).addClass('icon-error');
					event.preventDefault();
				}
			}
		);

		
		

		


	});
	jQuery( document ).ajaxComplete(function(){
		if (!jQuery('#'+formId+' .ninja-forms-success-msg').text().length == 0) {
			jQuery('#'+formId+' .ninja-forms-field.nome').val(jQuery('#'+formId+' .ninja-forms-field.nome').parent().next().val());
			jQuery('#'+formId+' .ninja-forms-field.mail').val(jQuery('#'+formId+' .ninja-forms-field.mail').parent().next().val());
			jQuery('#'+formId+' .ninja-forms-field.msg').val(jQuery('#'+formId+' .ninja-forms-field.msg').parent().next().val());
			jQuery('#'+formId+' .ninja-forms-field.captcha').val(jQuery('#'+formId+' .ninja-forms-field.captcha').parent().next().val());
			jQuery('#'+formId+' .ninja-forms-field.nome').removeClass('icon-error').removeClass('icon-success');
			jQuery('#'+formId+' .ninja-forms-field.mail').removeClass('icon-error').removeClass('icon-success');
			jQuery('#'+formId+' .ninja-forms-field.msg').removeClass('icon-error').removeClass('icon-success');
			jQuery('#'+formId+' .ninja-forms-field.captcha').removeClass('icon-error').removeClass('icon-success');
			jQuery('#'+formId+' input[type=text].ninja-forms-field, textarea.ninja-forms-field').parent().each(function(){
				jQuery(this).removeClass('hint--success').removeClass('hint--error').attr('data-hint', jQuery(this).parent().prev().prev().prev().find('p').html());
			});
		} else if (!jQuery('.captchaerror').text().length == 0) {
			jQuery('#'+formId+' .ninja-forms-field.captcha').parent().removeClass('hint--success').addClass('hint--error').addClass('hint--always').attr('data-hint', jQuery('#'+formId+' .ninja-forms-field.captcha').parent().parent().prev().find('p').html());
			jQuery('#'+formId+' .ninja-forms-field.captcha').addClass('icon-error');
		}
	});
});