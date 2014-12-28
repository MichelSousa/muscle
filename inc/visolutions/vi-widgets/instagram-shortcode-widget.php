<?php

class instagram_photo_feed_widget extends WP_Widget {

	function __construct() {

		parent::__construct(
			'instagram_photo_feed_widget', 
			__('Instagram Feed Widget', 'blank'), 
			array( 'description' => __( 'Widget de fotos recentes do instagram', 'blank' ), ) 
		);
	}
	public function widget( $args, $instance ) {
		$instagram_user = $instance['instagram_user'];
		$columns = $instance[ 'columns' ];
		$limit = $instance[ 'limit' ];
	?>
		<?php echo do_shortcode('[instagram_feed user="' . $instagram_user . '" columns="' . $columns . '" limit="' . $limit . '"]'); ?>
	<?php
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'instagram_user' ] ) ) {
			$instagram_user = $instance[ 'instagram_user' ];
			$columns = $instance[ 'columns' ];
			$limit = $instance[ 'limit' ];
		}
		else {
			$instagram_user = __( 'URL da sua página aqui =)', 'blank' );
			$columns = __( 'Número de Colunas dentro do widget', 'blank' );
			$limit = __( 'Limite de fotos para o Widget', 'blank' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_user' ); ?>"><?php echo __( 'Usuário do Instagram:', 'blank' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_user' ); ?>" name="<?php echo $this->get_field_name( 'instagram_user' ); ?>" type="text" value="<?php echo esc_attr( $instagram_user ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'columns' ); ?>"><?php echo __( 'Número de Colunas:', 'blank' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'columns' ); ?>" name="<?php echo $this->get_field_name( 'columns' ); ?>">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="6">6</option>
				<option value="12">12</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php echo __( 'Limite de fotos:', 'blank' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $limit ); ?>" />
		</p>
	<?php 

	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['instagram_user'] = ( ! empty( $new_instance['instagram_user'] ) ) ? strip_tags( $new_instance['instagram_user'] ) : '';
		$instance['columns'] = ( ! empty( $new_instance['columns'] ) ) ? strip_tags( $new_instance['columns'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
		return $instance;
	}
}

function instagram_photo_feed_widget_load_widget() {
	register_widget( 'instagram_photo_feed_widget' );
}
add_action( 'widgets_init', 'instagram_photo_feed_widget_load_widget' );

?>