<?php

if (!isset($visc_active_shortcodes)) {

    $visc_active_shortcodes = array(); //declaração da array de shortcode ativo

} else {

	global $visc_active_shortcodes;

}

if (!isset($visc_facebook_like_box_css)) {

    $visc_facebook_like_box_css = array();//declaração da array global de css e dependências

} else {

	global $visc_facebook_like_box_css;

}

if (!isset($visc_facebook_like_box_js)) {

    $visc_facebook_like_box_js = array(); //declaraçaõ da array de js e dependências

    $visc_facebook_like_box_js['facebook-like-box'] = get_template_directory_uri() . '/js/script-facebook-like-box.js'; //arquivo principal por segundo

} else {

	global $visc_facebook_like_box_js;

}

// [facebook_like_box]

function vi_shortcode_facebook_like_box($atts, $content = null) {

	global $visc_active_shortcodes;

	if (!array_key_exists('facebook_like_box', $visc_active_shortcodes)){

		$visc_active_shortcodes['facebook_like_box'] = 'active';

	}

	extract(shortcode_atts(array(

		'page_url' => '',

	), $atts));

	ob_start();

	?>

		<div class="fb-like-box" data-href="<?php echo $page_url; ?>" data-width="100%" data-height="300px" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>

	<?php

	$content = ob_get_contents();

	ob_end_clean();

	return $content;

}



add_shortcode('facebook_like_box', 'vi_shortcode_facebook_like_box');
