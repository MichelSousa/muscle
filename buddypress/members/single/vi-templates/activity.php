<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividades">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding top-atividades">
		<img src="<?php bloginfo("template_url")?>/img/msg-big.png" alt="">
		<h1>
			Atividades
		</h1>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding middle-atividades">
		<?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ) ) ) : 
			global $activities_template;
			

			foreach($activities_template->activities as $key=>$val)
			{	
				$paramAvatar = array("item_id"=>$val->user_id,"type"=>"full");
				$thumbLeft = bp_core_fetch_avatar( $paramAvatar );				

				switch($val->type)
				{
					case 'created_group':						
						$paramAvatar = array("item_id"=>$val->item_id,"type"=>"full","object"=>"group");
						$thumbRight = bp_core_fetch_avatar( $paramAvatar );
						$group = groups_get_group( array( 'group_id' => $val->item_id ) );
						?>						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade add-amigo">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
								<div class="col-lg-12 col-md-12 co ;l-sm-12 col-xs-12 wrapper-avatar no-padding">							
									<img src="<?=apply_filters("img_serialize",$thumbLeft)?>" alt="">
								</div>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
									<?php echo $val->display_name;?>
								</span>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">
										<img src="<?php bloginfo("template_url")?>/img/rs-grupos-ico-small.png" alt="">
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding">
										<div class="span">
											<?php												
												echo $val->action."<br/>";
												echo $val->content;
											?>
										</div>
									</div>
									<a class="close">&#10005;</a>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar no-padding">
									<center>
										<img alt="" src="<?=apply_filters("img_serialize",$thumbRight)?>">
									</center>
								</div>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding gray">Grupo</span>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome"><?php echo $group->name?></span>
							</div>
						</div>
						<?
						break;

					case 'friendship_created':
						// pega as informações do usuário que participou 
						$friend_id = $val->secondary_item_id;						
						$friend = get_userdata( $friend_id );

						$paramAvatar = array("item_id"=>$friend_id,"type"=>"full");
						$thumbRight = bp_core_fetch_avatar( $paramAvatar );


						?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade add-amigo">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar no-padding">							
									<img src="<?=apply_filters("img_serialize",$thumbLeft)?>" alt="">
								</div>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
									<?php echo $val->display_name;?>
								</span>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">
										<img src="<?php bloginfo("template_url")?>/img/rs-amigos-ico-small.png" alt="">
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding">
										<div class="span">
											<?php												
												echo $val->action;
											?>										
										</div>
										<?php
										if($val->content!=""){
											?>
											<div class="quote pull-right">
												<?=$val->content?>
											</div>
											<?
										}
										?>

									</div>
									<a class="close">&#10005;</a>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar no-padding">									
									<img src="<?=apply_filters("img_serialize",$thumbRight)?>" alt="">
								</div>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
									<?php echo $friend->data->display_name ?>
								</span>
							</div>
						</div>
						<?
						break;


					case 'new_avatar':
						?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade add-amigo">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar no-padding">							
									<img src="<?=apply_filters("img_serialize",$thumbLeft)?>" alt="">
								</div>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
									<?php echo $val->display_name;?>
								</span>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">
										<img src="<?php bloginfo("template_url")?>/img/rs-grupos-ico-small.png" alt="">
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding">
										<div class="span">
											<?php												
												echo $val->action;
												
											?>
										</div>
										<?php
										if($val->content!=""){
											?>
											<div class="quote pull-right">
												<?=$val->content?>
											</div>
											<?
										}
										?>

									</div>
									<a class="close">&#10005;</a>
								</div>
							</div>
							<!--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar no-padding">
									<center>
										<img src="img/avatar-2.png" alt="">
									</center>
								</div>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
									Beltrana
								</span>
							</div> -->
						</div>
						<?
						break;


					case 'activity_update':
						
						if($val->item_id>0) //  ATIVIDADE ENVOLVE UM SEGUNDO OBJETO (USUÁRIO , GRUPO , TÓPICO DE FÓRUM)
						{
							$paramAvatar = array("item_id"=>$val->item_id,"type"=>"full");							
							switch($val->component)
							{
								case 'groups':
									$paramAvatar["object"] = "group";
									$targetObject = groups_get_group( array( 'group_id' => $val->item_id ));
									$targetObjectName = $targetObject->name;
									break;
							}
							$thumbRight = bp_core_fetch_avatar( $paramAvatar );
						}						

						?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade add-amigo">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar no-padding">							
									<img src="<?=apply_filters("img_serialize",$thumbLeft)?>" alt="">
								</div>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
									<?php echo $val->display_name;?>
								</span>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 no-padding">
										<img src="<?php bloginfo("template_url")?>/img/rs-msg-ico-small.png" alt="">	
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding">
										<div class="span">
											<?php												
												echo $val->action;												
											?>
										</div>
										<?php
										if($val->content!=""){
											?>
											<div class="quote pull-right">
												<?=$val->content?>
												<? // echo "<pre>".var_export($val,true)."</pre>"?>
											</div>
											<?
										}
										?>
									</div>
									<a class="close">&#10005;</a>
								</div>
							</div>
							<?php
							if($thumbRight){
							?>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar no-padding">
									<center>
										<img src="<?=apply_filters("img_serialize",$thumbRight)?>" alt="">
									</center>
								</div>								
								<?php
									if($val->component=="groups")
									{
										?>
										<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding gray">Grupo</span>
										<?php
									}
									?>
								<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
									<?=$targetObjectName?>
								</span>
							</div>
							<?php
							}
							?>
						</div>	 
						<?
						break;			
					}
				}	
			?>
		<?php endif;?>
	</div>
</div>