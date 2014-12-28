<footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
			<div class="bg-footer col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding"></div>
			<div class="footer-content col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-3 col-xs-offset-1 clearfix">
					<a href="">
						<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-lg-offset-0 col-md-offset-0 col-sm-offset-2 col-xs-offset-0 zero-padding" alt="" src="<?php bloginfo("template_url")?>/img/logo.png">
					</a>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0 menu">
					<!-- jogar para dentro do shortcode social -->					
					<div class="col-lg-1 col-md-1 col-sm-12 col-lg-offset-0 col-md-offset-0 col-sm-offset-0 col-xs-12 col-xs-offset-0 social zero-padding">
						<a href="" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding facebook">
							&#xe227;
						</a>
						<a href="" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding twitter">
							&#xe286;
						</a>
						<a href="" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding googleplus">
							&#xe239;
						</a>
					</div>
					<?php 
					wp_nav_menu( 
							array( 
								'location'=>'primary', 
								'container'=>'div', 
								'container_class'=>'bottom-menu col-lg-11 col-md-11 col-sm-12 col-xs-12 zero-padding-xs-left zero-padding-xs-right zero-padding-sm-left zero-padding-sm-right',
								'menu_class'=>'zero-padding-sm-left zero-padding-xs-left hidden-sm hidden-xs',
								'menu_id' 	=>'menu-foot'
							)
						);
					?>					
				</div>
			</div>			
		</footer>		
<?php 

	VIdynamicSC();
	wp_footer();
?>