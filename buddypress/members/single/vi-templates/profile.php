<?php 

// PEGANDO URL PRINCIPAL 

$server = $_SERVER['SERVER_NAME'];
$endereco = $_SERVER ['REQUEST_URI'];

$url = "http://" . $server . $endereco;

//end

?>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 top-right">
			<div class="col-5 col-md-5 col-sm-12 col-xs-12">
				<a href="?page=video" id="video" class="red-link  col-lg-12 col-md-12 col-sm-12 col-xs-12">
					Vídeos
				</a>
			</div>
			<div class="col-5 col-md-5 col-sm-12 col-xs-12">
				<a href="?page=agenda" id="agenda" class="red-link col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					Agenda
				</a>
			</div>
			
			<div class="col-5 col-md-5 col-sm-12 col-xs-12">
				<a href="?page=avaliacao" id="avaliacao" class="red-link  col-lg-12 col-md-12 col-sm-12 col-xs-12">
					Avaliação Física
				</a>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 middle-right">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3>Seja bem vindo à rede social da Muscle Prime!</h3>
				<p>Este espaço é a extensão de seu clube. Utilize-o a vontade!<br/>
					Envie mensagens, conheça novas pessoas, discuta nos grupos e faça amigos.
					<br/><br/>
					Não sabe por onde começar? Veja quem está online agora e interaja com eles
				</p>
			</div>
		</div>
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

		  
           <?php 

           		$idpage = $_GET['page'] = (!isset($_GET['page'])) ? null : $_GET['page'];

                 

           		if($idpage=="video"):
           		

          	 ?>

					<div id="" class="video tab" style="display:block">
					 <?php 
							
									

					$args = array('post_type' => 'video', 'paged' => $page, 'posts_per_page' => 20);
					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post();
							  $video = get_post_meta($post->ID, 'video', true); 



		              ?>    

		              	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

		              		<iframe width="270" height="200" src="//www.youtube.com/embed/<?php echo $video ?>" frameborder="0" allowfullscreen>
		              		</iframe><!-- iframe  -->

		              	</div><!-- col-lg-4  -->

					             <?php
					endwhile;

				// the_author();

			 ?>

			</div><!-- end video -->


		    <?php  

		     elseif ($idpage=="agenda"):

		    ?>
			
				<div id="" class="agenda tab">
				agenda
				</div><!-- end agenda -->
			
			 <?php 

			  elseif($idpage=="avaliacao") :	

			 ?>
				<div id="" class="avaliacao tab">
				avaliacao
				</div><!-- end avaliacao  -->
			    

		    <?php 

		     endif;

		    ?>

		</div>
		
<style>

.ativo
{
	display: block !important;
}

</style>
		 
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bottom-right">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!--
			LOOP MEMBERS ONLINE 
			-->
			<?php 
			global $current_user;
			get_currentuserinfo();

			$args = array();
			$args["type"]="online";
			$args["exclude"]=$current_user->ID.",".bp_get_friend_ids($current_user->ID);			

			
			if ( bp_has_members($args) ){
				while ( bp_members()) : bp_the_member(); 
				$idade = getAge(strtotime(bp_get_profile_field_data(array("field"=>"data_nascimento","user_id"=>bp_get_member_user_id()))));
				$thumb = bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id(),'type'=>'full'));

				
				?>
				<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 wrapper-online no-padding">
					<div class="col-lg-5 col-md-3 col-sm-5 col-xs-5 no-padding left">
						<img src="<?=apply_filters("img_serialize",$thumb)?>" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					</div>
					<div class="col-lg-7 col-md-9 col-sm-7 col-xs-7 right">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" id="members-dir-list">
							
								<?php
								if(bp_is_friend(bp_get_member_user_id())!="is_friend")
								{
									?>
									<div class="button-top friend-actions">
										<a href="javascript:;" title="Adicionar como amigo" rel="add" id="friend-<?=bp_get_member_user_id()?>" >
											<img src="<?php bloginfo("template_url")?>/img/add.png" alt="Adicionar como amigo">
										</a>
									</div>
									<?
								}
								else
								{
									?>
									<div class="button-top friend-actions" title="Adicionar como amigo">
										<a href="javascript:;"  id="friend-<?=bp_get_member_user_id()?>" rel="remove" >
											<img src="<?php bloginfo("template_url")?>/img/add.png" alt="Cancelar Amizade">
										</a>
									</div>
									<?	
								}
								?>
							
							<div class="button-top">
								<a href="mailto:<?=$current_user->user_email?>">
									<img src="<?php bloginfo("template_url")?>/img/msg.png" alt="">
								</a>
							</div>
							<div class="button-top">
								<a href="<?php bloginfo("url")?>/members/<?php bp_member_user_login()?>">
									<img src="<?php bloginfo("template_url")?>/img/atividade.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
							<h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding"><?php bp_member_name()?></h4>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding idade">
							Idade: <span class="idade-number"><?=$idade?></span>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding clube">
							Costuma Frequentar: <span class="clube-inner">Clube Juvevê</span>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding medalhas">
							<img src="<?php bloginfo("template_url")?>/img/medalha-2.png" class="pull-left medalha">
							<span class="nome-medalha">Sra. Maromba </span>
						</div>
					</div>
				</div>	
				<?php
				endwhile;
			}
			?>