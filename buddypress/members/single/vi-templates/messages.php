
<script type="text/javascript">

		var j = jQuery.noConflict();

		j(document).ready(function(){

							  	postData =  {sender_id: j("#sender_id").val(),
											
																	recipients: j("#recipients").val(),
																	content : j("#message").val(),						
																	action : j("#acao").val(),
																	thread_id:j("#thread_id").val()
											};


		 
		     setInterval(function(){


							 	
					  
					j.ajax({
							url:'http://visolutions.com.br/preview/muscleprime/wp-content/themes/muscleprime/php/select_menssage.php',
							type: 'POST',
							data: postData
							
						})

					   
						
						.fail(function() {
							alert("error");
						})

						 .done(function(resposta) {
							 j("#data").html(resposta)
						})

		        
		   					}, 2000);

			}) 




</script>



<?
	global $current_user;	
	get_currentuserinfo();
	$paramAvatar = array("item_id"=>bp_displayed_user_id(),"type"=>"full");

	$args = array("include"=>bp_get_friend_ids());
	$friends = get_users($args);
	
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mensagens">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding top-mensagens">	
		<img src="<?php bloginfo("template_url")?>/img/msg-big.png" alt="">
		<h1>Mensagens</h1>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding middle-mensagens">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade sendmsg">
			<div id="sender" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 avatar-msg no-padding">					
					<center>
						<img class="loading" alt="" src="<?php bloginfo("template_url")?>/img/loading.gif">
						<img src="<?php bloginfo("template_url")?>/img/no-avatar.jpg" alt="">					
					</center>
				</div>
				<select id="amigos" name="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding selectpicker show-menu-arrow" data-live-search="true">
					<option value="&#9660;" data-id="0" selected>&nbsp;&nbsp;&#9660;</option>
					<?php
					foreach($friends as $row)
					{
						?>
							<option value="<?=$row->data->ID?>" data-id="<?=$row->data->ID?>"><?=$row->data->display_name?></option>
						<?php
					}
					?>			
				</select>
				<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding name_friend nome">Selecione</span>

			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

				<form action="javascript:;" id="send-message-form">
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
					<input type="hidden" id="leftavatar" value="" />
					<input type="hidden" id="acao" value="send_private_message" />
					<input type="hidden" id="thread_id" value="" /> 
				</form>

			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding">
					<img src="<?=apply_filters("img_serialize",bp_core_fetch_avatar( $paramAvatar ))?>" alt="">					
				</div>
				<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome name_sender "><?=$current_user->display_name?></span>
			</div>		
		</div>

		 <div id="data"></div>

		<!-- LOOP -->
		<?php if ( bp_has_message_threads( bp_ajax_querystring( 'messages' ) ) ) : 
			global  $wpdb;
			?>
			<?php while ( bp_message_threads() ) : bp_message_thread(); ?>		
				<?php


				// buscando o id do usuário que recebe a mensagem
					
				$qry = "SELECT user_id, display_name FROM wp_bp_messages_recipients left join wp_users on wp_users.ID = wp_bp_messages_recipients.user_id   where thread_id=".bp_get_message_thread_id()." AND user_id!=".$current_user->ID;
				$recipient_id = $wpdb->get_results( $qry );

				$paramAvatarAmigo = array("item_id"=>$recipient_id[0]->user_id,"type"=>"full");


					// enviada ou recebida ?2

				if(bp_message_get_sender_id() == $current_user->ID)
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

				?>
				<div id="msg-idunico-<?=bp_get_message_thread_id()?>" data-amigo="<?=$recipient_id[0]->display_name?>" data-amigo-id="<?=$recipient_id[0]->user_id?>" data-id="<?=bp_get_message_thread_id()?>" data-thread-id="<?=bp_get_message_thread_id()?>"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade msg">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding">
							<?php echo  bp_core_fetch_avatar( $paramAvatarAmigo);?>
						</div>
						<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome "><?php echo  $recipient_id[0]->display_name; ?></span>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble msg <?=($sentido==1?"lefty":"righty")?>">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
								<div class="span"><?php bp_message_thread_excerpt();?>
								</div>
							</div>
						
							<a class="close">&#10005;</a>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bottom">
							<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 no-padding conversation pull-left">
								<a  href="<?php bp_message_thread_view_link(); ?>" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding conversation-link">
									Conversa Completa
								</a>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right">
								<a href="#" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding answer" data-id="msg-idunico-<?=bp_get_message_thread_id()?>">
									Responder
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding">
							<img src="<?=apply_filters("img_serialize",bp_core_fetch_avatar( $paramAvatar ))?>" alt="">					
						</div>
						<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome"><?=$current_user->display_name?></span>
					</div>
				</div>
			<?php 
			endwhile;
		endif;
		?>
		<!-- fim do loop -->
	</div>
</div>


