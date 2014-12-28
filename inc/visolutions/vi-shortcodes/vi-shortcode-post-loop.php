<?php
// substitua posts_loop pelo nome do seu shortcode
if (!isset($visc_active_shortcodes)) {
    $visc_active_shortcodes = array(); //declaração da array de shortcode ativo
} else {
	global $visc_active_shortcodes;
}
if (!isset($visc_posts_loop_css)) {
    $visc_posts_loop_css = array();//declaração da array global de css e dependências
} else {
	global $visc_posts_loop_css;
}
if (!isset($visc_posts_loop_js)) {
    $visc_posts_loop_js = array(); //declaraçaõ da array de js e dependências
    //$visc_posts_loop_js['script-post-loop'] = get_template_directory_uri() . '/js/script-post-loop.js'; //arquivo principal por segundo
} else {
	global $visc_posts_loop_js;
}
function posts_loop_shortcode($atts) {
	global $visc_active_shortcodes;
	if (!array_key_exists('posts_loop', $visc_active_shortcodes)){
		$visc_active_shortcodes['posts_loop'] = 'active';
	}
	extract(shortcode_atts(array(
		'thumbnail' => 'true',
		'height' 	=> '',
		'direction' => '',
		'navigation'=>'',
		'interval' 	=> '',
		'results' 	=> '',
		'post_type' => '',
		'type' 		=> 'default',
		'category'	=> '',
		'ordenar'	=>  ''
		), $atts));
		ob_start(); 
		$args = array( 'post_type' => $post_type, 'posts_per_page' => $results);
		
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args['paged'] = $page;

		if($category)
		{
			$args['category_name']= $category;
		}
		switch($ordenar)
		{
			case 'mais-vistas':
			break;
			case 'mais-recentes':
			  	$args['orderby']='post_date';
    			$args['order']  ='DESC';
			break;
		}
		

		$query = new WP_query( $args );		


		?>
			<?php if($type === 'slider'): ?>
				<?php if($thumbnail === 'true'): ?>
					<div id="sliders" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:<?php echo $height; ?>px;">
						<?php														
						while ( $query->have_posts() ) : $query->the_post();
						?>
							<div class="slide col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
									<img src="http://blog.gettyimages.com/wp-content/uploads/2013/01/Siberian-Tiger-Running-Through-Snow-Tom-Brakefield-Getty-Images-200353826-001.jpg"/>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<h1><?php echo get_the_title(); ?></h1>
									<?php echo custom_excerpt(get_the_content(), 200); ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php else: ?>
					<div id="sliders" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:<?php echo $height; ?>px;">
						<?php 							
							while ( $query->have_posts() ) : $query->the_post();
						?>
							<div class="slide col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h1><?php echo get_the_title(); ?></h1>
									<?php echo custom_excerpt(get_the_content(), 200); ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			<?php elseif($type=="default"): ?>
				<?php if($thumbnail === 'true'): ?>					
						<?php 							
							while ( $query->have_posts() ) : $query->the_post();
							$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full');							
							?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post">	
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-padding img-wrapper">								
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding wrapper-wrapper-img">
										<img src="<?=@$thumbnail[0]?>"/>
									</div>
								</div>							
								<article class="col-lg-8 col-md-8 col-sm-12 col-xs-12 wrapper-excerpt">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 no-padding date">
										<span class="date-1"><?php the_time("d|m|Y")?></span><br/>
										<span class="date-2"><?php the_time("l")?></span><br/>
										<span class="autor">por <a href=""><? echo get_the_author()?></a></span>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 excerpt">
										<h3><?php echo get_the_title(); ?></h3>
										<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding realexcerpt">
											<?php echo custom_excerpt(get_the_content(), 200); ?>
										</article>
										<a href="<?php the_permalink();?>" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 readmore clearfix pull-right">Leia Mais</a>
									</div>
								</article>
							</div>
						<?php endwhile; ?>					
				<?php else: ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php 				
							while ( $query->have_posts() ) : $query->the_post();
							?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h1><?php echo get_the_title(); ?></h1>
									<?php echo custom_excerpt(get_the_content(), 200); ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			<?php elseif($type==="modelo-A"): ?>
				<?php if($thumbnail === 'true'): ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php 							
							while ( $query->have_posts() ) : $query->the_post();
							$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full');
							?>
							<article class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
								<header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
									<img src="<?=$thumbnail[0]?>" />
								</header>
								<cite class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
									<p class="tit"><?php echo get_the_title(); ?></p>
									<p class="time"><?=get_the_time("H:i - d/m/Y", get_the_id() );?> </p>
									<p class="content"><?php echo custom_excerpt(get_the_content(), 600); ?></p>
									<a href="<?=get_permalink()?>">LER MAIS</a>
								</cite>		
							</article>					
						<?php endwhile; ?>
					</div>
				<?php else: ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php 							
							while ( $query->have_posts() ) : $query->the_post();							
							?>							
							<article class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-space ">
								<cite class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<p class="tit"><?php echo get_the_title(); ?></p>
									<p class="time"><?=get_the_time("H:i - d/m/Y", get_the_id() );?> </p>
									<p class="content"><?php echo custom_excerpt(get_the_content(), 600); ?></p>
								</cite>							
							</arcticle>
						<?php endwhile; ?>						
					</div>
				<?php endif; ?>
			<?php elseif($type==="modelo-muscle"):?>
				<?php if($thumbnail === 'true'): ?>					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12-zero-padding">
							<?php						 							
							while ( $query->have_posts() ) : $query->the_post();
							$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full');
							?>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0 clearfix">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-padding img-wrapper">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding wrapper-wrapper-img">
											<a href="<?=get_the_permalink()?>" title="Visualizar este post"><img src="<?=$thumbnail[0]?>" alt=""></a>
										</div>
									</div>
									<article class="col-lg-8 col-md-8 col-sm-12 col-xs-12 wrapper-excerpt">
										<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 no-padding date">
											<span class="date-1"><?php echo the_time("d|m|Y", get_the_id())?></span><br/>
											<span class="date-2"><?php echo the_time("l", get_the_id())?></span><br/>
											<span class="autor">por <a href="<?php echo get_the_author_link()?>"><?php echo get_the_author()?></a></span>
											<br/>
											<br/>
											<div class="fb-like" data-href="<?php echo get_the_permalink()?>" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
											<br/>
											<br/>
											<div class="fb-share-button" data-href="<?php echo get_the_permalink()?>" data-type="box_count"></div>
											<br/>
											<br/>
											<a href="https://twitter.com/share" data-count="vertical" class="twitter-share-button" data-url="<?php echo get_the_permalink()?>">Tweetar</a>
											<br/>
											<br/>
											<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>
										</div>

										<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 excerpt">
											<h4><a href="<?=get_the_permalink()?>" title="Visualizar este post"><?php echo get_the_title()?></a></h4>
											<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding realexcerpt">
												<?php echo custom_excerpt(get_the_content(),1200);?>											
											</article>
											<?php
												$tags = get_the_tags();
												if($tags){
												?>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tags pull-right">
														<div class="pull-right"><span>Tags:</span>
														<?php												
															foreach($tags as $tag){
																?>
																<a href="" class="tags"><?php echo $tag->name?></a><span class="separador">;</span>
																<?php
															}
															?>
															</div>
													</div>
												<?php
												}
												?>
											<center>
												<a href="<?php echo get_the_permalink() ?>" class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-0 col-xs-offset-0 col-sm-12 col-xs-12 readmore clearfix">Leia Mais</a>
											</center>
										</div>
									</article>

								</div>
							</div>
							<?php endwhile						; 							
							?>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pagination">
							<center>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wrapper">
								<?php								
								$big = 999999999; // need an unlikely integer
								echo paginate_links_padrao( 
									array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $query->max_num_pages
									) 
								);
								?>

								</div>
							</center>
						</div>
				<?php else: ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php 							
							while ( $query->have_posts() ) : $query->the_post();							
							?>							
							<article class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-space ">
								<cite class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<p class="tit"><?php echo get_the_title(); ?></p>
									<p class="time"><?=get_the_time("H:i - d/m/Y", get_the_id() );?> </p>
									<p class="content"><?php echo custom_excerpt(get_the_content(), 200); ?></p>
								</cite>							
							</arcticle>
						<?php endwhile; ?>						
					</div>
				<?php endif; ?>
			<?php endif;?>		
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	add_shortcode('posts_loop', 'posts_loop_shortcode');
