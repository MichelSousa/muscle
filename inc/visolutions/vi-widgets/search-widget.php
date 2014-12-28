<?php
// Creating the widget 
class custom_search_widget extends WP_Widget {

	function __construct() {
	parent::__construct(
	// Base ID of your widget
	'custom_search_widget', 

	// Widget name will appear in UI
	__('Widget de Pesquisa Customizado', 'anaforti'), 

	// Widget description
	array( 'description' => __( 'Widget de pesquisa personalizado', 'anaforti' ), ) 
	);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {

	// This is where you run the code and display the output
	?>
	<div class="search col-lg-12 col-md-12 col-sm-hidden col-xs-hidden widget" id="widget-1">
		<form action="<?php bloginfo('url'); ?>" method="GET">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space">
				<input name="s" type="text" id="search-input" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 handwritten" placeholder="Digite aqui para procurar">
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-right no-space">
				<input type="submit" id="magnifier_submit" value="" class="pull-right">
			</div>
		</form>
	</div>
	<?php
	}
} // Class custom_search_widget ends here

// Register and load the widget
function custom_search_widget_load_widget() {
	register_widget( 'custom_search_widget' );
}
add_action( 'widgets_init', 'custom_search_widget_load_widget' );
?>