<div id="user-login-box" style="display:none;">
	<span class="close">X</span>
	<div class="form-wrapper">		
		<form method="post" class="login" id="form-login">
			<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
			<fieldset>								
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					<label for="emal">Login</label>
					<input type="text" name="username" id="username" placeholder="Digite seu login" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>"/>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					<label for="senha">Senha</label>
					<input type="password" id="password" name="password" placeholder="************"/>					
				</div>					
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding">						
							<label for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Lembrar-me</label>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding">
						<input type="submit" class="button pull-right" name="login" id="login-action" value="<?php _e( 'LOG-IN'); ?>" /> 
						<a href="<?php echo esc_url(  wp_lostpassword_url( home_url())); ?>" class="forgot-password">Esqueci minha senha</a>
					</div>					
				</div>	
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					<p id="msg-login" class="pull=left"></p>						
				</div>		
			</fieldset>				
		</form>
		<div class="line"></div>
		<a href="<?php bloginfo("url")?>/associar-se" class="red-button col-lg-12 col-md-12 col-sm-12 col-xs-12"/>NOVO CADASTRO</a>
	</div>	
</div>