<?php
if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
}	
// post-type suplementos
add_action('init', 'type_post_suplementos');

function type_post_suplementos() 
{
	$labels = array(
		'name' => _x('suplementos ', 'post type general name'),
		'singular_name' => _x('suplementos', 'post type singular name'),
		'add_new' => _x('Adicionar Novo', 'Novo item'),
		'add_new_item' => __('Novo Item'),
		'edit_item' => __('Editar Item'),
		'new_item' => __('Novo Item'),
		'view_item' => __('Ver Item'),
		'search_items' => __('Procurar Itens'),	
		'not_found' => __('Nenhum registro encontrado'),
		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'suplementos'
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,	
		'query_var' => true,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'register_meta_box_cb' => 'suplementos_meta_box',	
		'supports' => array('title','editor','thumbnail')
	);

	register_post_type( 'suplementos' , $args );
	
	flush_rewrite_rules();

	
	function suplementos_meta_box()
	{
		add_meta_box('meta_box_suplementos', __('Informações sobre o clube'), 'meta_box_meta_suplementos', 'suplementos', 'advanced', 'high');		
	}

	

    function meta_box_meta_suplementos(){
		global $post;
		$nome 			= get_post_meta($post->ID, 'nome', true);		
		$fabricante 	= get_post_meta($post->ID, 'fabricante', true);
		
		?>
        <div class="form-field form-required">					        	
            <label for="endereco">Nome do suplemento: </label>
            <input name="endereco" id="inputEndereco" value="<?php echo $nome; ?>" type="text" /><br/>

            <label for="telefone">Fabricante : </label>
            <input name="telefone" id="inputTelefone" value="<?php echo $fabricante; ?>" type="text" /><br/>

            

       

		</div>        
		<?php
	}
	
	add_action('save_post', 'save_suplementos_post');
	function save_suplementos_post(){	
		global $post;
		update_post_meta($post->ID, 'nome', $_POST['nome']);
		update_post_meta($post->ID, 'fabricante', $_POST['fabricante']);
	

	}

	
}