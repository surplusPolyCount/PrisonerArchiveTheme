<?php 
/* FROM THE FUNCTIONS.PHP PAGE OF OLD THEME */

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

function add($a, $b){return 10;}

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

//FOR TAGS & ADDITIONAL OPTIONS FOR POST FEATURE 
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

?>