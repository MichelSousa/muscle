<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 top-right">
			<div class="col-5 col-md-5 col-sm-12 col-xs-12">
				<a href="" class="red-link col-lg-12 col-md-12 col-sm-12 col-xs-12">
					Vídeos
				</a>
			</div>
			<div class="col-5 col-md-5 col-sm-12 col-xs-12">
				<a href="" class="red-link col-lg-12 col-md-12 col-sm-12 col-xs-12">
					Agenda
				</a>
			</div>
			<div class="col-5 col-md-5 col-sm-12 col-xs-12">
				<a href="" class="red-link col-lg-12 col-md-12 col-sm-12 col-xs-12">
					Newsletter
				</a>
			</div>
			<div class="col-5 col-md-5 col-sm-12 col-xs-12">
				<a href="" class="red-link col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bottom-right">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!--
			LOOP MEMBERS ONLINE 
			-->
			<?php 
			$args = array();
			//$args["type"]="online";
			$args["exclude"]=bp_displayed_user_id();
			if ( bp_has_members($args) ){
				while ( bp_members()) : bp_the_member(); 
				$thumb = bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id()));
				
				?>
				<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 wrapper-online no-padding">
					<div class="col-lg-5 col-md-3 col-sm-5 col-xs-5 no-padding left">
						<img src="<?=apply_filters("img_serialize",$thumb)?>" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					</div>
					<div class="col-lg-7 col-md-9 col-sm-7 col-xs-7 right">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
							<div class="button-top">
								<a href="">
									<img src="<?php bloginfo("template_url")?>/img/add.png" alt="">
								</a>
							</div>
							<div class="button-top">
								<a href="mailto:<?=$current_user->user_email?>">
									<img src="<?php bloginfo("template_url")?>/img/msg.png" alt="">
								</a>
							</div>
							<div class="button-top">
								<a href="">
									<img src="<?php bloginfo("template_url")?>/img/atividade.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome">
							<h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding"><?php bp_member_name()?></h4>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding idade">
							Idade: <span class="idade-number">23</span>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding clube">
							Costuma Frequentar: <span class="clube-inner">Clube Juvevê</span>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding medalhas">
							<img src="<?php bloginfo("template_url")?>/img/medalha-2.png" class="pull-left medalha">
							<span class="nome-medalha">Sra. Maromba</span>
						</div>
					</div>
				</div>	
				<?php
				endwhile;
			}
			?>