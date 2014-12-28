<?php ob_start();


function vi_shortcode_area($atts,$content=null) {

	extract(shortcode_atts(array(
		'colunas' 			=> '',
		'id' 				=> '',
		'css_class'			=> '',
		'tag'				=> 'section',
		'margem_esquerda'   => 0,
		'margem_direita'    => 0
		), $atts));

	
	if($colunas){
		$col = ceil(12/$colunas);
		$col = $col - $margem_direita - $margem_esquerda;
		$colunas = "col-lg-$col col-md-$col col-sm-12 col-xs-12";

		if($margem_esquerda){
			$margem = "col-lg-offset-$margem_esquerda col-md-offset-$margem_esquerda";
		}
	}


	ob_start();

	?>
	<<?=$tag?> <?=($id?'id="'.$id.'"':'')?> class="<?=$css_class.' '.$colunas.' '.$margem?>">
		<? echo do_shortcode($content); ?>
	</<?=$tag?>>
	<?
	$content = ob_get_contents();

	ob_end_clean();

	return $content;
}
add_shortcode('area', 'vi_shortcode_area');
add_shortcode('area_extra', 'vi_shortcode_area');
add_shortcode('area_extra_ext', 'vi_shortcode_area');
add_shortcode('area_extra_ext2', 'vi_shortcode_area');
add_shortcode('area_extra_ext3', 'vi_shortcode_area');
add_shortcode('area_extra_ext4', 'vi_shortcode_area');
add_shortcode('area_extra_ext5', 'vi_shortcode_area');



function vi_shortcode_imagem_layout($atts,$content=null) {

	extract(shortcode_atts(array(
		'colunas' 			=> '',		
		'css_class'			=> '',		
		'margem_esquerda'   => 0,
		'margem_direita'    => 0
		), $atts));

	if($colunas){
		$col = ceil(12/$colunas);
		$col = $col - $margem_direita - $margem_esquerda;
		$colunas = "col-lg-$col col-md-$col col-sm-12 col-xs-12";

		if($margem_esquerda){
			$margem = "col-lg-offset-$margem_esquerda col-md-offset-$margem_esquerda";
		}
	}

	ob_start();

	?>
	<img class="<?=$colunas.' '.$margem.' '.$css_class ?>" alt="" src="<?=apply_filters("img_serialize", $content );?>">
	<?php
	$content = ob_get_contents();

	ob_end_clean();

	return $content;
}
add_shortcode('imagem_layout', 'vi_shortcode_imagem_layout');


function vi_shortcode_center($attr,$content=null) {
	
	ob_start();
	?>
	<center>
		<? echo do_shortcode($content); ?>
	</center>
	<?
	$content = ob_get_contents();
	ob_end_clean();

	return $content;
}
add_shortcode('center', 'vi_shortcode_center');

function vi_shortcode_texto($atts,$content=null) {
	extract(shortcode_atts(array(
		'tag' 	=> 'div',
		'id' 		=> '',
		'css_class'	=> '',
		'colunas'	=>  '',
		'margem_esquerda'   => 0,
		'margem_direita'    => 0

	), $atts));

	ob_start();	
	if($colunas){
		$colunas = ceil(12/$colunas)-$margem_direita - $margem_esquerda;;
		$colunas = "col-lg-$colunas col-md-$colunas col-sm-12 col-xs-12";
	}

	$margem = "col-lg-offset-$margem_esquerda col-md-offset-$margem_esquerda";

	echo apply_filters("the_content","<".$tag.($id?' id="'.$id.'"':'')." class=\"".$css_class." $colunas $margem \"  >".do_shortcode($content)."</".$tag.">");

	$content = ob_get_contents();
	ob_end_clean();

	return $content;
}
add_shortcode('texto', 'vi_shortcode_texto');

function vi_shortcode_bloco_info_topo($atts,$content=null) {
	extract(shortcode_atts(array(
		'titulo_esquerda' 	=> '',
		'conteudo_esquerda'	=> '',
		'titulo_centro' 	=> '',
		'conteudo_centro' 	=> '',
		'titulo_direita' 	=> '',
		'conteudo_direita' 	=> ''
	), $atts));

	$conteudo_esquerda = explode(";",$conteudo_esquerda);
	$conteudo_direita = explode(";",$conteudo_direita);
	ob_start();	
	?>
		<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 features no-padding">
				<div class="title-features"><?=$titulo_esquerda?></div>
				<ul class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 first-ft">
					<?php
					for($x=0;$x<sizeof($conteudo_esquerda);$x++)
					{
						?>
						<li><?=$conteudo_esquerda[$x]?></li>
						<?						
					}
					?>					
				</ul>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 features no-padding">
				<div class="title-features"><?=$titulo_centro?></div>
				<div class="featured-text col-lg-12 col-md-12 col-sm-12 col-xs-12 middle-ft">
					<?=$conteudo_centro?>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 features no-padding">
				<div class="title-features"><?=$titulo_direita?></div>
				<ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 last-ft">
					<?php
					for($x=0;$x<sizeof($conteudo_direita);$x++)
					{
						?>
						<li><?=$conteudo_direita[$x]?></li>
						<?						
					}
					?>		
				</ul>
			</div>
		</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('bloco_info_topo', 'vi_shortcode_bloco_info_topo');

function vi_shortcode_clubes($atts,$content=null) {
	extract(shortcode_atts(array(
		'titulo' 	=> 'Clubes',		
	), $atts));	
	ob_start();	
	?>
	<header id="clubestitle">
		<center><?=$titulo?></center>
	</header>	
	<ul class="submenu-clubes col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding">
		<?php		
		
		$args = array(
			'posts_per_page'   => 9999,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',			
			'post_type'        => 'clubes',		
			'post_status'      => 'publish',
			'suppress_filters' => true );

		$clubes = query_posts($args);		
		
		foreach($clubes as $row){

		$destaque = get_post_meta($row->ID, "destaque",true);				
		?>
			<li>
				<a href="javascript:;" class="<?=$row->post_name?> <?=($destaque=='on'?'active':'')?> " data-name="<?=$row->post_name?>"><?=$row->post_title?></a>
			</li>
		<?
		}
		unset($destaque);

		?>
	</ul>
	<?php
	foreach($clubes as $post){
		$thumbnail 	= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		$endereco  	= get_post_meta($post->ID, 'endereco', true);		
		$telefone  	= get_post_meta($post->ID, 'telefone', true);
		$destaque	= get_post_meta($post->ID, 'destaque', true); 
		$horario 	= get_post_meta($post->ID, 'horario', true);		
		$atividades = get_the_terms($post->ID,'atividades');			


	?>
	<section id="<?=$post->post_name?>" class="clubes-content col-lg-12 col-md-12 col-sm-12 col-xs-12 <?=($destaque=='on'?'active':'')?>">
		<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6 col-xs-6 zero-padding col-one-clubes">
			<div class="wrapper-img">
				<img src="<?=$thumbnail[0]?>">
				<a href="" class="tour-360">
					<img src="<?php bloginfo("template_url")?>/img/clique-tour-360.png" alt="">
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 zero-padding col-two-clubes">
			<header class="title-clube-content">
				Exclusividades
			</header>
			<section class="not-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="endereco"><?=$endereco?></div>
				<div class="telefone"><?=$telefone?></div>
				<div class="horariofunc">Horário de Funcionamento</div>
				<div><?=$horario?></div>
			</section>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 features-clubes col-three-clubes">
			<div class="wrapper-wrapper-featured">
				<?php

				foreach($atividades as $atv){					
					$icone = z_taxonomy_image_url($atv->term_id);									
					?>
					<div class="wrapper-featured col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding">
						<img class="featured-icon" src="<?=$icone?>"><span class="featured-text-2">Spinning</span>
					</div>		
					<?
				}
					?>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-1emeio col-md-offset-1emeio col-sm-offset-0 col-xs-offset-0 conheca">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 no-padding trabalham">
				<span>Conheça aqueles que trabalham com você!</span>
			</div>
			<a href="<?php bloginfo("url")?>/equipes/<?=$post->ID?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding botao">
				Conheça a equipe!
			</a>
		</div>
	</section>
	<?php
	}
	?>




	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('clubes', 'vi_shortcode_clubes');

// shortcode de clubes lateral da area clubes
function vi_shortcode_clubes_lateral($atts,$content=null) {
	extract(shortcode_atts(array(
		'titulo' 	=> 'Clubes',		
	), $atts));	
	
		
	$args = array(
		'posts_per_page'   => 9999,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => 'post_date',
		'order'            => 'DESC',			
		'post_type'        => 'clubes',		
		'post_status'      => 'publish',
		'suppress_filters' => true );
	$clubes = new WP_Query($args);
	ob_start();	
	while($clubes->have_posts()):$clubes->the_post();
		$thumbnail 	= wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID()), 'full');
		$endereco  	= get_post_meta( get_the_ID(), 'endereco', true);		
		$telefone  	= get_post_meta( get_the_ID(), 'telefone', true);
		$destaque	= get_post_meta( get_the_ID(), 'destaque', true);
		$horario 	= get_post_meta( get_the_ID(), 'horario', true);
		$atividades = get_the_terms( get_the_ID(),'atividades');

		$imgSlider  = apply_filters("img_serialize", get_the_content());
		global $post;


		
	?>
	<div class="sliderwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 slider-<?=$post->post_name?> active">
		<h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?=get_the_title()?>
		</h3>
		<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 endereco">
			<?=$endereco?>
		</span>
		<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tel-red">
			<?=$telefone?>
		</span>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 features">
			<ul class="red-dot col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
			<?php
				foreach($atividades as $atv){					
					$icone = z_taxonomy_image_url($atv->term_id);									
					?>
					<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<img class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding" src="<?=$icone?>">
						<span class="col-lg-8 col-md-8 col-sm-8 col-xs-8 zero-padding">
							<?=$atv->name?>
						</span>
					</li>		
					<?
				}
				?>		
			
			</ul>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slider-inner wrapper no-padding">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slider no-padding">
				<div class="slides">
					<?php
					for($i=0 ; $i<sizeof($imgSlider) ; $i++){
					?>
						<li class="slide col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<img src="<?=$imgSlider[$i]?>" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding" >
						</li>	
					<?php
					}
					?>												
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clique-tour-360">
			<center>
				<a href="" class="col-lg-12 col-md-12 col-sm-8 col-xs-8">
					<img src="<?php bloginfo("template_url")?>/img/tour360.png" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				</a>
			</center>
		</div>
	</div>
	<?php
	endwhile;
	wp_reset_postdata();

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('clubes_lateral', 'vi_shortcode_clubes_lateral');



function vi_shortcode_coluna($atts,$content=null) {
	extract(shortcode_atts(array(
		'tamanho' 	=> 4,
		'css_class'	=> '',
		'tag'		=> 'div'
	), $atts));
	ob_start();		
	?>
	<<?=$tag?> class="col-lg-<?=$tamanho?> col-md-<?=$tamanho?> col-sm-<?=($tamanho+1)?> col-xs-12 <?=$css_class?>">
		<? echo do_shortcode($content)?>
	</<?=$tag?>>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;

}
add_shortcode('coluna', 'vi_shortcode_coluna');


function vi_shortcode_bloco_produtos_esquerda($atts,$content=null) {
	extract(shortcode_atts(array(
		'titulo' 	=> '',
		'conteudo'	=> '',
		'botao'	=> ''

	), $atts));
	
	/* botão deve vir no padrão text|url*/
	$botao = explode(';',$botao);	
	
	ob_start();	

	?>
		<div class="title-three-ft">
			<h1>
				<?=$titulo?>
			</h1>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
				<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" src="<?php echo apply_filters("img_serialize",$content);?>" alt="">
			</div>
			<div id="treinar" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php echo apply_filters("the_content",$conteudo)?>
			</div>
			<a href="<?=@$botao[1]?>" class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" id="adquira">
				<?=@$botao[0]?>
			</a>
		</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('bloco_produtos_esquerda', 'vi_shortcode_bloco_produtos_esquerda');

function vi_shortcode_bloco_produtos_meio($atts,$content=null) {
	extract(shortcode_atts(array(
		'titulo' 	=> '',
		'conteudo'	=> '',
		'botao'		=> ''

	), $atts));
	
	/* botão deve vir no padrão text|url*/
	$botao = explode(';',$botao);

	ob_start();	
	?>		
		<div class="title-three-ft">
			<h1>
				<?=$titulo?>
			</h1>
			<div id="associados-comprar">
				<?=apply_filters("the_content",$conteudo)?>
			</div>
		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding slider bg-blank">
				<a href="" class="prevslider"><img src="<?php bloginfo("template_url")?>/img/prevslider.png" alt=""></a>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding wrapper-slider slides">
					<?php
					$args = array( 'posts_per_page' => -1, 'post_type'=> 'suplementos');
					$suplementos = get_posts( $args );
	
						foreach ( $suplementos as $post )
						{
							
							$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							?>				
							<li class="slide">
								<img src="<?=$thumbnail[0]?>" class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 zero-padding" alt="<?php $post->post_title?>">
								<center>
									<div class="produto-nome"><?=$post->post_title?></div>
								</center>
							</li>				
						<?php 
						}
						wp_reset_postdata();?>					
					</div>
					<a href="" class="nextslider"><img src="<?php bloginfo("template_url")?>/img/nextslider.png" alt=""></a>
			</div>
		</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('bloco_produtos_meio', 'vi_shortcode_bloco_produtos_meio');

function vi_shortcode_bloco_produtos_direita($atts,$content=null) {
	extract(shortcode_atts(array(
		'titulo' 	=> '',
		'conteudo'	=> '',
		'botao'		=> ''

	), $atts));
	
	/* botão deve vir no padrão text|url*/
	$botao = explode(';',$botao);
	ob_start();	
	?>		
		<div class="title-three-ft">
			<h1>
				<?=$titulo?>
			</h1>

			<img src="<?php echo apply_filters("img_serialize",$content);?>" alt="" class="radio col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
			<div id="escute">
				<?=apply_filters("the_content",$conteudo)?>
			</div>
			<?php
			if(sizeof($botao)>1)
			{
				?>
				<a href="<?=@$botao[1]?>" class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" id="quero-escutar">
					<?=@$botao[0]?>
				</a>	
			<?php
			}
			?>			
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('bloco_produtos_direita', 'vi_shortcode_bloco_produtos_direita');


function vi_shortcode_mobile($atts,$content=null) {
	extract(shortcode_atts(array(
		'conteudo_1'	=> '',
		'conteudo_2'	=> '',
		'conteudo_3'	=> '',
		'conteudo_4'	=> '',
		'link_botao'	=> '',
		'texto_botao'	=> ''

	), $atts));
	
	/* botão deve vir no padrão text|url*/
	$botao = explode(';',$botao);

	$img = apply_filters("img_serialize", $content);

	ob_start();	
	?>		
		<div id="innerapp" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="border-left-top col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="msg1 msg-app col-lg-4 col-md-4 hidden-sm hidden-xs" style="display: block;"><? echo $conteudo_1 ?></div>
			</div>
			<div class="border-right-top col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="msg3 msg-app col-lg-4 col-md-4 hidden-sm hidden-xs" style="display: block;"><? echo $conteudo_2 ?></div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bg-img">
				<img alt="" src="<?php bloginfo('template_url')?>/img/bg-academia.png">
			</div>
			<div id="iphone">
				<img alt="" src="<?=$img?>">
			</div>
			<div class="border-left-bottom col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="msg2 msg-app col-lg-4 col-md-4 hidden-sm hidden-xs" style="display: block;"><? echo $conteudo_3 ?></div>
			</div>
			<div class="border-right-bottom col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="msg4 msg-app col-lg-4 col-md-4 hidden-sm hidden-xs" style="display: block;"><? echo $conteudo_4 ?></div>
			</div>
		</div>
		<div id="wrapper-button" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="<?=$link_botao?>"><?=$texto_botao?></a>
		</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('bloco_mobile', 'vi_shortcode_mobile');

// MENU INTERATIVO DO SITE
function vi_shortcode_members_profile($atts,$content=null) {
	extract(shortcode_atts(array(
		'nada'	=> '',		

	), $atts));



	ob_start();	
	
	if(!is_user_logged_in())
	{
		$login_url = site_url( 'wp-login.php?redirect_to=' . urlencode( network_site_url( ) ) );
		?>
		<a href="<?=$login_url?>" class="user-login-action"><?php echo __("Entrar");?></a>

		<?php
		get_template_part("user-login-box","");
		
	}
	else
	{
		global $current_user;
        get_currentuserinfo();

        echo get_avatar( $current_user->ID, 32 );
		?>		
		<a href="<?php echo bloginfo('url')?>/members/<?=$current_user->user_login?>/profile" class="user-action"> <? echo ($current_user->display_name!=''?$current_user->display_name:$current_user->user_nicename)?></a>
		<?
		get_template_part("user-logged-box","");
		?>
			

		<?php
	}

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('members_profile', 'vi_shortcode_members_profile');

// shorcodes da tela associar-se
    


  include "PagSeguroLibrary/PagSeguroLibrary.php";
  include "class/class.passaporte.php";


	function vi_shortcode_passaporte($atts,$content=null) {
		extract(shortcode_atts(array(
			'texto_informativo'	=> '',
			'titulo_formulario'	=> 'Adquira seu passaporte',
			'texto_botao'		=> 'Quero meu passaporte',
			'token' 			=>  '',
			'emailpagseguro'    => '',
			'valor_plano'       =>'',
			'nome_plano'		=>''
		), $atts));
      


	?>	

 <form  method="post">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blueform zero-padding">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding form-group">
			<h1 class="blue-title"><?php echo do_shortcode($titulo_formulario);?>	</h1>
		</div>
		<div class="wrapper-inside-form-blue col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<span class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 number-1 spanform">Primeiro, digite suas informações</span>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			<label for="nome" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Nome<br/>
				<input name="nome" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" type="text" placeholder="Fulano de Tal">
			</label>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			<label for="nome" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Sobrenome<br/>
				<input name="sobrenome" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" type="text" placeholder="Fulano de Tal">
			</label>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			<label for="email" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">E-mail<br/>
				<input class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" name="email" type="text" placeholder="contato@email.com.br">
			</label>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			<label for="confemail" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Confirme Seu E-mail<br/>
				<input class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" name="confemail" type="text" placeholder="contato@email.com.br">
			</label>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			<label for="text" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Telefone<br/>
				<input class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" name="telefone" type="text" placeholder="(XX) 1234-5678">
			</label>
		</div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
		<p class="texto">
		    	Ao concluir o pagamento você já estara cadastrado na Muscle Prime. Agora, você
				precisa apenas registrar sua digital em um dos clubes 
				para registro de suas entradas e poderá começar seu treino.
				<br class="clean">
			    <br class="clean">
                Você receberá um e-mail confirmando seu pagamento.
             </p>
		</div>

		 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">

		 	<textarea style="padding:7px; border: 1px solid #ccc;box-shadow: 4px 4px 7px 0 rgba(50, 50, 50, 0.5) !important;width:100%;height:150px;text-align:left;">
					Lorem Ipsum é simplesmente uma simulação de texto da indústria
					tipográfica e de impressos, e vem sendo utilizado desde 
					o século XVI, quando um impressor
		 	</textarea>

		
		 	
		 </div>	

		  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
		  		<span style="float:left;margin-right:5px;"> Aceitar termos</span> <input value="aceito" type="checkbox" name="termos">
		  </div>	

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			<input name="enviar_passaporte" type="submit" value="<?php echo($texto_botao);?>" class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 queropassaporte">
		</div>
		</div>
	</div>

</form>
   

	<?php

        if(isset($_POST['enviar_passaporte'])) : 

	       $nome       = $_POST['nome'];

	       $email 	   = $_POST['email'];

	       $confemail  = $_POST['confemail'];

	       $telefone   = $_POST['telefone'];

	       $sobrenome  = $_POST['sobrenome'];
  		   
  		   $dd =  substr($telefone,0, 2);

  		   $tel =  substr($telefone,2);

  		   $paymentRequest = new PagSeguroPaymentRequest(); 

	       $paymentRequest->setCurrency("BRL");  

	       $paymentRequest->setShippingType(1);  

           $paymentRequest->addItem('0001', "$nome_plano", 1, $valor_plano);  

           $nomecompleto =   $nome  ." ". $sobrenome;


		

	       $paymentRequest->setSender(  
	       '"'.$nomecompleto.'"',      
	        '"'.$email.'"',   
	        $dd,   
	        $tel  
	       );  
           




          /*

           * @Description : cadastra usúario.

           */

      


         if(!empty($nome) ||  !empty($email) || !empty($telefone) || !empty($sobrenome)) :

         	

           if ( !username_exists( $nome )  & !email_exists( $email ) ) :

           
           	if($email <> $confemail):

           		echo "<div style='clear:both;margin-top:30px;float:left;width:100%' class='alert alert-warning'><b>Os E-mails são diferentes :( </b></div>";
           	 
            else :

            	if($_POST['termos']=="aceito"):

            		if(is_numeric($telefone)):
           	  	

		      //$passaporte = new Passaporte(); 
		      //$passaporte->Cadastrar( $nome , $email );

		         echo "<div style='clear:both;margin-top:30px;float:left;width:100%' class='alert alert-success'><b>Cadastro efetuado com sucesso </b></div>";

		         $credentials = new PagSeguroAccountCredentials(  
						    'michel-damasceno@uol.com.br',   
						      ''.$token.''  
		   );  

		   $url = $paymentRequest->register($credentials); 
          
         
            
            header("location:$url");

            else:
					echo "<div style='clear:both;margin-top:30px;float:left;width:100%' class='alert alert-warning'><b>Seu telefone não é do tipo numérico  :(</b></div>";

            endif; //end verifica telefone

            else:

            	 echo "<div style='clear:both;margin-top:30px;float:left;width:100%' class='alert alert-warning'><b>Você deve aceitar os termos :(</b></div>";

            	endif;//end verifica termos

            endif;

	   

		  else : 
		  			
 				 echo "<div style='clear:both;margin-top:30px;float:left;width:100%' class='alert alert-warning'><b>Usúario ou E-mail já foram cadastrados  :(</b></div>";

		  endif;  //end verifica usúario
  
	 
		  

		  else :
		        echo "<div style='clear:both;margin-top:30px;float:left;width:100%' class='alert alert-warning'><b>Preencha todos os campos  :(</b></div>"; 

          endif;  //end verifica campos vazios



         

        endif;


    $content = ob_get_contents();
	ob_end_clean();
	return $content;


}
add_shortcode('passaporte', 'vi_shortcode_passaporte');

// shorcodes da tela associar-se
function vi_shortcode_franquias($atts,$content=null) {

	extract(shortcode_atts(array(
		'form_name'		=> 'formFranquias',
		'form_action'	=> '#',
		'css_class'		=> '',
		'submit_text'	=> 'ENVIAR'

	), $atts));
   

   define('form_name', $form_name);


	ob_start();		

		echo do_shortcode( '[contact-form-7 id="545" title="Franquias"]' );
	?>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;

}
add_shortcode('franquias', 'vi_shortcode_franquias');



function vi_shortcode_redes_sociais_form($atts,$content=null) {
	extract(shortcode_atts(array(
		'form_name'		=> 'formRedesSociais',
		'form_action'	=> '#',
		'css_class'		=> '',
		'submit_text'	=> 'ENVIAR'

	), $atts));
	ob_start();		
	?>

		<form class="col-lg-12 col-md-12 col-sm-12 col-xs-12 <?=$css_class?>" method="POST">
			<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" for="nome">
				Nome
				<br>
				<input type="text" placeholder="Seu Nome" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
				name="nome" id="nome">
			</label>
			<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" for="login">
				Login
				<br>
				<input type="text" placeholder="fulano123" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
				id="login" name="login">
			</label>
			<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" for="senha">
				Senha
				<br>
				<input type="password" placeholder="********" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
				id="senha" name="senha">
			</label>
			<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" for="cofnsenha">
				Confirme sua Senha
				<br>
				<input type="password" placeholder="********" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
				name="confsenha" id="confsenha">
			</label>
			<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" for="email">
				E-Mail
				<br>
				<input type="email" placeholder="contato@email.com" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
				name="email" id="email">
			</label>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit-franquias">
				<input name="create" type="submit" class="pull-right centered col-lg-8 col-md-8 col-sm-12 col-xs-12"
				value="Criar Conta">
			</div>
		</form>
           
           <?php 

                 /*    
                        @modified : @team Michel Damasceno
						@description : Inscrição do usúario 
                 */


                  if(isset($_POST['create']))
                  {
                        
                               
                         $nome =      $_POST['nome'];
                         $login =     $_POST['login'];
                         $senha=      $_POST['senha'];
                         $confsenha = $_POST['confsenha'];
                         $email     = $_POST['email'];
 						 
 						 

                         if(empty($nome) || empty($login) || empty($senha) || empty($confsenha))
                          {
                            echo "<div style='clear:both;' class='alert alert-warning'>Preeencha todos os campos.</div>";
                          }

                          elseif($senha <> $confsenha)
                          {

                          	echo "<div style='clear:both;' class='alert alert-warning'>As senhas não são iguais.</div>";
                          }

                          else 
                          {

                         if ( !username_exists( $user )  & !email_exists( $email ) ) 
                             {


                         	                    $user_id = wp_create_user($login,$senha, $email );
                                                $user = new WP_User( $user_id );
                                                $user->set_role( 'subscriber' );


                         	 echo "<div style='clear:both;' class='alert alert-success'>Cadastro efetuado com sucesso.</div>";
                           }

                           else
                           {

                           		 echo "<div style='clear:both;' class='alert alert-warning'>Usúario ou E-mail já foram cadastrados.</div>";

                           }
						}
                  }

           ?>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;

}	
add_shortcode('redes_sociais_form', 'vi_shortcode_redes_sociais_form');

// shorcodes da tela associar-se
function vi_shortcode_vantagens($atts,$content=null) {
	extract(shortcode_atts(array(
		'titulo'	=> "",
		'img'		=> "",
		'css_class' => ""
	), $atts));

	ob_start();			

	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-sc">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="<?=$css_class?> col-lg-12 col-md-12 col-sm-12 zero-padding">
				<div class="wrapper-wrapper-lr-img">
					<img  src="<?php echo apply_filters("img_serialize",$img);?>" alt="Vantagens da muscle prime">
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
			<h3 class="title-border border-bottom">
				<?php echo do_shortcode($titulo) ?>
			</h3>			
			<?php echo do_shortcode($content) ?>			
		</div>
	</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('vantagens', 'vi_shortcode_vantagens');


// abre a ul
function vi_shortcode_lista($atts,$content=null) {
	extract(shortcode_atts(array(		
		'id'		=> '',
		'css_class'	=> ''	
	), $atts));

	ob_start();
	?>	
		<ul id="<?=$id?>" class="<?=$css_class?>">
			<?php echo do_shortcode($content);?>
		</ul>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode('lista', 'vi_shortcode_lista');

// monta o icone e o texto , como uma espécie de lista utilizando imagem como marcador
function vi_shortcode_itemLista($atts,$content=null) {
	extract(shortcode_atts(array(
		'texto'		=> '',
		'colunas'	=> '1',
		'css_class'	=> ''

	), $atts));
	if($colunas){

		$colunas= ceil(12/$colunas);
		$colunas = "col-lg-$colunas col-md-$colunas col-sm-12 col-xs-12 ";
	}
	ob_start();
	
	?>	
		<li class="<?=$colunas.' '.$css_class?>">
			<img class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding" src="<?php echo apply_filters("img_serialize",$content)?>" />
			<span><?php echo do_shortcode($texto)?></span>
		</li>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('item_lista', 'vi_shortcode_itemLista');

// abre a ul
function vi_shortcode_moldura($atts,$content=null) {
	extract(shortcode_atts(array(		
		'borda'				=> '',		
	), $atts));

	ob_start();
	?>	
		<img src="<?php echo apply_filters("img_serialize",$borda);?>" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding mask">
		<img src="<?php echo apply_filters("img_serialize",$content);?>" alt="" class="pull-right zero-padding">
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('moldura', 'vi_shortcode_moldura');

// abre a ul
function vi_shortcode_botao($atts,$content=null) {
	extract(shortcode_atts(array(		
		'css_class'	=> '',
		'id'		=> '',
		'colunas'	=> '',
		'margem_esquerda'   => 0,
		'margem_direita'    => 0

	), $atts));

	if($colunas){
		$colunas = ceil(12/$colunas) -$margem_esquerda - $margem_direita;
		$colunas = "col-lg-$colunas col-md-$colunas col-sm-12 col-xs-12";
	}

	$margem = "col-lg-offset-$margem_esquerda col-md-offset-$margem_esquerda";

	ob_start();
	?>	
		<input type="button" value="<?=$content?>" class="<?=$colunas?> <?=$css_class?> <?=$margem?>">
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('botao', 'vi_shortcode_botao');

function vi_shortcode_mapa($atts,$content=null) {
	extract(shortcode_atts(array(		
		'css_class'	=> '',
		'id'		=> '',
	), $atts));

	ob_start();
	?>			
		<center>
			<img id="mapacuritiba" src="<?php echo apply_filters("img_serialize", $content );?>" border="0" width="342" height="465" orgWidth="342" orgHeight="465" usemap="#mapacuritiba" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding" />
			<map name="mapacuritiba" id="map-mapacuritiba">
				<area id="champagnat" class="mapaclick" alt="Champagnat" title="Champagnat" href="" shape="poly" coords="84,110,112,111,124,109,140,114,154,119,176,111,171,102,159,103,144,97,128,97,123,93,113,94,103,94,94,96,89,99,80,101" style="outline:none;" target="_self"/>
				<area id="juveve" class="mapaclick" alt="Juvevê" title="Juvevê" href="" shape="poly" coords="202,57,208,56,217,64,227,62,236,67,239,77,228,79,225,86,221,92,224,97,216,96,212,90,206,87,201,87,193,72" style="outline:none;" target="_self"/>
				<area id="reboucas" class="mapaclick" alt="Rebouças" title="Rebouças" href="" shape="poly" coords="196,141,185,121,209,111,222,121,230,119,241,136,233,140,228,149,222,158,215,155,209,135" style="outline:none;" target="_self"/>
				<area id="portao" class="mapaclick" alt="Portão" title="Portão" href="" shape="poly" coords="135,178,133,172,125,169,120,160,132,153,143,153,151,153,150,144,169,149,174,162,178,169,161,173,150,177,145,175" style="outline:none;" target="_self"/>
				<area id="novomundo" class="mapaclick" alt="Novo Mundo" title="Novo Mundo" href="" shape="poly" coords="190,196,196,189,181,179,184,172,178,169,169,174,161,172,156,174,146,175,139,178,134,178,122,185,139,198,150,201" style="outline:none;" target="_self"/>
			</map>
		</center>
		<div class="wrapper-gmaps">
			<img src="<?php bloginfo('template_url')?>/img/search.png" class="search" alt="">
			<div id="map_canvas"></div>
		</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('mapa', 'vi_shortcode_mapa');

// monta a barra de links da tela de blog
function vi_shortcode_blog_opc($atts,$content=null) {
	extract(shortcode_atts(array(
		'css_class'		=> ''
	), $atts));
	ob_start();	
	?>	
		<ul class="<?=$css_class?> col-lg-offset-1 col-md-offset-1">
			<li><a href="<?php bloginfo("url")?>/blog/mais-recentes">Mais Recentes</a></li>
			<li><a href="<?php bloginfo("url")?>/blog/mais-lidas">Mais Lidas</a></li>
			<li><a href="<?php bloginfo("url")?>/blog/arquivos">Arquivos</a></li>
			<li><a href="<?php bloginfo("url")?>/blog/tags">Tags</a></li>
		</ul>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('blog_opc', 'vi_shortcode_blog_opc');

// barra de pesquisa do blog
function vi_shortcode_blog_search($atts,$content=null) {
	extract(shortcode_atts(array(		
		'action'	=> '#',
	), $atts));

	ob_start();	
	?>
	<form action="<?=$action?>" method="POST"> 
		<input type="text" class="col-lg-4 col-md-4 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-lg-offset-0 col-md-offset-0 zero-padding" placeholder="Faça sua pesquisa aqui">
		<input type="submit" value="">
	</form>

	<?php
	

	$content = ob_get_contents();
	ob_end_clean();

	return $content;
}
add_shortcode('blog_search', 'vi_shortcode_blog_search');

function vi_shortcode_social_share_sdk(){
	?>
	<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- Fim Facebook SDK -->
	<!-- Inicio Twitter SDK -->
	<script>
		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
	</script>
	<!-- Fim Twitter SDK -->
	<!-- Inicio GPlus SDK -->
	<script type="text/javascript">
		 	window.___gcfg = {lang: 'pt-BR'};
		 	(function() {
		  		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		  		po.src = 'https://apis.google.com/js/platform.js';
		  		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		 	})();
	</script>
	<!-- Fim GPlus SDK -->
	<?php
}
add_shortcode('social_share_sdk', 'vi_shortcode_social_share_sdk');

function vi_shortcode_botoes_clubes($atts,$content=null) {
	extract(shortcode_atts(array(		
		'action'	=> '#',
	), $atts));

	ob_start();
	$args = array(
			'posts_per_page'   => 9999,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',			
			'post_type'        => 'clubes',		
			'post_status'      => 'publish',
			'suppress_filters' => true );

		$clubes = new WP_Query($args);

		// aqui , a função recebe o id do clube selecionado pelao párametro PAGE
		$clube =  get_query_var("page");


		while($clubes->have_posts()):$clubes->the_post();				
			global $post;		
			$row=$post;			
			?>

				<button class="red-button col-lg-3 col-md-3 col-sm-12 col-xs-12 no-padding <?=($clube==$row->ID?"active":"")?>" id="<?=$row->post_name?>"><?=$row->post_title?></button>
			
			<?php
		endwhile;
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('botoes_clubes', 'vi_shortcode_botoes_clubes');

function vi_shortcode_professores($atts,$content=null) {

	extract(shortcode_atts(array(		
		'action'	=> '#',
	), $atts));

	ob_start();
	$args = array(
			'posts_per_page'   => 9999,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',			
			'post_type'        => 'clubes',		
			'post_status'      => 'publish',
			'suppress_filters' => true );

		$clubes = new WP_Query($args);		

		// aqui , a função recebe o id do clube selecionado pelao párametro PAGE
		$clube =  get_query_var("page");

		while($clubes->have_posts()):$clubes->the_post();

			global $post;
			$row= $post;

			$professores_ids = explode(",",get_post_meta( get_the_ID(), "professores", true)); 

			

			$args = array(
				'blog_id'      => $GLOBALS['blog_id'],
				'role'		   => 'contributor',
				'meta_key'     => '',
				'meta_value'   => '',
				'meta_compare' => '',
				'meta_query'   => array(),
				'include'      => $professores_ids,
				'exclude'      => array(),
				'orderby'      => 'login',
				'order'        => 'ASC',
				'offset'       => '',
				'search'       => '',
				'number'       => '',
				'count_total'  => false,
				'fields'       => 'all',
				'who'          => ''
			);

			$professoresList = get_users($args);
			
			
			
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-professores <?=$row->post_name?> <?=($clube==$row->ID?" active":"")?>">
				<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 zero-padding nome-clube">
					<h1><?=$row->post_title?></h1>
				</div>
				<?php
				
				foreach($professoresList as $professor)
				{					

					$avatar 	= apply_filters("img_serialize",get_avatar($professor->data->ID));

				?>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wrapper-bio-professor">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 wrapper-avatar zero-padding">
							<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding" src="<?=$avatar?>" alt="">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-excerpt-professor">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 excerpt-about">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding nome">
									<h3><?=$professor->data->display_name?></h3>
								</div>
								   <p><?php bp_profile_field_data(array('field'=>'sobre','user_id' =>$professor->data->ID )) ?></p>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding cref">
									<span><?php bp_profile_field_data(array('field'=>'documento','user_id' =>$professor->data->ID ));?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?
				}
				?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adquira-agora">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 w-w-adquira">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4 wrapper-adiquira">
							<h3 class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">Ainda não possui seu passaporte Multi Clube?</h3 class="">
							<input type="button" class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12" value="Adquira Agora!">
						</div>
						</div>
					</div>
				</div>
			</div>
			<?php

			$first = false;

		endwhile;

	$content = ob_get_contents();

	ob_end_clean();


}

add_shortcode('professores_loop', 'vi_shortcode_professores');


?>
