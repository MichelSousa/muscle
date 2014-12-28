<?php
/*
	Template Name: DEV
*/
get_header("notlp");

global $current_user;
get_currentuserinfo();
?>
<section class="not-lp col-lg-11 col-md-11 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
<?php
global $bp;
$usuario = $bp->loggedin_user;
?>
<div id="user-box">
	<div class="box-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<span class="foto-area">	
			<?php
				echo get_avatar( $current_user->ID, 32 );
			?>
		</span>
		<div class="info-area">
			<h2><?=$usuario->fullname?></h2>
			<p>@<?=$usuario->userdata->user_nicename?></p>
			<span class="profile-action-edit pull-left">
				<a href="<?=$usuario->domain?>profile/edit" title="Editar meu perfil">Editar perfil</a>
			</span>
			<span class="profile-action-exit pull-right">
				<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Editar meu perfil">Sair</a>
			</span>
		</div>
	</div>
	<div class="user-navigation col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
			<a href="" class="user-videos"> Vídeos</a>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
			<a href="" class="user-agenda"> Agenda</a>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
			<a href="" class="user-avaliacao">Avaliação Física</a>
		</div>
	</div>
	<div class="user-menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ul>
			<li class="atividades"><a href="<?=$usuario->domain?>activity">Atividades</a><span class="notices">1</span></li>
			<li class="mensagens"><a href="<?=$usuario->domain?>messages">Mensagens</a><span class="notices">4</span></li>
			<li class="amigos"><a href="<?=$usuario->domain?>friends">Amigos</a></li>
			<li class="grupos"><a href="<?=$usuario->domain?>groups">Grupos</a><span class="notices">2</span></li>
			<li class="medalhas"><a href="<?=$usuario->domain?>medalhas">Medalhas</a></li>
		</ul>
	</div>
</div>
</section>
<?
get_footer();
?>