<?php do_action( 'bp_before_directory_members_page' ); ?>

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
			<section id="rs-members">
				<form id="search-friends" name="search-frinds">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header">
						<div class="row">
							<img src="<?php bloginfo("template_url")?>/img/rs-amigos-ico-big.png"/>
							<h1> Amigos </h1>
							<div class="pull-right">
								<input type="text" id="members_search" name="s" placeholder="Pesquise por amigos"/>
								<input type="submit" value=""/>
							</div>
							
						</div>
						<?php bp_get_template_part( 'members/single/vi-templates/friends-members-nav');?>
					</div>
				</form>
				<!--FIM DO HEADER DA PAGINA-->
				<?php bp_get_template_part( 'members/members-loop' ) ?>
			</section>
		</div>

		<?php do_action( 'bp_directory_members_content' ); ?>

		<?php wp_nonce_field( 'directory_members', '_wpnonce-member-filter' ); ?>

		<?php do_action( 'bp_after_directory_members_content' ); ?>

	</form><!-- #members-directory-form -->
	</div>
	<?php do_action( 'bp_after_directory_members' ); ?>

</section><!-- #buddypress -->

<?php do_action( 'bp_after_directory_members_page' ); ?>