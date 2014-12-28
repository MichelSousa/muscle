<?php
if (!isset($visc_active_shortcodes)) {
    $visc_active_shortcodes = array(); //declaração da array de shortcode ativo
} else {
	global $visc_active_shortcodes;
}
if (!isset($visc_form_contato_css)) {
    $visc_form_contato_css = array();//declaração da array global de css e dependências
    $visc_form_contato_css['dependencia-validacao'] =get_template_directory_uri() . '/css/lib/hint.min.css'; //arquivo principal por segundo
    $visc_form_contato_css['default-validacao'] =get_template_directory_uri() . '/css/style-validacao.src.css'; //arquivo principal por segundo
} else {
	global $visc_form_contato_css;
}
if (!isset($visc_form_contato_js)) {
    $visc_form_contato_js = array(); //declaraçaõ da array de js e dependências
    $visc_form_contato_js['default-validacao'] = get_template_directory_uri() . '/js/script-validacao.min.js'; //arquivo principal por segundo
} else {
	global $visc_form_contato_js;
}

function form_contato_shortcode($atts) {
	global $visc_active_shortcodes;
	if (!array_key_exists('form_contato', $visc_active_shortcodes)){
		$visc_active_shortcodes['form_contato'] = 'active';
	}
	extract(shortcode_atts(array(
		'type' => 'default',
		'id' => '1'
		), $atts));

	// para usar este shortcode, por hora depende-se do ninja forms.
	// ver /docs/docs-validação
	
	// solução temporária \/

	eval('$sc = "[ninja_forms_display_form id=' . $id . ']";');
	echo do_shortcode($sc);

	// solução temporária /\
}

add_shortcode('form_contato', 'form_contato_shortcode');