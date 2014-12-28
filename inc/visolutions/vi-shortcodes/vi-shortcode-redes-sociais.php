<?php
if (!isset($visc_active_shortcodes)) {
    $visc_active_shortcodes = array(); //declaração da array de shortcode ativo
} else {
	global $visc_active_shortcodes;
}
if (!isset($visc_social_networks_css)) {
    $visc_social_networks_css = array();//declaração da array global de css e dependências
} else {
	global $visc_social_networks_css;
}
if (!isset($visc_social_networks_js)) {
    $visc_social_networks_js = array(); //declaraçaõ da array de js e dependências
} else {
	global $visc_social_networks_js;
}

function social_networks_shortcode($atts) {
	global $visc_active_shortcodes;
	if (!array_key_exists('social_networks', $visc_active_shortcodes)){
		$visc_active_shortcodes['social_networks'] = 'active';
	}
	extract(shortcode_atts(array(
		'type' => 'default',
		), $atts));
	$vals = getValue();
	$html .= '<div class="col-lg-12 col-md-12 hidden-sm hidden-xs no-space">';
		foreach($vals as $key => $value) {
			if (($value !== '') && ($key !== 'id')) { 
				$html .= '<a href="' . $value . '" target="_blank" class="col-lg-4 col-md-4 hidden-sm hidden-xs no-space">';
					$html .= '<img id="social_networks_' . $key . '" src=' . get_template_directory_uri() . '/img/social_networks_' . $key . '.png>';
				$html .= '</a>';
		}
	}

	$html .= '</div>';
	return $html;
}

if(!function_exists('get_value')) {
	function getValue() {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}redes_sociais_vi";
		$value = $wpdb->get_row( $sql );
		return (array)$value;
	}
}

add_shortcode('social_networks', 'social_networks_shortcode');