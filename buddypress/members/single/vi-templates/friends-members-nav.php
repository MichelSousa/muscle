<?php
global $current_user;
?>
<div class="row buttons-wrapper">
	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 no-padding">
		<a id="members-personal" href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/friends/" class="marcador-secoes no-ajax <?=(bp_current_component()=="friends"?"selected":"")?>">Amizades</a>
		<a id="members-all" href="<?=bp_members_directory_permalink()?>" class="marcador-secoes  no-ajax <?=(bp_current_component()=="members"?"selected":"")?>">Todos os membros</a>
		<a href="<?php bloginfo("url")?>/members/<?=$current_user->user_login?>/friends/requests" class="marcador-secoes no-ajax">Convites <span><?=bp_friend_total_requests_count(get_current_user_id())?></span></a>
	</div>
	<div id="members-order-select" class="col-lg-6 col-md-12 col-sm-12 col-xs-12 no-padding">
		<label for="members-friends" class="pull-right">Ordenar por
			<select id="members-friends">
					<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
					<option value="newest"><?php _e( 'Newest Registered', 'buddypress' ); ?></option>
					<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>
					<?php do_action( 'bp_member_friends_order_options' ); ?>
			</select>
		</label>
	</div>
</div>