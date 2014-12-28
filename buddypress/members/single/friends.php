<?php
global $current_user;
get_currentuserinfo();
?>
<section id="rs-friends" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
	<form id="search-friends" name="search-frinds">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header">
			<div class="row">
				<img src="<?php bloginfo("template_url")?>/img/rs-amigos-ico-big.png"/>
				<h1> Amigos</h1>
				<div class="pull-right">
					<input type="text" name="s" placeholder="Pesquise por amigos"/>
					<input type="submit" value=""/>
				</div>
				
			</div>
			<?php bp_get_template_part( 'members/single/vi-templates/friends-members-nav');?>
		</div>
	</form>
	<!--FIM DO HEADER DA PAGINA-->

	<?php
	switch ( bp_current_action() ) :

		// Home/My Friends
		case 'my-friends' :
			do_action( 'bp_before_member_friends_content' ); ?>

			<div class="members friends">

				<?php bp_get_template_part( 'members/members-loop' ) ?>

			</div><!-- .members.friends -->

			<?php do_action( 'bp_after_member_friends_content' );
			break;

		case 'requests' :
			bp_get_template_part( 'members/single/friends/requests' );
			break;

		// Any other
		default :
			bp_get_template_part( 'members/single/plugins' );
			break;
		endswitch;
	?>	
</section>