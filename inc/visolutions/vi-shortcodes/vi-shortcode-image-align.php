<?php

// [image_align]
function vi_shortcode_image_align($atts, $content = null) {
	extract(shortcode_atts(array(
		'image' => '',
		'align' => '', //left OR right
	), $atts));
	ob_start();
	?>
		<div class="col-lg-12">
			<?php if($align === 'left'): ?>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-space">
					<img src="<?php echo $image; ?>" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<?php echo $content; ?>
					</section>
				</div>
			<?php elseif ($align === 'right'): ?>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<?php echo $content; ?>
					</section>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-space">
					<img src="<?php echo $image; ?>" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
				</div>
			<?php else: ?>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-space">
					<img src="<?php echo $image; ?>" alt="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-space">
						<?php echo $content; ?>
					</section>
				</div>
			<?php endif; ?>
		</div>   
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('image_align', 'vi_shortcode_image_align');