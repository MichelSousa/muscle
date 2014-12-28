<?php


/*

	@Autor : visolutions Team Michel Damasceno
	@Descrição : Pega os dados do receptor e cadastra no banco de dados.
	@version 1.0

*/

include "model/model.php";



 $content 		= $_POST['content'];
 $sender_id 	= $_POST['sender_id'];
 $recipients 	= $_POST['recipients'];

  $enviar = $_POST['enviar'];

 $message=   utf8_decode($content);



/*

 echo '<h1> message :'.   $content .'</h1>';
 echo '<h1> IDsender :'. $sender_id.'</h1>';
 echo '<h1> IDrecipients :'.$recipients.'</h1>';
*/

$model = new Model();
$model->ConectaDB();






	$sql = "
	        INSERT INTO 
	         wp_bp_messages_chat
	        (receive_id,sender_id,message,date_sent,status_2) VALUES ($recipients,$sender_id,'$message',now(),'not')

	       ";

	$model->Insert($sql);



/*
$ch = curl_init("http://www.google.com.br");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);      
        curl_close($ch);

        echo $output;


*/

//selecionar também as conversas de quem recebe 

$sql_select = "
               SELECT * FROM 
                 wp_bp_messages_chat 
               WHERE 
                 receive_id =  $recipients
               AND 
                 sender_id =$sender_id  
               ORDER BY  
                 date_sent 
               DESC";

 $row_select_conversation = $model->SelecionarDados($sql_select); 

?>

<?php
 
 	foreach ($row_select_conversation as $value):
  	
           

?>
  
		<div id="id-20-10-2014-14-17-32-921" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 atividade msg incoming-msg" data-id="4" data-amigo="4" style="position: relative; margin-left: 0px; left: 0px; opacity: 1;">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding left">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar msg no-padding">
		<center>
		<img class="responsive-img img_sender" alt="" src="http://preview.vicomercial.com.br/muscleprime/wp-content/uploads/avatars/1/49f5b488b0cc18e4db57d17a77fef32e-bpfull.jpg">
		</center>
		</div>
		<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome name_sender_res"></span>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bubble msg lefty">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
		<div class="span"><?php echo $value['message']?></div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding radio">
		<img title="" alt="" src="img/undefined.png">
		</div>
		<a class="close" id="<?php echo $value['id']?>">✕</a>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bottom">
		
	
		</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding right">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-avatar  msg no-padding">
		<center>
		<img class="img_friend" alt="" src="http://preview.vicomercial.com.br/muscleprime/wp-content/uploads/avatars/4/6e5e580393648130bfad82de166f6077-bpfull.png">
		</center>
		</div>
		<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding nome name_friend_res"></span>
		</div>
		</div>
		</div>
		</div>
	
  <?php

    endforeach;

  ?>



<script type="text/javascript">

	jQuery(document).ready(function(){

		var img_friend = jQuery(".avatar-msg img").eq(1).attr("src");
		var img_sender = jQuery(".wrapper-avatar img").eq(0).attr("src");
		var name_friend = jQuery(".name_friend").text();
		var name_sender = jQuery(".name_sender").text();


		jQuery(".img_friend").attr("src",img_friend)
		jQuery(".img_sender").attr("src",img_sender)


		jQuery(".name_friend_res").text(name_friend);
		jQuery(".name_sender_res").text(name_sender);



	})

</script>

<!--
<script type="text/javascript">
	jQuery(document).ready(function(){

		jQuery(".close").click(function(){

			var conf =confirm("Deseja excluir essa mensagem ?");

			if(conf == true)
			{
				   alert("deletar")

				   jQuery.ajax({
					url:'',
					type: 'POST',
					data: {del:"true"},
					
					success:function(){

						alert("certo");

					},error:function(){

							alert("errado");

					})
					
			}

			else
			{

				

				
			}	

		})

	})
</script>

-->