<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<ul class="comment-list">
			<?php 
				wp_list_comments(
					array(
						'style' 		=> 'li',
						'short_ping' 	=> true,
						'avatar_size' 	=> 34,
						'callback'		=> 'listComments'
					)
				);
			?>
		</ul>	
	<?php endif; ?>
	<?php 
		comment_form(
			array(
				$fields = array(
					'author' => '<div class="form-group">
									<label for="nome">Nome</label>
									<span class="hint--right hint--bounce form-control padding-0" data-hint="Insira seu nome">
										<input name="author" type="text" class="form-control padding-0" id="nome" placeholder="Ana Maria">
									</span>
								</div>',
					'email' => '<div class="form-group">
									<label for="email">E-Mail</label>
									<span class="hint--right hint--bounce form-control padding-0" data-hint="Insira seu email de contato">
										<input name="email" type="email" class="form-control padding-0" id="email" placeholder="anamaria@email.com.br">
									</span>
								</div>',
					'url' => ''
				),
				'comment_field' => '<div class="form-group textarea-wrapper">
										<label for="mensagem">Mensagem</label>
										<span class="hint--right hint--bounce form-control padding-0" data-hint="Digite aqui sua mensagem">
											<textarea name="comment" id="mensagem" rows="6" columns="8" class="form-control padding-0 col-xs-12" placeholder="Digite aqui sua mensagem"></textarea>	
										</span>
									</div>',
				'comment_notes_after' => '',	        
				'comment_notes_before' => '',
				'id_submit' => 'comment-submit',
				'label_submit'=>'Enviar',
				'fields' => apply_filters('comment_form_default_fields', $fields ),
				'title_reply'=>'Faça seu comentário'
			)
		);	
	?>
</div>