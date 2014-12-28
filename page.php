<?php 
get_header('notlp');
while ( have_posts() ) : the_post();	
	the_content();
endwhile;
get_footer(); 
?>