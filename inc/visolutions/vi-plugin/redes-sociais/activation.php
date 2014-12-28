<?php
include_once('class-redes-sociais.php');

function redes_sociais_activation($oldname, $oldtheme=false) {
  add_action( 'admin_menu', array('redes_sociais', 'custom_menu_page'));
}

add_action("after_switch_theme", array('redes_sociais','createtable'));
add_action("after_switch_theme", array('redes_sociais','insert_table'));
add_action("after_setup_theme", "redes_sociais_activation", 10 ,  2);  