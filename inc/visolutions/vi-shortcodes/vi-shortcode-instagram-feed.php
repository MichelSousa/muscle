<?php

if (!isset($visc_active_shortcodes)) {

    $visc_active_shortcodes = array(); //declaração da array de shortcode ativo

} else {

	global $visc_active_shortcodes;

}

if (!isset($visc_instragram_feed_css)) {

    $visc_instragram_feed_css = array();//declaração da array global de css e dependências

    $visc_instragram_feed_css['blueimp-gallery'] =get_template_directory_uri() . '/css/lib/blueimp-gallery.min.css'; //arquivo principal por segundo

} else {

	global $visc_instragram_feed_css;

}

if (!isset($visc_instragram_feed_js)) {

    $visc_instragram_feed_js = array(); //declaraçaõ da array de js e dependências

    $visc_instragram_feed_js['blueimp-gallery'] = get_template_directory_uri() . '/js/lib/jquery.blueimp-gallery.min.js'; //arquivo principal por segundo

} else {

	global $visc_instragram_feed_js;

}

// [instagram_feed]

function vi_shortcode_instagram_feed($atts, $content = null) {

	global $visc_active_shortcodes;

	if (!array_key_exists('instragram_feed', $visc_active_shortcodes)){

		$visc_active_shortcodes['instragram_feed'] = 'active';

	}

	extract(shortcode_atts(array(

		'user' => '',
		'columns' => '',
		'limit' => '',

	), $atts));

	ob_start();

	switch ($columns) {
		case 12:
			$columns = "1";
			break;
		case 6:
			$columns = "2";
			break;
		case 4:
			$columns = "3";
			break;
		case 3:
			$columns = "4";
			break;
		case 2:
			$columns = "6";
			break;
		case 1:
			$columns = "12";
			break;
		default:
			$columns = "6";
			break;
	}

	?>
		<div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    <!-- The container for the list of example images -->
		    <div id="links">
		    <?php
				$feed = file_get_contents('https://copygr.am/' . $user . '/rss');
				$rss = new SimpleXmlElement($feed);
				$count = 1;
				foreach($rss->channel->item as $entrada):
					echo "<a href='" . $entrada->description . "' title='" . $entrada->title . "' data-gallery=''><img class='col-lg-" . $columns . "' src='" . $entrada->description . "' /></a>";
					if($count === intval($limit)){
						break;
					}else{
						$count++;
						continue;
					}
				endforeach;
			?>
		    </div>
		    <br>
		</div>
		<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
		<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
		    <!-- The container for the modal slides -->
		    <div class="slides"></div>
		    <!-- Controls for the borderless lightbox -->
		    <h3 class="title"></h3>
		    <a class="prev">‹</a>
		    <a class="next">›</a>
		    <a class="close">×</a>
		    <a class="play-pause"></a>
		    <ol class="indicator"></ol>
		    <!-- The modal dialog, which will be used to wrap the lightbox content -->
		    <div class="modal fade" style="overflow: hidden;">
		    	<div class="modal-header">
		            <button type="button" class="close" aria-hidden="true">&times;</button>
		            <h4 class="modal-title"></h4>
		        </div>
		        <div class="modal-dialog">
		            <div>
		                <div class="modal-body next"></div>
		            </div>
		        </div>
		    </div>
		</div>

	<?php

	$content = ob_get_contents();

	ob_end_clean();

	return $content;

}



add_shortcode('instagram_feed', 'vi_shortcode_instagram_feed');
