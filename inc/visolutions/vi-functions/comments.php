<?php
function listComments($comment)
{		
//echo "<pre>".var_export($comment,true)."</pre>";
?>
<li class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding">
		<?php echo get_avatar($comment->user_id); ?>
	</div>
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding">
		<h3><?=$comment->comment_author?></h3>
		<h4><?=the_date()?></h4>
		<p><?=$comment->comment_content?></p>
		<a href="#">Responder</a>
	</div>
</li>
<?php
}

?>