<?php
global $current_user;
get_currentuserinfo();
?>
<section id="rs-groups" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
	<form id="search-groups" name="search-groups">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header">
			<div class="row">
				<img src="<?php bloginfo("template_url")?>/img/rs-grupos-ico-big.png"/>
				<h1> Grupos </h1>
				<div class="pull-right">
					<input type="text" name="s" placeholder="Pesquise por grupos"/>
					<input type="submit" value=""/>
				</div>				
			</div>
			<div class="row buttons-wrapper">
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 no-padding">
					<a href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/groups/" class="marcador-secoes <?=(bp_current_action()=="my-groups"?"selected":"")?>">Meus grupos</a>
					<a href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/groups/invites" class="marcador-secoes <?=(bp_current_action()=="invites"?"selected":"")?>">Convites</a>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 no-padding">
					<label for="groups-sort-by" class="pull-right"><?php _e( 'Order By:', 'buddypress' ); ?>
						<select id="groups-sort-by">	
							<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
							<option value="popular"><?php _e( 'Most Members', 'buddypress' ); ?></option>
							<option value="newest"><?php _e( 'Newly Created', 'buddypress' ); ?></option>
							<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>
							<?php do_action( 'bp_member_group_order_options' ); ?>
						</select>
					</label>
				</div>
			</div>
		</div>
	</form>
	<?
	switch ( bp_current_action() ) :

	// Home/My Groups

	case 'my-groups' :
		do_action( 'bp_before_member_groups_content' ); ?>

		<div class="groups mygroups">

			<?php bp_get_template_part( 'groups/groups-loop' ); ?>

		</div>

		<?php do_action( 'bp_after_member_groups_content' );
		break;

	// Group Invitations
	case 'invites' :
		bp_get_template_part( 'members/single/groups/invites' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;

	endswitch;
	?>	
</section>