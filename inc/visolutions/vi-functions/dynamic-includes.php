<?php
function VIdynamicSC() {
	global $visc_active_shortcodes;
	foreach ($visc_active_shortcodes as $key1 => $value1) {
		echo eval('global $visc_'. $key1 . '_css;');
		echo eval('global $visc_'. $key1 . '_js;');
		echo eval('$css = $visc_'. $key1 . '_css;');
		echo eval('$js = $visc_'. $key1 . '_js;');
		foreach ($css as $key2 => $value2) {
			wp_enqueue_style( $key2, $value2 , array(), '', false  );
		}
		foreach ($js as $key3 => $value3) {
			wp_enqueue_script( $key3, $value3 , array(), '', true );
		}
	}	
}

