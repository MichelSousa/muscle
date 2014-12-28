<?php
wp_enqueue_style( '3d-button-proggress-bar', get_template_directory_uri() . '/css/lib/3d-button-proggress-bar.min.css');
wp_enqueue_style( 'redes-sociais', get_template_directory_uri() . '/css/style-redes-sociais.min.css');

if (!function_exists('getValue')) {
	function getValue() {
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}redes_sociais_vi";
		$value = $wpdb->get_row( $sql );
		return (array)$value;
	}
}

$vals = getValue();
$pathPlugin = substr(strrchr(dirname(__FILE__),DIRECTORY_SEPARATOR),1);
?>
		<div class="blur"></div>
		<center>
			<div id="social-wrapper" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
					<center>
						<h1><?php _e('Redes Sociais')?></h1>
						<span class="anotations">Clique no ícone da rede que quiser adicionar :)</span>
					</center>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="facebook" class="social-link <?php if (!$vals['facebook'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe427;
							</span>
						</a>
					</div>
					<div id="facebookwrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="facebookinput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="http://facebook.com/suaPagina" data-form="facebook" value="<?php echo $vals['facebook']; ?>">
						<button id="facebookremove" class="remove-social" style="<?php if (!$vals['facebook'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="facebook">x</button>
						<button id="facebooksend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="googleplus" class="social-link  <?php if (!$vals['googleplus'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe439;
							</span>
						</a>
					</div>
					<div id="googlepluswrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="googleplusinput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="http://plus.google.com/+seuUsuario" data-form="googleplus" value="<?php echo $vals['googleplus']; ?>">
						<button id="googleplusremove" class="remove-social" style="<?php if (!$vals['googleplus'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="googleplus">x</button>
						<button id="googleplussend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="twitter" class="social-link <?php if (!$vals['twitter'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe486;
							</span>
						</a>
					</div>
					<div id="twitterwrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="twitterinput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="http://twitter.com/seuUsuario" data-form="twitter" value="<?php echo $vals['twitter']; ?>">
						<button id="twitterremove" class="remove-social" style="<?php if (!$vals['twitter'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="twitter">x</button>
						<button id="twittersend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="youtube" class="social-link <?php if (!$vals['youtube'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe499;
							</span>
						</a>
					</div>
					<div id="youtubewrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="youtubeinput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="http://youtube.com/user/seuUsuario" data-form="youtube" value="<?php echo $vals['youtube']; ?>">
						<button id="youtuberemove" class="remove-social" style="<?php if (!$vals['youtube'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="youtube">x</button>
						<button id="youtubesend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="pinterest" class="social-link <?php if (!$vals['pinterest'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe464;
							</span>
						</a>
					</div>
					<div id="pinterestwrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="pinterestinput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="http://pinterest.com/seuUsuario" data-form="pinterest" value="<?php echo $vals['pinterest']; ?>">
						<button id="pinterestremove" class="remove-social" style="<?php if (!$vals['pinterest'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="pinterest">x</button>
						<button id="pinterestsend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="flickr" class="social-link <?php if (!$vals['flickr'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe429;
							</span>
						</a>
					</div>
					<div id="flickrwrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="flickrinput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="http://flickr.com/photos/seuUsuario" data-form="flickr" value="<?php echo $vals['flickr']; ?>">
						<button id="flickrremove" class="remove-social" style="<?php if (!$vals['flickr'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="flickr">x</button>
						<button id="flickrsend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="tumblr" class="social-link <?php if (!$vals['tumblr'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe485;
							</span>
						</a>
					</div>
					<div id="tumblrwrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="tumblrinput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="http://seuUsuario.tumblr.com" data-form="tumblr" value="<?php echo $vals['tumblr']; ?>">
						<button id="tumblrremove" class="remove-social" style="<?php if (!$vals['tumblr'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="tumblr">x</button>
						<button id="tumblrsend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="instagram" class="social-link <?php if (!$vals['instagram'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe500;
							</span>
						</a>
					</div>
					<div id="instagramwrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="instagraminput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="http://instagram.com/seuUsuario" data-form="instagram" value="<?php echo $vals['instagram']; ?>">
						<button id="instagramremove" class="remove-social" style="<?php if (!$vals['instagram'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="instagram">x</button>
						<button id="instagramsend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-space icon-wrapper">
						<a href="#" id="linkedin" class="social-link <?php if (!$vals['linkedin'] == '') {echo "exists";} ?> col-lg-2 col-md-2 col-sm-3 col-xs-4 no-space">
							<span class="social-icon">
								&#xe452;
							</span>
						</a>
					</div>
					<div id="linkedinwrapper" class="inputwrapper col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<input type="text" id="linkedininput" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-space social-input" placeholder="Sua URL do LinkedIn" data-form="linkedin" value="<?php echo $vals['linkedin']; ?>">
						<button id="linkedinremove" class="remove-social" style="<?php if (!$vals['linkedin'] == '') {echo "opacity: 1;"; } else {echo "opacity: 0;"; } ?>" data-form="linkedin">x</button>
						<button id="linkedinsend" class="progress-button send" data-style="flip-open" data-perspective data-horizontal>Salvar</button>
					</div>
					<div class="hidden">
						<input type="hidden" id="formtarget" value="<?php echo get_template_directory_uri(); ?>">
					</div>
			</div>	
		</center>
<?php
wp_enqueue_script( 'jquery-mas', get_template_directory_uri() .'/js/lib/jquery.mask.min.js');
wp_enqueue_script( 'classie', get_template_directory_uri() .'/js/lib/classie.js');
wp_enqueue_script( 'modernizr.custom', get_template_directory_uri() .'/js/lib/modernizr.custom.js');
wp_enqueue_script( 'proggressbutton', get_template_directory_uri() .'/js/lib/progressButton.js');
wp_enqueue_script( 'script-redes-sociais', get_template_directory_uri() .'/js/script-redes-sociais.min.js');
?>