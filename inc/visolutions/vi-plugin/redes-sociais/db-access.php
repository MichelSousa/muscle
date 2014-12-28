<?php

if ($_POST['funcao'] == 'form') {
  function fs_get_wp_config_path(){
      $base = dirname(__FILE__);
      $path = false;
      if (@file_exists(dirname(dirname(dirname(dirname(dirname(dirname($base)))))))){
          $path = dirname(dirname(dirname(dirname(dirname(dirname(dirname($base)))))));
      }elseif (@file_exists(dirname(dirname(dirname(dirname(dirname(dirname(dirname($base))))))))){
          $path = dirname(dirname(dirname(dirname(dirname(dirname(dirname(dirname($base))))))));
        }else{
        $path = false;
        }
        if ($path != false){
          $path = str_replace("\\", "/", $path);
    }
      return $path;
    }
  define( 'SHORTINIT', true );
  require_once( fs_get_wp_config_path() . '/wp-load.php' );
  if ($_POST['functions'] == 'add') {
    global $wpdb;

    function save_destaques() {
      global $wpdb;
      $sql = "UPDATE {$wpdb->prefix}redes_sociais_vi SET " . $_POST['social'] . " = '" . $_POST['val'] . "' WHERE id =1";
      
      $wpdb->query($sql);
    }
    save_destaques();     
  }
}
