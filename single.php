<?php
	get_header("notlp");
?>
<section id="blog-single" class="wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 not-lp">
<?php
while(have_posts()){
	the_post();
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12-zero-padding">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 id="title" class="col-lg-offset-1 col-md-offset-1">Muscle Prime | Blog</h1>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<ul class="blog-menu col-lg-offset-1 col-md-offset-1">
				<li><a href="">Mais Recentes</a></li>
				<li><a href="">Mais Lidas</a></li>
				<li><a href="">Arquivos</a></li>
				<li><a href="">Tags</a></li>
			</ul>
		</div>
	</div>
	<div class="col-lg-12 col-md12 col-sm-12 col-xs-12 wrapper-search">
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pull-right">
			<input type="text" class="col-lg-4 col-md-4 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-lg-offset-0 col-md-offset-0 zero-padding" placeholder="Faça sua pesquisa aqui">
			<input type="submit" value="">
		</div>
	</div>
	<div class="col-lg-11 col-lg-offset-1 breadcrumb-blog">
		<div class="col-lg-12">
			<ul class="col-lg-offset-1 col-md-offset-1">
				<li><a href="" class="first">blog</a></li>
				<li><a href="">treinamentos</a></li>
				<li><a href="">título do post</a></li>
				
			</ul>
		</div>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12-zero-padding">
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0 clearfix">		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-padding date">
						<span class="date-1">11|12|2013</span><br/>
						<span class="date-2">quarta feira</span><br/>
						<span class="autor">por <a href="">Fulano</a></span>
						<br/>
						<br/>
						<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
						<br/>
						<br/>
						<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-type="box_count"></div>
						<br/>
						<br/>
						<a href="https://twitter.com/share" data-count="vertical" class="twitter-share-button" data-url="' . $post->guid . '">Tweetar</a>
						<br/>
						<br/>
						<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
					<div class="col-lg-10 col-md-10 col-sm-110 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 img-wrapper">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding wrapper-wrapper-img">
							<?=get_the_post_thumbnail();?>
						</div>
					</div>
					<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding wrapper-excerpt">					
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 co-xs-offset-0 excerpt">
						<h4><?=the_title()?></h4>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tags no-padding">
							<div class="pull-left"><span>Tags:</span><a href="" class="tags">Suplementos</a><span class="separador">;</span><a href="" class="tags">fitness</a><span class="separador">;</span><a href="" class="tags">supino</a><span class="separador">;</span></div>
						</div>
						<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding realexcerpt">
							<?php
								the_content();
							?>				
							<!-- VIRA UM SHORTCODE -->										
							<div class="citacao col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0">
								<p class="texto col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 ">Lorem ipsum dolor sit amet, 
									consectetur adipisicing elit, 
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
									Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</p>
								<p class="referencia pull-right">Nome do autor , complemento </p>
							</div>
							<!-- VIRA UM SHORTCODE -->										
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0 moldura-inferior">
								<div class="img-wrapper-moldura">
									<img src="<?php bloginfo("template_url")?>/img/foto.png" alt ="Imagem"/>
								</div>
								<p class="center">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>

							<p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<!-- ATÉ AQUI VIRA UM SHORTCODE -->
							
							<!-- VIRA UM SHORTCODE -->			
							<div class="author col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0" >
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="img-wrapper-author">
										<img src="<?php bloginfo("template_url")?>/img/avatar.png"/>
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<h2>Rodrigo amarante</h2>
									<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Morbi accumsan ipsum velit. <p>
									<div class="pull-right social-icons">
										<a href="#">&#xe227</a>
										<a href="#">&#xe286</a>
										<a href="#">&#xe239</a>
										<a href="#">&#xe252</a>
										<a href="#">&#xe224</a>										
									</div>
								</div>
							</div>
							<!-- ATÉ AQUI VIRA UM SHORTCODE -->
							
							<div class="separador-conteudo"></div>							
						    
							<!-- COMENTÁRIOS -->
							<div class="comentarios">
								<div class="header-comentarios">
									<img src="<?php bloginfo("template_url")?>/img/icon-comentarios.png" />
									<h2><?=get_comments_number()?> Comentários </h2>
								</div>
								<?
									comments_template();
								?>							
							</div>						
						</article>									
					</div>
				</article>
				</div>				
			</div>
		</div>				
	</div>			
	<?php
	}
	?>
</section>
<?php
	// insere as apis (google,twitter,facebook).
	echo do_shortcode("[social_share_sdk]");
	get_footer();
?>