<?php get_header("notlp"); ?>
<section id="page-404" class="not-lp col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 bg-alteres"></div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
		<h2 class="title">Página <br/>não encontrada</h2>
		<h4>Não conseguimos encontrar a página que voce tentou acessar. :(</h4>
		<p>Mas não desista, continue e tente denovo !</p>
		<p class="no-pain">no pain no gain</p>
		<div class="col-lg-12 col-md 12 col-sm-12 col-xs-12 no-padding action-wrapper">
			<a href="<?php home_url();?>" class="botao pull-left col-lg-4 col-md-4 col-sm-4 col-xs-12">VOLTAR AO INÍCIO</a>
			<div class="pull-right col-lg-6 col-md-6 col-sm-6 col-xs-12 form-wrapper">
				<form action="<?php bloginfo("url");?>" id="search-form">
					<input type="text" name="s" placeholder="Pesquise no portal"/><input type="submit" value="">
				</form>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>