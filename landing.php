<?php 
/*
Template Name: Landing Page Home
*/
get_header();  

	$pages = get_pages(array(
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'child_of' => get_the_ID()

		)
	);
	foreach ($pages as $page_data)
	{
		$title = $page_data->post_title;
		$slug = sanitize_title($title);
		$template = get_post_meta( $page_data->ID, '_wp_page_template', true ); 
		//$content = apply_filters('the_content', $page_data->post_content);
		echo do_shortcode($page_data->post_content);
	}

get_footer();
?>
