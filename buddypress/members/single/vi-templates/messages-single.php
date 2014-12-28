<?php
global $current_user;
get_currentuserinfo();

$contador_rows = 0;


?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mensagens">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding top-mensagens">	
		<img src="<?php bloginfo("template_url")?>/img/msg-big.png" alt="">
		
		<?php do_action( 'bp_before_message_thread_content' ); ?>
		<h2>
		<?php 
		$args = array(
	   		'order'     => 'DESC'
		);
		if ( bp_thread_has_messages($args) ) : $receiver = get_userdata(bp_get_thread_receiver_id($current_user->ID)); ?>

		
					<?php if ( !bp_get_the_thread_recipients() ) : ?>

						<?php _e( 'You are alone in this conversation.', 'buddypress' ); ?>

					<?php else : ?>

						<?php printf( __( 'Mensagem > Conversa com %s ', 'buddypress' ), bp_get_the_thread_recipients() ); ?>

					<?php endif; ?>
		</h2>	
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding middle-mensagens">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade sendmsg">
			<?php do_action( 'bp_after_message_thread_list' ); ?>

			<?php do_action( 'bp_before_message_thread_reply' ); ?>

			<div id="sender" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatar-msg-single no-padding single">
					<img class="img-responsive" src="<?=apply_filters("img_serialize",get_avatar($receiver->ID, "thumb"))?>"/>
					<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome"><?=$receiver->display_name?></span>	
				</div>					
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<form action="<?php bp_messages_form_action(); ?>" id="send-message-form">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble righty msg">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<img src="<?php bloginfo("template_url")?>/img/loading-send.gif" id="loading-send" alt="">
							<textarea name="message" id="message" rows="5" placeholder="Selecione um amigo e então escreva uma mensagem para ele!" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding"></textarea>
						</div>					
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bottom">
						<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right">
							<span class="hint--bottom hint--bounce hint-send" data-hint="Pressione CTRL+Enter para Enviar ;-)">
								<a href="#" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding send">
									Enviar
								</a>
							</span>
						</div>
					</div>					
					<input type="hidden" id="sender_id" name="sender_id" value="<?=$current_user->ID?>" />
					<input type="hidden" id="recipients" name="recipients" value="" />					
					<!--ESTRUTURA DE CONTROLE PARA EXIBIR A MENSAGEM CRIADA-->
					<input type="hidden" id="rightavatar" value="<?=apply_filters("img_serialize",bp_core_fetch_avatar( $paramAvatar ))?>" />
					<input type="hidden" id="rightname" value="<?=$current_user->display_name?>" />
					<input type="hidden" id="leftname" value="" />
					<input type="hidden" id="leftavatar" value="<?=apply_filters("img_serialize",get_avatar((bp_get_thread_receiver_id()!=$current_user->ID?bp_get_thread_receiver_id():bp_get_thread_sender_id()), "thumb"))?>" />
					<input type="hidden" id="acao" value="send_private_message" />
					<input type="hidden" id="thread_id" value="<?=bp_the_thread_id()?>" /> 
					<input type="hidden" id="single" value="1" /> 

				</form>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding">
					<?php bp_message_thread_avatar()?>
				</div>
				<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome"><?=$current_user->display_name?></span>
			</div>
			</div>
			
			<?php do_action( 'bp_after_message_thread_reply' ); ?>
		</div>
	<hr/>
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding middle-mensagens">

		<?php do_action( 'bp_before_message_thread_list' ); 
		
		if( bp_has_message_threads()){

			while ( bp_thread_messages() ) : bp_thread_the_message();

			// enviada ou recebida ?
			if(bp_get_thread_sender_id() == $current_user->ID)
			{
				//enviada
				$sentido = 0;
				$receiver =  get_userdata( bp_get_thread_receiver_id());				
			}
			else
			{
				//recebida
				$sentido = 1;				
			}
			$contador_rows++;
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade msg <?=($contador_rows>6?"visuallyhidden hidden":"")?>">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding">
						<?php do_action( 'bp_before_message_meta' );?>
						<?php 						
							echo get_avatar(($sentido==0?bp_get_thread_receiver_id():bp_get_thread_sender_id()), "thumb");
						?>
					</div>
					<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome"><?php echo ($sentido==0?$receiver->display_name:bp_get_the_thread_message_sender_name()); ?></span>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble msg <?=($sentido==1?"lefty":"righty")?>">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
							<div class="span"><?php bp_the_thread_message_content();?>	</div>
						</div>
						
						<a class="close">&#10005;</a>
					</div>						
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding">
						<img src="<?=apply_filters("img_serialize",bp_core_fetch_avatar( $paramAvatar ))?>" alt="">					
					</div>
					<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome"><?php echo $current_user->display_name?></span>
				</div>	
			</div>
			<?php endwhile;
		}
		?>	

	<?php endif; ?>

	<?php do_action( 'bp_after_message_thread_content' ); ?>
	<div class="col-xs-12 center-block loader">
		<center>
			<img src="<?php bloginfo("template_url")?>/img/loader.gif" id="loading-msg" alt="" class="hide">
		</center>
	</div>
</div>