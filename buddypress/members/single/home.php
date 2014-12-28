<section id="buddypress" class="not-lp col-lg-11 col-md-11 col-sm-12 col-xs-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 zero-padding">
	<h1 id="title">Área do Usuário </h1>
	<?php 
	do_action( 'bp_before_member_home_content' ); 
	global $current_user;


	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rede-social no-padding">
		<div class="pull-left col-lg-3 col-md-3 col-sm-12 col-xs-12 left-side no-padding">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding top">
				<?php bp_get_template_part( 'members/single/member-header' ) ?>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bottom">
				<ul>
					<li <?=(bp_is_current_component("messages")?"class=\"active\"":"")?> >
						<img src="<?php bloginfo("template_url")?>/img/rs-msg-ico-small.png" alt="">
						<a href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/messages/">Mensagens</a> 
							<?php
							if(bp_get_total_unread_messages_count()){
							?>
								<span class="notices"><?php bp_total_unread_messages_count()?></span>
							<?php
							}
							?>
					</li>
					<li <?=(bp_is_current_component("activity")?"class=\"active\"":"")?>>
						<img src="<?php bloginfo("template_url")?>/img/rs-atividades-ico-small.png" alt="">
						<a href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/activity/" >Atividades</a>
					</li>
					<li <?=(bp_is_current_component("friends")?"class=\"active\"":"")?>>
						<img src="<?php bloginfo("template_url")?>/img/rs-amigos-ico-small.png" alt="">
						<a href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/friends/">Amigos</a>
					</li>
					<li <?=(bp_is_current_component("groups")?"class=\"active\"":"")?>>
						<img src="<?php bloginfo("template_url")?>/img/rs-grupos-ico-small.png" alt="">
						<a href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/groups/">Grupos</a>
					</li>
					<li <?=(bp_is_current_component("medals")?"class=\"active\"":"")?>>
						<img src="<?php bloginfo("template_url")?>/img/rs-medalhas-ico-small.png" alt="">
						<a href="">Medalhas</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 right-side">							
				<?

				do_action( 'bp_before_member_body' );

				if ( bp_is_user_activity() || !bp_current_component() ) :
					bp_get_template_part( 'members/single/vi-templates/activity' );
				elseif ( bp_is_user_blogs() ) :					
					bp_get_template_part( 'members/single/blogs');

				elseif ( bp_is_user_friends() ) :
					bp_get_template_part( 'members/single/friends'  );

				elseif ( bp_is_user_groups() ) :
					bp_get_template_part( 'members/single/groups'   );

				elseif ( bp_is_user_messages() ) :
					if( bp_current_action()=="view")
					{
						bp_get_template_part( 'members/single/vi-templates/messages-single' );
					}
					else
					{
						bp_get_template_part( 'members/single/vi-templates/messages');	
					}

				elseif ( bp_is_user_profile() ) :
					switch(bp_current_action())
					{
						case 'public':
							bp_get_template_part( 'members/single/vi-templates/profile');
							break;
						case 'edit'   :
							bp_get_template_part( 'members/single/profile/edit' );
							break;				
						case 'change-avatar' :
							bp_get_template_part( 'members/single/profile/change-avatar' );
							break;
						// Any other
						default :
							bp_get_template_part( 'members/single/plugins' );
							break;
					}				

				elseif ( bp_is_user_forums() ) :
					bp_get_template_part( 'members/single/forums'   );

				elseif ( bp_is_user_notifications() ) :
					bp_get_template_part( 'members/single/notifications' );

				elseif ( bp_is_user_settings() ) :
					bp_get_template_part( 'members/single/settings' );

				// If nothing sticks, load a generic template
				else :
					//bp_get_template_part( 'members/single/plugins'  );

				endif;


				do_action( 'bp_after_member_body' ); ?>					
							
			</div>
		</div>
	</div>		
</div>	
</section><!-- #buddypress -->
