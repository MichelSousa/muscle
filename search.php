<?php 
get_header();
?>
<section class="wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<section class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<?php if ( have_posts() ) :?>
			<?php 
				$args = array(
						'paged' => $page,
						'posts_per_page' => 5
					);
				query_posts($args); ?>
			<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3 class="ubuntu"><?php echo __('Resultados para a pesquisa: %s', 'blank') . '<strong>' . get_search_query() . '</strong>'; ?></h3>
			</section>
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<header>
						<h1><?php echo the_title(); ?></h1>
					</header>
					<section>
						<?php the_content(); ?>
					</section>
					<footer></footer>
				</article>
			<?php endwhile;?>
			<?php wp_reset_query();
		else: ?>
			<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3><?php echo __('Desculpe, sua pesquisa não obteve sucesso =(', 'blank'); ?></h3>
			</section>
		<?php endif; ?>
	</section>
	<aside class="col-lg-4 col-md-4 hidden-xs hidden-sm">
		<?php dynamic_sidebar(); ?>
	</aside>
</section>
<?php
get_footer(); 
?>