<?php 
//include_once('dBug.php');
global $post;
$slug = get_post($post)->post_name;

if(!$slug){
	global $wp_query;
	$slug = $wp_query->queried_object->post_name;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php bloginfo('title'); ?></title>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>
	<body>
		<section id="header" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
			<input type="hidden" id="me" name="me" value="<?=$slug?>"/>
			<nav class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="menu-not-lp">
				<div id="menu-left-wrapper" class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-10 col-xs-10 zero-padding">
					<a href="<?php bloginfo("url")?>">
						<img src="<?php bloginfo("template_url")?>/img/logo.png" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
							<a href="<?php bloginfo("url")?>" class="active">Início</a>
						</li>
						<li>
							<a href="<?php bloginfo("url")?>/associaiar-se">Associar-se</a>
						</li>
						<li>
							<a href="<?php bloginfo("url")?>/clubes">Clubes</a>
						</li>
						<li>
							<a href="<?php bloginfo("url")?>/franquias">Franquias</a>
						</li>
						<li>
							<a href="<?php bloginfo("url")?>/blog">Blog</a>
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
		</section>
		
		
		