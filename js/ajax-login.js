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