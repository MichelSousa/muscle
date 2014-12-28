<?php

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

class redes_sociais {

	function delete_tables() {
    	global $wpdb;
    	$sql = "DROP TABLE IF EXISTS {$wpdb->prefix}redes_sociais_vi";
    	$wpdb->query( $sql );
    }

	function createtable() {
        global $wpdb;
    	$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}redes_sociais_vi (
    		id INT NOT NULL PRIMARY KEY,
    		facebook VARCHAR(100) NOT NULL,
    		instagram VARCHAR(100) NOT NULL,
    		twitter VARCHAR(100) NOT NULL,
    		youtube VARCHAR(100) NOT NULL,
    		flickr VARCHAR(100) NOT NULL,
    		googleplus VARCHAR(100) NOT NULL,
    		tumblr VARCHAR(100) NOT NULL,
    		linkedin VARCHAR(100) NOT NULL,
            pinterest VARCHAR(100) NOT NULL
        );";
        $wpdb->query($sql);
    }

    function insert_table() {
    	global $wpdb;
		$sql = "REPLACE {$wpdb->prefix}redes_sociais_vi (id, facebook, instagram, twitter, youtube, flickr, googleplus, tumblr, linkedin, pinterest)
        		VALUES ('1', '', '', '', '' ,'', '', '', '', '');";
		$wpdb->query($sql);
    }

	function custom_menu_page(){
    	add_menu_page( 'Redes Sociais', 'Redes Sociais', 'manage_options', 'redes_sociais', array('redes_sociais', 'vi_admin'),'',  67 ); 
	}

	function vi_admin() {
		include_once(get_template_directory() . '/admin/redes-sociais.php');
	}
}