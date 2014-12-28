<?php

 


    /*
		@descrição : API DO PAGSEGURO 
    */
        

      


    

/**
	* [START]VI Includes
*/
	include_once('inc/visolutions/vi-includes.php');
/**
	* [END]VI Includes
*/

/**
	* [START]Add Theme Supports
*/
	add_theme_support( 'post-thumbnails' );

	/*  Registrer menus. */

	register_nav_menus( 
		array(
			'primary' => __( 'Main Menu', 'blank' )
		)
	);

	register_sidebar( 
		array(
			'id' => 'main-sidebar',
			'name' => __( 'Ícones laterais do topo', 'blank' ),
			'description' => __( 'Esta sidebar serve para adicionar os icones da lateral do topo.', 'pastaemix' ),
		)
	);
/**
	* [END]Add Theme Supports
*/

/**
	* [START]Theme Functions
*/
	function custom_excerpt($content, $lenght){
		$content = strip_tags($content, '<p><br />');
		$content = substr($content, 0, $lenght);
		return $content;
	}

	// unregister all DEFAULT widgets exlude text widget
	function unregister_default_widgets() {
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Nav_Menu_Widget');
		unregister_widget('Twenty_Eleven_Ephemera_Widget');
	}
	add_action('widgets_init', 'unregister_default_widgets', 11);
/**
	* [END]Theme Functions
*/

/**
	* [START]Enqueue scripts and styles and fonts
*/
	function enqueue_scripts() {
		/* styles */
		wp_enqueue_style( 'bootstrap', 'http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css');

		/* fonts */
		wp_enqueue_style( 'font-monosocial', get_template_directory_uri() . '/css/font-monosocial.css');

		/* main style */
		wp_enqueue_style( 'style', get_stylesheet_uri());

		/* template style*/
		wp_enqueue_style( 'template-style', get_template_directory_uri() . '/css/theme.css');
		wp_enqueue_style( 'satans-style', get_template_directory_uri() . '/css/bootstrap-select.min.css');
		wp_enqueue_style( 'hint-style', get_template_directory_uri() . '/css/lib/hint.min.css');
		
		wp_enqueue_style( 'validation-style', get_template_directory_uri() . '/css/style-validacao.min.css');
		

		/* JS libaries */
		wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
		wp_enqueue_script( 'bootstrap-js', 'http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js');
		wp_enqueue_script( 'bootstrap-select-js', get_template_directory_uri().'/js/bootstrap-select.min.js');
		wp_enqueue_script( 'waypoit', get_template_directory_uri().'/js/waypoints.min.js');
		wp_enqueue_script( 'slide', get_template_directory_uri().'/js/slide.js');
		wp_enqueue_script( 'rwdImage', get_template_directory_uri().'/js/rwdImageMaps.min.js');
		wp_enqueue_script( 'googleMaps', 'http://maps.googleapis.com/maps/api/js?key=AIzaSyChBKnlj7brSLsxikrF61srNEcTy698ddo&sensor=false');		
		wp_enqueue_script( 'matchHeight',get_template_directory_uri().'/js/match_height.js');
		wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js');

		if (!is_user_logged_in()) {
			wp_localize_script( 'script', 'ajax_login_object', array( 
		        'ajaxurl' => admin_url( 'admin-ajax.php' ),
		        'redirecturl' => home_url(),
		    	'loadingmessage' => __('Enviando seus dados, por favor aguarde...')

		    ));
		}
		else{
			wp_localize_script( 'script', 'parametros', array( 
		        'current_action' => bp_current_action()
		    ));	
		}

		// PEGANDO O POST NAME DA PAGINA E PASSANDOX AO JS
		global $post; 
		$post->post_name;	


		$parametros  = array("site_url"=>home_url(),"pagename"=>$post->post_name);

		wp_localize_script( 'script', 'parametros',$parametros );




	}

	add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
/**
	* [END]Enqueue scripts and styles and fonts
*/
/**
* Hook to implement shortcode logic inside WordPress nav menu items
* Shortcode code can be added using WordPress menu admin menu in description field
*/
function shortcode_menu( $item_output, $item ) {
	if ( !empty($item->description)) {
		$output = do_shortcode($item->description);
		if ( $output != $item->description )$item_output = $output;
	}
	return $item_output;
}

function setPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count == ""):
	    $count = 0;
	    delete_post_meta($postID, $count_key);
	    add_post_meta($postID, $count_key, '0');
	else:
	    $count++;
	    update_post_meta($postID, $count_key, $count);
	endif;
}

function paginate_links_padrao( $args = '' ) {
	$defaults = array(
		'base' => '%_%', 
		'format' => '?page=%#%', 
		'total' => 1,
		'current' => 0,
		'show_all' => false,
		'prev_next' => true,
		'prev_text' => 'Anterior',
		'next_text' => 'Próximo',
		'end_size' => 1,
		'mid_size' => 2,
		'type' => 'plain',
		'add_args' => false, // array of query args to add
		'add_fragment' => ''
	);

	$args = wp_parse_args( $args, $defaults );
	extract($args, EXTR_SKIP);

	// Who knows what else people pass in $args
	$total = (int) $total;
	if ( $total < 2 )
		return;
	$current  = (int) $current;
	$end_size = 0  < (int) $end_size ? (int) $end_size : 1; // Out of bounds?  Make it the default.
	$mid_size = 0 <= (int) $mid_size ? (int) $mid_size : 2;
	$add_args = is_array($add_args) ? $add_args : false;
	$r = '';
	$page_links = array();
	$n = 0;
	$dots = false;

	if ( $prev_next && $current && 1 < $current ) :
		$link = str_replace('%_%', 2 == $current ? '' : $format, $base);
		$link = str_replace('%#%', $current - 1, $link);
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $add_fragment;
		$page_links[] = '<a class="previous" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '"><img src="'.get_bloginfo("template_url").'/img/blogprev.png" alt="'. $prev_text .'">' . $prev_text . '</a>';
	else:
		$link = str_replace('%_%', 2 == $current ? '' : $format, $base);
		$link = str_replace('%#%', $current - 1, $link);
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $add_fragment;
		$page_links[] = '<a class="previous" href="javascript:;"><img src="'.get_bloginfo("template_url").'/img/blogprev.png" alt="'. $prev_text .'">' . $prev_text . '</a>';

	endif;

	for ( $n = 1; $n <= $total; $n++ ) :
		$n_display = number_format_i18n($n);
		if ( $n == $current ) :
			$page_links[] = "<a class='number active' href='javascript:;'>$n_display</a>";
			$dots = true;
		else :
			if ( $show_all || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
				$link = str_replace('%_%', 1 == $n ? '' : $format, $base);
				$link = str_replace('%#%', $n, $link);
				if ( $add_args )
					$link = add_query_arg( $add_args, $link );
				$link .= $add_fragment;
				$page_links[] = "<a class='number' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>$n_display</a>";
				$dots = true;
			elseif ( $dots && !$show_all ) :
				$page_links[] = '<span class="separator-reticencias">...</span>';
				$dots = false;
			endif;
		endif;
	endfor;
	if ( $prev_next && $current && ( $current < $total || -1 == $total ) ) :
		$link = str_replace('%_%', $format, $base);
		$link = str_replace('%#%', $current + 1, $link);
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $add_fragment;
		$page_links[] = '<a class="next" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $next_text . '<img src="'.get_bloginfo("template_url").'/img/blogprox.png" alt="'. $prev_text .'"></a>';
	else:
		$link = str_replace('%_%', $format, $base);
		$link = str_replace('%#%', $current + 1, $link);
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $add_fragment;
		$page_links[] = '<a class="next" href="javascript:;">' . $next_text . '<img src="'.get_bloginfo("template_url").'/img/blogprox.png" alt="'. $prev_text .'"></a>';
	endif;
	switch ( $type ) :
		case 'array' :
			return $page_links;
			break;
		case 'list' :
			$r .= "<ul class='page-numbers'>\n\t<li>";
			$r .= join("</li>\n\t<li>", $page_links);
			$r .= "</li>\n</ul>\n";
			break;
		default :
			$r = join("\n", $page_links);
			break;
	endswitch;
	echo  $r;
}


add_filter("walker_nav_menu_start_el", "shortcode_menu" , 10 , 2);

function getAge($birth){
	$t = time();
	$age = ($birth < 0) ? ( $t + ($birth * -1) ) : $t - $birth;
	return floor($age/31536000);
}

//add_filter('show_admin_bar', '__return_false');



/*
****************************************	AJAX *******************************
*/

// BUSCA O AVATAR DO USUÁRIO , POR ID
add_action('wp_ajax_buscar_avatar', 'buscarAvatar');
function buscarAvatar() {
	$userId   = $_POST['user_id'];
	$userdata = get_userdata($userId);
	
	$paramAvatar = array("item_id"=>$userId,"type"=>"full");
	$retorno = array("login"=>$userdata->data->user_login,
					"nome"=>$userdata->data->display_name,
					"avatar"=>apply_filters("img_serialize",bp_core_fetch_avatar( $paramAvatar ))
					);

	echo json_encode($retorno); 
	die();
}

// ENVIA UMA MENSAGEM A UM AMIGO
add_action('wp_ajax_send_private_message', 'send_private_message');
function send_private_message() {	
	if(messages_new_message($_POST))
	{
		$retorno = array("sucesso"=>true);

		// VERIFICO O PARAMETRO SINGLE , PARA SABER DE QUAL TELA VEIO A REQUISIÇÃO (MENSAGENS OU MENSAGENS-SINGLE),
		// CASO EXISTA O PARAMETRO , PASSO PARA O JS TRABALHAR O FEEDBACK DE RETORNO DE MANEIRA DIFERENTE.
		if(array_key_exists("single",$_POST)){
			$retorno["single"] = TRUE;
		}
		echo json_encode($retorno);
	}
	else
	{
		echo json_encode(array("sucesso"=>false));
	}
	die();
}

// ENVIA UMA RESPOSTA MENSAGEM A UM AMIGO
add_action('wp_ajax_send_reply_message', 'send_reply_message');
function send_reply_message(){	
	if(messages_new_message( array( 'thread_id' => (int) $_REQUEST['thread_id'], 'content' => $_REQUEST['content'] ) ))
	{
		echo json_encode(array("sucesso"=>true));
	}
	else
	{
		echo json_encode(array("sucesso"=>false));
	}
	die();
}

// EFETUA UM PEDIDO DE AMIZADE
add_action('wp_ajax_add_as_friend', 'add_as_friend');
function add_as_friend() {	
	$friend_id = $_POST['friend_id'];
	if(friends_add_friend( bp_loggedin_user_id(), $friend_id ))
	{
		echo json_encode(array("sucesso"=>true));
	}
	else
	{
		echo json_encode(array("sucesso"=>false));
	}
	die();
}

// CANCELA UMA AMIZADE
add_action('wp_ajax_remove_as_friend', 'remove_as_friend');
function remove_as_friend() {
	$friend_id = $_POST['friend_id'];
	if(friends_remove_friend( bp_loggedin_user_id(), $friend_id ))
	{
		echo json_encode(array("sucesso"=>true));
	}
	else
	{
		echo json_encode(array("sucesso"=>false));
	}
	die();
}


// FUNÇÃO CHAMADA PARA EFETUAR O LOGIN EM AJAX
function ajax_login(){
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );


    // Nonce is checked, get the POST data and sign user on
    $info = array();   

    $user = explode("@",$_POST['username']);

    if($user[0]>1)
    {
		$info['user_login'] = $user[0];
	}
	else
	{
		$info['user_login'] = $_POST['username'];
	}
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Usuário ou senha inválidos.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login realizado, redirecionando...')));
    }
    die();
}
add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );



?>