<?php
if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
}	
// post-type clubes
add_action('init', 'type_post_clubes');

add_action('post_edit_form_tag', 'add_post_enctype');
function add_post_enctype() {
    echo ' enctype="multipart/form-data"';
}

function type_post_clubes() 
{
	$labels = array(
		'name' => _x('clubes ', 'post type general name'),
		'singular_name' => _x('Clubes', 'post type singular name'),
		'add_new' => _x('Adicionar Novo', 'Novo item'),
		'add_new_item' => __('Novo Item'),
		'edit_item' => __('Editar Item'),
		'new_item' => __('Novo Item'),
		'view_item' => __('Ver Item'),
		'search_items' => __('Procurar Itens'),	
		'not_found' => __('Nenhum registro encontrado'),
		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Clubes'
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
		'register_meta_box_cb' => 'clubes_meta_box',	
		'supports' => array('title','editor','thumbnail')
	);

	register_post_type( 'clubes' , $args );
	
	flush_rewrite_rules();

	register_taxonomy(
		"atividades",
		"clubes",
		array(
			"label" => "Atividades",
			"singular_label" => "Atividade",
			"rewrite" => false,
			"hierarchical" => true
		)
	);

	
	function clubes_meta_box()
	{
		add_meta_box('meta_box_test', __('Informações sobre o clube'), 'meta_box_meta_test', 'clubes', 'advanced', 'high');
		add_meta_box('meta_box_professores', __('Professores'), 'professores_meta_box', 'clubes', 'side', 'high');
	}

	function professores_meta_box()
	{
		global $post;
		$args = array(
			'blog_id'      => $GLOBALS['blog_id'],
			'role'		   => 'contributor',
			'meta_key'     => '',
			'meta_value'   => '',
			'meta_compare' => '',
			'meta_query'   => array(),
			'include'      => array(),
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
		$professores = explode(",",get_post_meta($post->ID, 'professores', true));

		?>
			<fieldset>
            	<label for="professores"></label><br>
	            <ul class="categorychecklist form-no-clear" data-wp-lists="list:atividades" id="atividadeschecklist">								
		           	<?php
		           	foreach($professoresList as $row)
		           	{
			           	?>
			           		<li class="professores" id="professores-<?=$row->data->ID?>"><label class="selectit"><input type="checkbox" id="in-professores-<?=$row->data->ID?>" name="professores[]" <?=(in_array($row->data->ID, $professores)?" checked=\"checked\"":"")?> value="<?=$row->data->ID?>"><?=$row->data->display_name?></label></li>
			           	<?
		           	}
		           	?>
	        	</ul>
	        </fieldset>
	    <?php


	}
	

    function meta_box_meta_test(){
		global $post;
		$endereco 			= get_post_meta($post->ID, 'endereco', true);		
		$telefone 			= get_post_meta($post->ID, 'telefone', true);
		$destaque 			= get_post_meta($post->ID, 'destaque', true); // guarda os ids das atividades separados por ,
		$horario 			= get_post_meta($post->ID, 'horario', true);
		?>
        <div class="form-field form-required">					
        	<label for="destaque">
            <input name="destaque" id="inputDestaque" style="width:14px;" type="checkbox" <?=($destaque=='on'?"checked=\"checked\"":"")?>/>
            Destaque ?</label><br/>

            <label for="endereco">Endereço: </label>
            <input name="endereco" id="inputEndereco" value="<?php echo $endereco; ?>" type="text" /><br/>

            <label for="telefone">Telefone : </label>
            <input name="telefone" id="inputTelefone" value="<?php echo $telefone; ?>" type="text" class="fone" /><br/>

            <label for="horario">Horário : </label><br/>
            <textarea name="horario" id="inputHorario"><?php echo $horario; ?> </textarea><br/>

       

		</div>        
		<?php
	}
	
	add_action('save_post', 'save_clubes_post');
	function save_clubes_post(){	
		global $post;
		update_post_meta($post->ID, 'endereco', $_POST['endereco']);
		update_post_meta($post->ID, 'telefone', $_POST['telefone']);
		update_post_meta($post->ID, 'destaque', $_POST['destaque']);
		update_post_meta($post->ID, 'horario', $_POST['horario']);
		if(is_array($_POST["professores"])){
			update_post_meta($post->ID, 'professores', implode(",", $_POST["professores"]));
		}

	}

	
}