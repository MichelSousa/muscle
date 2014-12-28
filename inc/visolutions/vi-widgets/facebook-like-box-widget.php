<?php

class facebook_like_box_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'facebook_like_box_widget', 
			__('Facebook Page Like Box', 'blank'), 
			array( 'description' => __( 'Widget para mostrar Like box de páginas', 'blank' ), ) 
		);
	}
	public function widget( $args, $instance ) {
		$facebook_page_url = $instance['facebook_page_url'];
	?>
		<?php echo do_shortcode('[facebook_like_box page_url="' . $facebook_page_url . '"]'); ?>
	<?php
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'facebook_page_url' ] ) ) {
			$facebook_page_url = $instance[ 'facebook_page_url' ];
		}
		else {
			$facebook_page_url = __( 'URL da sua página aqui =)', 'blank' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook_page_url' ); ?>"><?php echo __( 'URL da página do Facebook:', 'blank' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_page_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_page_url' ); ?>" type="text" value="<?php echo esc_attr( $facebook_page_url ); ?>" />
		</p>

	<?php 

	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['facebook_page_url'] = ( ! empty( $new_instance['facebook_page_url'] ) ) ? strip_tags( $new_instance['facebook_page_url'] ) : '';
		return $instance;
	}
}

function facebook_like_box_widget_load_widget() {
	register_widget( 'facebook_like_box_widget' );
}
add_action( 'widgets_init', 'facebook_like_box_widget_load_widget' );

?>