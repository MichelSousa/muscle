<section id="rs-profile-edit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

	<!--FIM DO HEADER DA PAGINA-->
	<div class="row">
		<div class="col-xs-12 header">
			<h1>Editar Perfil</h1>							
		</div>			
	</div>
	<!--FIM DO HEADER DA PAGINA-->
  <?php 
    do_action( 'bp_before_member_header' ); 
	global $current_user;
	get_currentuserinfo();

    $paramAvatar = array("item_id"=>$current_user->ID,"type"=>"full");


  
  ?>
	<!--PAGE WRAPPER  -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding page-wrapper">		
		<div class="col-xs-12 col-sm-3 col-md-2 no-padding center-block">
			<div class="col-md-9 col-sm-10 col-xs-12 wrapper-avatar ">
								
		    <img src="<?=apply_filters("img_serialize",bp_core_fetch_avatar( $paramAvatar ))?>" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left no-padding">
		    
			</div>
			<div class="col-xs-9 col-sm-10 col-xs-12">
					 <a  style=" background-color: #c12525;color: #fff;font-size: 16px;padding: 5px;text-align: center;transition: all 0.5s ease 0s;cursor:pointer;text-decoration:none;margin-top:5px;" href="<?php echo get_option('home')?>/members/admin/profile/change-avatar">Trocar Foto </a>
			</div> 
		</div>
		
		<div class="col-xs-12 col-sm-9 col-md-10">
			<form role="form" method="POST" class="form-horizontal">
				<div class="form-group">
				  <label for="nome" class="col-sm-2">Nome</label>
				  <div class="col-sm-10">
				  	<input type="text" class="form-control "  id="inputNome" name="nome" placeholder="Informe seu nome completo.">
				  </div>
				</div>
				<div class="form-group">
					<label for="sobre" class="col-sm-2">Sobre</label>
				    <div class="col-sm-10">
				    	<textarea class="form-control " id="textSobre" name="sobre"  rows="3"></textarea>
					</div>
				</div>
				<div class="form-group">
				    <label for="Sobre" class="col-sm-2">Dt. Nascimento</label>
				    <div class="col-sm-10">
				    	<input type="date" name="date" class="form-control" id="inputDataNascimento" placeholder="Informe a sua data de nascimento.">
				    </div>
				</div>
				<hr>	
				<h3> Alteração de senha </h3>
				<div class="col-xs-12 no-padding">
					<div class="form-group  has-success has-feedback">
				    	<label for="sobre" class="col-sm-2">Atual</label>
					    <div class="col-sm-6">
					    	<input type="password" class="form-control" id="inputSenhaAtual" name="senhaatual"  placeholder="Informe sua senha atual">
					    	<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						
					</div>
					<div class="form-group has-warning has-feedback">
						<label for="sobre" class="col-sm-2">Nova</label>
					    <div class="col-sm-6">
					    	<input type="password" class="form-control" id="inputSenhaNova" name="senhanova"  placeholder="Informe a nova senha">
					    	<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
						</div>
						
					</div>
					<div class="form-group has-error has-feedback">
					    <label for="sobre" class="col-sm-2">Digite novamente</label>
					    <div class="col-sm-6">
					    	<input type="password" class="form-control" id="inputSenhaNovaConfirm" name="confsen"   placeholder="Confirme a nova senha">
					    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
						</div>
						
					</div>
				</div>
				<input type="submit" name="save" id="save-profile" class="pull-right" value="Salvar todas as alterações" />
			</form>
			
		</div>
                  <?php  


                       // Atualiza as informações dos usúario logado.
				     
					   $current_user = wp_get_current_user();
					   global $wpdb;
					    $current_user->ID ;
						
						if(isset($_POST['save']))
						{ 


						 $senha =      md5($_POST['senhaatual']);
						 $senhanova =  $_POST['senhanova'];
						 $confsen =   $_POST['confsen'];
						 
						 $sobre =      $_POST['sobre'];
  					     $nome =       $_POST['nome'];
  					     $date  =      $_POST['date'];



						 if($senhanova <>  $confsen)
						 {
						 	echo "Senhas não são iguais";
						 }

						 else
						 {

						 	if(!empty($senhanova))
						 	{
							
							if(!empty($confsen))
							{
							
						
						 
						
						 $update_senha = "
						                 UPDATE 
						                  wp_users 
						                 SET 
						                  user_pass = 'md5($senhanova)'  
						                 WHERE ID = '$current_user->ID'";
						 
						 $wpdb->query($update_senha);

						   }
						 }

						 if(!empty($sobre))
						 {

						 $update_user_wp_usermeta_description = "  

				                           
						                            UPDATE 
						                             wp_usermeta 
						                            SET 
						                             meta_value = '$sobre' 
                                                     WHERE meta_key = 'description' 
						                            AND 
						                               user_id  = '$current_user->ID'

						                             ";

						 $wpdb->query($update_user_wp_usermeta_description);  

						  $update_user_wp_usermeta_description2 = "  

				                           
						                            UPDATE 
						                            wp_bp_xprofile_data
						                            SET 
						                              value = '$sobre' 
                                                     WHERE field_id = 2 
						                            AND 
						                               user_id  = '$current_user->ID'

						                             ";

						 $wpdb->query($update_user_wp_usermeta_description2);  

						 }

						 if (!empty($first_name)) 
						 {
						      

						 $update_user_wp_usermeta_first_name = "  
						                            UPDATE 
						                             wp_usermeta 
						                            SET 
						                             meta_value = '$nome' 
                                                     WHERE meta_key = 'first_name' 
						                            AND 
						                              user_id = '$current_user->ID'

						                             ";

					     $wpdb->query($update_user_wp_usermeta_first_name); 

                        }     

					     if(!empty($date)) 
					     {

					     $update_user_wp_wp_bp_xprofile_data = "  
						                            UPDATE 
						                             wp_bp_xprofile_data
						                            SET 
						                             value = '$date' 
                                                     WHERE field_id = '4' 
						                            AND 
						                              user_id = '$current_user->ID'

						                             ";



					     $wpdb->query($update_user_wp_wp_bp_xprofile_data);     

						 
						 }

					    echo "<div style='clear:both;' class='alert alert-success'>Perfil atualizado com sucesso.</dvi>";

      					

						

             			 }

						  
						 //$name = $_POST['nome'];
						  
						 //$sql_update_user = "UPDATE wp_users  SET user_nicename  =  '$name' WHERE ID = $current_user->ID";

						 //$sql_update_user_meta = "UPDATE wp_users  SET user_login  = "TESTE" WHERE ID = $current_user->ID";
						// $wpdb->query($sql_update_user );              
					   }
				  ?>
	</div>
	<!--FINAL DO  PAGE WRAPPER  -->

</section>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery.maskedinput.min.js"></script>



<script type="text/javascript">
 jQuery(function($){
   $("#inputDataNascimento").mask("99-99-9999");
});
 </script>