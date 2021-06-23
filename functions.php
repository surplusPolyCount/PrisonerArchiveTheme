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

//https://metabox.io/custom-fields-vs-custom-taxonomies/
add_action( 'init', 'submission_register_post_type' );

function create_author_taxonomy() {
	$labels = array(
	    'name' => 'Authors',
	    'singular_name' => 'Author',
		'add_new_item' => 'Add New Author',
	);
	register_taxonomy(
		'Authors',
		'prisoner_submission',
		array(
			'label' => 'Author',
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
//https://www.google.com/search?client=firefox-b-1-d&q=create+custom+metabox+for+taxonomy
?>
<?php 
/* SUBMISSION TYPE */
function create_submission_taxonomy() {
	$labels = array(
	    'name' => 'Submission Types',
	    'singular_name' => 'Submission Type',
		'add_new_item' => 'Add New Submission Type',
	);
	register_taxonomy(
		'submission_type',
		'prisoner_submission',
		array(
			'label' => 'Sumbission Type',
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
add_action('init', 'create_submission_taxonomy');

function create_date_taxonomy() {
	$labels = array(
	    'name' => 'Date Sent',
	    'singular_name' => 'Date',
		'add_new_item' => 'Add New Date',
	);
	register_taxonomy(
		'date_sent',
		'prisoner_submission',
		array(
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_in_quick_edit' => false, //hides the metabox of the taxonomy we just made
			'meta_box_cb' => false         //hides the metabox of the taxonomy we just made
		), 
	);
}
add_action('init', 'create_date_taxonomy');


https://www.toptal.com/wordpress/wordpress-taxonomy-tutorial
// CREATE CUSTOM TAXONOMY

//called to create new metabox
add_action('add_meta_boxes', 'add_date_meta_box');
function add_date_meta_box(){
	add_meta_box( 'date_box', __('Date Sent'), 'fill_date_meta_box_content', 'prisoner_submission' ,'normal');
}?>

<?php 
function fill_date_meta_box_content($post){
	$terms = get_terms( array(
		'taxonomy' => 'date_sent',
		'hide_empty' => false // Retrieve all terms
	));
	$currentDateValue = get_the_terms($post->ID, 'date_sent')[0];
	?>
	<p class='meta-options hcf_field'>
	<?php echo $currentDateValue->name;?> 
	<label for="dat_sent_<?php echo $currentDateValue->term_id;?>">Date Sent</label>
		<input id='date_sent_ <?php echo $currentDateValue->term_id?>' 
		       type='date' 
			   name='date_sent'
			   value="<?php echo $currentDateValue->name;?>">
	</p>
<?php
}
//save user input
function date_save_meta_box( $post_id ) {
	if ( isset( $_REQUEST['date_sent'] ) ) 
		wp_set_object_terms($post_id, $_POST['date_sent'], 'date_sent');
}
add_action( 'save_post', 'date_save_meta_box' );


/*TAXONOMY FOR WHETHER OR NOT WANTS PENPAL */
function create_penpal_taxonomy() {
	$labels = array(
	    'name' => 'Wants Penepal',
	);
	register_taxonomy(
		'wants_penpal',
		'prisoner_submission',
		array(
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_ui' => false,
			'show_admin_column' => true,
			'show_in_quick_edit' => false, //hides the metabox of the taxonomy we just made
			'meta_box_cb' => false         //hides the metabox of the taxonomy we just made
		)
	);
	wp_insert_term(
		'no', // the term 
		'wants_penpal', // the taxonomy
		array(
		  'slug' => 'no',
		)
	);
	wp_insert_term(
		'yes', // the term 
		'wants_penpal', // the taxonomy
		array(
		  'slug' => 'yes',
		)
	);
}
add_action('init', 'create_penpal_taxonomy');

//called to create new metabox
add_action('add_meta_boxes', 'add_penpal_meta_box');
function add_penpal_meta_box(){
	add_meta_box( 'penpal_box', __('Wants Penpal'), 'fill_penpal_meta_box_content', 'prisoner_submission' ,'normal');
}?>

<?php
function fill_penpal_meta_box_content( $post ) {
	$terms = get_terms( array(
		'taxonomy' => 'wants_penpal',
		'hide_empty' => false // Retrieve all terms
	));

	// We assume that there is a single category
	$currentTaxonomyValue = get_the_terms($post->ID, 'wants_penpal')[0];
?>
	<p>Choose taxonomy value</p>
	<p>
		<?php foreach($terms as $term): ?>
			<input type="radio"
				   name="wants_penpal" 
				   id="wants_penpal<?php echo $term->term_id;?>" 
				   value="<?php echo $term->term_id;?>"
				   <?php if($term->term_id==$currentTaxonomyValue->term_id) echo "checked"; ?>>
			<label for="wants_penpal<?php echo $term->term_id;?>"><?php echo $term->name; ?></label>
			</input><br/>
		<?php endforeach; ?>
	</p>
<?php
}

//save user input
add_action('save_post', 'save_custom_taxonomy');
function save_custom_taxonomy($post_id){
	if ( isset( $_REQUEST['wants_penpal'] ) ) 
		wp_set_object_terms($post_id, (int)sanitize_text_field( $_POST['wants_penpal'] ), 'wants_penpal');
}

/* ADDRESS TAXONOMY */

function create_address_taxonomy() {
	$labels = array(
	    'name' => 'Addresses',
	    'singular_name' => 'Address',
		'add_new_item' => 'Add New Address',
	);
	register_taxonomy(
		'address',
		'prisoner_submission',
		array(
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_ui' => false,
			'show_in_quick_edit' => false, //hides the metabox of the taxonomy we just made
			'meta_box_cb' => false         //hides the metabox of the taxonomy we just made
		), 
	);
}
add_action('init', 'create_address_taxonomy');


//https://www.toptal.com/wordpress/wordpress-taxonomy-tutorial
// CREATE CUSTOM TAXONOMY

//called to create new metabox
function parse_address_from_taxonomy($tax_val){
	$tax_str = explode("_",$tax_val->name );
	return $tax_str;
}

add_action('add_meta_boxes', 'add_address_meta_box');
function add_address_meta_box(){
	add_meta_box( 'address_box', __('Address'), 'fill_address_meta_box_content', 'prisoner_submission' ,'normal');
}?>

<?php 
function fill_address_meta_box_content($post){
	$terms = get_terms( array(
		'taxonomy' => 'address',
		'hide_empty' => false // Retrieve all terms
	));
	$currentDateValue = get_the_terms($post->ID, 'address')[0];
	$addr_parts = parse_address_from_taxonomy($currentDateValue);
	?>

	<p class='meta-options'>
	<label for="address_street<?php echo $currentDateValue->term_id;?>">Street</label>
		<input id='address_street <?php echo $currentDateValue->term_id?>' 
		       type='text' 
			   name='address_street'
			   value="<?php echo $addr_parts[0];?>">
	</p> 
	<p> 
	<label for="address_city<?php echo $currentDateValue->term_id;?>">City</label>
		<input id='address_city <?php echo $currentDateValue->term_id?>' 
		       type='text' 
			   name='address_city'
			   value="<?php echo $addr_parts[1];?>">
	</p> <p> 
	<label for="address_state<?php echo $currentDateValue->term_id;?>">State</label>
		<input id='address_state <?php echo $currentDateValue->term_id?>' 
		       type='text' 
			   name='address_state'
			   value="<?php echo $addr_parts[2];?>">
	</p> <p> 
	<label for="address_zip<?php echo $currentDateValue->term_id;?>">Zip</label>
		<input id='address_zip <?php echo $currentDateValue->term_id?>' 
		       type='number' 
			   name='address_zip'
			   value="<?php echo $addr_parts[3];?>">
	</p>
<?php
}

add_action('save_post', 'save_address_taxonomy');
function save_address_taxonomy($post_id){
	$fields = [
		'address_street',
        'address_city',
        'address_state',
        'address_zip',
    ];
	$addr = "";
	foreach($fields as $field){
		if ( isset( $_REQUEST[$field] ) ) 
			$addr .= ( $_POST[$field] . "_");
	}
	wp_set_object_terms($post_id, $addr , 'address');
}


// styling 
// TODO: ADD BOOTSTRAP? 
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


add_action('do_meta_boxes', 'wpse33063_move_meta_box');

function wpse33063_move_meta_box(){
    remove_meta_box( 'postimagediv', 'post', 'side' );
    add_meta_box('postimagediv', __('Featured Image'), 'post_thumbnail_meta_box', 'post', 'normal', 'high');
}




