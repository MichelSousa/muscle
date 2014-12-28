<?php do_action( 'bp_before_member_friend_requests_content' ); ?>

<?php if ( bp_has_members( 'type=alphabetical&include=' . bp_get_friendship_requests() ) ) : ?>

	<div id="pag-top" class="pagination no-ajax">

		<div class="pag-count" id="member-dir-count-top">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-top">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>
	<div class="col-xs-12 list-friends">
		<ul id="friend-list" class="item-list" role="main">
			<?php 
			$i=1;
			while ( bp_members() ) : bp_the_member();		
				$className="";
				if($i==1){
					$className="no-space-left";
				}
				elseif($i%3==0)
				{
					$className="no-space-right";	
				}
				elseif(($i-1)%3==0)
				{
					$className="no-space-left";	
				}
				$i++;
				?>
				<li class="col-lg-4 col-sm-6 col-xs-12 <?=$className?>">
					<div class="col-lg-5 no-space-left">					
						<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(array("class"=>"col-md-12 no-padding","height"=>"auto"))?></a>
					</div>
					<div class="col-lg-7 no-padding box	">
						<h3><?=bp_member_name()?></h3>
						<small>@<?=strtolower(bp_member_user_login())?></small>
						<p>Última atividade: <?php bp_member_last_active(); ?></p>
						<?php echo do_shortcode("[badgeos_user_achievements user=\"".bp_get_member_user_id()."\" type=\"badges\" limit=\"1\"]");?><!-- <span class="medal-title">Sra. Maromba.</span> -->
					</div>
					<div class="col-lg-12 action-buttons no-padding">
						<a href="<?php bp_member_permalink(); ?>">
							<img src="<?php bloginfo("template_url")?>/img/rs-atividades-button-small.png" alt="Ver atividades de Fulana"/>
						</a>
						<a href="<?php bp_member_permalink(); ?>messages">
							<img src="<?php bloginfo("template_url")?>/img/rs-mensagens-button-small.png" alt="Escrever uma mensagem para Fulana"/>
						</a>
						<div class="separador"></div>					
						<a href="<?php bp_friend_accept_request_link(); ?>"><img src="<?=get_bloginfo("template_url")?>/img/rs-confirm-friend-button-small.png" title="<?php _e( 'Accept', 'buddypress' );?>"/></a>
						<a href="<?php bp_friend_reject_request_link(); ?>"><img src="<?=get_bloginfo("template_url")?>/img/rs-removefriend-button-small.png" title="<?php _e( 'Reject', 'buddypress' ); ?>"/></a>
							<?php do_action( 'bp_friend_requests_item_action' ); ?>
						</div>
					</div>
				</li>
				<?php
			endwhile;
			?>
		</ul>
	</div>
		<!-- <ul id="friend-list" class="item-list" role="main">
		<?php /*while ( bp_members() ) : bp_the_member(); ?>

			<li id="friendship-<?php bp_friend_friendship_id(); ?>">
				<div class="item-avatar">
					<a href="<?php bp_member_link(); ?>"><?php bp_member_avatar(); ?></a>
				</div>

				<div class="item">
					<div class="item-title"><a href="<?php bp_member_link(); ?>"><?php bp_member_name(); ?></a></div>
					<div class="item-meta"><span class="activity"><?php bp_member_last_active(); ?></span></div>
				</div>

				<?php do_action( 'bp_friend_requests_item' ); ?>

				<div class="action">
					<a class="button accept" href="<?php bp_friend_accept_request_link(); ?>"><?php _e( 'Accept', 'buddypress' ); ?></a> &nbsp;
					<a class="button reject" href="<?php bp_friend_reject_request_link(); ?>"><?php _e( 'Reject', 'buddypress' ); ?></a>

					<?php do_action( 'bp_friend_requests_item_action' ); ?>
				</div>
			</li>

		<?php endwhile; */?>
	</ul> -->

	<?php do_action( 'bp_friend_requests_content' ); ?>

	<div id="pag-bottom" class="pagination no-ajax">

		<div class="pag-count" id="member-dir-count-bottom">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'You have no pending friendship requests.', 'buddypress' ); ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_member_friend_requests_content' ); ?>
