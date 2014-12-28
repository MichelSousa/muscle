<?php

/**
 * BuddyPress - Groups Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php 

do_action( 'bp_before_groups_loop' );

//if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : 
if ( bp_has_groups(array("per_page"=>6)) ) : 
	?>
		<!--FIM DO HEADER DA PAGINA-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding list-friends">
		<p><small><?php bp_groups_pagination_count(); ?></small></p>
		<!-- INÍCIO DO LOOP -->
		<ul>
		<?php			
		$i=1;
		while (bp_groups())
		{
			bp_the_group();				
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
			?>
			<li class="col-lg-4 col-sm-6 col-xs-12 <?=$className?>">
				<div class="col-lg-5 no-space-left">
					<a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar(array("class"=>"col-md-12 no-padding","height"=>"auto")); ?></a>
				</div>
				<div class="col-lg-7 no-padding box">
					<h3><?php bp_group_name(); ?></h3>					
					<small><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></small>
					<!-- Colocar um excerpt -->
					<p class="excerpt"><?php bp_group_description_excerpt(); ?></p>
				</div>
				<div class="col-lg-12 no-padding">
					<div class="pull-right">
						<img src="<?php bloginfo("template_url")?>/img/people-icon.png"/>
						<span> <?php bp_group_member_count(); ?></span>
					</div>				
				</div>
			</li>
			<?php
			$i++;
		}
		?>
		</ul>
		<!-- FIM DO LOOP -->
		<div class="col-lg-6 col-lg-offset-3 paginacao">		
			<?php bp_groups_pagination_links(); ?>
		</div>		
	</div>
<?php
else:
?>
	<div id="message" class="info col-xs-12">
		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
