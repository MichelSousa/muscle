<?php
if (!isset($visc_active_shortcodes)) {
    $visc_active_shortcodes = array(); //declaração da array de shortcode ativo
} else {
	global $visc_active_shortcodes;
}
if (!isset($visc_social_share_css)) {
    $visc_social_share_css = array();//declaração da array global de css e dependências
    $visc_social_share_css['dependencia-social'] = get_template_directory_uri() . '/css/lib/monosocial.css'; //arquivo principal por segundo
} else {
	global $visc_social_share_css;
}
if (!isset($visc_social_share_js)) {
    $visc_social_share_js = array(); //declaraçaõ da array de js e dependências
} else {
	global $visc_social_share_js;
}

function social_share_shortcode($atts) {
	global $visc_active_shortcodes;
	if (!array_key_exists('social_share', $visc_active_shortcodes)){
		$visc_active_shortcodes['social_share'] = 'active';
	}
	extract(shortcode_atts(array(
		'type' => 'default',
		'form' => 'circle'
		), $atts));
	$vals = getValue();
	$permalink = get_permalink();
	foreach($vals as $key => $value) {
		if (($value !== '') && ($key !== 'id')) { 
			switch ($key) {
				case 'facebook':
						$html .= '<a href="" class="social-font" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u=file:' . $permalink . '\', \'facebook-share-dialog\', \'width=626,height=436\'); return false;" class="facebooklink">';
						switch ($form) {
							case 'circle':
								$html .= '&#xe227;</a>';
								break;
							
							case 'square':
								$html .= '&#xe427;</a>';
								break;
							case 'none':
								$html .= '&#xe027;</a>';
								break;
						}
						break;
					
					case 'twitter':
						$html .= '<a href="" class="social-font" onclick="
							window.open(\'http://twitter.com/home?status=' . $permalink . '\', \'twitter-share-button\', \'width=626,height=436\'); return false;" class="twitterlink">';
						switch ($form) {
							case 'circle':
								$html .= '&#xe286;</a>';
								break;
							
							case 'square':
								$html .= '&#xe486;</a>';
								break;
							case 'none':
								$html .= '&#xe086;</a>';
								break;
						}							
						break;

					case 'googleplus': 
						$html .= '<a href="" class="social-font" onclick="javascript:window.open(\'https://plus.google.com/share?url=' . $permalink . '\',\'\',\'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\'); return false;" class="gpluslink">';
						switch ($form) {
							case 'circle':
								$html .= '&#xe239;</a>';
								break;
							case 'square':
								$html .= '&#xe439;</a>';
								break;
							case 'none':
								$html .= '&#xe039;</a>';
								break;
						}		
						break;

					case 'pinterest': 
						$html .= '<a href="" class="social-font" onclick="window.open(\'http://www.pinterest.com/pin/create/button/?url=' . $permalink . '\');" data-pin-do="buttonPin" data-pin-config="above">';
						switch ($form) {
							case 'circle':
								$html .= '&#xe264;</a>';
								break;
							
							case 'square':
								$html .= '&#xe464;</a>';
								break;
							case 'none':
								$html .= '&#xe064;</a>';
								break;
						}		
						break;
					case 'linkedin':
						$html .= '<a href="" class="social-font" onclick="window.open(\'https://www.linkedin.com/cws/share?url=' . $permalink . '\');">';
						switch ($form) {
							case 'circle':
								$html .= '&#xe252;</a>';
								break;
							
							case 'square':
								$html .= '&#xe452;</a>';
								break;
							case 'none':
								$html .= '&#xe052;</a>';
								break;
						}		
						break;

					case 'tumblr':
					$html .= '<a href="" class="social-font" onclick="window.open(\'http://www.tumblr.com/share/link?url=' . urlencode($permalink) . '&name=' . urlencode(get_the_title()) . '&description=\');">';
						
						switch ($form) {
							case 'circle':
								$html .= '&#xe285;</a>';
								break;
							
							case 'square':
								$html .= '&#xe485;</a>';
								break;
							case 'none':
								$html .= '&#xe085;</a>';
								break;
						}		
						break;
				}
		}
	}
	return $html;
}
if(function_exists('get_value')) {
	function getValue() {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}social_share_vi";
		$value = $wpdb->get_row( $sql );
		return (array)$value;
	}
}

add_shortcode('social_share', 'social_share_shortcode');