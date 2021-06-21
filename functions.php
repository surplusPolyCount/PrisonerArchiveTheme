<?php

//SIMON NOTE: leaving this for now, cause y tf not 
/* not sure why but quick edit can remove the public author from posts. so its disabled until this can be fixed. */
/*
function remove_quick_edit($actions) {
    unset($actions['inline hide-if-no-js']);
    return $actions;
}
add_filter('post_row_actions','remove_quick_edit',10,1);
*/
/*CUSTOM PRISONER SUBMISSIONS POST TYPE*/
function submission_register_post_type() {
	$labels = array(
		'name' => __( 'Prisoner Submissions', ),
		'singular_name' => __( 'Prisoner Submission', ),
		'add_new' => __( 'New Submission', ),
		'add_new_item' => __( 'Add New Submission', ),
		'edit_item' => __( 'Edit Submission', ),
		'new_item' => __( 'New Submission', ),
		'view_item' => __( 'View Submission', ),
		'search_items' => __( 'Search Submissions', ),
		'not_found' =>  __( 'No Submissions Found',  ),
		'not_found_in_trash' => __( 'No Submissions found in Trash',  ),
	   );
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'supports' => array(
		 'title',
		 'editor',
		 'excerpt',
		 'custom-fields',
		 'thumbnail',
		 'page-attributes'
	    ),
		//'taxonomies' => 'category',
		'rewrite'   => array( 'slug' => 'submission' ),
		'show_in_rest' => true
	   );
	register_post_type( 'prisoner_submission', $args );
}
add_action( 'init', 'submission_register_post_type' );



// styling 
//TODO: ADD BOOTSTRAP? 
function load_stylesheets()
{
    wp_register_style('style', get_template_directory_uri() . '/css/style.css', array(), 1, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

add_theme_support( 'content-width');
add_theme_support('post-thumbnails'); //function in wp library that makes it so wp can use images in blog posts

//add_image_size('left-thumb', 800, 180, array('center', 'top'));
add_image_size('left-thumb', 800, 800, false);
add_image_size('smallest', 300, 300, false);
add_image_size('largest', 800, 800, true);

?>
