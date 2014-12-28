<?php 

 /*
 	@author    : Visolutions Tema Michel Damasceno 
 	@copyright : Visolutions
 	@access    : Public
  @name      : Passaporte
  @subpackage: Class
  @version   : 1.0

  */

  class Passaporte 
  {
         public function Cadastrar($login,$email)
         {

          

               $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
               $user_id = wp_create_user($login,$random_password , $email );
               $user = new WP_User( $user_id );
               $user->set_role( 'subscriber' );


         }    
  }

  ?>