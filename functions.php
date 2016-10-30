<?php

function get_queries()
{
	$old_url = $_POST['old_url'];
	$new_url = $_POST['new_url'];

	$callbacks = array(
		'change_siteurl_and_homeurl', 
		'change_guid', 
		'change_content_url',
		'change_images_src',
		'change_post_meta'
	);

	$queries = array_reduce(
		$callbacks, 
		function($queries, $callback) use($old_url, $new_url) {
			array_push($queries, $callback($old_url, $new_url));
			return $queries;
		}, 
		array()
	);

	return $queries;
}

function change_siteurl_and_homeurl($old_url, $new_url)
{
	return "UPDATE wp_options SET option_value = replace(option_value, '${old_url}', '${new_url}') WHERE option_name = 'home' OR option_name = 'siteurl';";
}

function change_guid($old_url, $new_url)
{
	return "UPDATE wp_posts SET guid = REPLACE (guid, '${old_url}', '${new_url}');";
}

function change_content_url($old_url, $new_url)
{
	return "UPDATE wp_posts SET post_content = REPLACE (post_content, '${old_url}', '${new_url}');";
}

function change_images_src($old_url, $new_url)
{
	return "UPDATE wp_posts SET post_content = REPLACE (post_content, 'src=\"${old_url}', 'src=\"${new_url}');";
}

function change_post_meta($old_url, $new_url)
{
	return "UPDATE wp_postmeta SET meta_value = REPLACE (meta_value, '${old_url}','${new_url}');";
}