<?php

/* not sure why but quick edit can remove the public author from posts. so its disabled until this can be fixed. */
function remove_quick_edit($actions) {
    unset($actions['inline hide-if-no-js']);
    return $actions;
}
add_filter('post_row_actions','remove_quick_edit',10,1);

function create_author_taxonomy() {
	$labels = array(
	    'name' => 'Public Authors',
	    'singular_name' => 'Public Author',
		'add_new_item' => 'Add New Public Author',
	);
	register_taxonomy(
		'authors',
		'post',
		array(
			'label' => 'Public Author',
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'meta_box_cb' => true,
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'create_author_taxonomy');

function create_artist_taxonomy() {
	$labels = array(
	    'name' => 'Artists',
	    'singular_name' => 'Artist',
		'add_new_item' => 'Add New Artist',
	);
	register_taxonomy(
		'artists',
		'post',
		array(
			'label' => 'Artists',
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'meta_box_cb' => true,
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'create_artist_taxonomy');

function create_issue_taxonomy() {
	$labels = array(
	    'name' => 'Issues',
	    'singular_name' => 'Issue',
		'add_new_item' => 'Add New Issue',
	);
	register_taxonomy(
		'issues',
		'post',
		array(
			'label' => 'Issue',
			'labels' => $labels,
			'hierarchical' => true,			
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'meta_box_cb' => true,
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'create_issue_taxonomy');

function shorter_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'shorter_excerpt_more');

// excerpts of various sizes
function standard_length($length) { return 55; }
function the_standard_excerpt() {
	add_filter( 'excerpt_length', 'standard_length' );
	the_excerpt();
}

function shortest_length($length) { return 15; }
function the_shortest_excerpt() {
	add_filter( 'excerpt_length', 'shortest_length' );
	the_excerpt();
}

function short_length($length) { return 30; }
function the_short_excerpt() {
	add_filter( 'excerpt_length', 'short_length' );
	the_excerpt();
}

function long_length($length) { return 125; }
function the_long_excerpt() {
	add_filter( 'excerpt_length', 'long_length' );
	the_excerpt();
}

// styling 
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
