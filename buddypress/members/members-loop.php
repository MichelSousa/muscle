<!-- INÍCIO DO LOOP -->
<?php
global $current_user;
get_currentuserinfo();

if(bp_is_user_friends()){
	$param = array("scope"=>"personal","per_page"=>"6","exclude"=>$current_user->ID);	
}
else
{
	$param = array("scope"=>"all","per_page"=>"6","exclude"=>$current_user->ID);		
}


?>

<?php if ( bp_has_members($param) ) : ?>
	<div class="col-xs-12 no-padding list-friends">		
		<p class="col-xs-12"><small><?php bp_members_pagination_count(); ?></small></p>						
		<?php do_action( 'bp_before_directory_members_list' ); ?>

		<ul class="col-xs-12">
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
					<?php
						mp_add_friend_button(bp_get_member_user_id(),bp_is_friend(bp_get_member_user_id()));
					?>
				</div>
			</li>
			<?php
		endwhile;
		?>
		</ul>
		<!-- FIM DO LOOP -->
		<div class="paginacao col-xs-12">
			<center>
				<?php bp_members_pagination_links(); ?>
			</center>
		</div>
	</center>
	</div>

<?php else: ?>

	<div id="message" class="col-xs-12 no-padding list-friends">
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
	</div>

<?php endif; ?>
