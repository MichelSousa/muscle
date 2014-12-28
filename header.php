<?php 
//include_once('dBug.php');


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php bloginfo('title'); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
		<?php wp_head(); ?>
	</head>
	<body>
		<section id="header" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">			
			<nav class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="menu">
				<div class="col-lg-4 col-md-4 col-sm-10 col-xs-10" id="menu-left-wrapper">
					<a href="<? bloginfo("url")?>">
						<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" alt="" src="<?php bloginfo("template_url")?>/img/logo.png">
					</a>
				</div>
				<?php 
				wp_nav_menu( 
					array( 
						'location'=>'primary', 
						'container'=>'div', 
						'container_class'=>'col-lg-8 col-md-8 hidden-sm hidden-xs',
						'menu_class'=>'row pull-right',
						'menu_id' 	=>'menu-top'
					)
					);
				?>
				<!-- menu mobile -->
				<div class="hidden-lg hidden-md visible-sm visible-xs mobile-menu">
					<button id="trigger-mobile-menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button >
					<ul id="menu-top-mobile" class="row pull-right">
						<li>
							<a href="" class="active">Início</a>
						</li>
						<li>
							<a href="">Associar-se</a>
						</li>
						<li>
							<a href="">Clubes</a>
						</li>
						<li>
							<a href="">Franquias</a>
						</li>
						<li>
							<a href="">Blog</a>
						</li>
						<li>
							<a href="" class="last">Fulana de Tal</a>
							<ul class="submneu">
								<li></li>
								<li></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<header>			
			<div class="blackpattern"></div>
			<div class="slidercontent col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
			<?=do_shortcode("[rev_slider home]")?>				
			</div>		
			</header>
			
		</section>
		
		
		