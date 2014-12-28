<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */
?>
<?php do_action( 'bp_before_member_header' ); 
global $current_user;
get_currentuserinfo();

$paramAvatar = array("item_id"=>$current_user->ID,"type"=>"full");
 
?>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding left-profile-inner">	
	<img src="<?=apply_filters("img_serialize",bp_core_fetch_avatar( $paramAvatar ))?>" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left no-padding">
</div>						
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7  col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lf-offset-1 zero-padding right-profile-inner">
	<h4 class="nome-perfil pull-left"><?=$current_user->display_name?></h4>
	<div class="wrapper-medalha col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding pull-left">
		<?php
			echo do_shortcode("[badgeos_user_achievements user='$current_user->ID' type='badges' limit='1']");
		?>
		<!-- <img src="<?php bloginfo("template_url")?>/img/medalha.png" alt="" class="pull-left">
		<span class="pull-left">Bombeta Jr.</span> -->
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
		<a href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/profile/edit/" class="edit-profile">Editar Perfil</a>
	</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 user-icons no-padding">
	<span class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
		<img src="<?bloginfo("template_url")?>/img/rs-menu-videos.png" alt="Vídeos"/>
	</span>
	<span class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
		<img src="<?bloginfo("template_url")?>/img/rs-menu-agenda.png" alt="Agenda"/>
	</span>
	<span class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
		<img src="<?bloginfo("template_url")?>/img/rs-menu-avaliacao.png" alt="Avaliação física"/>
	</span>
</div>	

<?php do_action( 'bp_after_member_header' ); ?>

<?php do_action( 'template_notices' ); ?>